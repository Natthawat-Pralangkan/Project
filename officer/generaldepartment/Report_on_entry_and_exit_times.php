<?php include("../../servers/connect.php"); ?>
<?php include("../../header.php"); ?>
<div class="wrapper">
    <?php include('./navbar/sidebar.php'); ?>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <?php include('./navbar/navuser.php'); ?>
        <script src="./js/Request_a_time_entry_and_exit_report.js"></script>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <h2 class="m-0">รายงานการลง เวลาเข้า - ออกงาน</h2>
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="./home.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">รายงานการลง เวลาเข้า - ออกงาน</li>
                    </ol>
                </div>
            </div>
            <a href=""></a>
        </div>
        <div class="mt-5 mx-3">
            <div class="d-flex justify-content-end">
                <div>
                    <a href="#" class="btn btn-success mr-2">Excel</a>
                    <a href="#" class="btn btn-danger">PDF</a>
                </div>
            </div>
            <div class="text-center mt-3">
                <table id="Request_a_time_entry_and_exit_report" class="table">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ว/ด/ป</th>
                            <th>เวลาเข้า</th>
                            <th>เวลาออก</th>
                            <th>ชื่อนามสกุล</th>
                            <th>หมายเหตุ</th>
                        </tr>
                    </thead>
                    <!-- เพิ่มข้อมูลตารางตรงนี้ -->
                </table>
            </div>
        </div>

    </div>
</div>
<script>
    if(localStorage.getItem("id_type") != "4" && localStorage.getItem("id_user") == null){
        localStorage.clear()
        window.location.href ="../"
    }
</script>
<?php include("../../footer.php") ?>