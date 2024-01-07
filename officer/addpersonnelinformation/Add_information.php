<?php include("../../servers/connect.php"); ?>
<?php include("../../header.php"); ?>
<div  style="  display: flex;flex-direction: row;">
    <?php include('./navbar/sidebar.php'); ?>
    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <?php include('./navbar/navuser.php'); ?>
        <script src="./js/addpersonnelinformation.js"></script>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <h2 class="m-0">เพิ่มข้อมูลบุคลากร</h2>
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="./home.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">เพิ่มข้อมูลบุคลากร</li>
                    </ol>
                </div>
            </div>
            <a href=""></a>
        </div>
        <div class="container mt-5">
        <!-- <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="">prefix</label>
                    <input type="text" class="form-control" placeholder="name">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="">firstname</label>
                    <input type="text" class="form-control" placeholder="name">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="">lastname</label>
                    <input type="text" class="form-control" placeholder="name">
                </div>
            </div>
        </div> -->
            <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="form-group row mb-2">
                    <div class="col-sm-2 control-label">
                        คำนำหน้า :
                    </div>
                    <div class="col-sm-2">
                        <select name="prog_id" class="form-control" required>
                            <option value="">เลือกคำนำหน้า</option>
                            <option value="0">พระครู</option>
                            <option value="0">พระมหา</option>
                            <option value="0">พระ</option>
                            <option value="0">นาง</option>
                            <option value="0">นางสาว</option>
                            <option value="0">นาย</option>
                        </select>
                    </div>
                    <div class="col-sm-1 control-label" class="form-control">
                        ชื่อ :
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="std_year_start" class="form-control" placeholder="ชื่อ.">
                    </div>
                    <div class="col-sm-1 control-label" class="form-control">
                        นามสกุล :
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="std_year_complete" class="form-control" placeholder="นามสกุล.">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <div class="col-sm-2 control-label">
                        เลขบัตรประชาชน :
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="std_id" class="form-control" autocomplete="off" maxlength="13" placeholder="เลขบัตรประชาชน" pattern="^[0-9]+$">
                    </div>

                    <div class="col-sm-1 control-label" class="form-control">
                        วัน-เดือน-ปี :
                    </div>
                    <div class="col-sm-2">
                        <input type="date" name="date" class="form-control">
                    </div>
                    <div class="col-sm-1 control-label" class="form-control">
                        อายุ :
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="std_id" class="form-control" autocomplete="off" maxlength="2" placeholder="อายุ" pattern="^[0-9]+$">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <div class="col-sm-2 control-label mb-2" class="form-control">
                        สับชาติ :
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="std_id" class="form-control" placeholder="สัญชาติ">
                    </div>
                </div>
                <div class="text-center">
                    <span style="font-size: 25px;">ข้อมูลตามทะเบียนบ้าน</span>
                </div>
                <div class="form-group row mb-3">
                    <div class="col-sm-2 control-label">
                        รหัสประจำบ้าน :
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="std_phone" class="form-control" placeholder="รหัสประจำบ้าน" maxlength="11">
                    </div>

                    <div class="col-sm-1 control-label">
                        เลขที่ :
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="std_email" class="form-control" placeholder="เลขที่">
                    </div>
                    <div class="col-sm-1 control-label">
                        หมู่ที่ :
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="std_email" class="form-control" placeholder="หมู่ที่">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <div class="col-sm-2 control-label">
                        ตำบล :
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="std_address" placeholder="ตำบล" class="form-control"></input>
                    </div>
                    <div class="col-sm-1 control-label">
                        อำเภอ :
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="std_address" required placeholder="อำเภอ" class="form-control"></input>
                    </div>
                    <div class="col-sm-1 control-label">
                        จังหวัด :
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="std_address" required placeholder="จังหวัด" class="form-control"></input>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <div class="col-sm-2 control-label">
                        ถนน :
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="std_address" required placeholder="ถนน" class="form-control"></input>
                    </div>
                    <div class="col-sm-1 control-label">
                        รหัสไปรษณีย์ :
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="std_address" required placeholder="รหัสไปรษณีย์" class="form-control"></input>
                    </div>
                    <div class="col-sm-1 control-label">
                        อีเมล์ :
                    </div>
                    <div class="col-sm-3">
                        <input type="email" name="std_email" required placeholder="อีเมล์" required class="form-control" placeholder="email"></input>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <div class="col-sm-2 control-label">
                        เบอร์โทรศัพท์ :
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="std_address" placeholder="เบอร์โทรศัพท์" class="form-control"></input>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <div class="col-sm-2 control-label">
                        วันที่เริ่มทำงาน :
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="std_address" placeholder="วันที่เริ่มทำงาน" class="form-control"></input>
                    </div>
                </div>
                <div class="text-center">
                    <span style="font-size: 25px;">ข้อมูลการศึกษา</span>
                </div>
                <h3>ปริญญาตรี</h3>
                <div class="form-group row mb-3">
                    <div class="col-sm-2 control-label">
                        คณะ :
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="std_address" required placeholder="คณะ" class="form-control"></input>
                    </div>
                    <div class="col-sm-1 control-label">
                        สาขาวิชา :
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="std_address" required placeholder="สาขา" class="form-control"></input>
                    </div>
                </div>
                <h3>ปริญญาโท</h3>
                <div class="form-group row mb-3">
                    <div class="col-sm-2 control-label">
                        คณะ :
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="std_address" required placeholder="คณะ" class="form-control"></input>
                    </div>
                    <div class="col-sm-1 control-label">
                        สาขาวิชา :
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="std_address" required placeholder="สาขา" class="form-control"></input>
                    </div>
                    <div class="col-sm-1 control-label">
                        ใบประกอบวิชาชีพผู้บริหาร :
                    </div>
                    <div class="col-sm-3">
                        <input type="email" name="std_email" required placeholder="ใบประกอบวิชาชีพผู้บริหาร" required class="form-control" placeholder="email"></input>
                    </div>
                </div>
                <h3>ต่ำกว่าปริญญาตรี</h3>
                <div class="form-group row mb-3">
                    <div class="col-sm-2 control-label">
                        หลักสูตร :
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="std_address" required placeholder="คณะ" class="form-control"></input>
                    </div>
                    <div class="col-sm-1 control-label">
                        สาขาวิชา :
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="std_address" required placeholder="สาขา" class="form-control"></input>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <div class="col-sm-2 control-label">
                        ใบประกอบวิชาชีพ :
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="std_address" required placeholder="ใบประกอบวิชาชีพ" class="form-control"></input>
                    </div>
                    <div class="col-sm-1 control-label">
                        นักธรรม/ธรรมศึกษา :
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="std_address" required placeholder="นักธรรม/ธรรมศึกษา" class="form-control"></input>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <div class="col-sm-2 control-label">
                        เปรียญธรรม/บาลีศึกษา :
                    </div>
                    <div class="col-sm-3">
                        <textarea name="std_address" required placeholder="เปรียญธรรม/บาลีศึกษา" class="form-control"></textarea>
                    </div>
                    <div class="col-sm-2 control-label">
                        วุฒิการศึกษา :
                    </div>
                    <div class="col-sm-3">
                        <textarea name="std_address" required placeholder="วุฒิการศึกษา" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <div class="col-sm-2 control-label">
                        ภาพโปรไฟล์ :
                    </div>
                    <div class="col-sm-2">
                        <script type='text/javascript'>
                            function preview_image(event) {
                                var reader = new FileReader();
                                reader.onload = function() {
                                    var output = document.getElementById('showimg');
                                    output.src = reader.result;
                                }
                                reader.readAsDataURL(event.target.files[0]);
                            }
                        </script>
                        <img id="showimg" width="100" height="100"> <br><br>
                        <input type="file" id="showimg" name="std_img" required accept="image/png, image/jpeg, image/jpg" onchange="preview_image(event)">
                    </div>
                </div>
                <hr>
                <div class="form-group row mb-3">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-3 text-center">
                        <button type="submit" class="btn " ><a href="./addpersonnelinformation.php" class="btn" style="background-color:#BB6AFB ; color:#FFFFFF">บันทึกข้อมูล</a></button>
                        <button type="submit" class="btn" style="background-color:#FF0505 ; color:#FFFFFF">ยกเลิก</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php include("../../footer.php") ?>