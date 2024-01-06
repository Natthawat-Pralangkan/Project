<?php include("../header.php"); ?>

<div class="wrapper">
    <?php include('./navbar/sidebar.php'); ?>

    <div class="content-wrapper">
        <?php include('./navbar/navuser.php'); ?>
        <script src="./js/managerequests.js"></script>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <h2 class="m-0">จัดการคำร้อง</h2>
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="./home.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">จัดการคำร้อง </li>
                    </ol>
                </div>
            </div>
            <a href=""></a>
        </div>
        <div class="content mt-5">
            <!-- <form id="dateForm">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="start-date" class="form-label">เริ่มต้น:</label>
                        <input type="date" class="form-control" id="start-date" name="start-date">
                    </div>
                    <div class="col-md-3">
                        <label for="end-date" class="form-label">สิ้นสุด:</label>
                        <input type="date" class="form-control" id="end-date" name="end-date">
                    </div>
                    <div class="col-md-2 align-self-end">
                        <button type="submit" class="btn btn-primary">ค้นหา</button>
                    </div>
                </div>
            </form> -->
            <div class="mt-3">
                <table id="managerequests" class="table">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ชื่อคำร้อง</th>
                            <th>สถานะ</th>
                            <th>ประเภทคำร้อง</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <?php include("../footer.php") ?>