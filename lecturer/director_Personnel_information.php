<?php 
include("../servers/connect.php"); 
include("../header.php"); 
?>
<div class="wrapper">
    <?php include('./navbar/sidebar.php'); ?>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <?php include('./navbar/navuser.php'); ?>
        <script src="./js/Personnel_information.js"></script>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <h2 class="m-0">ข้อมูลบุคลากร</h2>
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="./home.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">ข้อมูลบุคลากร</li>
                    </ol>
                </div>
            </div>
            <a href=""></a>
        </div>
        <div class="mx-3 mt-5">
            <div class="mt-3">
                <table id="addpersonnelinformation" class="table">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th>ตำแหน่ง</th>
                            <th>ดูรายละเอียด</th>
                        </tr>
                    </thead>
                    <?php
                    try {
                        $sql = "SELECT * FROM `teacher_personnel_information` 
            JOIN type ON teacher_personnel_information.position = type.id_type 
            WHERE teacher_personnel_information.position IN (2, 3, 4, 5, 6, 7) and teacher_personnel_information.status in (0) ORDER BY id DESC";
                        $result = $db->query($sql);

                        if ($result && $result->rowCount() > 0) {
                            $number = 1; // Initialize counter outside the loop
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                                <tr>
                                    <td><?php echo $number++; ?></td>
                                    <td><?php echo htmlspecialchars($row['user_name']) . ' ' . htmlspecialchars($row['last_name']); ?></td>
                                    <td><?php echo htmlspecialchars($row['name_type']); ?></td>
                                    <td><button class="btn" style="background-color: #BB6AFB; color:#FFFFFF" onclick="window.location.href='director_get_information.php?id=<?php echo $row['id']; ?>'">ดูรายละเอียด</button></td>
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
    if (localStorage.getItem("id_type") != "3" && localStorage.getItem("user_id") == null) {
        localStorage.clear()
        window.location.href = "../"
    }
    
</script>
<?php include("../footer.php") ?>