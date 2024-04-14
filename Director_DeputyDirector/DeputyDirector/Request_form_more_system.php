<?php include("../../servers/connect.php"); ?>
<?php include("../../header.php"); ?>
<div class="wrapper">
    <?php include('./navbar/sidebar.php'); ?>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <?php include('./navbar/navuser.php'); ?>
        <script src="./js/Request_a_time_entry_and_exit_report.js"></script>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <h2 class="m-0">ตรวจสอบ/พิจารณาและอนุมัติคำร้อง จากงานทะเบียน</h2>
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="./home.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">ตรวจสอบ/พิจารณาและอนุมัติคำร้อง จากงานทะเบียน</li>
                    </ol>
                </div>
            </div>
            <a href=""></a>
        </div>
        <div class="mt-5 mx-3">
            <div class=" mt-3">
                <table id="myTable" class="table">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>วัน-เดือน-ปี</th>
                            <th>หมายเลขคำร้อง</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal fade" id="setshowpdf" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <button class="btn mr-2" id="confirmDisapproval" style="background-color: #ff0000; color: #fcfafa;" data-bs-toggle="modal" data-bs-target="#exampleModal1">ไม่อนุมัติ</button>
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
        $.ajax({
            url: "http://localhost/api/reg_data",
            type: "POST",
            data: {
                function: "sendrequesttotis"
            },
            success: function(data) {
                var number = 1; // เริ่มต้นจาก 1
                console.log(data);
                var datas = JSON.parse(data)
                var table = $('#myTable').DataTable({
                    data: datas,
                    columns: [{
                            data: null,
                            render: function(data, type, row) {
                                return number++;
                            }
                        },
                        {
                            data: 'request_create' // ใช้ key ที่ตรงกับข้อมูลที่ต้องการแสดง
                        },
                        {
                            data: 'id_create' // ใช้ key ที่ตรงกับข้อมูลที่ต้องการแสดง
                        },
                        {
                            data: null,
                            render: function(data, type, row) {
                                return `<button class="btn btn-primary showpdf" data-id="${row.request_id}">จัดการ</button>`;
                            }
                        }
                    ],

                });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
        $(document).on('click', '.showpdf', function() {
            var id = $(this).data("id");
            var url = "http://localhost/api/student_data";
            console.log(id);
            var pdfUrl = url + '?function=preview_request_pdf&request_id=' + id;
            $('#pdfViewer1').attr('src', pdfUrl); // For other IDs
            $('#setshowpdf').data('id', id).modal('show');
        });


        $("#approveButton").on('click', function(event) {
            event.preventDefault();
            var id = $('#setshowpdf').data('id');
            console.log("Sending ID:", id, "Status:", id_status);
            var url = "http://localhost/api/reg_data";
            // AJAX call to update the status
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    function: "appoved_fromtis",
                    request_id: id,
                    status: 1
                },
                success: function(response) {
                    if (response.status === "success") {
                        alert("อนุมัติคำร้องเรียบร้อยแล้ว");
                        $('#setshowpdf').modal('hide');
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

        $('#confirmDisapproval').click(function() {
            var id = $('#hiddenIdField').val(); // Retrieve the id
            var url = "http://localhost/api/reg_data";
            // var id = $(this).data("id");
            // AJAX call to update the reason and status to "Disapproved"
            $.ajax({
                url: url, // Adjust the URL as necessary
                type: 'POST', // Make sure this is POST
                data: {
                    function: "appoved_fromtis",
                    request_id: id,
                    status: 0
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
    });
</script>
<?php include("../../footer.php") ?>