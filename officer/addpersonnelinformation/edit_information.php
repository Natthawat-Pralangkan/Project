<?php include("../../servers/connect.php"); ?>
<?php include("../../header.php"); ?>
<?php
// Ensure you have a database connection established here

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Fetch the record's data based on $id, including the picture name or path
        $query = $db->prepare("SELECT * FROM teacher_personnel_information WHERE id = :id");
        $query->execute(['id' => $id]);
        $data = $query->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            if (!empty($data['picture'])) {
                // The picture column contains the name or path of the image
                $pictureName = $data['picture'];
                // If the image is stored in a directory, specify it here, otherwise adjust as necessary
                $picturePath = "../../images/" . $pictureName;
            } else {
                // Handle case where no picture is associated with the record
                echo "No picture available for this record.";
            }
        } else {
            echo "No data found for ID: $id";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "ID not provided";
}
?>



<div style="  display: flex;flex-direction: row;">
    <?php include('./navbar/sidebar.php'); ?>
    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <?php include('./navbar/navuser.php'); ?>
        <!-- <script src="./js/addpersonnelinformation.js"></script> -->
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
            <!-- <form method="post" action="./api/update_script" enctype="multipart/form-data"> -->
                <div class=" row">
                    <input type="hidden" name="id" id="id" value="<?php echo $data['id']; ?>"> <!-- Include the ID for the update script -->
                    <div class="col-4">
                        <div class="form-group">
                            <label for="" style="font-size: 18px;">ชื่อ</label>
                            <input type="text" class="form-control mt-2" placeholder="ชื่อ" id="user_name"  name="user_name" value="<?php echo ($data['user_name']); ?>">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="" style="font-size: 18px;">นามสกุล</label>
                            <input type="text" class="form-control mt-2" placeholder="นามสกุล" id="last_name" name="last_name" value="<?php echo ($data['last_name']); ?>">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group ">
                            <label for="" style="font-size: 18px;">เลขบัตรประชาชน</label>
                            <input type="text" class="form-control mt-2" placeholder="เลขบัตรประชาชน" id="id_card_number" name="id_card_number" value="<?php echo ($data['id_card_number']); ?>">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group mt-2">
                            <label for="" style="font-size: 18px;">วัน-เดือน-ปี</label>
                            <input type="date" class="form-control mt-2" placeholder="เลขบัตรประชาชน" id="date_month_yearofbirth" name="date_month_yearofbirth" value="<?php echo ($data['date_month_yearofbirth']); ?>">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group mt-2">
                            <label for="" style="font-size: 18px;">อายุ</label>
                            <input type="text" class="form-control mt-2" placeholder="อายุ" id="age" name="age" value="<?php echo ($data['age']); ?>">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group mt-2">
                            <label for="" style="font-size: 18px;">สัญชาติ</label>
                            <input type="text" class="form-control mt-2" placeholder="สัญชาติ" id="nationality" name="nationality" value="<?php echo ($data['nationality']); ?>">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group mt-2">
                            <label for="position" style="font-size: 18px;">ตำแหน่ง</label>
                            <select id="position" name="position" class="form-control mt-2" required>
                                <option value="">เลือกตำแหน่ง</option>
                                <option value="1" <?php echo ($data['position'] == '1') ? 'selected' : ''; ?>>ผู้อำนวยการ</option>
                                <option value="2" <?php echo ($data['position'] == '2') ? 'selected' : ''; ?>>รองผู้อำนวยการ</option>
                                <option value="3" <?php echo ($data['position'] == '3') ? 'selected' : ''; ?>>เจ้าหน้าที่ฝ่ายวิชาการ</option>
                                <option value="4" <?php echo ($data['position'] == '4') ? 'selected' : ''; ?>>เจ้าหน้าที่ฝ่ายทั่วไป</option>
                                <option value="5" <?php echo ($data['position'] == '5') ? 'selected' : ''; ?>>เจ้าหน้าที่ฝ่ายงบประมาณ</option>
                                <option value="6" <?php echo ($data['position'] == '6') ? 'selected' : ''; ?>>เจ้าหน้าที่ฝ่ายบุคคล</option>
                                <option value="7" <?php echo ($data['position'] == '7') ? 'selected' : ''; ?>>ครู</option>
                            </select>
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
                            <input type="text" class="form-control mt-2" placeholder="รหัสประจำบ้าน" id="house_code" name="house_code" value="<?php echo ($data['house_code']); ?>">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group mt-2">
                            <label for="" style="font-size: 18px;">เลขที่ :</label>
                            <input type="text" class="form-control mt-2" placeholder="เลขที่" id="number_house" name="number_house" value="<?php echo ($data['number_house']); ?>">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group mt-2">
                            <label for="" style="font-size: 18px;">หมู่ที่</label>
                            <input type="text" class="form-control mt-2" placeholder="หมู่ที่" id="village" name="village" value="<?php echo ($data['village']); ?>">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group mt-2">
                            <label for="" style="font-size: 18px;">ตำบล</label>
                            <input type="text" class="form-control mt-2" placeholder="ตำบล" id="district" name="district" value="<?php echo ($data['district']); ?>">
                        </div>
                    </div>
                    <div class="col-2 mt-2">
                        <div class="form-group mt-2">
                            <label for="" style="font-size: 18px;">อำเภอ</label>
                            <input type="text" class="form-control mt-2" placeholder="อำเภอ" id="prefecture" name="prefecture" value="<?php echo ($data['prefecture']); ?>">
                        </div>
                    </div>
                    <div class="col-2 mt-2">
                        <div class="form-group mt-2">
                            <label for="" style="font-size: 18px;">จังหวัด </label>
                            <input type="text" class="form-control mt-2" placeholder="จังหวัด " id="province" name="province" value="<?php echo ($data['province']); ?>">
                        </div>
                    </div>
                    <div class="col-2 mt-2">
                        <div class="form-group mt-2">
                            <label for="" style="font-size: 18px;">ถนน </label>
                            <input type="text" class="form-control mt-2" placeholder="ถนน " id="road" name="road" value="<?php echo ($data['road']); ?>">
                        </div>
                    </div>
                    <div class="col-2 mt-2">
                        <div class="form-group mt-2">
                            <label for="" style="font-size: 18px;">รหัสไปรษณีย์ </label>
                            <input type="text" class="form-control mt-2" placeholder="รหัสไปรษณีย์ " id="zip_code" name="zip_code" value="<?php echo ($data['zip_code']); ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 mt-2">
                        <div class="form-group mt-2">
                            <label for="" style="font-size: 18px;">อีเมล์</label>
                            <input type="text" class="form-control mt-2" placeholder="อีเมล์ " id="email" name="email" value="<?php echo ($data['email']); ?>">
                        </div>
                    </div>
                    <div class="col-4 mt-2">
                        <div class="form-group mt-2">
                            <label for="" style="font-size: 18px;">เบอร์โทรศัพท์ </label>
                            <input type="text" class="form-control mt-2" placeholder="เบอร์โทรศัพท์ " id="telephone_number" name="telephone_number" value="<?php echo ($data['telephone_number']); ?>">
                        </div>
                    </div>
                    <div class="col-4 mt-2">
                        <div class="form-group mt-2">
                            <label for="" style="font-size: 18px;">วันที่เริ่มทำงาน </label>
                            <input type="date" class="form-control mt-2" placeholder="วันที่เริ่มทำงาน " id="start_date" name="start_date" value="<?php echo ($data['start_date']); ?>">
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
                            <input type="text" class="form-control mt-2" placeholder="คณะ " id="faculty_bachelor_s_degree" name="faculty_bachelor_s_degree" value="<?php echo ($data['faculty_bachelor_s_degree']); ?>">
                        </div>
                    </div>
                    <div class="col-4 mt-2">
                        <div class="form-group">
                            <label for="" style="font-size: 18px;">สาขาวิชา </label>
                            <input type="text" class="form-control mt-2" placeholder="สาขาวิชา " id="field_of_study_bachelor_s_degree" name="field_of_study_bachelor_s_degree" value="<?php echo ($data['field_of_study_bachelor_s_degree']); ?>">
                        </div>
                    </div>
                </div>
                <h3 class="mt-3">ปริญญาโท</h3>
                <div class="row">
                    <div class="col-4 mt-2">
                        <div class="form-group">
                            <label for="" style="font-size: 18px;">คณะ </label>
                            <input type="text" class="form-control mt-2" placeholder="คณะ " id="faculty_master_s_degree" name="faculty_master_s_degree" value="<?php echo ($data['faculty_master_s_degree']); ?>">
                        </div>
                    </div>
                    <div class="col-4 mt-2">
                        <div class="form-group">
                            <label for="" style="font-size: 18px;">สาขาวิชา </label>
                            <input type="text" class="form-control mt-2" placeholder="สาขาวิชา " id="field_of_study_master_s_degree" name="field_of_study_master_s_degree" value="<?php echo ($data['field_of_study_master_s_degree']); ?>">
                        </div>
                    </div>
                    <div class="col-4 mt-2">
                        <div class="form-group">
                            <label for="" style="font-size: 18px;">ใบประกอบวิชาชีพผู้บริหาร : </label>
                            <input type="text" class="form-control mt-2" placeholder="ใบประกอบวิชาชีพผู้บริหาร " id="executive_professional_certificate" name="executive_professional_certificate" value="<?php echo ($data['executive_professional_certificate']); ?>">
                        </div>
                    </div>
                </div>
                <h3 class="mt-3">ต่ำกว่าปริญญาตรี</h3>
                <div class="row mt-3">
                    <div class="col-4 mt-2">
                        <div class="form-group">
                            <label for="" style="font-size: 18px;">คณะ</label>
                            <input type="text" class="form-control mt-2" placeholder="คณะ " id="faculty_less_than_bachelor_s_degree" name="faculty_less_than_bachelor_s_degree" value="<?php echo ($data['faculty_less_than_bachelor_s_degree']); ?>">
                        </div>
                    </div>
                    <div class="col-4 mt-2">
                        <div class="form-group">
                            <label for="" style="font-size: 18px;">สาขาวิชา</label>
                            <input type="text" class="form-control mt-2" placeholder="สาขาวิชา " id="field_of_study_less_than_bachelor_s_degree" name="field_of_study_less_than_bachelor_s_degree" value="<?php echo ($data['field_of_study_less_than_bachelor_s_degree']); ?>">
                        </div>
                    </div>
                    <div class="col-4 mt-2">
                        <div class="form-group">
                            <label for="" style="font-size: 18px;">ใบประกอบวิชาชีพผู้บริหาร</label>
                            <input type="text" class="form-control mt-2" placeholder="ใบประกอบวิชาชีพผู้บริหาร " id="executive_professional_certificate_less_than_bachelor_s_degree" name="executive_professional_certificate_less_than_bachelor_s_degree" value="<?php echo ($data['executive_professional_certificate_less_than_bachelor_s_degree']); ?>">
                        </div>
                    </div>
                    <div class="col-4 mt-2">
                        <div class="form-group">
                            <label for="dhamma_expert_dhamma_studies" style="font-size: 18px;">นักธรรม/ธรรมศึกษา</label>
                            <textarea name="dhamma_expert_dhamma_studies" class="form-control mt-2" id="dhamma_expert_dhamma_studies" required placeholder="นักธรรม/ธรรมศึกษา"><?php echo ($data['dhamma_expert_dhamma_studies']); ?></textarea>
                        </div>
                    </div>

                    <div class="col-4 mt-2">
                        <div class="form-group">
                            <label for="precepts_pali_studies" style="font-size: 18px;">เปรียญธรรม/บาลีศึกษา</label>
                            <textarea name="precepts_pali_studies" class="form-control mt-2" required placeholder="เปรียญธรรม/บาลีศึกษา" id="precepts_pali_studies" > <?php echo ($data['precepts_pali_studies']); ?></textarea>
                        </div>
                    </div>

                    <div class="col-4 mt-2">
                        <div class="form-group">
                            <label for="educational_qualification" style="font-size: 18px;">วุฒิการศึกษา</label>
                            <textarea name="educational_qualification" class="form-control mt-2" required placeholder="วุฒิการศึกษา" id="educational_qualification"><?php echo ($data['educational_qualification']); ?></textarea>
                        </div>
                    </div>

                </div>
                <div class="row mb-3">
                    <div class="text-center">
                        <label for="" class="mt-3" style="font-size: 18px;">รูปภาพ</label>
                        <div class="text-center mt-3">
                            <img id="uploaded_image_edit" src="<?php echo ($picturePath); ?>" alt="Selected Image" style="width: 250px; height: 250px;">
                            <!-- <label for="">รูปภาพ :</label> -->
                            <input type="file" id="picture" name="picture" onchange="displayImageEdit(this)" class="form-control">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group mb-3">
                    <div class=" text-center">
                        <button type="submit" class="btn " id="edit_user" style="background-color:#BB6AFB ; color:#FFFFFF">บันทึกข้อมูล</button>
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
                // Update the src attribute of the uploaded_image_edit element to display the selected image
                document.getElementById('uploaded_image_edit').src = e.target.result;
            };

            // Read the selected file as a data URL
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#edit_user").click(function() {

        // รับข้อมูลจากฟอร์ม Modal
        var id = $("#id").val();
        var user_name = $("#user_name").val();
        var last_name = $("#last_name").val();
        var id_card_number = $("#id_card_number").val();
        var date_month_yearofbirth = $("#date_month_yearofbirth").val();
        var age = $("#age").val();
        var nationality = $("#nationality").val();
        var house_code = $("#house_code").val();
        var number_house = $("#number_house").val();
        var village = $("#village").val();
        var district = $("#district").val();
        var prefecture = $("#prefecture").val();
        var province = $("#province").val();
        var road = $("#road").val();
        var zip_code = $("#zip_code").val();
        var email = $("#email").val();
        var telephone_number = $("#telephone_number").val();
        var start_date = $("#start_date").val();
        var faculty_bachelor_s_degree = $("#faculty_bachelor_s_degree").val();
        var field_of_study_bachelor_s_degree = $(
            "#field_of_study_bachelor_s_degree"
        ).val();
        var faculty_master_s_degree = $("#faculty_master_s_degree").val();
        var field_of_study_master_s_degree = $(
            "#field_of_study_master_s_degree"
        ).val();
        var executive_professional_certificate = $(
            "#executive_professional_certificate"
        ).val();
        var faculty_less_than_bachelor_s_degree = $(
            "#faculty_less_than_bachelor_s_degree"
        ).val();
        var field_of_study_less_than_bachelor_s_degree = $(
            "#field_of_study_less_than_bachelor_s_degree"
        ).val();
        var executive_professional_certificate_less_than_bachelor_s_degree = $(
            "#executive_professional_certificate_less_than_bachelor_s_degree"
        ).val();
        var dhamma_expert_dhamma_studies = $("#dhamma_expert_dhamma_studies").val();
        var precepts_pali_studies = $("#precepts_pali_studies").val();
        var educational_qualification = $("#educational_qualification").val();
        var picture = $("#picture").val();
        var position = $("#position").val();

        var formData = new FormData();
        formData.append('id', id );
        formData.append('user_name', user_name);
        formData.append('last_name', last_name);
        formData.append('id_card_number', id_card_number);
        formData.append('date_month_yearofbirth', date_month_yearofbirth);
        formData.append('age', age);
        formData.append('nationality', nationality);
        formData.append('house_code', house_code);
        formData.append('number_house', number_house);
        formData.append('village', village);
        formData.append('district', district);
        formData.append('prefecture', prefecture);
        formData.append('province', province);
        formData.append('road', road);
        formData.append('zip_code', zip_code);
        formData.append('email', email);
        formData.append('telephone_number', telephone_number);
        formData.append('start_date', start_date);
        formData.append('faculty_bachelor_s_degree', faculty_bachelor_s_degree);
        formData.append('field_of_study_bachelor_s_degree', field_of_study_bachelor_s_degree);
        formData.append('faculty_master_s_degree', faculty_master_s_degree);
        formData.append('field_of_study_master_s_degree', field_of_study_master_s_degree);
        formData.append('executive_professional_certificate', executive_professional_certificate);
        formData.append('faculty_less_than_bachelor_s_degree', faculty_less_than_bachelor_s_degree);
        formData.append('field_of_study_less_than_bachelor_s_degree', field_of_study_less_than_bachelor_s_degree);
        formData.append('executive_professional_certificate_less_than_bachelor_s_degree', executive_professional_certificate_less_than_bachelor_s_degree);
        formData.append('dhamma_expert_dhamma_studies', dhamma_expert_dhamma_studies);
        formData.append('precepts_pali_studies', precepts_pali_studies);
        formData.append('educational_qualification', educational_qualification);
        formData.append('picture', picture);
        formData.append('position', position);
        // var id_user = $("#id_user").val();
        $.ajax({
            url: "./api/update_script", // เปลี่ยนเป็น URL ที่ถูกต้องสำหรับไฟล์ PHP ที่จะใช้ในการเพิ่มข้อมูลสินค้า
            method: "POST",
            processData: false,
            contentType: false,
            data: formData,

            success: function(response) {
                console.log(response);
                var data = JSON.parse(response);
                if (data.status === 200) {
                    alert("บันทึกข้อมูลสำเร็จ");
                    window.location.href = "addpersonnelinformation";
                } else {
                    alert("เกิดข้อผิดพลาดในการบันทึกข้อมูล");
                    window.location.href = "Add_information";
                }
            },
            error: function() {
                alert("เกิดข้อผิดพลาดในการส่งข้อมูล");
            },
        });
    });
</script>

<?php include("../../footer.php") ?>