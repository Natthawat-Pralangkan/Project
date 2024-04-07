<?php include("../header.php"); ?>
<div class="wrapper">
    <?php include('./navbar/sidebar.php'); ?>
    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <?php include('./navbar/navuser.php'); ?>
        <script src="./js/deputy_director_home.js"></script>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <h2 class="m-0">หน้าหลัก</h2>
                </div>
            </div>
            <a href=""></a>
        </div>
        <div class="content">
            <div class="row p-5 m-1">
                <div class="col-12 col-md-4">
                    <div class="shadow p-3 mb-5 bg-body rounded custom-card-ho">
                        <div class="d-flex justify-content-between align-items-center">
                            <i class="fa-solid fa-newspaper" style="font-size: 40px;color: #27a645"></i>
                            <p style="color : #555555">คำร้องรอการอนุมัติ</p>
                        </div>
                        <div class="my-3">
                            <h1 id="idStatus_3" class="text-center"></h1>
                        </div>
                        <div class="border-top text-center py-3">
                            <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal1" style="background-color: #BB6AFB; color :#FFFFFF">
                                เพิ่มเติม
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="shadow p-3 mb-5 bg-body rounded custom-card-ho">
                        <div class="d-flex justify-content-between align-items-center">
                            <i class="fa-solid fa-newspaper" style="font-size: 40px;color: #27a645"></i>
                            <p style="color : #555555">คำร้องอนุมัติแล้ว</p>
                        </div>
                        <div class="my-3">
                            <h1 id="idStatus_4" class="text-center">40</h1>
                        </div>
                        <div class="border-top text-center py-3">
                            <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal2" style="background-color: #BB6AFB; color :#FFFFFF">
                                เพิ่มเติม
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="shadow p-3 mb-5 bg-body rounded custom-card-ho">
                        <div class="d-flex justify-content-between align-items-center">
                            <i class="fa-solid fa-newspaper" style="font-size: 40px;color: #27a645"></i>
                            <p style="color : #555555">คำร้องทั้งหมด</p>
                        </div>
                        <div class="my-3">
                            <h1 id="idStatusArray" class="text-center"></h1>
                        </div>
                        <div class="border-top text-center py-3">
                            <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal4" style="background-color: #BB6AFB; color :#FFFFFF">
                                เพิ่มเติม
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="shadow p-3 mb-5 bg-body rounded custom-card-ho">
                        <div class="d-flex justify-content-between align-items-center">
                            <i class="fa-regular fa-id-card" style="font-size: 40px;color: #16a1b8"></i>
                            <p style="color : #555555">บุคลกรทั้งหมด</p>
                        </div>
                        <div class="my-3">
                            <h1 id="userCount" class="text-center"></h1>
                        </div>
                        <div class="border-top text-center py-3">
                            <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal5" style="background-color: #BB6AFB; color :#FFFFFF">
                                เพิ่มเติม
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">รายชื่อบุคลากรทั้งหมด</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table id="" class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ลำดับ</th>
                                            <th scope="col">ชื่อ-นามสกุล</th>
                                            <th scope="col">ตำแหน่ง</th>
                                        </tr>
                                    </thead>
                                    <tbody id="get_all_staff"> <!-- Ensure this ID matches your jQuery selector -->
                                        <!-- Data will be inserted here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">คำร้องทั้งหมด</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">วันที่ยื่น</th>
                                            <th scope="col">ชื่อ-นามสกุล</th>
                                            <th scope="col">เรื่อง</th>
                                        </tr>
                                    </thead>
                                    <tbody id="all_requests">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">คำร้องอนุมัติแล้ว</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">วันที่ยื่น</th>
                                            <th scope="col">ชื่อ-นามสกุล</th>
                                            <th scope="col">เรื่อง</th>
                                        </tr>
                                    </thead>
                                    <tbody id="all_approve">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">คำร้องรอการอนุมัติ</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">วันที่ยื่น</th>
                                            <th scope="col">ชื่อ-นามสกุล</th>
                                            <th scope="col">เรื่อง</th>
                                        </tr>
                                    </thead>
                                    <tbody id="all_waiting_for_approval">
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    if (localStorage.getItem("id_type") != "1" && localStorage.getItem("user_id") == null) {
        localStorage.clear()
        window.location.href = "../"
    }
</script>
<?php include("../footer.php") ?>