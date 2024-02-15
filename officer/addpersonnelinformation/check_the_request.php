<?php include("../../header.php"); ?>
<?php include("../../servers/connect.php"); ?>
<div class="wrapper">
    <?php include('./navbar/sidebar.php'); ?>
    <div class="content-wrapper">
        <?php include('./navbar/navuser.php'); ?>
        <script src="./js/Check_the_request.js"></script>
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
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">ข้อมูลคำร้อง</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn  text-center" data-bs-dismiss="modal" style="background-color: #8B39F4; color: #fcfafa;">อนุมัติ</button>
                        <!-- <button type="button" class="btn "style="background-color: #ff0000; color: #fcfafa;">ไม่อนุมัติ</button> -->
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
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn  text-center" data-bs-dismiss="modal" style="background-color: #8B39F4; color: #fcfafa;">ยืนยัน</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    if (localStorage.getItem("id_type") != "6" && localStorage.getItem("id_user") == null) {
        localStorage.clear()
        window.location.href = "../"
    }


    // $(document).ready(function() {
    //     $.ajax({
    //         url: "get_check_the_request",
    //         type: "POST",
    //         data: {
    //             id_user: localStorage.getItem("id_user")
    //         },
    //         dataType: 'json',
    //         success: function(data) {
    //             console.log(data);
    //             var table = $('#checktherequest').DataTable({
    //                 data: data,
    //                 columns: [{
    //                         data: 'date'
    //                     },
    //                     {
    //                         data: 'petition_name'
    //                     },
    //                     {
    //                         data: 'request_type_name'
    //                     },
    //                     {
    //                         data: 'name_status'
    //                     },
    //                     {
    //                         data: null,
    //                         render: function(data, type, row) {
    //                             return '<button class="btn l" style="background-color:#BB6AFB ; color:#FFFFFF" data-id="#exampleModal">จัดการ</button>';
    //                         }
    //                     }
    //                 ],
    //                 order: [
    //                     [0, 'desc']
    //                 ]
    //             });

    //             // เพิ่มเหตุการณ์เมื่อคลิกที่ปุ่ม "จัดการ" เพื่อเปิด modal
    //             $('#follow_up_on_requests tbody').on('click', 'button', function() {
    //                 var data = table.row($(this).parents('tr')).data();
    //                 var modalId = $(this).attr('data-id');
    //                 $(modalId).modal('show');
    //             });
    //         },
    //         error: function(xhr, status, error) {
    //             console.error(xhr.responseText);
    //         }
    //     });
    // });
</script>
<?php include("../../footer.php") ?>