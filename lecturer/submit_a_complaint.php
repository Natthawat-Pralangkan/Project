<?php include("../servers/connect.php"); ?>
<?php include("../header.php"); ?>
<div class="wrapper">
    <?php include('./navbar/sidebar.php'); ?>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <?php include('./navbar/navuser.php'); ?>
        <script src="./js/submit_a_complaint.js"></script>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <h2 class="m-0">ยื่นคำร้อง</h2>
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="./home.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">ยื่นคำร้อง</li>
                    </ol>
                </div>
            </div>
            <a href=""></a>
        </div>
        <div class="content">
            <div class="mt-3">
                <table id="submit_a_complaint" class="table">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ชื่อคำร้อง</th>
                            <th>ประเภท</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#</td>
                            <td>รายงานผลการพานักเรียนไปนอกสถานศึกษา</td>
                            <td>คำร้องวิชาการ</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    เลือก
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#</td>
                            <td>รายงานการเข้าร่วมกิจกรรม</td>
                            <td>คำร้องวิชาการ</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    เลือก
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#</td>
                            <td>รายงานการไม่ลงนามในแบบสำรวจการเรียนการสอน</td>
                            <td>คำร้องวิชาการ</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    เลือก
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#</td>
                            <td>การจัดตารางสอนแทนครูที่ไม่มาปฏิบัติราชการ</td>
                            <td>คำร้องวิชาการ</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    เลือก
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#</td>
                            <td>รายการส่งครูเข้าร่วมสัมมนาอบรม</td>
                            <td>คำร้องวิชาการ</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    เลือก
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#</td>
                            <td>บันทึกการขอแลกเปลี่ยนคาบสอน</td>
                            <td>คำร้องวิชาการ</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    เลือก
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#</td>
                            <td>การยื่นฟอร์มปะหน้า</td>
                            <td>คำร้องวิชาการ</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    เลือก
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#</td>
                            <td>การยื่นแบบสำรวจอัตรากำลังครู</td>
                            <td>คำร้องวิชาการ</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    เลือก
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#</td>
                            <td>การยื่นแบบสำรวจคาบสอนของครูผู้สอน</td>
                            <td>คำร้องวิชาการ</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    เลือก
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#</td>
                            <td>การขออนุญาตผู้บังคับบัญชาพานักเรียนไปนอกสถานศึกษา</td>
                            <td>คำร้องวิชาการ</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    เลือก
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#</td>
                            <td>การขออนุญาตนำนักเรียนเข้าร่วมกิจกรรมในเวลาเรียน</td>
                            <td>คำร้องวิชาการ</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    เลือก
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#</td>
                            <td>การขออนุญาตให้นักเรียนไปโรงเรียนเป็นกรณีพิเศษ</td>
                            <td>คำร้องวิชาการ</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    เลือก
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#</td>
                            <td>การขออนุญาตแลกคุมสอบ</td>
                            <td>คำร้องวิชาการ</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    เลือก
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#</td>
                            <td>การขอแลกคาบสอน</td>
                            <td>คำร้องวิชาการ</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    เลือก
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#</td>
                            <td>การยื่นใบขอเบิกจ่ายค่าพัสดุ</td>
                            <td>คำร้องงบประมาณ</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    เลือก
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#</td>
                            <td>การขออณุญาต ลา คลอด ป่วย กิจ</td>
                            <td>คำร้องงานบุคคล</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    เลือก
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#</td>
                            <td>สามารถตรวจสอบการขออณุญาตลงเวลา ขาด ลา มาสาย</td>
                            <td>คำร้องงานบุคคล</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    เลือก
                                </button>
                            </td>
                        </tr>
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
<?php include("../footer.php") ?>