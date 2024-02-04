<?php include("../servers/connect.php"); ?>
<?php include("../header.php"); ?>
<div class="wrapper">
    <?php include('./navbar/sidebar.php'); ?>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <?php include('./navbar/navuser.php'); ?>
        <script src="./js/submit_a_complaint.js"></script>
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
        <div class="container mt-5">
            <div class="text-center">
                <form method="POST" action="result.php" class="row g-3 justify-content-center align-items-center">
                    <div class="col-md-3">
                        <input type="date" id="start_date" name="start_date" class="form-control">
                    </div>

                    <div class="col-md-auto">
                        <p class="m-0">ระหว่างวันที่</p>
                    </div>

                    <div class="col-md-3">
                        <input type="date" id="end_date" name="end_date" class="form-control">
                    </div>

                    <div class="col-md-auto">
                        <button type="submit" class="btn btn-primary">ค้นหา</button>
                    </div>
                </form>
            </div>
            <table class="table mt-5">
                <thead>
                    <tr>
                        <th scope="col">วัน เดือน ปี</th>
                        <th scope="col">เวลาเข้างาน</th>
                        <th scope="col">เวลาออกงาน</th>
                        <th scope="col">หมายเหตุ</th>
                    </tr>
                </thead>
                <tbody>
                    
                    
                </tbody>
            </table>
        </div>

    </div>
</div>

<?php include("../footer.php") ?>