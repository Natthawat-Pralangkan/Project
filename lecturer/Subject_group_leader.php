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

        <div class="mx-3 mt-5">
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
                                <input type="hidden" id="hiddenIdField" value="">
                                <iframe id="pdfViewer1" width="100%" height="500px" frameborder="0"></iframe>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" id="approveButton" class="btn text-center some-element" style="background-color: #8B39F4; color: #fcfafa;">อนุมัติ</button>
                                <button class="btn mr-2" style="background-color: #ff0000; color: #fcfafa;" data-bs-toggle="modal" data-bs-target="#exampleModal1">ไม่อนุมัติ</button>
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
                                <input type="hidden" id="hiddenIdField" value="">
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
                                <button class="btn mr-2" style="background-color: #ff0000; color: #fcfafa;" data-bs-toggle="modal" data-bs-target="#exampleModal1">ไม่อนุมัติ</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade " id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">เหตุผลไม่อนุมัติคำร้อง</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">เหตุผลไม่อนุมัติคำร้อง</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="เหตุผลไม่อนุมัติคำร้อง">
                                    <input type="hidden" id="hiddenIdField" value="">
                                </div>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" id="confirmDisapproval" class="btn text-center disapproveButton" data-bs-dismiss="modal" style="background-color: #8B39F4; color: #fcfafa;">ยืนยัน</button>
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
            console.log("ID: " + id + ", Petition ID: " + petitionId);

            // Use .data() to store the id for later use
            $('#exampleModal7').data('action-id', id);
            $('#exampleModal8').data('action-id', id); // Do the same for the second modal if necessary

            var pdfUrl = 'check_the_request_pdf_subject.php?id=' + id;
            if (petitionId == 9) {
                $('#pdfViewer2').attr('src', pdfUrl);
                $('#exampleModal8').modal('show');
            } else {
                $('#pdfViewer1').attr('src', pdfUrl);
                $('#exampleModal7').modal('show');
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
                    console.log(response);
                    if (response.status === 'success') {
                        alert("อนุมัติคำร้องเรียบร้อยแล้ว");
                        $('#exampleModal7').modal('hide');
                        // Refresh or update the UI as necessary
                        location.reload(); // or use a more targeted update method
                    } else {
                        alert("เกิดข้อผิดพลาดในการอนุมัติคำร้อง: " + response.message);
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
                        alert("การดำเนินการเรียบร้อยแล้ว");
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



        $('#exampleModal1').on('show.bs.modal', function() {
            var id = $('#exampleModal7').data('id');
            $('#hiddenIdField').val(id); // Transfer the id to a hidden input within the disapproval reason modal
        });

        // Handle the confirmation of disapproval
        $('#confirmDisapproval').click(function() {
            var id = $('#hiddenIdField').val(); // Retrieve the id
            var reason = $('#formGroupExampleInput').val(); // Get the disapproval reason
            if (!reason.trim()) {
                alert("Please enter a reason for disapproval.");
                return;
            }
            var id_status = 6;
            // AJAX call to update the reason and status to "Disapproved"
            $.ajax({
                url: 'update_reason', // Adjust the URL as necessary
                type: 'POST', // Make sure this is POST
                data: {
                    id: id, // Ensure these variables are correctly defined in your JS
                    reason: reason,
                    id_status: id_status
                },
                success: function(response) {
                    alert("อัปเดตข้อมูลเรียบร้อย");
                    $('#exampleModal1').modal('hide');
                    location.reload();
                    console.log('Success:', response);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });



        $.ajax({
            url: "get_subject",
            type: "POST",
            data: {
                user_id: localStorage.getItem("user_id"),
                id_subject_group: localStorage.getItem("id_subject_group")
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
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
                                if (cellData == "รอพิจารณา") {
                                    $(td).addClass("status1");
                                } else if (cellData == "รอรองผู้อำนวยการพิจารณา") {
                                    $(td).addClass("status2");
                                } else if (cellData == "รอผู้อำนวยการพิจารณา") {
                                    $(td).addClass("status3");
                                } else if (cellData == "อนุมัติแล้ว") {
                                    $(td).addClass("status4");
                                } else if (cellData == "ไม่อนุมัติแล้ว") {
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
                                return `<button class="btn btn-primary manage-button" data-id="${row.id}" data-petition-id="${row.petition_id}">จัดการ</button>`;
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

        $('input[type="radio"][name="decision"]').change(function() {
            if (this.id == 'command') {
                $('#commandText').show();
            } else {
                $('#commandText').hide();
            }
        });
    });
</script>
<?php include("../footer.php") ?>