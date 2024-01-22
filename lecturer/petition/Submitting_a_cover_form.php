<?php include("../../servers/connect.php"); ?>
<?php include("../../header.php"); ?>

<div class="wrapper">
    <?php include('./../navbar/sidebar.php'); ?>
    <div class="content-wrapper">
        <?php include('./../navbar/navuser.php'); ?>
        <!-- <script src="./js/submit_a_complaint.js"></script> -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <h2 class="m-0">ยื่นคำร้อง</h2>
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="./home.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">ยื่นคำร้อง</li>
                    </ol>
                </div>
            </div>
            <a href=""></a>
        </div>
        <div class="container mt-5">
            <h1 class="text-center">เพิ่มคำร้อง</h1>
            <div class="row ">
                <div class="col-4 ">
                    <div class="form-group ">
                        <label for="" style="font-size: 18px;">ชื่อคำร้อง</label>
                        <input type="text" class="form-control mt-2  text-right" placeholder="การยื่นฟอร์มปะหน้า" readonly >
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" style="font-size: 18px;">ชื่อผู้ยื่น</label>
                        <input type="text" class="form-control mt-2" placeholder="ชื่อผู้ยื่น">
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-2">
                    <div class="form-group ">
                        <label for="" style="font-size: 18px;">วันที่</label>
                        <input type="text" class="form-control mt-2" placeholder="วันที่">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="" style="font-size: 18px;">เดือน</label>
                        <input type="text" class="form-control mt-2" placeholder="เดือน">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="" style="font-size: 18px;">พ.ศ.</label>
                        <input type="text" class="form-control mt-2" placeholder="พ.ศ.">
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-4">
                    <div class="form-group">
                        <label for="" style="font-size: 18px;">ชื่อเอกสาร พิจารณา</label>
                        <input type="text" class="form-control mt-2" placeholder="ชื่อเอกสาร พิจารณา">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" style="font-size: 18px;">กลุ่มบริหาร/กลุ่มสาระฯ/งาน</label>
                        <input type="text" class="form-control mt-2" placeholder="กลุ่มบริหาร/กลุ่มสาระฯ/งาน">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" style="font-size: 18px;">ชื่อกิจกรรม</label>
                        <input type="text" class="form-control mt-2" placeholder="ชือกิจกรรม">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" style="font-size: 18px;">ตามโครงการ</label>
                        <input type="text" class="form-control mt-2" placeholder="ตามโครงการ">
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-2">
                    <div class="form-group ">
                        <label for="" style="font-size: 18px;">วันที่</label>
                        <input type="text" class="form-control mt-2" placeholder="วันที่">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="" style="font-size: 18px;">เดือน</label>
                        <input type="text" class="form-control mt-2" placeholder="เดือน">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="" style="font-size: 18px;">พ.ศ.</label>
                        <input type="text" class="form-control mt-2" placeholder="พ.ศ.">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group ">
                        <label for="" style="font-size: 18px;">สถานที่</label>
                        <input type="text" class="form-control mt-2" placeholder="สถานที่">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group ">
                        <label for="" style="font-size: 18px;">สรุปรายละเอียด</label>
                        <textarea name="std_address" required placeholder="สรุปรรายละเอียด" class="form-control mt-2"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group mt-5">
                <div class=" text-center">
                    <button type="submit" class="btn "><a href="../submit_a_complaint.php" class="btn" style="background-color:#BB6AFB ; color:#FFFFFF">บันทึกข้อมูล</a></button>
                    <button type="submit" class="btn" style="background-color:#FF0505 ; color:#FFFFFF">ยกเลิก</button>
                </div>
            </div>

        </div>

        <?php include("../../footer.php") ?>