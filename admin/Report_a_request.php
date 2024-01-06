<?php include("../header.php"); ?>

<div class="wrapper">
    <?php include('./navbar/sidebar.php'); ?>

    <div class="content-wrapper">
        <?php include('./navbar/navuser.php'); ?>
        <script src="./js/managerequests.js"></script>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <h2 class="m-0">รายงานสถิติคำร้อง</h2>
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="./home.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">รายงานสถิติคำร้อง </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="text-center mt-5">
                <h2 class="mb-4">ค้นหาข้อมูลตามวันที่</h2>
                <form action="search.php" method="get">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-2 mb-0 d-flex align-items-center justify-content-center"> <!-- กำหนด margin-bottom เป็น 0 -->
                            <label for="start_date" class="form-label mb-0">วันที่เริ่มต้น:</label>
                        </div>
                        <div class="col-md-2 mb-0 d-flex align-items-center justify-content-center"> <!-- กำหนด margin-bottom เป็น 0 -->
                            <input type="date" class="form-control" id="start_date" name="start_date">
                        </div>
                        <div class="col-md-2 mb-0 d-flex align-items-center justify-content-center"> <!-- กำหนด margin-bottom เป็น 0 -->
                            <label for="end_date" class="form-label mb-0">วันที่สิ้นสุด:</label>
                        </div>
                        <div class="col-md-2 mb-0 d-flex align-items-center justify-content-center"> <!-- กำหนด margin-bottom เป็น 0 -->
                            <input type="date" class="form-control" id="end_date" name="end_date">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">ค้นหา</button>
                </form>
                <?php
                // ตรวจสอบว่ามีการส่งข้อมูลผ่านแบบฟอร์มหรือไม่
                if ($_SERVER["REQUEST_METHOD"] == "GET") {
                    // ดึงข้อมูลที่ส่งมาจากฟอร์ม
                    // $startDate = $_GET["start_date"];
                    // $endDate = $_GET["end_date"];

                    // นำข้อมูลไปใช้งานหรือดึงข้อมูลจากฐานข้อมูลเพื่อแสดงผล
                    // ตัวอย่างเพียงแสดงข้อมูลในรูปแบบตาราง
                ?>
                    <div class="table-responsive mt-4">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Column 1</th>
                                    <th>Column 2</th>
                                    <!-- เพิ่มหัวข้อคอลัมน์ตามข้อมูลที่ต้องการแสดง -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Data 1</td>
                                    <td>Data 2</td>
                                    <!-- เพิ่มข้อมูลตามที่ต้องการแสดง -->
                                </tr>
                                <!-- เพิ่มแถวข้อมูลตามจำนวนที่ต้องการ -->
                            </tbody>
                        </table>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php include("../footer.php") ?>