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
                    <h2 class="m-0">ติดตามคำร้อง</h2>
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="./home.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">ติดตามคำร้อง</li>
                    </ol>
                </div>
            </div>
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
                            <th>เหตุผลไม่ผ่านอนุมัติ/พิจารณา</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="pdfModalLabel">ดูรายละเอียดคำร้อง</h5>
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
    if (localStorage.getItem("id_type") != "6" && localStorage.getItem("user_id") == null) {
        localStorage.clear();
        window.location.href = "../";
    }

    $(document).ready(function() {
        // Fetch petition data via AJAX
        $.ajax({
            url: "get_petition_history",
            type: "POST",
            dataType: 'json',
            success: function(data) {
                // Initialize DataTable
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
                                // Check id_status to apply the same logic as the PHP block
                                if ([2, 3, 4,9,5].includes(rowData.id_status)) {
                                    $(td).addClass("status4").text("ผ่านพิจารณา"); // Status class and text for 'ผ่านพิจารณา'
                                } else if (rowData.id_status == 6) {
                                    $(td).addClass("status6").text("ไม่ผ่านพิจารณา"); // Status class and text for 'ไม่ผ่านพิจารณา'
                                } else if (rowData.id_status == 7) {
                                    $(td).addClass("status7").text("ยกเลิก"); // Status class and text for 'ยกเลิก'
                                } else if (rowData.id_status == 8) {
                                    $(td).addClass("status8").text("รอหัวหน้ากลุ่มสาระพิจารณา"); // Status class and text for 'รอหัวหน้ากลุ่มสาระพิจารณา'
                                } else {
                                    $(td).text(cellData); // Default behavior: show the original name_status
                                }
                            }
                        },

                        {
                            data: 'reason'
                        },
                        {
                            data: null,
                            render: function(data, type, row) {
                                var buttonHtml = '';
                                if ([2, 4, 5, 6, 7, 9].includes(row.id_status)) {
                                    buttonHtml = '<button class="btn btn-primary manage-button" data-id="' + row.id + '">ดูรายละเอียด</button>';
                                }
                                return buttonHtml;
                            }
                        }
                    ],
                    order: [
                        [1, 'DESC']
                    ] // Order by first column (date) in descending order
                });

                // Handle click on manage buttons to open the modal
                $('#follow_up_on_requests tbody').on('click', '.manage-button', function() {
                    var id = $(this).data('id');
                    var pdfUrl = 'check_the_request_pdf.php?id=' + id;
                    window.open(pdfUrl, '_blank');
                    // $('#pdfModal iframe').attr('src', pdfUrl);
                    // $('#pdfModal').modal('show');
                });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
</script>

<?php include("../../footer.php") ?>