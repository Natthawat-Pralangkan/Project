<?php include("../../header.php"); ?>

<div class="wrapper">
    <?php include('./navbar/sidebar.php'); ?>

    <div class="content-wrapper">
        <?php include('./navbar/navuser.php'); ?>
        <script src="./js/Check_the_request.js"></script>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <h2 class="m-0">ตรวจสอบคำร้อง</h2>
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="./home.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">ตรวจสอบคำร้อง </li>
                    </ol>
                </div>
            </div>
            <a href=""></a>
        </div>
        <div class="content mt-5">
            <div class="mt-3">
                <table id="checktherequest" class="table">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>วันที่ยื่น</th>
                            <th>รายการคำร้อง</th>
                            <th>ชื่อผู้ยื่น</th>
                            <th>สถานะ</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <?php include("../../footer.php") ?>