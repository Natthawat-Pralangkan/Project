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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        เพิ่มคำสั่งภายใน - ภายนอก
                    </button>
                </div>
            </div>
            <div class="mt-3">
                <table id="uploadcommand" class="table">
                    <thead>
                        <tr>
                            <th>วัน/เดือน/ปี</th>
                            <th>ชื่อคำสั่ง</th>
                            <th>ประเภทคำสั่ง</th>
                            <th>ไฟล์</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">เพิ่มคำร้อง</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mt-3 mx-3">
                            <div class="col-12 ">
                                <div class="form-group ">
                                    <label for="" style="font-size: 18px;">ชื่อคำสั่ง</label>
                                    <input type="text" class="form-control mt-2  text-right" placeholder="ชื่อคำสั่ง" id="name_order" name="name_order">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="" style="font-size: 18px;">ประเภทคำสั่ง</label>
                                    <select class="form-select mt-2" id="order_type" name="order_type">
                                        <option value="1">คำสั่งภายใน</option>
                                        <option value="2">คำสั่งภายนอก</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mt-3">
                            <div class=" mt-3">
                                <img id="uploaded_image_edit" src="#" alt="Selected Image" style="display:none; width: 75%; height: 75%;">
                                <label for="">ไฟล์คำสั่ง :</label>
                                <input type="file" id="file" onchange="displayImageEdit(this)" class="form-control">
                            </div>
                        </div>
                        <div class="form-group mb-3 mt-3">
                            <div class=" text-center">
                                <button type="submit" class="btn " id="server_file" style="background-color:#BB6AFB ; color:#FFFFFF">บันทึกข้อมูล</button>
                                <button type="submit" class="btn" style="background-color:#FF0505 ; color:#FFFFFF">ยกเลิก</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        if (localStorage.getItem("id_type") != "4" && localStorage.getItem("id_user") == null) {
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