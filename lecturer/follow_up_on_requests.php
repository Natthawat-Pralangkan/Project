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
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
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
                    columns: [
                        { data: 'date' },
                        { data: 'petition_name' },
                        { data: 'request_type_name' },
                        { data: 'name_status' },
                        { 
                            data: null,
                            render: function(data, type, row) {
                                return '<button class="btn l" style="background-color:#BB6AFB ; color:#FFFFFF" data-id="#exampleModal">จัดการ</button>';
                            }
                        }
                    ]
                    ,order: [[0, 'desc']]
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
</script>

<?php include("../footer.php") ?>