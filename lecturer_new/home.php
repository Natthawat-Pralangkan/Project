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
            <div class="content">
                <div class="row p-5 m-1">
                    <div class="col-12 col-md-4">
                        <div class="shadow p-3 mb-5 bg-body rounded custom-card-ho">
                            <div class="d-flex justify-content-between align-items-center">
                                <i class="fa-solid fa-newspaper" style="font-size: 40px;color: #27a645"></i>
                                <p style="color : #555555">คำร้องรอการพิจารณา</p>
                            </div>
                            <div class="my-3">
                                <h1 id="idStatus_1" class="text-center"></h1>
                            </div>
                            <div class="border-top text-center py-3">
                                <button type="button" class="btn btn" data-bs-toggle="modal" data-bs-target="#exampleModal1" style="background-color: #BB6AFB; color :#FFFFFF">
                                    เพิ่มเติม
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="shadow p-3 mb-5 bg-body rounded custom-card-ho">
                            <div class="d-flex justify-content-between align-items-center">
                                <i class="fa-solid fa-newspaper" style="font-size: 40px;color: #FFFF33"></i>
                                <p style="color : #555555">คำร้องรออนุมัติ</p>
                            </div>
                            <div class="my-3">
                                <h1 id="idStatusArray_2" class="text-center"></h1>
                            </div>
                            <div class="border-top text-center py-3">
                                <button type="button" class="btn btn" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="background-color: #BB6AFB; color: #FFFFFF">
                                    เพิ่มเติม
                                </button>

                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="shadow p-3 mb-5 bg-body rounded custom-card-ho">
                            <div class="d-flex justify-content-between align-items-center">
                                <i class="fa-solid fa-newspaper" style="font-size: 40px;color: #FF3300"></i>
                                <p style="color : #555555">คำร้องอนุมัติแล้ว</p>
                            </div>
                            <div class="my-3">
                                <div class="my-3">
                                    <h1 id="idStatus_4" class="text-center"></h1>
                                </div>

                            </div>
                            <div class="border-top text-center py-3">
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="background-color: #BB6AFB; color :#FFFFFF">
                                    เพิ่มเติม
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="shadow p-3 mb-5 bg-body rounded custom-card-ho">
                            <div class="d-flex justify-content-between align-items-center">
                                <i class="fa-solid fa-newspaper" style="font-size: 40px;color: #000000"></i>
                                <p style="color : #555555">คำร้องทั้งหมด</p>
                            </div>
                            <div class="my-3">
                                <h1 id="idStatusArray_0" class="text-center"></h1>
                            </div>
                            <div class="border-top text-center py-3">
                                <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal4" style="background-color: #BB6AFB; color :#FFFFFF">
                                    เพิ่มเติม
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal คำร้องรอการพิจารณา -->
            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">คำร้องรอการพิจารณา</h1>
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
                                <tbody id="Request_pending_consideration">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal คำร้องรออนุมัติ -->
            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">คำร้องรออนุมัติ</h1>
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
                                <tbody id="Request_pending_approval">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal คำร้องอนุมัติแล้ว -->
            <div class=" modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">คำร้องอนุมัติแล้ว</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table id="myTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">วันที่ยื่น</th>
                                        <th scope="col">ชื่อ-นามสกุล</th>
                                        <th scope="col">เรื่อง</th>
                                    </tr>
                                </thead>
                                <tbody id="modalBody">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal คำร้องทั้งหมด -->
            <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">คำร้องทั้งหมด</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table id="myTable" class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">วันที่ยื่น</th>
                                        <th scope="col">ชื่อ-นามสกุล</th>
                                        <th scope="col">เรื่อง</th>
                                    </tr>
                                </thead>
                                <tbody id="all_requests">
                                    <!-- ข้อมูลจะถูกแสดงที่นี่ -->
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
</div>
</div>
<script>
    if (localStorage.getItem("id_type") != "7" && localStorage.getItem("user_id") == null) {
        localStorage.clear()
        window.location.href = "../"
    }
    // คำร้องอนุมัติแล้ว
    $(document).ready(function() {
        // เมื่อ modal แสดงขึ้นมา
        $('#exampleModal3').on('show.bs.modal', function(e) {
            // เรียกใช้งานข้อมูลผ่าน AJAX
            $.ajax({
                url: 'get_request_approved', // เปลี่ยนเป็นเส้นทางของสคริปต์ PHP ของคุณ
                method: 'GET',
                data: {
                    user_id: localStorage.getItem("user_id")
                }, // ส่งพารามิเตอร์ user_id หากคุณมีการใช้งาน
                success: function(response) {
                    $('#modalBody').html(response); // แทรกข้อมูลที่ได้รับเข้าไปใน tbody
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    $('#modalBody').html('<tr><td colspan="3">เกิดข้อผิดพลาดในการดึงข้อมูล</td></tr>'); // แสดงข้อความผิดพลาด
                }
            });
        });
    });
    // คำร้องรออนุมัติ
    $(document).ready(function() {
        // เมื่อ modal แสดงขึ้นมา
        $('#exampleModal2').on('show.bs.modal', function(e) {
            // เรียกใช้งานข้อมูลผ่าน AJAX
            $.ajax({
                url: 'get_Request_pending_approval', // เปลี่ยนเป็นเส้นทางของสคริปต์ PHP ของคุณ
                method: 'GET',
                data: {
                    user_id: localStorage.getItem("user_id")
                }, // ส่งพารามิเตอร์ user_id หากคุณมีการใช้งาน
                success: function(response) {
                    $('#Request_pending_approval').html(response); // แทรกข้อมูลที่ได้รับเข้าไปใน tbody
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    $('#Request_pending_approval').html('<tr><td colspan="3">เกิดข้อผิดพลาดในการดึงข้อมูล</td></tr>'); // แสดงข้อความผิดพลาด
                }
            });
        });
    });
    // คำร้องรอการพิจารณา
    $(document).ready(function() {
        // เมื่อ modal แสดงขึ้นมา
        $('#exampleModal1').on('show.bs.modal', function(e) {
            // เรียกใช้งานข้อมูลผ่าน AJAX
            $.ajax({
                url: 'get_Request_pending_consideration', // เปลี่ยนเป็นเส้นทางของสคริปต์ PHP ของคุณ
                method: 'GET',
                data: {
                    user_id: localStorage.getItem("user_id")
                }, // ส่งพารามิเตอร์ user_id หากคุณมีการใช้งาน
                success: function(response) {
                    $('#Request_pending_consideration').html(response); // แทรกข้อมูลที่ได้รับเข้าไปใน tbody
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    $('#Request_pending_consideration').html('<tr><td colspan="3">เกิดข้อผิดพลาดในการดึงข้อมูล</td></tr>'); // แสดงข้อความผิดพลาด
                }
            });
        });
    });
    $(document).ready(function() {
        // เมื่อ modal แสดงขึ้นมา
        $('#exampleModal4').on('show.bs.modal', function(e) {
            // เรียกใช้งานข้อมูลผ่าน AJAX
            $.ajax({
                url: 'get_all_requests', // เปลี่ยนเป็นเส้นทางของสคริปต์ PHP ของคุณ
                method: 'GET',
                data: {
                    user_id: localStorage.getItem("user_id")
                }, // ส่งพารามิเตอร์ user_id หากคุณมีการใช้งาน
                success: function(response) {
                    $('#all_requests').html(response); // แทรกข้อมูลที่ได้รับเข้าไปใน tbody
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    $('#all_requests').html('<tr><td colspan="3">เกิดข้อผิดพลาดในการดึงข้อมูล</td></tr>'); // แสดงข้อความผิดพลาด
                }
            });
        });
    });

    // ฟังก์ชันสำหรับดึงข้อมูลจำนวน id_status และแสดงผล
    function fetchStatusCount_1(idStatus_1) {
        $.ajax({
            url: 'get_id_status_1',
            method: 'POST',
            data: {
                user_id: localStorage.getItem("user_id"),
                id_status: idStatus_1
            },
            success: function(response) {
                $('#idStatus_1').text(response.count); // แสดงผลข้อมูลใน element ที่มี id เป็น "idStatus"
            },
            error: function(error) {
                console.error('Error fetching status count:', error);
            }
        });
    }

    // เรียกใช้ฟังก์ชันเมื่อหน้าเว็บโหลดเสร็จ
    $(document).ready(function() {
        fetchStatusCount_1(1); // เรียกใช้ฟังก์ชันเพื่อดึงข้อมูล id_status ที่เป็น 1
    });

    // ฟังก์ชันสำหรับดึงข้อมูลจำนวน id_status และแสดงผล
    $(document).ready(function() {
        fetchTotalPetitions_2([2, 3]);
    });

    function fetchTotalPetitions_2(idStatusArray_2) {
        $.ajax({
            url: 'get_id_status_2', // URL ของ API ที่รับข้อมูลคำร้อง
            method: 'POST',
            data: {
                user_id: localStorage.getItem("user_id"),
                id_status: idStatusArray_2
            },
            success: function(response) {
                // แสดงผลจำนวนคำร้องทั้งหมดใน element ที่มี id เป็น "idStatusArray"
                $('#idStatusArray_2').text(response.total);
            },
            error: function(error) {
                console.error('Error fetching total petitions:', error);
            }
        });
    }


    // ฟังก์ชันสำหรับดึงข้อมูลจำนวน id_status และแสดงผล
    function fetchStatusCount(idStatus_4) {
        $.ajax({
            url: 'get_id_status_4',
            method: 'POST',
            data: {
                user_id: localStorage.getItem("user_id"),
                id_status: idStatus_4
            },
            success: function(response) {
                $('#idStatus_4').text(response.count); // แสดงผลข้อมูลใน element ที่มี id เป็น "idStatus"
            },
            error: function(error) {
                console.error('Error fetching status count:', error);
            }
        });
    }

    // เรียกใช้ฟังก์ชันเมื่อหน้าเว็บโหลดเสร็จ
    $(document).ready(function() {
        fetchStatusCount(4); // เรียกใช้ฟังก์ชันเพื่อดึงข้อมูล id_status ที่เป็น 1
    });

    $(document).ready(function() {
        // เรียกใช้ฟังก์ชันเพื่อดึงจำนวนคำร้องทั้งหมดที่มี id_status 1, 2, 3, 4, 5, หรือ 6
        fetchTotalPetitions([1, 2, 3, 4, 5, 6,7]);
    });

    function fetchTotalPetitions(idStatusArray_0) {
        $.ajax({
            url: 'get_id_status', // URL ของ API ที่รับข้อมูลคำร้อง
            method: 'POST',
            data: {
                user_id: localStorage.getItem("user_id"),
                id_status: idStatusArray_0
            },
            success: function(response) {
                // แสดงผลจำนวนคำร้องทั้งหมดใน element ที่มี id เป็น "idStatusArray"
                $('#idStatusArray_0').text(response.total);
            },
            error: function(error) {
                console.error('Error fetching total petitions:', error);
            }
        });
    }
</script>
<?php include("../footer.php") ?>