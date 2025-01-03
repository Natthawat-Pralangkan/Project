<?php
session_start();
include("../servers/connect.php"); ?>
<?php include("../header.php"); ?>
<div class="wrapper">
    <?php include('./navbar/sidebar.php'); ?>
    <div class="content-wrapper">
        <?php include('./navbar/navuser.php'); ?>
        <!-- <script src="./js/check_the_request.js"></script> -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <h2 class="m-0">ตรวจสอบคำร้อง</h2>
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="./home.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">ตรวจสอบคำร้อง </li>
                    </ol>
                </div>
            </div>
            <a href=""></a>
        </div>

        <div class="">
            <div class="mt-3">
                <table id="checktherequest" class="table">
                    <thead>
                        <tr>
                            <th>วันที่ยื่น</th>
                            <th>รายการคำร้อง</th>
                            <th>ชื่อผู้ยื่นคำร้อง</th>
                            <th>สถานะ</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <!-- Modal -->

                <div class="modal fade" id="exampleModal7" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">ข้อมูลคำร้อง</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="hiddenIdField" value=""> <!-- สมมุติว่ามีค่า id -->
                                <iframe id="pdfViewer1" width="100%" height="500px" frameborder="0"></iframe>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" id="approveButton" class="btn text-center some-element" style="background-color: #8B39F4; color: #fcfafa;">อนุมัติ</button>
                                <!-- เพิ่ม event handler เพื่อส่งค่า id ไปยัง #exampleModal1 -->
                                <button class="btn mr-2" id="disapproveButton" style="background-color: #ff0000; color: #fcfafa;" data-bs-toggle="modal" data-bs-target="#exampleModal1">ไม่อนุมัติ</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="exampleModal8" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">ข้อมูลคำร้อง</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="hiddenIdFieldModal8" value=""> <!-- สมมุติว่า id ถูกเซ็ตเป็น 1234 จาก backend -->
                                <iframe id="pdfViewer2" width="100%" height="500px" frameborder="0"></iframe>
                                <div class="row justify-content-center">
                                    <div class="col-md-4 text-center">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="approve" name="decision" value="1">
                                            <label class="form-check-label" for="approve">อนุมัติ</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="command" name="decision" value="2">
                                            <label class="form-check-label" for="command">สั่งการ</label>
                                        </div>
                                        <input type="text" class="form-control mt-3" id="commandText" style="display: none;" placeholder="ระบุรายละเอียดสั่งการ">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" id="approveButton1" class="btn text-center some-element" style="background-color: #8B39F4; color: #fcfafa;">อนุมัติ</button>
                                <!-- เพิ่มการส่งค่า id ไปยัง Modal ไม่อนุมัติ -->
                                <button class="btn mr-2" id="disapproveButton" style="background-color: #ff0000; color: #fcfafa;" data-bs-toggle="modal" data-bs-target="#exampleModal1">ไม่อนุมัติ</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">เหตุผลไม่ผ่านพิจารณา</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="hiddenIdField1" value=""> <!-- ฟิลด์นี้จะรับค่า id -->
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">เหตุผลไม่ผ่านพิจารณา</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="เหตุผลไม่อนุมัติคำร้อง">

                                </div>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" id="confirmDisapproval" class="btn text-center disapproveButton" data-bs-dismiss="modal" style="background-color: #8B39F4; color: #fcfafa;">ยืนยัน</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="exampleModal10" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">ข้อมูลคำร้อง</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="hiddenIdField" value="">
                                <!-- New input field added below -->
                                <iframe id="pdfViewer3" width="100%" height="500px" frameborder="0"></iframe>
                                <div class="row justify-content-center">
                                    <div class="col-4 mx-5" id="bossOpinionContainer">
                                        <label for="">ความเห็นหัวหน้ากลุ่มสาระ / หัวหน้างาน</label>
                                        <input type="text" id="Boss_opinion" class="form-control" placeholder="ความเห็นหัวหน้ากลุ่มสาระ / หัวหน้างาน">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" id="approveButton2" class="btn text-center some-element" style="background-color: #8B39F4; color: #fcfafa;">ผ่านพิจารณา</button>
                                <button class="btn mr-2" style="background-color: #ff0000; color: #fcfafa;" data-bs-toggle="modal" data-bs-target="#exampleModal1">ไม่ผ่านพิจารณา</button>
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
    $(document).ready(function() {




        $('#checktherequest').on('click', '.manage-button', function() {
            var id = $(this).data('id');
            var petitionId = $(this).data('petition-id');
            var idStatus = $(this).data('id-status'); // Assuming this is how you store id_status

            console.log("ID: " + id + ", Petition ID: " + petitionId + ", ID Status: " + idStatus);

            // Store the id for later use
            $('#exampleModal7').data('action-id', id);
            $('#exampleModal8').data('action-id', id); // Do the same for the second modal if necessary
            $('#exampleModal10').data('action-id', id); // Do the same for the second modal if necessary

            var pdfUrl = 'check_the_request_pdf_subject.php?id=' + id;

            // Check for petitionId 6 to open exampleModal10
            if (petitionId == 6) {
                // Adjust the iframe src or any other modal-specific settings here
                $('#pdfViewer3').attr('src', pdfUrl); // Assuming you want to load the PDF here as well
                $('#exampleModal10').modal('show');
            } else if (petitionId == 9 || petitionId == 1) { // Combined condition for simplicity
                $('#pdfViewer2').attr('src', pdfUrl);
                $('#exampleModal8').modal('show');
            } else {
                $('#pdfViewer1').attr('src', pdfUrl);
                $('#exampleModal7').modal('show');
            }

            // Conditionally show or hide elements based on id_status
            if (idStatus == 4) {

                $('#approve, #command, #commandText , #Boss_opinion ').closest('.row').hide();
            } else {
                // Otherwise, make sure they are shown (useful if the modal is reused)
                $('#approve, #command, #commandText, #Boss_opinion').closest('.row').show();
            }
        });



        $("#approveButton").on('click', function(event) {
            event.preventDefault();
            var id = $('#exampleModal7').data('action-id');
            var id_status = 1; // Define and assign a value to id_status
            var id_subject_group = localStorage.getItem("id_subject_group");

            console.log("ID:", id, "ID Status:", id_status, "ID Subject Group:", id_subject_group);
            // AJAX call to update the status
            $.ajax({
                url: "update_status",
                type: "POST",
                data: {
                    id: id,
                    id_status: id_status,
                    id_subject_group: localStorage.getItem("id_subject_group"),
                },
                success: function(response) {
                    if (response.status === "success") {
                        Swal.fire({
                            title: "อนุมัติคำร้องสำเร็จ!",
                            text: response.message,
                            icon: "success",
                            confirmButtonText: "ยืนยัน" // Change the text of the confirmation button
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload(); // Reload the page after confirmation
                            }
                        });
                        $('#exampleModal1').modal('hide'); // ซ่อน modal ที่ต้องการ
                        location.reload(); // or use a more targeted update method
                    } else {
                        alert("เกิดข้อผิดพลาด: " + response.message);
                    }
                },
                error: function() {
                    alert("เกิดข้อผิดพลาดในการส่งข้อมูล");
                },
            });
        });


        $("#approveButton1").on('click', function(event) {
            event.preventDefault();
            var id = $('#exampleModal8').data('action-id'); // รับค่า id จาก data-action-id ของ modal ตามที่กำหนด
            var id_status = 1; // Define and assign a value to id_status
            var decision = $('input[type="radio"][name="decision"]:checked').val(); // ดึงค่าจาก radio button ที่ถูกเลือก
            var commandText = ''; // ตั้งค่าเริ่มต้นเป็นสตริงว่าง

            // ตรวจสอบว่าผู้ใช้เลือก "สั่งการ" หรือไม่ ถ้าใช่, ดึงค่าจากช่องข้อความ
            if (decision == "2") { // ถ้าค่าเป็น 2 หมายถึง "สั่งการ"
                commandText = $('#commandText').val(); // ดึงค่าจากช่องข้อความ
            }

            // AJAX call to update the status
            $.ajax({
                url: "update_status1", // ตรวจสอบ URL ให้ถูกต้องตามที่เซิร์ฟเวอร์ของคุณต้องการ
                type: "POST",
                data: {
                    id: id,
                    id_status: id_status,
                    decision: decision, // ส่งค่า decision
                    commandText: commandText, // ส่งค่า commandText ถ้ามี
                    id_subject_group: localStorage.getItem("id_subject_group")
                },
                success: function(response) {
                    if (response.status === "success") {
                        Swal.fire({
                            title: "สำเร็จ!",
                            text: response.message,
                            icon: "success",
                            confirmButtonText: "ยืนยัน" // Change the text of the confirmation button
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload(); // Reload the page after confirmation
                            }
                        });
                        $('#exampleModal8').modal('hide'); // ซ่อน modal ที่ต้องการ
                        location.reload(); // or use a more targeted update method
                    } else {
                        alert("เกิดข้อผิดพลาด: " + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    alert("เกิดข้อผิดพลาดในการส่งข้อมูล: " + error);
                }
            });
        });

        $('#approveButton2').click(function() {
            // Extract data from inputs
            var id = $('#exampleModal10').data('action-id'); // รับค่า id จาก data-action-id ของ modal ตามที่กำหนด
            var id_status = 1; // Define and assign a value to id_status
            var Boss_opinion = $('#Boss_opinion').val(); // The input from the user

            // AJAX request to your server-side script
            $.ajax({
                url: 'update_status2', // The path to your server-side script
                type: 'POST',
                data: {
                    id: id,
                    id_status: id_status,
                    Boss_opinion: Boss_opinion,
                    id_subject_group: localStorage.getItem("id_subject_group"),
                },
                success: function(response) {
                    if (response.status === "success") {
                        Swal.fire({
                            title: "สำเร็จ!",
                            text: response.message,
                            icon: "success",
                            confirmButtonText: "ยืนยัน" // Change the text of the confirmation button
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload(); // Reload the page after confirmation
                            }
                        });
                        $('#exampleModal10').modal('hide'); // ซ่อน modal ที่ต้องการ
                    } else {
                        alert("เกิดข้อผิดพลาด: " + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    alert("เกิดข้อผิดพลาดในการส่งข้อมูล: " + error);
                }
            });
        });


        // เมื่อโมดัล #exampleModal1 กำลังจะถูกเปิด
        $('#exampleModal1').on('show.bs.modal', function(event) {
            // ดึงค่า id จาก modal ก่อนหน้า
            var id = $('#exampleModal7').data('action-id') || $('#exampleModal8').data('action-id') || $('#exampleModal10').data('action-id');

            // ตั้งค่า id ให้กับ hidden field ใน #exampleModal1
            if (id) {
                $('#hiddenIdField1').val(id);
            } else {
                console.error('ไม่พบค่า id จาก modal ก่อนหน้า');
            }
        });

        // เมื่อกดปุ่มยืนยันการไม่อนุมัติ
        $('#confirmDisapproval').click(function() {
            var id = $('#hiddenIdField1').val(); // ดึง id จาก hidden field
            var reason = $('#formGroupExampleInput').val(); // ดึงเหตุผลที่กรอก

            // ตรวจสอบว่ามีการกรอกเหตุผลหรือไม่
            if (!reason.trim()) {
                alert("กรุณากรอกเหตุผลการไม่อนุมัติ");
                return;
            }

            var id_status = 6; // กำหนดสถานะเป็นไม่อนุมัติ

            // ทำการเรียก AJAX เพื่ออัปเดตข้อมูลในเซิร์ฟเวอร์
            $.ajax({
                url: 'update_reason',
                type: 'POST',
                data: {
                    id: id,
                    reason: reason,
                    id_status: id_status
                },
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            title: "สำเร็จ!",
                            text: response.message,
                            icon: "success",
                            confirmButtonText: "ยืนยัน"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    } else {
                        alert('ไม่สามารถอัปเดตข้อมูลได้: ' + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    alert('เกิดข้อผิดพลาดในการอัปเดตข้อมูล');
                    console.error('Error:', error);
                }
            });
        });





        $.ajax({
            url: "get_subject",
            type: "POST",
            data: {
                id_subject_group: localStorage.getItem("id_subject_group")
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);

                // Remove duplicates from the data array
                data = $.unique(data);

                var table = $('#checktherequest').DataTable({
                    data: data,
                    columns: [{
                            data: 'date'
                        },
                        {
                            data: 'petition_name'
                        },
                        {
                            data: 'request_type_name'
                        },
                        {
                            data: 'name_status',
                            createdCell: function(td, cellData, rowData, row, col) {
                                // ตรวจสอบว่า id_status เป็น 1, 2, 3 หรือ 4
                                if ([1, 2, 3, 4].includes(parseInt(rowData.id_status))) {
                                    // ถ้า id_status เป็น 1, 2, 3 หรือ 4 ให้ขึ้นว่า "อนุมัติแล้ว"
                                    $(td).addClass("status4").text("อนุมัติแล้ว");
                                } else if (cellData == "ไม่อนุมัติ") {
                                    $(td).addClass("status5");
                                } else if (cellData == "ไม่ผ่านพิจารณา") {
                                    $(td).addClass("status6");
                                } else if (cellData == "ยกเลิก") {
                                    $(td).addClass("status7");
                                } else if (cellData == "รอหัวหน้ากลุ่มสาระพิจารณา") {
                                    $(td).addClass("status8");
                                }
                            },
                        },
                        {
                            data: null,
                            render: function(data, type, row) {
                                return `<button class="btn btn-primary manage-button" data-id="${row.id}" data-petition-id="${row.petition_id}" data-id-status="${row.id_status}">จัดการ</button>`;
                            }
                        }
                    ],
                    order: [
                        [0, 'desc']
                    ]
                });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });




        $('input[name="decision"]').change(function() {
            if ($('#command').is(':checked')) {
                $('#commandText').show();
            } else {
                $('#commandText').hide();
            }
        });
    });
</script>
<?php include("../footer.php") ?>