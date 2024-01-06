<?php include("../servers/connect.php"); ?>
<?php include("../header.php"); ?>
<div class="wrapper">
    <?php include('./navbar/sidebar.php'); ?>
    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <?php include('./navbar/navuser.php'); ?>
        <script src="./js/check_consider_and_approve_the_request.js"></script>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <h2 class="m-0">ตรวจสอบ/พิจารณา และอนุมัติคำร้อง</h2>
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="./home.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">ตรวจสอบ/พิจารณา และอนุมัติคำร้อง</li>
                    </ol>
                </div>
            </div>
            <a href=""></a>
        </div>
        <div class="mx-3 mt-5">
            <div class="mt-3">
                <table id="check_consider_and_approve_the_request" class="table">
                    <thead>
                        <tr>
                            <th>วันที่ยื่น</th>
                            <th>รายการคำร้อง</th>
                            <th>ชื่อผู้ยื่นคำร้อง</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>12 มกราคม 2567</td>
                        <td>แบบขออนุญาตผู้บังคับบัญชาพานักเรียนไปนอกสถานศึกษา</td>
                        <td>รอการอนุมัติ</td>
                        <td><button class="btn mr-2" style="background-color: #8B39F4; color: #fcfafa;" data-bs-toggle="modal" data-bs-target="#exampleModal">ตรวจสอบ</button>
                        </td>
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
                        <button type="button" class="btn "style="background-color: #ff0000; color: #fcfafa;">ไม่อนุมัติ</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("../footer.php") ?>