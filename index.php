<?php
include("./header.php");
include("./components/navbar.php");
include("./servers/connect.php");
?>

<div class="container">
    <div class="mt-3"></div>

    <div class="row justify-content-center">
        <div class="row justify-content-center p-4">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="shadow-lg p-3 mb-5  rounded" style="background-color: #C274FF;">
                    <div class="text-center">
                        <img src="./img/logo.png" alt="" srcset="">
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-6 col-lg-6">
                            <label for="">Username :</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <label for="">Passeord :</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon2"><i class="fas fa-key"></i></span>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Passeord" aria-label="Password" aria-describedby="basic-addon2">
                            </div>
                            <h6 style="text-align:right;width:100%;">ลืมรหัสผ่าน?</h6>
                            <button id="loginButton" class="butn form-control">เข้าสู่ระบบ</button>
                            <!-- <input type="submit" value="เข้าสู่ระบบ" id="login" class="form-control">  -->
                            <div class="text-center">
                                <br>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // เมื่อเอกสารโหลดเสร็จสมบูรณ์
    // เมื่อคลิกปุ่ม "เข้าสู่ระบบ"
    $(document).ready(function() {
        // เมื่อคลิกปุ่ม "เข้าสู่ระบบ"
        $("#loginButton").click(function() {
            // ส่งคำขอ GET ไปยังไฟล์ PHP เพื่อดึงข้อมูลอีเมลและรหัสผ่านจากฐานข้อมูล
            $.ajax({
                url: "./servers/function", // URL ของไฟล์ PHP ที่มีฟังก์ชัน login
                type: "POST",
                data: {
                    user_name: $("#user_name").val(),
                    password: $("#password").val()
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    console.log(data)
                    if (data.statusCode == 200) {
                        // ล็อกอินสำเร็จ
                        alert("เข้าสู่ระบบสำเร็จ!");
                        // console.log(data.id_user);
                        switch (data.id_type) {
                            case 0:
                                localStorage.setItem("id_type", data.id_type)
                                localStorage.setItem("user_id", data.user_id)
                                window.location.href = "./admin/home.php";
                                break;
                            case 7:
                                localStorage.setItem("id_type", data.id_type)
                                localStorage.setItem("user_id", data.user_id)
                                window.location.href = "./lecturer/home";
                                break;

                            case 1:
                                localStorage.setItem("id_type", data.id_type)
                                localStorage.setItem("user_id", data.user_id)
                                window.location.href = "./Director_DeputyDirector/DeputyDirector/home";
                                break;
                            case 2:
                                localStorage.setItem("id_type", data.id_type)
                                localStorage.setItem("user_id", data.user_id)
                                window.location.href = "./Director_DeputyDirector/director/home";
                                break;
                            case 3:
                                localStorage.setItem("id_type", data.id_type)
                                localStorage.setItem("user_id", data.user_id)
                                window.location.href = "./officer/academicmaster/home";
                                break;
                            case 6:
                                localStorage.setItem("id_type", data.id_type)
                                localStorage.setItem("user_id", data.user_id)
                                window.location.href = "./officer/addpersonnelinformation/home";
                                break;
                            case 5:
                                localStorage.setItem("id_type", data.id_type)
                                localStorage.setItem("user_id", data.user_id)
                                window.location.href = "./officer/BudgetOfficer/home";
                                break;
                            case 4:
                                localStorage.setItem("id_type", data.id_type)
                                localStorage.setItem("user_id", data.user_id)
                                window.location.href = "./officer/generaldepartment/home";
                                break;
                            default:
                                alert("ไม่พบผู้ใช้")
                        }
                        // ส่งผู้ใช้ไปยังหน้าหลังจากล็อกอินสำเร็จ
                    } else {
                        // ล็อกอินไม่สำเร็จ
                        alert("เข้าสู่ระบบไม่สำเร็จ!");
                    }
                },
                error: function(xhr, status, error) {
                    // ข้อผิดพลาดในการเชื่อมต่อหรือการทำงานของเซิร์ฟเวอร์
                    console.error("Error: " + error);
                }
            });

        });
    });
</script>

<?php include("./footer.php") ?>