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
            <!-- ฟิลเตอร์การกรอง -->
            <div class="filter-container p-3 bg-light rounded mb-4 shadow-sm">
                <div class="row gy-3">
                    <div class="col-md-4">
                        <label for="filterType" class="form-label">ประเภท</label>
                        <select id="filterType" class="form-select">
                            <option value="">ทั้งหมด</option>
                            <option value="1">คำร้องวิชาการ</option>
                            <option value="2">คำร้องทั่วไป</option>
                            <option value="3">คำร้องงบประมาณ</option>
                            <option value="4">คำร้องบุคคล</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="filterStatus" class="form-label">สถานะ</label>
                        <select id="filterStatus" class="form-select">
                            <option value="">ทั้งหมด</option>
                            <option value="1">รอพิจารณา</option>
                            <option value="2">รอรองผู้อำนวยการพิจารณา</option>
                            <option value="3">รอผู้อำนวยการพิจารณา</option>
                            <option value="4">อนุมัติแล้ว</option>
                            <option value="5">ไม่อนุมัติ</option>
                            <option value="6">ไม่ผ่านพิจารณา</option>
                            <option value="7">ยกเลิก</option>
                            <option value="8">รอหัวหน้ากลุ่มสาระพิจารณา</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="filterDate" class="form-label">ช่วงวันที่</label>
                        <div class="d-flex gap-2">
                            <input type="date" id="filterStartDate" class="form-control">
                            <input type="date" id="filterEndDate" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <!-- ตารางข้อมูล -->
            <div class="table-responsive">
                <table id="follow_up_on_requests" class="table table-striped table-hover align-middle">
                    <thead class="table">
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
<script>
    if (localStorage.getItem("id_type") != "7" && localStorage.getItem("user_id") == null) {
        localStorage.clear()
        window.location.href = "../"
    }
    $(document).ready(function() {
    // ฟังก์ชันเพื่อโหลดข้อมูลในตารางพร้อมการกรอง
    function loadTableData() {
        $.ajax({
            url: "get_petition_history",
            type: "POST",
            data: {
                user_id: localStorage.getItem("user_id"),
                filterType: $('#filterType').val(),
                filterStatus: $('#filterStatus').val(),
                startDate: $('#filterStartDate').val(),
                endDate: $('#filterEndDate').val()
            },
            dataType: 'json',
            success: function(data) {
                $('#follow_up_on_requests').DataTable().clear().destroy();
                $('#follow_up_on_requests').DataTable({
                    data: data,
                    columns: [
                        { data: 'date' },
                        { data: 'petition_name' },
                        { data: 'request_type_name' },
                        {
                            data: 'name_status',
                            createdCell: function(td, cellData, rowData) {
                                $(td).addClass("status" + rowData.id_status);
                            },
                        },
                        { data: 'reason' },
                        {
                            data: null,
                            render: function(data, type, row) {
                                return (row.id_status > 3)
                                    ? '<button class="btn btn-primary manage-button" data-id="' + row.id + '">ดูรายละเอียด</button>'
                                    : '';
                            }
                        }
                    ],
                    order: [[0, 'desc']]
                });

                $('#follow_up_on_requests tbody').on('click', '.manage-button', function() {
                    var id = $(this).data('id');
                    var pdfUrl = 'check_the_request_pdf.php?id=' + id;
                    window.open(pdfUrl, '_blank');
                });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    // เรียกฟังก์ชัน loadTableData เมื่อค่าฟิลเตอร์เปลี่ยน
    $('#filterType, #filterStatus, #filterStartDate, #filterEndDate').on('change input', function() {
        loadTableData();
    });

    // โหลดข้อมูลครั้งแรกเมื่อเริ่มต้น
    loadTableData();
});
</script>

<?php include("../footer.php") ?>