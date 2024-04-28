<?php include("../servers/connect.php"); ?>
<?php include("../header.php"); ?>
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

                <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <tbody id="all_requests">

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
    if (localStorage.getItem("id_type") != "6" && localStorage.getItem("user_id") == null) {
        localStorage.clear()
        window.location.href = "../"
    }
    // คำร้องพิจารณา
    $(document).ready(function() {
        // เมื่อ modal แสดงขึ้นมา
        $('#exampleModal1').on('show.bs.modal', function(e) {
            // เรียกใช้งานข้อมูลผ่าน AJAX
            var id_subject_group = localStorage.getItem("id_subject_group");
            $.ajax({
                url: 'Subject_group_Request_pending_consideration', // เปลี่ยนเป็นเส้นทางของสคริปต์ PHP ของคุณ
                method: 'GET',
                data: {
                    id_subject_group: localStorage.getItem("id_subject_group")
                },
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
        function fetchStatusCount_1(idStatus_1) {
            var id_subject_group = localStorage.getItem("id_subject_group");
            $.ajax({
                url: 'Subject_group_id_status_8', // Replace with the actual URL
                method: 'POST',
                data: {
                    id_subject_group: id_subject_group // Send id_subject_group once
                },
                success: function(response) {
                    $('#idStatus_1').text(response.count); // Check if response is in the correct format
                },
                error: function(error) {
                    console.error('Error fetching status count:', error);
                }
            });
        }

        fetchStatusCount_1(8); // Call the function to fetch status count
    });

    $(document).ready(function() {
        fetchTotalPetitions(); // เรียกใช้งานฟังก์ชันเพื่อดึงข้อมูลทันทีเมื่อหน้าเว็บไซต์โหลดเสร็จสิ้น
    });

    function fetchTotalPetitions() {
        var id_subject_group = localStorage.getItem("id_subject_group");
        $.ajax({
            url: 'Subject_group_id_status', // ปรับ URL นี้ให้ตรงกับ endpoint ที่ถูกต้อง
            method: 'POST',
            data: {
                id_subject_group: id_subject_group // ส่ง id_subject_group ไปทีละครั้ง
            },
            success: function(response) {
                // สมมติว่า response มี property 'count' ตามที่ PHP script คืนค่า
                $('#idStatusArray_0').text(response.count);
            },
            error: function(error) {
                console.error('Error fetching total petitions:', error);
            }
        });
    }

    $(document).ready(function() {
        // เมื่อ modal แสดงขึ้นมา
        $('#exampleModal4').on('show.bs.modal', function(e) {
            // เรียกใช้งานข้อมูลผ่าน AJAX
            var id_subject_group = localStorage.getItem("id_subject_group");
            $.ajax({
                url: 'Subject_group_all_requests', // เปลี่ยนเป็นเส้นทางของสคริปต์ PHP ของคุณ
                method: 'POST',
                data: {
                    id_subject_group: localStorage.getItem("id_subject_group")
                }, // ส่งพารามิเตอร์ user_id หากคุณมีการใช้งาน
                success: function(response) {
                    console.log(response);
                    $('#all_requests').html(response); // แทรกข้อมูลที่ได้รับเข้าไปใน tbody
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    $('#all_requests').html('<tr><td colspan="3">เกิดข้อผิดพลาดในการดึงข้อมูล</td></tr>'); // แสดงข้อความผิดพลาด
                }
            });
        });
    });
</script>
<?php include("../footer.php") ?>