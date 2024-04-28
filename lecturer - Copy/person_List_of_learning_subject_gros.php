<?php include("../servers/connect.php"); ?>
<?php include("../header.php"); ?>
<div class="wrapper">
    <?php include('./navbar/sidebar.php'); ?>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <?php include('./navbar/navuser.php'); ?>
        <script src="./js/person_addpersonnelinformation.js"></script>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <h2 class="m-0">จัดการหัวหน้ากลุ่มสาระการเรียนรู้</h2>
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="./home.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">จัดการหัวหน้ากลุ่มสาระการเรียนรู้</li>
                    </ol>
                </div>
            </div>
            <a href=""></a>
        </div>
        <div class="mt-5 mx-3">
            <div class="mt-3">
                <table id="addpersonnelinformation" class="table">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ชื่อกลุ่มสาระ</th>
                            <th>ชื่อ-นามสกุล หัวหน้ากลุ่มสาระ</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>
                    <?php
                    try {
                        $sql = "SELECT * FROM `subject_group` ";
                        $result = $db->query($sql);

                        if ($result && $result->rowCount() > 0) {
                            $number = 1; // Initialize counter outside the loop
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                                <tr>
                                    <td><?php echo $number++; ?></td>
                                    <td><?php echo htmlspecialchars($row['subject_group_name']); ?></td>
                                    <td><?php echo htmlspecialchars($row['group_leader_name']); ?></td>
                                    <td><button class="btn" style="background-color: #BB6AFB; color:#FFFFFF" onclick="getdate(<?php echo $row['id']; ?>)">แก้ไข</button></td>
                                    <td><button type="button" class="btn " style="background-color: #FF0000; color:#FFFFFF" onclick="getdelete('<?php echo htmlspecialchars($row['id']); ?>')">ลบ</button></td>
                                </tr>
                    <?php
                            }
                        } else {
                            echo "<tr><td colspan='5'>ไม่พบข้อมูล</td></tr>";
                        }
                    } catch (PDOException $e) {
                        die("Database error: " . $e->getMessage());
                    }
                    ?>

                </table>
                <!-- Modal -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">แก้ไขชื่อหัวหน้ากลุ่มสาระการเรียนรู้</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="editForm">
                                    <div class="mb-3">
                                        <label for="subjectGroupName" class="form-label">ชื่อกลุ่มสาระการเรียนรู้</label>
                                        <input type="text" class="form-control" id="subjectGroupName" name="subject_group_name" style="background-color: #e9ecef;" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="groupLeaderName" class="form-label">ชื่อหัวหน้ากลุ่มสาระการเรียนรู้</label>
                                        <input type="text" class="form-control" id="groupLeaderName" name="group_leader_name">
                                    </div>
                                    <input type="hidden" id="editId" name="id">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn" style="background-color: #BB6AFB; color:#FFFFFF" onclick="submitEditForm()">บันทึก</button>
                                <button type="button" class="btn" style="background-color: #FF0000; color:#FFFFFF" data-bs-dismiss="modal">ยกเลืก</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    if (localStorage.getItem("id_type") != "6" && localStorage.getItem("user_id") == null) {
        localStorage.clear()
        window.location.href = "../"
    }

    function getdate(id) {
        $.ajax({
            type: "POST",
            url: "person_get_subject_group", // ตรวจสอบ URL ให้ตรงกับที่ตั้งของไฟล์ PHP
            data: {
                id: id
            },
            dataType: "json",
            success: function(response) {
                // ตั้งค่าค่าของฟอร์ม
                document.getElementById('subjectGroupName').setAttribute('readonly', true);
                $('#subjectGroupName').val(response.subject_group_name);
                $('#groupLeaderName').val(response.group_leader_name);
                $('#editId').val(response.id);

                // แสดง modal
                var editModal = new bootstrap.Modal(document.getElementById('editModal'), {
                    keyboard: false
                });
                editModal.show();
            },
            error: function(xhr, status, error) {
                console.error("Error: " + status + " " + error);
            }
        });
    }

    function submitEditForm() {
        var id = $('#editId').val(); // รับค่า id
        var subjectGroupName = $('#subjectGroupName').val(); // รับค่าจากฟอร์ม
        var groupLeaderName = $('#groupLeaderName').val(); // รับค่าจากฟอร์ม

        $.ajax({
            type: "POST",
            url: "./api/person_update_subject_group", // พาธไปยังไฟล์ PHP ที่จะอัปเดตข้อมูล
            data: {
                id: id,
                subject_group_name: subjectGroupName,
                group_leader_name: groupLeaderName
            },
            success: function(response) {
                console.log(response);
                var data = JSON.parse(response);
                if (data.status === 200) {
                    alert("อัปเดตข้อมูลสำเร็จ");
                    $('#editModal').modal('hide')
                    location.reload();
                } else {
                    alert("เกิดข้อผิดพลาดในการอัปเดตข้อมูล");
                    window.location.href = "Add_information";
                }
            },
            error: function() {
                alert('เกิดข้อผิดพลาดในการอัปเดตข้อมูล');
            }
        });
    }
</script>
<?php include("../footer.php") ?>