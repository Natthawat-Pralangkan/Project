<?php
include("../servers/connect.php");
include("../header.php");
?>
<div class="wrapper">
    <?php include('./navbar/sidebar.php'); ?>
    <div class="content-wrapper">
        <?php include('./navbar/navuser.php'); ?>
        <!-- <script src="./js/Check_the_request.js"></script> -->
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
                                <iframe id="pdfViewer1" width="100%" height="500px" frameborder="0"></iframe>
                                <input type="hidden" id="hiddenIdField" value="">
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" id="approveButton" class="btn text-center some-element" style="background-color: #8B39F4; color: #fcfafa;">อนุมัติ</button>
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
                <div class="modal fade" id="anotherModalId" tabindex="-1" aria-labelledby="anotherModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">ข้อมูลคำร้อง</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="hiddenIdField" value="">
                                <!-- New input field added below -->
                                <iframe id="pdfViewer2" width="100%" height="500px" frameborder="0"></iframe>
                            </div>
                            <div class="justify-content-center mx-5">
                                <label for="">ความเห็นหัวหน้ากลุ่มสาระ / หัวหน้างาน</label>
                                <input type="text" id="Secondary_opinion" class="form-control" placeholder="ความเห็นหัวหน้ากลุ่มสาระ / หัวหน้างาน">
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" id="approveButton2" class="btn text-center some-element" style="background-color: #8B39F4; color: #fcfafa;">อนุมัติ</button>
                                <button class="btn mr-2" style="background-color: #ff0000; color: #fcfafa;" data-bs-toggle="modal" data-bs-target="#exampleModal1">ไม่อนุมัติ</button>
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
    $(document).ready(function() {
        $('#checktherequest').on('click', '.manage-button', function() {
            var id = $(this).data('id');
            var petitionId = $(this).data('petition_id');
            console.log("ID:" + id + " Petition ID:" + petitionId); // Check the values

            var pdfUrl = 'check_the_request_pdf.php?id=' + id; // Corrected variable name

            // Decide which modal to show based on petitionId
            if (petitionId == 6) {
                $('#pdfViewer2').attr('src', pdfUrl); // Assuming this is for petition_id = 6
                $('#anotherModalId').data('id', id).modal('show');
            } else {
                $('#pdfViewer1').attr('src', pdfUrl); // For other IDs
                $('#exampleModal7').data('id', id).modal('show');
            }
        });

        // Setup for handling clicks on "อนุมัติ" button
        $("#approveButton").on('click', function(event) {
            event.preventDefault();
            var id = $('#exampleModal7').data('id');
            var id_status = 3; // Define and assign a value to id_status
            console.log("Sending ID:", id, "Status:", id_status);

            // AJAX call to update the status
            $.ajax({
                url: "director_update_status",
                type: "POST",
                data: {
                    id: id,
                    id_status: id_status,
                },
                success: function(response) {
                    if (response.status === "success") {
                        alert("อนุมัติคำร้องเรียบร้อยแล้ว");
                        $('#exampleModal7').modal('hide');
                        // Refresh or update the UI as necessary
                        location.reload(); // or use a more targeted update method
                    } else {
                        alert("เกิดข้อผิดพลาดในการอนุมัติคำร้อง: " + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    alert("เกิดข้อผิดพลาดในการส่งข้อมูล: " + error);
                }
            });
        });

        $("#approveButton2").on('click', function(event) {
            event.preventDefault();

            // Retrieve the id from the appropriate modal
            var id = $('#anotherModalId').data('id'); // Assuming the id is stored in the second modal
            var id_status = 3; // Define and assign a value to id_status
            var Secondary_opinion = $('#Secondary_opinion').val();


            // AJAX call to update the status
            $.ajax({
                url: "director_update_status_1",
                type: "POST",
                data: {
                    id: id,
                    id_status: id_status,
                    Secondary_opinion: Secondary_opinion,
                },
                success: function(response) {
                    // var data = JSON.parse(response);
                    console.log(response);
                    if (response.status === 200) {
                        alert("อัปเดตข้อมูลเรียบร้อย");
                        location.reload();
                    } else {
                        console.log(response);
                        alert("เกิดข้อผิดพลาดในการอัปเดตข้อมูล");
                        location.reload();
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
            var id_status = 5;
            // AJAX call to update the reason and status to "Disapproved"
            $.ajax({
                url: 'director_update_reason', // Adjust the URL as necessary
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

        // Show input field if radio button is checked
        $('input[type="radio"][name="flexRadioDefault"]').change(function() {
            if ($(this).is(":checked")) {
                $('#inputContainer').show();
            }
        });


        $.ajax({
            url: "director_get_subject",
            type: "POST",
            data: {

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
                                return `<button class="btn btn-primary manage-button" data-id="${row.id}" data-petition_id="${row.petition_id}" data-id-status="${row.id_status}">จัดการ</button>`;
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
    });
</script>
<?php include("../footer.php") ?>