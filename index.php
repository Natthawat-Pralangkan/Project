<?php include("./header.php") ?>
<?php include("./components/navbar.php") ?>

<div class="container">
    <div class="mt-3"></div>

    <div class="row justify-content-center">
        <!-- <div class="col-12 col-md-6 col-lg-6"> -->


        <div class="row justify-content-center p-4">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="shadow-lg p-3 mb-5  rounded" style="background-color: #C274FF;">
                    <div class="text-center">
                        <img src="./img/logo.png" alt="" srcset="">
                    </div>

                    <div class="row justify-content-center" >
                        <div class="col-12 col-md-6 col-lg-6">
                            <label for="">Username :</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                <input type="email" class="form-control" name="email" id="emailcheck" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <label for="">Passeord :</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon2"><i class="fas fa-key"></i></span>
                                <input type="password" class="form-control" id="paswordcheck" name="password" placeholder="Passeord" aria-label="Password" aria-describedby="basic-addon2">
                            </div>
                            <h6 style="text-align:right;width:100%;">ลืมรหัสผ่าน?</h6>
                            <a href="./admin/home.php" id="login" class="form-control">เข้าสู่ระบบ</a>
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

<!-- <script></script>
    $(document).ready(function() {
        const Url = './servers/function';
        const Method = 'POST';
        $("#login").click(function() {
            $.ajax({
                url: Url,
                type: Method,
                data: {
                    function: "login",
                    email: $("#emailcheck").val(),
                    password: $("#paswordcheck").val()
                },
                success: function(res) {
                    // console.log(res);
                    var data = JSON.parse(res)
                    console.log(data);
                    if (data.statusCode == 200) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Login Success'
                        }).then(function() {
                            localStorage.setItem("user_id", data.user_id)
                            localStorage.setItem("user_name", data.user_name)
                            window.location.href = "./pages/student_classroom/"
                        });

                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Login error'
                        }).then(function() {
                            window.location.reload()
                        });
                    }
                }
            })
        })

    })
</script> -->


<?php include("./footer.php") ?>
<!-- <form action="./action.php" method="POST" enctype="multipart/form-data">
        <label for="excel_file">Choose an Excel file:</label>
        <input type="file" name="excel_file" id="excel_file">
        <input type="submit" value="Upload">
    </form> -->