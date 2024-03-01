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
                            <th>ชื่อ-นามสกุล</th>
                            <th>ตำแหน่ง</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>
                    <?php
                    $sql = "SELECT * FROM `teacher_personnel_information` 
                    JOIN type ON teacher_personnel_information.position = type.id_type 
                    WHERE teacher_personnel_information.position IN (2, 3, 4, 5, 6, 7) ORDER BY id DESC";

                    try {
                        $result = $db->query($sql);

                        // Assuming you meant to type $number instead of $nenber
                        $number = 1;

                        // Check if there are any results
                        if ($result && $result->rowCount() > 0) {
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td>" . $number++ . "</td>";
                                echo "<td>" . $row['user_name'] . ' ' . $row['last_name'] . "</td>";
                                echo "<td>" . $row['name_type'] . "</td>";
                                echo "<td><button type='button' class='btn btn-primary' onclick=\"getdata('" . htmlspecialchars($row['id']) . "')\" data-bs-toggle='modal' data-bs-target='#exampleModal" . htmlspecialchars($row['id']) . "'>แก้ไข</button></td>";
                                echo "<td><button type='button' class='btn btn-primary' onclick=\"getdata('" . htmlspecialchars($row['id']) . "')\" data-bs-toggle='modal' data-bs-target='#exampleModal" . htmlspecialchars($row['id']) . "'>ลบ</button></td>";
                                echo "</tr>";
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
</script>
<?php include("../../footer.php") ?>