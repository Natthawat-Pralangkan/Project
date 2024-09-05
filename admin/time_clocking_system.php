<?php include("../servers/connect.php"); ?>
<?php include("../header.php"); ?>
<div class="wrapper">
    <?php include('./navbar/sidebar.php'); ?>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <?php include('./navbar/navuser.php'); ?>
        <script src="./js/time_clocking_system.js"></script>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <h2 class="m-0">จัดการข้อมูลผู้ใช้ระบบ</h2>
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="./home.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">จัดการข้อมูลผู้ใช้ระบบ</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="mt-5 mx-3">
            <div class="d-flex justify-content-end">
                <div class="mt-5">
                    <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #BB6AFB; color:#FFFFFF">
                        เพิ่มข้อมูลลงเวลา เข้า - ออกงาน
                    </button>
                </div>
            </div>
            <div class="mt-3">
                <table id="mytable" class="table">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ไอดีผู้ใช้</th>
                            <th>ชื่อ - นามสกุล</th>
                            <th>ตำแหน่ง</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">เพิ่มข้อมูลลงเวลา เข้า - ออกงาน</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="timeEntryForm" enctype="multipart/form-data">
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-6 mt-3">
                                    <label for="employeeDropdown" class="form-label">บุคลากร</label>
                                    <select class="form-select" id="employeeDropdown" name="employee">
                                        <option selected>เลือกบุคลากร...</option>
                                    </select>
                                </div>
                                <div class="col-4 mt-3">
                                    <label for="userId" class="form-label">ไอดีผู้ใช้</label>
                                    <input type="text" class="form-control" id="user_id" name="user_id" readonly>
                                </div>
                                <div class="col-4 mt-3">
                                    <label for="userName" class="form-label">ชื่อ</label>
                                    <input type="text" class="form-control" id="user_name" name="user_name" readonly>
                                </div>
                                <div class="col-4 mt-3">
                                    <label for="lastName" class="form-label">นามสกุล</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" readonly>
                                </div>
                                <div class="col-4 mt-3">
                                    <label for="nameType" class="form-label">ตำแหน่ง</label>
                                    <input type="text" class="form-control" id="name_type" name="name_type" readonly>
                                </div>
                                <input type="hidden" id="position" name="position">
                                <div class="col-12 text-center mt-3">
                                    <label for="picture" class="form-label" style="font-size: 18px;">รูปภาพ</label>
                                    <div>
                                        <img id="uploaded_image_edit" src="#" alt="Selected Image" style="display:none; width: 20%; height: 20%;">
                                        <input type="file" id="picture" name="picture" class="form-control" onchange="displayImageEdit(this)">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveChanges">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    if (localStorage.getItem("id_type") != "0" && localStorage.getItem("id_user") == null) {
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
<?php include("../footer.php") ?>