<?php include("../../servers/connect.php"); ?>
<?php include("../../header.php"); ?>
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
                <div class="col-12 col-md-4">
                    <div class="shadow p-3 mb-5 bg-body rounded custom-card-ho">
                        <div class="d-flex justify-content-between align-items-center">
                            <i class="fa-solid fa-user" style="font-size: 40px;color: #000000"></i>
                            <p style="color : #555555">จำนวนบุคลากรทั้งหมด</p>
                        </div>
                        <div class="my-3">
                            <h1 id="get_all_staff_0" class="text-center"></h1>
                        </div>
                        <div class="border-top text-center py-3">
                            <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal5" style="background-color: #BB6AFB; color :#FFFFFF">
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
            $.ajax({
                url: 'get_Request_pending_consideration', // เปลี่ยนเป็นเส้นทางของสคริปต์ PHP ของคุณ
                method: 'GET',
                data: {
                    petition_type: 4, // ตั้งค่าคงที่หากต้องการส่งค่านี้ไปยังเซิร์ฟเวอร์เสมอ
                    id_status: 1 // ส่งค่านี้ไปด้วยหากสคริปต์ PHP ของคุณต้องการ
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
        // เมื่อ modal แสดงขึ้นมา
        $('#exampleModal4').on('show.bs.modal', function(e) {
            // เรียกใช้งานข้อมูลผ่าน AJAX
            $.ajax({
                url: 'get_all_requests', // เปลี่ยนเป็นเส้นทางของสคริปต์ PHP ของคุณ
                method: 'GET',
                data: {
                    petition_type: 4
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

    function fetchStatusCount_1(idStatus_1) {
        $.ajax({
            url: 'get_id_status_1',
            method: 'POST',
            data: {
                petition_type: 4, // ตั้งค่าคงที่หากต้องการส่งค่านี้ไปยังเซิร์ฟเวอร์เสมอ
                id_status: 1 // ส่งค่านี้ไปด้วยหากสคริปต์ PHP ของคุณต้องการ
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

    $(document).ready(function() {
        fetchTotalPetitions([1, 2, 3, 4, 5, 6, 7]); // Example array passed, not used in PHP as shown
    });

    function fetchTotalPetitions(idStatusArray) {
        $.ajax({
            url: 'get_id_status', // Adjust this URL to the correct endpoint
            method: 'POST',
            data: {
                petition_type: 4 // This needs to be handled on the server-side if it's to be used
            },
            success: function(response) {
                // Assuming response contains a 'count' property as per the PHP script
                $('#idStatusArray_0').text(response.count);
            },
            error: function(error) {
                console.error('Error fetching total petitions:', error);
            }
        });
    }

    $(document).ready(function() {
        // When the modal is shown
        $('#exampleModal5').on('show.bs.modal', function(e) {
            // Fetch data through AJAX
            $.ajax({
                url: 'get_all_staff.php', // Adjusted URL to include .php extension
                method: 'GET',
                success: function(response) {
                    // Insert the response data into tbody within the modal
                    $('#exampleModal5 .table tbody').html(response); // Adjusted selector to target tbody within the modal
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    // Display an error message if data fetching fails
                    $('#exampleModal5 .table tbody').html('<tr><td colspan="3">เกิดข้อผิดพลาดในการดึงข้อมูล</td></tr>'); // Adjusted selector
                }
            });
        });
    });

    $(document).ready(function() {
        fetchTotalPetitions_get_all_staff_0([1, 2, 3, 4, 5, 6, 7]); // Example array passed, not used in PHP as shown
    });

    function fetchTotalPetitions_get_all_staff_0(get_all_staff_0) {
        $.ajax({
            url: 'get_count_all_staff', // Adjust this URL to the correct endpoint
            method: 'POST',
            data: {
               
            },
            success: function(response) {
                // Assuming response contains a 'count' property as per the PHP script
                $('#get_all_staff_0').text(response.count);
            },
            error: function(error) {
                console.error('Error fetching total petitions:', error);
            }
        });
    }
</script>
<?php include("../../footer.php") ?>