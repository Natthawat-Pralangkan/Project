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
                <div class="col-12 col-md-4">
                        <div class="shadow p-3 mb-5 bg-body rounded custom-card-ho">
                            <div class="d-flex justify-content-between align-items-center">
                                <i class="fa-solid fa-newspaper" style="font-size: 40px;color: #27a645"></i>
                                <p style="color : #555555">คำร้องรอการพิจารณา</p>
                            </div>
                            <div class="my-3">
                                <h1 class="text-center">30</h1>
                            </div>
                            <div class="border-top text-center py-3">
                                <button type="button" class="btn btn" data-bs-toggle="modal" data-bs-target="#exampleModal1" style="background-color: #BB6AFB; color :#FFFFFF">
                                    เพิ่มเติม
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="shadow p-3 mb-5 bg-body rounded custom-card-ho">
                            <div class="d-flex justify-content-between align-items-center">
                                <i class="fa-solid fa-newspaper" style="font-size: 40px;color: #FF3300"></i>
                                <p style="color : #555555">คำร้องทั้งหมด</p>
                            </div>
                            <div class="my-3">
                                <h1 class="text-center">40</h1>
                            </div>
                            <div class="border-top text-center py-3">
                                <button type="button" class="btn btn" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="background-color: #BB6AFB; color :#FFFFFF">
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
<?php include("../../footer.php") ?>