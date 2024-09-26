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
                            data: 'reason'
                        },
                        {
                            data: null,
                            render: function(data, type, row) {
                                var buttonHtml = '';
                                if (row.id_status == 1 && 8) { // ตรวจสอบเฉพาะเมื่อ id_status เป็น 1
                                    buttonHtml = '<button class="btn btn-danger cancel-button" data-id="' + row.id + '">ยกเลิก</button>';
                                } else if ([4, 5, 6].includes(row.id_status)) { // ตรวจสอบสถานะ 4, 5, หรือ 6 เพื่อแสดงปุ่มดูรายละเอียด
                                    buttonHtml = '<button class="btn btn-primary manage-button" data-id="' + row.id + '">ดูรายละเอียด</button>';
                                }
                                return buttonHtml;
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
    // ตัวอย่างการใช้ event delegation เพื่อผูกเหตุการณ์กับปุ่มที่ถูกเพิ่มหลังจาก DOM ถูกโหลด
    $('#follow_up_on_requests tbody').on('click', '.manage-button', function() {
        var id = $(this).data('id');
        var pdfUrl = 'check_the_request_pdf.php?id=' + id;
        $('#pdfModal iframe').attr('src', pdfUrl);
        $('#pdfModal').modal('show');
    });

    // ยืนยันก่อนทำการยกเลิก
    $(document).on('click', '.cancel-button', function() {
        var id = $(this).data('id'); // รับค่า ID ของคำร้องที่จะยกเลิก

        // ยืนยันก่อนทำการยกเลิก
            $.ajax({
                url: 'cancel_request', // URL ไปยังสคริปต์เซิร์ฟเวอร์ที่จะอัปเดตฐานข้อมูล
                type: 'POST',
                data: {
                    id: id,
                    id_status: 7
                }, // ส่งข้อมูล ID และสถานะใหม่
                success: function(response) {
                    // ทำอะไรก็ตามที่ต้องการหลังจากอัปเดตสำเร็จ, เช่น รีโหลดหน้าหรือแสดงข้อความ
                    Swal.fire({
                        title: "ยกเลิกคำร้องสำเร็จ!",
                        text: response.message,
                        icon: "success",
                        confirmButtonText: "ยืนยัน", // Change the text of the confirmation button
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload(); // Reload the page after confirmation
                        }
                    });
                },
                error: function(xhr, status, error) {
                    // แสดงข้อความผิดพลาดหากมี
                    alert('ไม่สามารถยกเลิกคำร้องได้');
                }
            });
      
    });
</script>

<?php include("../footer.php") ?>