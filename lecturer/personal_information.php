<?php include("../servers/connect.php"); ?>
<?php include(".././header.php"); ?>
<div class="wrapper">
    <style>
        .image-container {
            position: relative;
            display: inline-block;
        }

        .edit-icon-container {
            position: absolute;
            bottom: -20px;
            left: 50%;
            transform: translateX(-50%);
            cursor: pointer;
        }

        #file-input {
            display: none;
        }
    </style>
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
                    <div class="image-container">
                        <img id="picture" src="" alt="" style="width: 250px; height: 250px;">
                        <div class="edit-icon-container">
                            <i class="fas fa-edit edit-icon mt-3" id="edit-picture" style='color: red;'></i>
                        </div>
                    </div>
                    <input type="file" id="file-input" accept="image/*" style="display: none;">
                    <div id="name_type" style="font-size: 18px;" class="mt-3">
                        <span class="menu-text">ตำแหน่ง :</span>
                    </div>
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
                        <!-- <p id="age">อายุ :</p>
                        <p id="email">อีเมล์ :</p> -->
                        <p id="age"><i class="fas fa-edit"></i> อายุ :</p>
                        <p id="email"><i class="fas fa-edit"></i> อีเมล์ :</p>

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
            <!-- Modal -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">แก้ไขข้อมูล</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="editForm">
                                <div class="form-group">
                                    <label for="emailInput">อีเมล์</label>
                                    <input type="email" class="form-control" id="emailInput" placeholder="Enter email">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                    <button type="submit" class="btn btn-primary">บันทึก</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="editModal_telephone_number" tabindex="-1" aria-labelledby="editModalLabel_telephone_number" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel_telephone_number">แก้ไขข้อมูล</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="editForm_telephone_number">
                                <div class="form-group">
                                    <label for="telephoneNumberInput">เบอร์โทรศัพท์</label>
                                    <input type="tel" class="form-control" id="telephoneNumberInput" placeholder="Enter telephone number">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                    <button type="submit" class="btn btn-primary">บันทึก</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal for editing picture -->
            <div class="modal fade" id="editPictureModal" tabindex="-1" aria-labelledby="editPictureModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editPictureModalLabel">แก้ไขรูปภาพ</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <img id="uploaded_image_edit" src="<?php echo ($picturePath); ?>" alt="Selected Image" style="width: 250px; height: 250px;">
                            </div>
                            <div class="mt-3">
                                <input type="file" id="picture_1" name="picture_1" onchange="displayImageEdit(this)" class="form-control">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                            <button type="button" id="edit_picture_1" class="btn btn-primary">อัปโหลด</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<script>
    if (localStorage.getItem("id_type") != "7" && localStorage.getItem("user_id") == null) {
        localStorage.clear()
        window.location.href = "../"
    }

    function displayImageEdit(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#uploaded_image_edit').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    // Edit email
    $(document).on('click', '#email .edit-icon', function() {
        var email = $('#email').text().trim().replace('อีเมล์ : ', '');
        $('#emailInput').val(email);
        $('#editModal').modal('show');
    });

    $('#editForm').submit(function(event) {
        event.preventDefault();
        var email = $('#emailInput').val().trim();
        $.ajax({
            url: 'update_endpoint_email',
            type: 'post',
            data: {
                user_id: localStorage.getItem("user_id"),
                email: email
            },
            success: function(response) {
                console.log(response);
                var data = JSON.parse(response);
                if (data.status === 200) {
                    alert("บันทึกข้อมูลสำเร็จ");
                    window.location.href = "personal_information";
                } else {
                    alert("เกิดข้อผิดพลาดในการบันทึกข้อมูล");
                    window.location.href = "personal_information";
                }
            },
            error: function() {
                alert("เกิดข้อผิดพลาดในการส่งข้อมูล");
            },
        });
    });

    fetchUserData();
    // Fetch personal information function
    function fetchUserData() {
        $.ajax({
            url: 'get_personal_information',
            method: 'POST',
            dataType: 'json',
            data: {
                user_id: localStorage.getItem("user_id")
            },
            success: function(data) {
                $("#picture").attr('src', data[0].picture);
                $("#name_type").html("ตำแหน่ง <span style='font-size: 20px;'>" + data[0].name_type + "</span>");
                $("#user_name").html("ชื่อ-นามสกุล :" + " " + data[0].user_name);
                $("#id_card_number").html("เลขที่บัตรประชาชน:" + " " + data[0].id_card_number);
                $("#date_month_yearofbirth").html("วัน เดือนปี เกิด :" + " " + data[0].date_month_yearofbirth);
                $("#nationality").html("สัญชาติ :" + " " + data[0].nationality);
                $("#age").html("อายุ :" + " " + data[0].age + " ปี");
                $("#email").html("อีเมล์ :" + " " + data[0].email + " <i class='fas fa-edit edit-icon' style='color: red;' data-email='" + data[0].email + "'></i>");
                $("#telephone_number").html("เบอร์โทรศัพท์ :" + " " + data[0].telephone_number + " <i class='fas fa-edit edit-icon1' style='color: red;' data-telephone_number='" + data[0].telephone_number + "'></i>");
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
                console.error('There was a problem with the ajax operation:', error);
            }
        });
    }
    $(document).on('click', '.edit-icon1', function() {
        var telephoneNumberToEdit = $(this).data('telephone_number'); // ดึงเบอร์โทรศัพท์จาก data-telephone_number
        $('#telephoneNumberInput').val(telephoneNumberToEdit);
        $('#editModal_telephone_number').modal('show'); // แสดง modal สำหรับการแก้ไข
    });
    $('#editForm_telephone_number').on('submit', function(e) {
        e.preventDefault(); // ป้องกันการส่งฟอร์มแบบปกติ
        var formData = {
            user_id: localStorage.getItem("user_id"),
            telephone_number: $('#telephoneNumberInput').val(), // ส่งเบอร์โทรศัพท์
        };
        $.ajax({
            url: 'update_endpoint_telephone_number', // แทนที่ด้วย URL จริงของคุณ
            type: 'POST',
            data: formData,
            success: function(response) {
                console.log(response);
                var data1 = JSON.parse(response);
                if (data1.status === 200) {
                    alert("บันทึกข้อมูลสำเร็จ");
                    window.location.href = "personal_information";
                } else {
                    alert("เกิดข้อผิดพลาดในการบันทึกข้อมูล");
                    window.location.href = "personal_information";
                }
            },
            error: function() {
                alert("เกิดข้อผิดพลาดในการส่งข้อมูล");
            },
        });
    });

    $('#edit-picture').click(function() {
        $('#editPictureModal').modal('show');
    });

    $("#edit_picture_1").click(function() {
        var picture = $("#picture_1").prop('files')[0]; // Get the file object
        var formData = new FormData();
        formData.append('user_id', localStorage.getItem("user_id"));
        formData.append('picture_1', picture); // Append the file object

        console.log("User ID:", localStorage.getItem("user_id"));
        console.log(picture);

        $.ajax({
            url: "upload_picture",
            method: "POST",
            processData: false,
            contentType: false,
            data: formData,
            success: function(response) {
                console.log(response);
                var data = JSON.parse(response);
                if (data.status === 200) {
                    alert("บันทึกข้อมูลสำเร็จ");
                    window.location.href = "personal_information";
                } else {
                    alert("เกิดข้อผิดพลาดในการบันทึกข้อมูล");
                    window.location.href = "personal_information";
                }
            },
            error: function() {
                alert("เกิดข้อผิดพลาดในการส่งข้อมูล");
            }
        });
    });
</script>
<?php include("../footer.php") ?>