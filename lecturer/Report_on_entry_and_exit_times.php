<?php include("../servers/connect.php"); ?>
<?php include(".././header.php"); ?>
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
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        พิมพ์รายงานการลงเวลาเข้า - ออกงาน
                    </button>
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

                </table>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">รายงานการลง เวลาเข้า - ออกงาน </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="myForm" action="" method="get">
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-md-4 mb-0">
                                        <label for="start_date" class="form-label mb-0">วันที่เริ่มต้น:</label>
                                        <input type="date" class="form-control" id="start_date" name="start_date">
                                    </div>
                                    <div class="col-md-2 mb-0 mt-5 text-center ">
                                        <h4>ระหว่าง</h4> 
                                    </div>
                                    <div class="col-md-4 mb-0">
                                        <label for="end_date" class="form-label mb-0">วันที่สิ้นสุด:</label>
                                        <input type="date" class="form-control" id="end_date" name="end_date">
                                    </div>
                                   
                                </div>
                                <div class="text-center mt-3">
                                <button id="pdfButton" onclick="createPDF()" class="btn btn-danger mt-3">พิมพ์รายงาน PDF</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    if (localStorage.getItem("id_type") != "3" && localStorage.getItem("user_id") == null) {
        localStorage.clear()
        window.location.href = "../"
    }
    function createPDF() {
        var startDate = $('#start_date').val();
        var endDate = $('#end_date').val();
        var idtype = localStorage.getItem("user_id"); // Properly retrieve the user_id from localStorage

        // Include user_id in the URL parameters
        window.open(`./Report_on_entry_and_exit_times_pdf.php?start_date=${startDate}&end_date=${endDate}&user_id=${idtype}`, '_blank');
    }
</script>
<?php include("../footer.php") ?>