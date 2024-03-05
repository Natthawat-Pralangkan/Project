<?php include("../../servers/connect.php"); ?>
<?php include("../../header.php"); ?>
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
                        <label for="" style="font-size: 18px;">ชื่อ</label>
                        <input type="text" class="form-control mt-2" placeholder="ชื่อ" id="user_name" name="user_name">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" style="font-size: 18px;">นามสกุล</label>
                        <input type="text" class="form-control mt-2" placeholder="นามสกุล" id="last_name" name="last_name">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group ">
                        <label for="" style="font-size: 18px;">เลขบัตรประชาชน</label>
                        <input type="text" class="form-control mt-2" placeholder="เลขบัตรประชาชน" id="id_card_number" name="id_card_number">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group mt-2">
                        <label for="" style="font-size: 18px;">วัน-เดือน-ปี</label>
                        <input type="date" class="form-control mt-2" placeholder="เลขบัตรประชาชน" id="date_month_yearofbirth" name="date-month-yearofbirth	">
                    </div>
                </div>
                <!-- <div class="col-2">
                    <div class="form-group mt-2">
                        <label for="" style="font-size: 18px;">อายุ</label>
                        <input type="text" class="form-control mt-2" placeholder="อายุ" id="age" name="age">
                    </div>
                </div> -->
                <div class="col-2">
                    <div class="form-group mt-2">
                        <label for="" style="font-size: 18px;">สัญชาติ</label>
                        <input type="text" class="form-control mt-2" placeholder="สัญชาติ" id="nationality" name="nationality">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group mt-2">
                        <label for="" style="font-size: 18px;">ตำแหน่ง</label>
                        <div class="">
                            <select name="position" class="form-control mt-2" id="position" required>
                                <option value="">เลือกตำแหน่ง</option>
                                <option value="1">ผู้อำนวยการ</option>
                                <option value="2">รองผู้อำนวยการ</option>
                                <option value="3">เจ้าหน้าที่ฝ่ายวิชาการ</option>
                                <option value="4">เจ้าหน้าที่ฝ่ายทั่วไป</option>
                                <option value="5">เจ้าหน้าที่ฝ่ายงบประมาณ</option>
                                <option value="6">เจ้าหน้าที่ฝ่ายบุคคล</option>
                                <option value="7">ครู</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-3">
                <span style="font-size: 30px;">ข้อมูลตามทะเบียนบ้าน</span>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group mt-2">
                        <label for="" style="font-size: 18px;">รหัสประจำบ้าน</label>
                        <input type="text" class="form-control mt-2" placeholder="รหัสประจำบ้าน" id="house_code" name="house_code">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group mt-2">
                        <label for="" style="font-size: 18px;">เลขที่ :</label>
                        <input type="text" class="form-control mt-2" placeholder="เลขที่" id="number_house" name="number_house">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group mt-2">
                        <label for="" style="font-size: 18px;">หมู่ที่</label>
                        <input type="text" class="form-control mt-2" placeholder="หมู่ที่" id="village" name="village">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group mt-2">
                        <label for="" style="font-size: 18px;">ตำบล</label>
                        <input type="text" class="form-control mt-2" placeholder="ตำบล" id="district" name="district">
                    </div>
                </div>
                <div class="col-2 mt-2">
                    <div class="form-group mt-2">
                        <label for="" style="font-size: 18px;">อำเภอ</label>
                        <input type="text" class="form-control mt-2" placeholder="อำเภอ" id="prefecture" name="prefecture">
                    </div>
                </div>
                <div class="col-2 mt-2">
                    <div class="form-group mt-2">
                        <label for="" style="font-size: 18px;">จังหวัด </label>
                        <input type="text" class="form-control mt-2" placeholder="จังหวัด " id="province" name="province">
                    </div>
                </div>
                <div class="col-2 mt-2">
                    <div class="form-group mt-2">
                        <label for="" style="font-size: 18px;">ถนน </label>
                        <input type="text" class="form-control mt-2" placeholder="ถนน " id="road" name="road">
                    </div>
                </div>
                <div class="col-2 mt-2">
                    <div class="form-group mt-2">
                        <label for="" style="font-size: 18px;">รหัสไปรษณีย์ </label>
                        <input type="text" class="form-control mt-2" placeholder="รหัสไปรษณีย์ " id="zip_code" name="zip_code">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4 mt-2">
                    <div class="form-group mt-2">
                        <label for="" style="font-size: 18px;">อีเมล์</label>
                        <input type="text" class="form-control mt-2" placeholder="อีเมล์ " id="email" name="email">
                    </div>
                </div>
                <div class="col-4 mt-2">
                    <div class="form-group mt-2">
                        <label for="" style="font-size: 18px;">เบอร์โทรศัพท์ </label>
                        <input type="text" class="form-control mt-2" placeholder="เบอร์โทรศัพท์ " id="telephone_number" name="telephone_number">
                    </div>
                </div>
                <div class="col-4 mt-2">
                    <div class="form-group mt-2">
                        <label for="" style="font-size: 18px;">วันที่เริ่มทำงาน </label>
                        <input type="date" class="form-control mt-2" placeholder="วันที่เริ่มทำงาน " id="start_date" name="start_date">
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
                        <label for="" style="font-size: 18px;">คณะ </label>
                        <input type="text" class="form-control mt-2" placeholder="คณะ " id="faculty_bachelor_s_degree" name="faculty_bachelor_s_degree">
                    </div>
                </div>
                <div class="col-4 mt-2">
                    <div class="form-group">
                        <label for="" style="font-size: 18px;">สาขาวิชา </label>
                        <input type="text" class="form-control mt-2" placeholder="สาขาวิชา " id="field_of_study_bachelor_s_degree" name="field_of_study_bachelor_s_degree">
                    </div>
                </div>
            </div>
            <h3 class="mt-3">ปริญญาโท</h3>
            <div class="row">
                <div class="col-4 mt-2">
                    <div class="form-group">
                        <label for="" style="font-size: 18px;">คณะ </label>
                        <input type="text" class="form-control mt-2" placeholder="คณะ " id="faculty_master_s_degree" name="faculty_master_s_degree">
                    </div>
                </div>
                <div class="col-4 mt-2">
                    <div class="form-group">
                        <label for="" style="font-size: 18px;">สาขาวิชา </label>
                        <input type="text" class="form-control mt-2" placeholder="สาขาวิชา " id="field_of_study_master_s_degree" name="field_of_study_master_s_degree">
                    </div>
                </div>
                <div class="col-4 mt-2">
                    <div class="form-group">
                        <label for="" style="font-size: 18px;">ใบประกอบวิชาชีพผู้บริหาร : </label>
                        <input type="text" class="form-control mt-2" placeholder="ใบประกอบวิชาชีพผู้บริหาร " id="executive_professional_certificate" name="executive_professional_certificate">
                    </div>
                </div>
            </div>
            <h3 class="mt-3">ต่ำกว่าปริญญาตรี</h3>
            <div class="row mt-3">
                <div class="col-4 mt-2">
                    <div class="form-group">
                        <label for="" style="font-size: 18px;">คณะ</label>
                        <input type="text" class="form-control mt-2" placeholder="คณะ " id="faculty_less_than_bachelor_s_degree" name="faculty_less_than_bachelor_s_degree">
                    </div>
                </div>
                <div class="col-4 mt-2">
                    <div class="form-group">
                        <label for="" style="font-size: 18px;">สาขาวิชา</label>
                        <input type="text" class="form-control mt-2" placeholder="สาขาวิชา " id="field_of_study_less_than_bachelor_s_degree" name="field_of_study_less_than_bachelor_s_degree">
                    </div>
                </div>
                <div class="col-4 mt-2">
                    <div class="form-group">
                        <label for="" style="font-size: 18px;">ใบประกอบวิชาชีพผู้บริหาร</label>
                        <input type="text" class="form-control mt-2" placeholder="ใบประกอบวิชาชีพผู้บริหาร " id="executive_professional_certificate_less_than_bachelor_s_degree" name="executive_professional_certificate_less_than_bachelor_s_degree">
                    </div>
                </div>
                <div class="col-4 mt-2">
                    <div class="form-group">
                        <label for="" style="font-size: 18px;">นักธรรม/ธรรมศึกษา</label>
                        <textarea name="std_address" required placeholder="นักธรรม/ธรรมศึกษา" id="dhamma_expert_dhamma_studies" class="form-control mt-2"></textarea>
                    </div>
                </div>
                <div class="col-4 mt-2">
                    <div class="form-group">
                        <label for="" style="font-size: 18px;">เปรียญธรรม/บาลีศึกษา</label>
                        <textarea name="std_address" required placeholder="เปรียญธรรม/บาลีศึกษา" id="precepts_pali_studies" class="form-control mt-2"></textarea>
                    </div>
                </div>
                <div class="col-4 mt-2">
                    <div class="form-group">
                        <label for="" style="font-size: 18px;">วุฒิการศึกษา</label>
                        <textarea name="std_address" required placeholder="วุฒิการศึกษา" id="educational_qualification" class="form-control mt-2"></textarea>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="text-center">
                    <label for="" class="mt-3" style="font-size: 18px;">รูปภาพ</label>
                    <div class="text-center mt-3">
                        <img id="uploaded_image_edit" src="#" alt="Selected Image" style="display:none; width: 75%; height: 75%;">
                        <label for="">รูปภาพ :</label>
                        <input type="file" id="picture" onchange="displayImageEdit(this)" class="form-control">
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-group mb-3">
                <div class=" text-center">
                    <button type="submit" class="btn " id="server_user" style="background-color:#BB6AFB ; color:#FFFFFF">บันทึกข้อมูล</button>
                    <button type="submit" class="btn" style="background-color:#FF0505 ; color:#FFFFFF">ยกเลิก</button>
                </div>
            </div>
            <!-- </form> -->
        </div>
    </div>
</div>
<script>
    if (localStorage.getItem("id_type") != "6" && localStorage.getItem("user_id") == null) {
        localStorage.clear()
        window.location.href = "../"
    }

    function displayImageEdit(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#uploaded_image_edit').attr('src', e.target.result).show();
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<?php include("../../footer.php") ?>