<?php include("../../servers/connect.php"); ?>
<?php include("../../header.php"); ?>
<div class="wrapper">
    <?php include('./navbar/sidebar.php'); ?>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <?php include('./navbar/navuser.php'); ?>
        <script src="./js/uploadcommand.js"></script>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <h2 class="m-0">อัพโหลดคำสั่งภายใน - ภายนอก </h2>
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="./home.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">อัพโหลดคำสั่งภายใน - ภายนอก</li>
                    </ol>
                </div>
            </div>
            <a href=""></a>
        </div>
        <div class="mx-3 mt-5">
            <div class="d-flex justify-content-end">
                <!-- <div>
                    <a href="#" class="btn btn-success mr-2">เพิ่มคำสั่งภายใน - ภายนอก</a>
                </div> -->
                <div class="mt-5">
                    <button type="button" class="btn btn-success mr-2" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                        เพิ่มคำสั่งภายใน - ภายนอก
                    </button>
                </div>
            </div>
            <div class="mt-3">
                <table id="uploadcommand" class="table">
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
        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="height: 300px;">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">เพิ่มคำสั่งภายใน - ภายนอก</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 ">
                            <div class="form-group ">
                                <label for="" style="font-size: 18px;">ชื่อคำสั่ง</label>
                                <input type="text" class="form-control mt-2  text-right" placeholder="ชื่อคำสั่ง" id="name_from_9" name="name_from_9">
                            </div>
                        </div>
                        <div class="col-12 ">
                            <div class="form-group ">
                                <label for="" style="font-size: 18px;">ประเภทคำสั่ง</label>
                                <input type="text" class="form-control mt-2  text-right" placeholder="ประเภทคำสั่ง" id="name_from_9" name="name_from_9">
                            </div>
                        </div>
                    </div>
                    <div class="input-group mt-3">

                        <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include("../../footer.php") ?>