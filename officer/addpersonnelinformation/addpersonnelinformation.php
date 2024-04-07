<?php include("../../servers/connect.php"); ?>
<?php include("../../header.php"); ?>
<div class="wrapper">
    <?php include('./navbar/sidebar.php'); ?>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <?php include('./navbar/navuser.php'); ?>
        <script src="./js/addpersonnelinformation.js"></script>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <h2 class="m-0">เพิ่มข้อมูลบุคลากร</h2>
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="./home.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">เพิ่มข้อมูลบุคลากร</li>
                    </ol>
                </div>
            </div>
            <a href=""></a>
        </div>
        <div class="mt-5 mx-3">
            <div class="d-flex justify-content-end">
                <div class="mt-5">
                    <a href="./Add_information.php" class="btn mr-2" style="background-color: #BB6AFB; color:#FFFFFF">เพิ่มข้อมูลบุคลากร</a>
                </div>
            </div>
            <div class="mt-3">
                <table id="addpersonnelinformation" class="table">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th>ตำแหน่ง</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>
                    <?php
                    try {
                        $sql = "SELECT * FROM `teacher_personnel_information` 
            JOIN type ON teacher_personnel_information.position = type.id_type 
            WHERE teacher_personnel_information.position IN (1, 2, 3, 4, 5, 6, 7) and teacher_personnel_information.status in (0) ORDER BY id DESC";
                        $result = $db->query($sql);

                        if ($result && $result->rowCount() > 0) {
                            $number = 1; // Initialize counter outside the loop
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                                <tr>
                                    <td><?php echo $number++; ?></td>
                                    <td><?php echo htmlspecialchars($row['user_name']) . ' ' . htmlspecialchars($row['last_name']); ?></td>
                                    <td><?php echo htmlspecialchars($row['name_type']); ?></td>
                                    <td><button class="btn" style="background-color: #BB6AFB; color:#FFFFFF" onclick="window.location.href='edit_information.php?id=<?php echo $row['id']; ?>'">แก้ไข</button></td>
                                    <td><button type="button" class="btn " style="background-color: #FF0000; color:#FFFFFF"  onclick="getdelete('<?php echo htmlspecialchars($row['id']); ?>')">ลบ</button></td>
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

            </div>
        </div>
    </div>
</div>
<script>
    if (localStorage.getItem("id_type") != "6" && localStorage.getItem("user_id") == null) {
        localStorage.clear()
        window.location.href = "../"
    }

    function getdata(id) {
        $.ajax({
            url: 'edit_information.php', // Your PHP script to fetch data
            type: 'post',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {
                // Assuming 'data' contains fields like 'user_name', 'last_name', etc.
                // Update modal fields here
                $('#exampleModal .modal-body #user_name').val(data.user_name);
                // And so on for other fields
                $('#exampleModal').modal('show');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    }

    function getdelete(id) {
        if (confirm('คุณแน่ใจว่าต้องการลบรายการนี้?')) { // เพิ่มการยืนยันก่อนลบ
            $.ajax({
                url: './api/dle_user', // แทนที่ด้วยเส้นทางไปยังไฟล์ PHP ของคุณ
                type: 'POST',
                data: {
                    id: id,
                }, // ส่ง ID และสถานะใหม่ที่ต้องการอัปเดต
                success: function(response) {
                    var data = JSON.parse(response);
                    if (data.status === 200) {
                        alert("ลบข้อมูลสำเร็จ");
                        location.reload(); 
                    } else {
                        alert("เกิดข้อผิดพลาดในการลบข้อมูล");
                        location.reload(); 
                    }
                },
                error: function(xhr, status, error) {
                    console.error("เกิดข้อผิดพลาด: " + status + " " + error);
                }
            });
        }
    }
</script>
<?php include("../../footer.php") ?>