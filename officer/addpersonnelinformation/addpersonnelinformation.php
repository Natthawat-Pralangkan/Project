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
                <!-- <div>
                    <a href="#" class="btn btn-success mr-2">เพิ่มคำสั่งภายใน - ภายนอก</a>
                </div> -->
                <div class="mt-5">
                    <!-- <button type="button" class="btn btn-success mr-2"> -->
                    <a href="./Add_information.php" class="btn mr-2" style="background-color: #BB6AFB; color:#FFFFFF">เพิ่มข้อมูลบุคลากร</a>

                    <!-- </button> -->
                </div>
            </div>
            <div class="mt-3">
                <table id="addpersonnelinformation" class="table">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ชื่อ</th>
                            <th>นามสกุล</th>
                            <th>ตำแหน่ง</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>
                    <?php
                    // คำสั่ง SQL เพื่อดึงข้อมูล
                    $sql = "SELECT * FROM `teacher_personnel_information` ORDER BY user_id DESC;";
                    $result = $db->query($sql);

                    // ตรวจสอบว่ามีข้อมูลในฐานข้อมูลหรือไม่
                    if ($result->rowCount() > 0) {
                        // วนลูปเพื่อแสดงข้อมูลทั้งหมดในตาราง
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['user_name'] . "</td>";
                            echo "<td>" . $row['last_name'] . "</td>";
                            echo "<td>" . $row['user_id'] . "</td>";
                            echo "<td><button type='button' class='btn btn-primary' onclick=\"getdata('" . $row['id'] . "')\" data-bs-toggle='modal' data-bs-target='#exampleModal" . $row['id'] . "'>แก้ไข</button></td>";
                            echo "<td><button type='button' class='btn btn-primary' onclick=\"getdata('" . $row['id'] . "')\" data-bs-toggle='modal' data-bs-target='#exampleModal" . $row['id'] . "'>ลบ</button></td>";

                            echo "</tr>";
                        }
                    } else {
                        echo "0 results";
                    }


                    ?>
                </table>
            </div>
        </div>
        <!-- <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="height: 300px;">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">เพิ่มข้อมูลบุคลากร</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="text-center">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

    </div>
</div>
<script>
    if (localStorage.getItem("id_type") != "6" && localStorage.getItem("id_user") == null) {
        localStorage.clear()
        window.location.href = "../"
    }
</script>
<?php include("../../footer.php") ?>