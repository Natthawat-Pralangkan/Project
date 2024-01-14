<?php include("../servers/connect.php"); ?>
<?php include("../header.php"); ?>
<div style="  display: flex;flex-direction: row;">
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
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="" style="font-size: 18px;">คำนำหน้า</label>
                        <div class="">
                            <select name="prog_id" class="form-control mt-2" required>
                                <option value="">เลือกคำนำหน้า</option>
                                <option value="0">พระครู</option>
                                <option value="0">พระมหา</option>
                                <option value="0">พระปลัด</option>
                                <option value="0">พระ</option>
                                <option value="0">นาง</option>
                                <option value="0">นางสาว</option>
                                <option value="0">นาย</option>
                                <option value="0">ว่าที่ร้อยตรี</option>
                                <option value="0">สิบเอก</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for=""style="font-size: 18px;">ชื่อ</label>
                        <input type="text" class="form-control mt-2" placeholder="ชื่อ">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for=""style="font-size: 18px;">นามสกุล</label>
                        <input type="text" class="form-control mt-2" placeholder="นามสกุล">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group mt-2">
                        <label for=""style="font-size: 18px;">เลขบัตรประชาชน</label>
                        <input type="text" class="form-control mt-2" placeholder="เลขบัตรประชาชน">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group mt-2">
                        <label for=""style="font-size: 18px;">วัน-เดือน-ปี</label>
                        <input type="date" class="form-control mt-2" placeholder="เลขบัตรประชาชน">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group mt-2">
                        <label for=""style="font-size: 18px;">อายุ</label>
                        <input type="text" class="form-control mt-2" placeholder="อายุ">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group mt-2">
                        <label for=""style="font-size: 18px;">สัญชาติ</label>
                        <input type="text" class="form-control mt-2" placeholder="สัญชาติ">
                    </div>
                </div>
            </div>
            <div class="text-center mt-3">
                <span style="font-size: 30px;">ข้อมูลตามทะเบียนบ้าน</span>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group mt-2">
                        <label for=""style="font-size: 18px;">รหัสประจำบ้าน</label>
                        <input type="text" class="form-control mt-2" placeholder="รหัสประจำบ้าน">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group mt-2">
                        <label for=""style="font-size: 18px;">เลขที่ :</label>
                        <input type="text" class="form-control mt-2" placeholder="เลขที่">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group mt-2">
                        <label for=""style="font-size: 18px;">หมู่ที่</label>
                        <input type="text" class="form-control mt-2" placeholder="หมู่ที่">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group mt-2">
                        <label for=""style="font-size: 18px;">ตำบล</label>
                        <input type="text" class="form-control mt-2" placeholder="ตำบล">
                    </div>
                </div>
                <div class="col-2 mt-2">
                    <div class="form-group mt-2">
                        <label for=""style="font-size: 18px;">ตำบล</label>
                        <input type="text" class="form-control mt-2" placeholder="ตำบล">
                    </div>
                </div>
                <div class="col-2 mt-2">
                    <div class="form-group mt-2">
                        <label for=""style="font-size: 18px;">อำเภอ</label>
                        <input type="text" class="form-control mt-2" placeholder="อำเภอ">
                    </div>
                </div>
                <div class="col-2 mt-2">
                    <div class="form-group mt-2">
                        <label for=""style="font-size: 18px;">จังหวัด </label>
                        <input type="text" class="form-control mt-2" placeholder="จังหวัด ">
                    </div>
                </div>
                <div class="col-2 mt-2">
                    <div class="form-group mt-2">
                        <label for=""style="font-size: 18px;">ถนน </label>
                        <input type="text" class="form-control mt-2" placeholder="ถนน ">
                    </div>
                </div>
                <div class="col-2 mt-2">
                    <div class="form-group mt-2">
                        <label for=""style="font-size: 18px;">รหัสไปรษณีย์ </label> 
                        <input type="text" class="form-control mt-2" placeholder="รหัสไปรษณีย์ ">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4 mt-2">
                    <div class="form-group mt-2">
                        <label for=""style="font-size: 18px;">อีเมล์</label>
                        <input type="text" class="form-control mt-2" placeholder="อีเมล์ ">
                    </div>
                </div>
                <div class="col-4 mt-2">
                    <div class="form-group mt-2">
                        <label for=""style="font-size: 18px;">เบอร์โทรศัพท์ </label>
                        <input type="text" class="form-control mt-2" placeholder="เบอร์โทรศัพท์ ">
                    </div>
                </div>
                <div class="col-4 mt-2">
                    <div class="form-group mt-2">
                        <label for=""style="font-size: 18px;">วันที่เริ่มทำงาน  </label>
                        <input type="text" class="form-control mt-2" placeholder="วันที่เริ่มทำงาน ">
                    </div>
                </div>
            </div>
            <div class="text-center mt-3">
                <span style="font-size: 30px;">ข้อมูลการศึกษา</span>
            </div>
            <h3>ปริญญาตรี</h3>
            <div class="row">
                <div class="col-4 mt-2">
                    <div class="form-group">
                        <label for=""style="font-size: 18px;">คณะ  </label>
                        <input type="text" class="form-control mt-2" placeholder="คณะ ">
                    </div>
                </div>
                <div class="col-4 mt-2">
                    <div class="form-group">
                        <label for=""style="font-size: 18px;">สาขาวิชา  </label>
                        <input type="text" class="form-control mt-2" placeholder="สาขาวิชา ">
                    </div>
                </div>
            </div>
            <h3 class="mt-3">ปริญญาโท</h3>
            <div class="row">
                <div class="col-4 mt-2">
                    <div class="form-group">
                        <label for=""style="font-size: 18px;">คณะ  </label>
                        <input type="text" class="form-control mt-2" placeholder="คณะ ">
                    </div>
                </div>
                <div class="col-4 mt-2">
                    <div class="form-group">
                        <label for=""style="font-size: 18px;">สาขาวิชา  </label>
                        <input type="text" class="form-control mt-2" placeholder="สาขาวิชา ">
                    </div>
                </div>
                <div class="col-4 mt-2">
                    <div class="form-group">
                        <label for=""style="font-size: 18px;">ใบประกอบวิชาชีพผู้บริหาร : </label>
                        <input type="text" class="form-control mt-2" placeholder="ใบประกอบวิชาชีพผู้บริหาร ">
                    </div>
                </div>
            </div>
            <h3 class="mt-3">ต่ำกว่าปริญญาตรี</h3>
            <div class="row mt-3">
                <div class="col-4 mt-2">
                    <div class="form-group">
                        <label for=""style="font-size: 18px;">คณะ</label>
                        <input type="text" class="form-control mt-2" placeholder="คณะ ">
                    </div>
                </div>
                <div class="col-4 mt-2">
                    <div class="form-group">
                        <label for=""style="font-size: 18px;">สาขาวิชา</label>
                        <input type="text" class="form-control mt-2" placeholder="สาขาวิชา ">
                    </div>
                </div>
                <div class="col-4 mt-2">
                    <div class="form-group">
                        <label for=""style="font-size: 18px;">ใบประกอบวิชาชีพผู้บริหาร</label>
                        <input type="text" class="form-control mt-2" placeholder="ใบประกอบวิชาชีพผู้บริหาร ">
                    </div>
                </div>
                <div class="col-4 mt-2">
                    <div class="form-group">
                        <label for=""style="font-size: 18px;">นักธรรม/ธรรมศึกษา</label>
                        <textarea name="std_address" required placeholder="นักธรรม/ธรรมศึกษา" class="form-control mt-2"></textarea>
                    </div>
                </div>
                <div class="col-4 mt-2">
                    <div class="form-group">
                        <label for=""style="font-size: 18px;">เปรียญธรรม/บาลีศึกษา</label>
                        <textarea name="std_address" required placeholder="เปรียญธรรม/บาลีศึกษา" class="form-control mt-2"></textarea>
                    </div>
                </div>
                <div class="col-4 mt-2">
                    <div class="form-group">
                        <label for=""style="font-size: 18px;">วุฒิการศึกษา</label>
                        <textarea name="std_address" required placeholder="วุฒิการศึกษา" class="form-control mt-2"></textarea>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class=" text-center">
                    <label for="" class="mt-3"style="font-size: 18px;">รูปภาพ </label>
                    <div class="text-center mt-3">
                        <script type='text/javascript' class="text-center">
                            function preview_image(event) {
                                var reader = new FileReader();
                                reader.onload = function() {
                                    var output = document.getElementById('showimg');
                                    output.src = reader.result;
                                }
                                reader.readAsDataURL(event.target.files[0]);
                            }
                        </script>
                        <img id="showimg" width="250" height="250"> <br><br>
                        <input type="file" id="showimg" name="std_img" required accept="image/png, image/jpeg, image/jpg" onchange="preview_image(event)" class="text-center">
                    </div>
                </div>

            </div>
            <hr>
            <div class="form-group mb-3">
                <div class=" text-center">
                    <button type="submit" class="btn "><a href="./addpersonnelinformation.php" class="btn" style="background-color:#BB6AFB ; color:#FFFFFF">บันทึกข้อมูล</a></button>
                    <button type="submit" class="btn" style="background-color:#FF0505 ; color:#FFFFFF">ยกเลิก</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <?php include("../footer.php") ?>