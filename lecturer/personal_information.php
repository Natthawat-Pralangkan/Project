<?php include("../servers/connect.php"); ?>
<?php include(".././header.php"); ?>
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
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-6 text-center">
                    <img id="picture" src="" alt="" style="width: 250px; height: 250px;">
                </div>
            </div>
            <div class="row mt-5 ">
                <div class="col-6">
                    <div class="" style="font-size: 20px;">
                        <i class="fa-solid fa-user spani"></i><span class="menu-text">ข้อมูลประวัติส่วนตัว</span>
                    </div>
                    <div class=" mt-5 mx-5" style="font-size: 16px;">
                        <p id="user_name">ชื่อ-นามสกุล :</p>
                        <p id="id_card_number">เลขที่บัตรประชาชน :</p>
                        <p id="date_month_yearofbirth">วัน เดือนปี เกิด :</p>
                        <p id="nationality">สัญชาติ :</p>
                        <p id="age">อายุ :</p>
                        <p id="email">อีเมล์ :</p>
                        <p id="telephone_number">เบอร์โทรศัพท์ :</p>
                        <p id="start_date">วันที่เริ่มทำงาน :</p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="" style="font-size: 20px;">
                        <i class="fa-solid fa-house-chimney-user spani"></i><span class="menu-text">ข้อมูลตามทะเบียนบ้าน</span>
                    </div>
                    <div class=" mt-3 mx-5" style="font-size: 16px;">
                        <p id="house_code">รหัสประจำบ้าน :</p>
                        <p id="number_house">เลขที่ :</p>
                        <p id="village">หมู่ที่ :</p>
                        <p id="district">ตำบล :</p>
                        <p id="prefecture">อำเภอ :</p>
                        <p id="province">จังหวัด :</p>
                        <p id="road">ถนน :</p>
                        <p id="zip_code">รหัสไปรษณีย์ :</p>
                    </div>
                </div>
            </div>

            <div class="" style="font-size: 20px;">
                <i class="fa-solid fa-book spani"></i></i><span class="menu-text">ข้อมูลการศึกษา</span>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class=" mt-2 mx-5" style="font-size: 20px;">
                        <span>ปริญญาตรี</span>
                    </div>
                    <div class=" mt-2" style="font-size: 16px;  margin-left: 100px;">
                        <p id="faculty_bachelor_s_degree">คณะ :</p>
                        <p id="field_of_study_bachelor_s_degree">สาขาวิชา :</p>
                    </div>
                </div>
                <div class="col-6">
                    <div class=" mt-2 mx-5" style="font-size: 20px;">
                        <span>ปริญญาโท</span>
                    </div>
                    <div class=" mt-2" style="font-size: 16px;  margin-left: 100px;">
                        <p id="faculty_master_s_degree">คณะ :</p>
                        <p id="field_of_study_master_s_degree">สาขาวิชา :</p>
                        <p id="executive_professional_certificate">ใบประกอบวิชาชีพผู้บริหาร :</p>
                    </div>
                </div>
                <div class="col-6">
                    <div class=" mt-2 mx-5" style="font-size: 20px;">
                        <span>ต่ำกว่าปริญญาตรี</span>
                    </div>
                    <div class=" mt-2" style="font-size: 16px;  margin-left: 100px;">
                        <p id="faculty_less_than_bachelor_s_degree">คณะ :</p>
                        <p id="field_of_study_less_than_bachelor_s_degree">สาขาวิชา :</p>
                        <p id="executive_professional_certificate_less_than_bachelor_s_degree">ใบประกอบวิชาชีพผู้บริหาร :</p>
                        <p id="dhamma_expert_dhamma_studies">นักธรรม/ธรรมศึกษา :</p>
                        <p id="precepts_pali_studies">เปรียญธรรม/บาลีศึกษา :</p>
                        <p id="educational_qualification">วุฒิการศึกษา :</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    if (localStorage.getItem("id_type") != "1" && localStorage.getItem("id_user") == null) {
        localStorage.clear()
        window.location.href = "../"
    }
    // สร้างฟังก์ชันสำหรับแสดงข้อมูลผู้ใช้ใน HTML
    $(document).ready(function() {
        $.ajax({
            url: 'get_personal_information',
            method: 'POST',
            dataType: 'json',
            data: {
                id_user: localStorage.getItem("id_user")
            },
            success: function(data) {
                $("#picture").attr('src', data[0].picture);
                $("#user_name").html("ชื่อ-นามสกุล :" + " " + data[0].user_name);
                $("#id_card_number").html("เลขที่บัตรประชาชน:" + " " + data[0].id_card_number);
                $("#date_month_yearofbirth").html("วัน เดือนปี เกิด :" + " " + data[0].date);
                $("#nationality").html("สัญชาติ :" + " " + data[0].nationality);
                $("#age").html("อายุ :" + " " + data[0].age);
                $("#email").html("อีเมล์ :" + " " + data[0].email);
                $("#telephone_number").html("เบอร์โทรศัพท์ :" + " " + data[0].telephone_number);
                $("#start_date").html("วันที่เริ่มทำงาน :" + " " + data[0].start_date);
                $("#house_code").html("รหัสประจำบ้าน :" + " " + data[0].house_code);
                $("#number_house").html("เลขที่ :" + " " + data[0].number_house);
                $("#village").html("หมู่ที่ :" + " " + data[0].village);
                $("#district").html("ตำบล :" + " " + data[0].district);
                $("#prefecture").html("อำเภอ :" + " " + data[0].prefecture);
                $("#province").html("จังหวัด :" + " " + data[0].province);
                $("#road").html("ถนน :" + " " + data[0].road);
                $("#zip_code").html("รหัสไปรษณีย์ :" + " " + data[0].zip_code);
                $("#faculty_bachelor_s_degree").html("คณะ :" + " " + data[0].faculty_bachelor_s_degree);
                $("#field_of_study_bachelor_s_degree").html("สาขาวิชา :" + " " + data[0].field_of_study_bachelor_s_degree);
                $("#faculty_master_s_degree").html("คณะ :" + " " + data[0].faculty_master_s_degree);
                $("#field_of_study_master_s_degree").html("สาขาวิชา :" + " " + data[0].field_of_study_master_s_degree);
                $("#executive_professional_certificate").html("ใบประกอบวิชาชีพผู้บริหาร :" + " " + data[0].executive_professional_certificate);
                $("#faculty_less_than_bachelor_s_degree").html("คณะ :" + " " + data[0].faculty_less_than_bachelor_s_degree);
                $("#field_of_study_less_than_bachelor_s_degree").html("สาขาวิชา :" + " " + data[0].field_of_study_less_than_bachelor_s_degree);
                $("#executive_professional_certificate_less_than_bachelor_s_degree").html("ใบประกอบวิชาชีพผู้บริหาร :" + " " + data[0].executive_professional_certificate_less_than_bachelor_s_degree);
                $("#dhamma_expert_dhamma_studies").html("นักธรรม :" + " " + data[0].dhamma_expert_dhamma_studies);
                $("#precepts_pali_studies").html("เปรียญธรรม/บาลีศึกษา :" + " " + data[0].precepts_pali_studies);
                $("#educational_qualification").html("วุฒิการศึกษา :" + " " + data[0].educational_qualification);

            },
            error: function(xhr, status, error) {
                // จัดการกับข้อผิดพลาด
                console.error('There was a problem with the ajax operation:', error);
            }
        });
    });
</script>
<?php include("../footer.php") ?>