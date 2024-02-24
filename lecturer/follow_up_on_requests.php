<?php include("../servers/connect.php"); ?>
<?php include("../header.php"); ?>
<div class="wrapper">
    <?php include('./navbar/sidebar.php'); ?>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <?php include('./navbar/navuser.php'); ?>
        <!-- <script src="./js/follow_up_on_requests.js"></script> -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <h2 class="m-0">ติดตามคำร้อง</h2>
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="./home.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">ติดตามคำร้อง</li>
                    </ol>
                </div>
            </div>
            <a href=""></a>
        </div>
        <div class="content">
            <div class="mt-3">
                <table id="follow_up_on_requests" class="table">
                    <thead>
                        <tr>
                            <th>วันที่ยื่นคำร้อง</th>
                            <th>ชื่อคำร้อง</th>
                            <th>ประเภท</th>
                            <th>สถานะ</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl  modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="pdfModalLabel">PDF Title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <iframe src="" frameborder="0" style="width:100%; height:500px;"></iframe>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
        $.ajax({
            url: "get_follw",
            type: "POST",
            data: {
                user_id: localStorage.getItem("user_id")
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
                var table = $('#follow_up_on_requests').DataTable({
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
                                }
                            },
                        },
                        {
                            data: null,
                            render: function(data, type, row) {
                                return '<button class="btn btn-primary manage-button" data-id="' + row.id + '">จัดการ</button>';
                            }
                        }
                    ],
                    order: [
                        [0, 'desc']
                    ]
                });

                // เพิ่มเหตุการณ์เมื่อคลิกที่ปุ่ม "จัดการ" เพื่อเปิด modal
                $('#follow_up_on_requests tbody').on('click', 'button', function() {
                    var data = table.row($(this).parents('tr')).data();
                    var modalId = $(this).attr('data-id');
                    $(modalId).modal('show');
                });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
    $('#follow_up_on_requests tbody').on('click', '.manage-button', function() {
        var id = $(this).data('id');
        console.log(id); // Debugging line to check the id
        var pdfUrl = 'check_the_request_pdf.php?id=' + id;

        $('#pdfModal iframe').attr('src', pdfUrl);
        $('#pdfModal').modal('show');
    });
</script>

<?php include("../footer.php") ?>