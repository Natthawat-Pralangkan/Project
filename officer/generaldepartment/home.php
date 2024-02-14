<?php include("../../servers/connect.php"); ?>
<?php include("../../header.php"); ?>
<div class="wrapper">
    <?php include('./navbar/sidebar.php'); ?>
    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <?php include('./navbar/navuser.php'); ?>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <h2 class="m-0">หน้าหลัก</h2>
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="./home.php">หน้าหลัก</a></li>
                    </ol>
                </div>
            </div>
            <a href=""></a>
        </div>
        <div class="content">
            <div class="row p-5 m-1">
                <div class="col-4">
                    <div class="shadow p-3 mb-5 bg-body rounded" style="width: 300px; height: 250px;">
                        <i class="fa-regular fa-id-card spani" style="font-size: 60px;"></i>
                        <span class="menu-text" style='font-size: 16px; text-align:right; display: inline-block; width:100%;'>
                            คำร้งรอตรวจสอบ
                        </span>
                        <h1 class="m-2" style='font-size: 30px; text-align:right; display: inline-block; width:90%;'>30</h1>
                        <div class="text-center mt-5">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                                เพิ่มเติม
                            </button>
                        </div>
                    </div>


                </div>
                <div class="col-4">
                    <div class="shadow p-3 mb-5 bg-body rounded" style="width: 300px;height: 250px;">
                        <i class="fa-solid fa-newspaper spani" style="font-size: 60px;"></i>
                        <span class="menu-text" style='font-size: 16px; text-align:right; display: inline-block; width:100%;'>
                            คำร้องทั้งหมด
                        </span>
                        <h1 class="m-2" style='font-size: 30px; text-align:right; display: inline-block; width:90%;'>30</h1>
                        <div class="text-center mt-5">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                เพิ่มเติม
                            </button>
                        </div>
                    </div>
                </div>
                
            <!-- Modal คำร้องรอการพิจารณา -->
            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">คำร้องรอการพิจารณา</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">วันที่ยื่น</th>
                                        <th scope="col">ชื่อ</th>
                                        <th scope="col">นามสกุล</th>
                                        <th scope="col">เรื่อง</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal คำร้องรออนุมัติ -->
            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">คำร้องรออนุมัติ</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">วันที่ยื่น</th>
                                        <th scope="col">ชื่อ</th>
                                        <th scope="col">นามสกุล</th>
                                        <th scope="col">เรื่อง</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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