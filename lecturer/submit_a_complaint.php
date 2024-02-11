<?php include("../servers/connect.php"); ?>
<?php include("../header.php"); ?>

<div class="wrapper">
    <?php include('./navbar/sidebar.php'); ?>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <?php include('./navbar/navuser.php'); ?>
        <script src="./js/submit_a_complaint.js"></script>
        <!-- รายงานการเข้าร่วมกิจกรรม -->
        <script src="./js/Activity_participation_report.js"></script>
        <!-- รายงานผลการพานักเรียนไปนอกสถานศึกษา -->
        <script src="./js/Report_on_the_results_of_taking_students_outside_of_the_educational_institution.js"></script>
        <!-- แบบรายงานการไม่ลงนามในแบบสำรวจการเรียนการสอน -->
        <script src="./js/Non-signing_report_form_on_teaching_and_learning_survey.js"></script>
        <!-- รายงานการประชุม -->
        <script src="./js/meeting_minutes.js"></script>
        <!-- แบบสำรวจคาบสอนของครูผู้สอน -->
        <script src="./js/Survey_of_teachers_teaching_sessions.js"></script>
        <!-- การขออนุญาตผู้บังคับบัญชาพานักเรียนไปนอกสถานศึกษา -->
        <script src="./js/Requesting_permission_from_supervisors_to take_students_outside_of_the_educational_institution..js"></script>
        <!-- ขออนุญาตนำนักเรียนเข้าร่วมกิจกรรมในเวลาเรียน -->
        <script src="./js/Request_permission_to_bring_students_to_participate_in_activities_during_class_time.js"></script>
        <!-- การขออนุญาตให้นักเรียนไปโรงเรียนเป็นกรณีพิเศษ -->
        <script src="./js/Requesting_permission_for_students_to_go_to_school_in_special_cases.js"></script>

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
                                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal1">
                                    เลือก
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#</td>
                            <td>รายงานการเข้าร่วมกิจกรรม</td>
                            <td>คำร้องวิชาการ</td>
                            <td>
                                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#addactivityparticipationreportModal">
                                    เลือก
                                </button>
                            </td>

                        </tr>
                        <tr>
                            <td>#</td>
                            <td>รายงานการไม่ลงนามในแบบสำรวจการเรียนการสอน</td>
                            <td>คำร้องวิชาการ</td>
                            <td>
                                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal4">
                                    เลือก
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#</td>
                            <td>การจัดตารางสอนแทนครูที่ไม่มาปฏิบัติราชการ</td>
                            <td>คำร้องวิชาการ</td>
                            <td>
                                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#addexampleModal">
                                    เลือก
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#</td>
                            <td>รายงานการประชุม / อบรม / สัมมนา / กิจกรรม / โครงการ / งาน</td>
                            <td>คำร้องวิชาการ</td>
                            <td>
                                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal6">
                                    เลือก
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#</td>
                            <td>ฟอร์มปะหน้า</td>
                            <td>คำร้องวิชาการ</td>
                            <td>
                                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal8">
                                    เลือก
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#</td>
                            <td>แบบสำรวจอัตรากำลังครู</td>
                            <td>คำร้องวิชาการ</td>
                            <td>
                                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal9">
                                    เลือก
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#</td>
                            <td>แบบสำรวจคาบสอนของครูผู้สอน</td>
                            <td>คำร้องวิชาการ</td>
                            <td>
                                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal10">
                                    เลือก
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#</td>
                            <td>ขออนุญาตผู้บังคับบัญชาพานักเรียนไปนอกสถานศึกษา</td>
                            <td>คำร้องวิชาการ</td>
                            <td>
                                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal11">
                                    เลือก
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#</td>
                            <td>ขออนุญาตนำนักเรียนเข้าร่วมกิจกรรมในเวลาเรียน</td>
                            <td>คำร้องวิชาการ</td>
                            <td>
                                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal12">
                                    เลือก
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#</td>
                            <td>ขออนุญาตให้นักเรียนไปโรงเรียนเป็นกรณีพิเศษ</td>
                            <td>คำร้องวิชาการ</td>
                            <td>
                                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal13">
                                    เลือก
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#</td>
                            <td>ขออนุญาตแลกคุมสอบ</td>
                            <td>คำร้องวิชาการ</td>
                            <td>
                                <a type="button" class="btn btn-primary" href="./petition/">เลือก</a>
                            </td>
                        </tr>
                        <tr>
                            <td>#</td>
                            <td>ใบขอเบิกจ่ายค่าพัสดุ</td>
                            <td>คำร้องงบประมาณ</td>
                            <td>
                                <a type="button" class="btn btn-primary" href="./petition/">เลือก</a>
                            </td>
                        </tr>
                        <tr>
                            <td>#</td>
                            <td>ขออณุญาต ลา คลอด ป่วย กิจ</td>
                            <td>คำร้องงานบุคคล</td>
                            <td>
                                <a type="button" class="btn btn-primary" href="./petition/">เลือก</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- รายงานผลการพานักเรียนไปนอกสถานศึกษา -->
            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">รายงานผลการพานักเรียนไปนอกสถานศึกษา</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row ">
                                    <div class="col-6 ">
                                        <div class="form-group ">
                                            <label for="" style="font-size: 18px;">ชื่อคำร้อง</label>
                                            <input type="text" class="form-control mt-2" placeholder="รายงานผลการพานักเรียนไปนอกสถานศึกษา ">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">ชื่อผู้ยื่น</label>
                                            <input type="text" class="form-control mt-2" placeholder="ชื่อผู้ยื่น">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-2">
                                        <div class="form-group ">
                                            <label for="" style="font-size: 18px;">วันที่</label>
                                            <input type="text" class="form-control mt-2" placeholder="วันที่">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">เดือน</label>
                                            <input type="text" class="form-control mt-2" placeholder="เดือน">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">พ.ศ.</label>
                                            <input type="text" class="form-control mt-2" placeholder="พ.ศ.">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">ชื่อสถานที่</label>
                                            <input type="text" class="form-control mt-2" placeholder="ชื่อสถานที่">
                                        </div>
                                    </div>


                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">จำนวนนักเรียน</label>
                                            <input type="text" class="form-control mt-2" placeholder="จำนวนนักเรียน">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">จำนวนครูผู้ควบคุม</label>
                                            <input type="text" class="form-control mt-2" placeholder="ครูผู้ควบคุม">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">เหตุในการไปควบคุม</label>
                                            <textarea name="std_address" required placeholder="เหตุในการไปควบคุม" class="form-control mt-2"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">วันที่เดินทาง</label>
                                            <input type="text" class="form-control mt-2" placeholder="วันที่">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">เดือน</label>
                                            <input type="text" class="form-control mt-2" placeholder="เดือน">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">พ.ศ.</label>
                                            <input type="text" class="form-control mt-2" placeholder="พ.ศ.">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">เวลาเดินทาง</label>
                                            <input type="text" class="form-control mt-2" placeholder="เวลาเดินทาง">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">เส้นทางในการเดินทาง</label>
                                            <textarea name="std_address" required placeholder="เส้นทางในการเดินทาง" class="form-control mt-2"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">พาหนะที่ใช้เดินทาง</label>
                                            <input type="text" class="form-control mt-2" placeholder="พาหนะที่ใช้เดินทาง">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">วันที่เดินทางกลับ</label>
                                            <input type="text" class="form-control mt-2" placeholder="วันที่">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">เดือน</label>
                                            <input type="text" class="form-control mt-2" placeholder="เดือน">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">พ.ศ.</label>
                                            <input type="text" class="form-control mt-2" placeholder="พ.ศ.">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">เวลา</label>
                                            <input type="text" class="form-control mt-2" placeholder="เวลาเดินทาง">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">รายละเอียดการเดินทางครั้งนี้</label>
                                            <textarea name="std_address" required placeholder="รายละเอียดการเดินทางครั้งนี้" class="form-control mt-2"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-6 mt-4">
                                        <div class="host1"></div>
                                        <div class="row justify-content-center form-group ">
                                            <button class="add_fields1 btn btn-primary" style="font-size: 16px;">เพิ่มชื่อครูผู้ควบคุม</button>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class=" text-center">
                                            <button type="submit" class="btn "><a href="../submit_a_complaint.php" class="btn" style="background-color:#BB6AFB ; color:#FFFFFF">บันทึกข้อมูล</a></button>
                                            <button type="submit" class="btn" style="background-color:#FF0505 ; color:#FFFFFF">ยกเลิก</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                            <button type="button" class="btn btn-primary">บันทึก</button>
                        </div> -->
                    </div>
                </div>
            </div>
            <!-- รายงานการเข้าร่วมกิจกรรม -->
            <div class="modal fade" id="addactivityparticipationreportModal" tabindex="-1" aria-labelledby="addactivityparticipationreportModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="addactivityparticipationreportModalLabel">รายงานการเข้าร่วมกิจกรรม</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="addfromactivityparticipationreport" method="POST" action="insteractivityparticipationreport.php">
                                <div class="row ">
                                    <div class="col-6 ">
                                        <div class="form-group ">
                                            <label for="" style="font-size: 18px;">ชื่อคำร้อง</label>
                                            <input type="text" class="form-control mt-2" placeholder="รายงานการเข้าร่วมกิจกรรม"  id="name_from" name="name_from" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">ชื่อผู้ยื่น</label>
                                            <input type="text" class="form-control mt-2" placeholder="ชื่อผู้ยื่น" id="petition_name" name="petition_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-4">
                                        <div class="form-group ">
                                            <label for="" style="font-size: 18px;">กลุ่มสาระการเรียนรู้</label>
                                            <input type="text" class="form-control mt-2" placeholder="กลุ่มสาระการเรียนรู้" id="subject_group" name="subject_group">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">ปีการศึกษา</label>
                                            <input type="text" class="form-control mt-2" placeholder="ปีการศึกษา" id="school_year" name="school_year">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <div class="host2"></div>
                                    <div class="row justify-content-center form-group ">
                                        <button class="add_fields2 btn btn-primary" style="font-size: 16px; width:500px;">เพิ่มรายละเอียดรายงานการเข้าร่วมกิจกรรม</button>
                                    </div>
                                </div>
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                                     <button type="submit" class="btn btn-primary" action="addfromactivityparticipationreport.php">บันทึก</button>
                                </div>
                            </form>
                        </div>
                       
                    </div>
                </div>
            </div>
            <!-- การยื่นฟอร์มปะหน้า -->
            <div class="modal fade" id="exampleModal8" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row mb-3">
                                    <div class="col-4 ">
                                        <div class="form-group ">
                                            <label for="" style="font-size: 18px;">ชื่อคำร้อง</label>
                                            <input type="text" class="form-control mt-2  text-right" placeholder="การยื่นฟอร์มปะหน้า" readonly>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">ชื่อผู้ยื่น</label>
                                            <input type="text" class="form-control mt-2" placeholder="ชื่อผู้ยื่น">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-2">
                                        <div class="form-group ">
                                            <label for="" style="font-size: 18px;">วันที่</label>
                                            <input type="text" class="form-control mt-2" placeholder="วันที่">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">เดือน</label>
                                            <input type="text" class="form-control mt-2" placeholder="เดือน">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">พ.ศ.</label>
                                            <input type="text" class="form-control mt-2" placeholder="พ.ศ.">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">ชื่อเอกสาร พิจารณา</label>
                                            <input type="text" class="form-control mt-2" placeholder="ชื่อเอกสาร พิจารณา">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">กลุ่มบริหาร/กลุ่มสาระฯ/งาน</label>
                                            <input type="text" class="form-control mt-2" placeholder="กลุ่มบริหาร/กลุ่มสาระฯ/งาน">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">ชื่อกิจกรรม</label>
                                            <input type="text" class="form-control mt-2" placeholder="ชือกิจกรรม">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">ตามโครงการ</label>
                                            <input type="text" class="form-control mt-2" placeholder="ตามโครงการ">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-2">
                                        <div class="form-group ">
                                            <label for="" style="font-size: 18px;">วันที่</label>
                                            <input type="text" class="form-control mt-2" placeholder="วันที่">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">เดือน</label>
                                            <input type="text" class="form-control mt-2" placeholder="เดือน">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">พ.ศ.</label>
                                            <input type="text" class="form-control mt-2" placeholder="พ.ศ.">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group ">
                                            <label for="" style="font-size: 18px;">สถานที่</label>
                                            <input type="text" class="form-control mt-2" placeholder="สถานที่">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group ">
                                            <label for="" style="font-size: 18px;">สรุปรายละเอียด</label>
                                            <textarea name="std_address" required placeholder="สรุปรายละเอียด" class="form-control mt-2"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3 mt-3">
                                        <div class=" text-center">
                                            <button type="submit" class="btn " style="background-color:#BB6AFB ; color:#FFFFFF">บันทึกข้อมูล</button>
                                            <button type="submit" class="btn" style="background-color:#FF0505 ; color:#FFFFFF">ยกเลิก</button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- แบบรายงานการไม่ลงนามในแบบสำรวจการเรียนการสอน  -->
            <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">ยื่นคำร้อง</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row ">
                                    <div class="col-6 ">
                                        <div class="form-group ">
                                            <label for="" style="font-size: 18px;">ชื่อคำร้อง</label>
                                            <input type="text" class="form-control mt-2" placeholder="รายงานการไม่ลงนามในแบบสำรวจการเรียนการสอน" readonly>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">ชื่อผู้ยื่น</label>
                                            <input type="text" class="form-control mt-2" placeholder="ชื่อผู้ยื่น">
                                        </div>
                                    </div>
                                    <div class="col-4 mt-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">ระดับชั้นมัธยมศึกษาปีที่</label>
                                            <input type="text" class="form-control mt-2" placeholder="ระดับชั้นมัธยมศึกษาปีที่">
                                        </div>
                                    </div>
                                    <div class="col-4 mt-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">สัปดาห์ที่</label>
                                            <input type="text" class="form-control mt-2" placeholder="สัปดาห์ที่">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <?php
                                    // สมมติว่านี่คืออะเรย์ของวันที่
                                    $dates = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31);
                                    $months = array(
                                        1 => 'มกราคม',
                                        2 => 'กุมภาพันธ์',
                                        3 => 'มีนาคม',
                                        4 => 'เมษายน',
                                        5 => 'พฤษภาคม',
                                        6 => 'มิถุนายน',
                                        7 => 'กรกฎาคม',
                                        8 => 'สิงหาคม',
                                        9 => 'กันยายน',
                                        10 => 'ตุลาคม',
                                        11 => 'พฤศจิกายน',
                                        12 => 'ธันวาคม'
                                    );
                                    ?>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">วันที่</label>
                                            <div class="">
                                                <select name="date" class="form-control mt-2" required>
                                                    <option value="">เลือกวันที่</option>
                                                    <?php
                                                    foreach ($dates as $date) {
                                                        echo "<option value='{$date}'>{$date}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">เดือน</label>
                                            <div class="">
                                                <select name="month" class="form-control mt-2" required>
                                                    <option value="">เลือกเดือน</option>
                                                    <?php
                                                    foreach ($months as $num => $name) {
                                                        echo "<option value='{$num}'>{$name}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">พ.ศ</label>
                                            <input type="text" class="form-control mt-2" placeholder="พ.ศ">

                                        </div>

                                    </div>
                                    <div class="col-1 mt-5">
                                        <h5>ระหว่าง</h5>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">วันที่</label>
                                            <div class="">
                                                <select name="date" class="form-control mt-2" required>
                                                    <option value="">เลือกวันที่</option>
                                                    <?php
                                                    foreach ($dates as $date) {
                                                        echo "<option value='{$date}'>{$date}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">เดือน</label>
                                            <div class="">
                                                <select name="month" class="form-control mt-2" required>
                                                    <option value="">เลือกเดือน</option>
                                                    <?php
                                                    foreach ($months as $num => $name) {
                                                        echo "<option value='{$num}'>{$name}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">พ.ศ</label>
                                            <input type="text" class="form-control mt-2" placeholder="พ.ศ">
                                        </div>
                                    </div>
                                </div>


                                <div class="text-center mt-4">
                                    <div class="host4"></div>
                                    <div class=" justify-content-center form-group ">
                                        <!-- <div class="col-12 col-md-4 col-lg-4"> -->
                                        <!-- <div class="text-center"> -->
                                        <button class="add_fields4 btn btn-primary" style="font-size: 16px; width: 500px;">เพิ่มรายละเอียดไม่ลงนามในแบบสำรวจการเรียนการสอน </button>
                                    </div>
                                    <!-- </div> -->
                                    <!-- </div> -->
                                    <!-- </div> -->
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <div class=" text-center">
                                        <button type="submit" class="btn " style="background-color:#BB6AFB ; color:#FFFFFF">บันทึกข้อมูล</button>
                                        <button type="submit" class="btn" style="background-color:#FF0505 ; color:#FFFFFF">ยกเลิก</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- การจัดตารางสอนแทนครูที่ไม่มาปฏิบัติราชการ -->
            <div class="modal fade" id="addexampleModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">ยื่นคำร้อง การจัดตารางสอนแทนครูที่ไม่มาปฏิบัติราชการ</h1>
                            <span aria-hidden="true">&times;</span>
                        </div>
                        <div class="modal-body">
                        <form id="addfrom" method="POST"  >
                                <div class="row mb-3">
                                    <div class="col-4 ">
                                        <div class="form-group ">
                                            <label for="" style="font-size: 18px;">ชื่อคำร้อง</label>
                                            <input type="text" id="first_name" name="first_name" class="form-control mt-2  text-right" placeholder="การจัดตารางสอนแทนครูที่ไม่มาปฏิบัติราชการ">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">ชื่อผู้ยื่น</label>
                                            <input type="text" id="last_name" name="last_name" class="form-control mt-2" placeholder="ชื่อผู้ยื่น">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">กลุ่มสาระการเรียนรู้</label>
                                            <input type="text" id="Learning" name="Learning" class="form-control mt-2" placeholder="กลุ่มสาระการเรียนรู้">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">ภาคเรียนที่</label>
                                            <input type="text" id="Semester" name="Semester" class="form-control mt-2" placeholder="ภาคเรียนที่">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">ปีการศึกษา</label>
                                            <input type="text"  id="year" name="year" class="form-control mt-2" placeholder="ปีการศึกษา">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer mb-3 mt-3">
                                    <div class=" text-center">
                                        <button type="submit" class="btn " id="addcustomerBtn" style="background-color:#BB6AFB ; color:#FFFFFF">บันทึกข้อมูล</button>
                                        <!-- <button type="submit" class="btn" style="background-color:#FF0505 ; color:#FFFFFF">ยกเลิก</button> -->
                                    </div>
                                </div>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- รายงานการประชุม / อบรม / สัมมนา / กิจกรรม / โครงการ / งาน -->
            <div class="modal fade" id="exampleModal6" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">ยื่นคำร้อง รายงานการประชุม / อบรม / สัมมนา / กิจกรรม / โครงการ / งาน</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row mb-3">
                                    <div class="col-4 ">
                                        <div class="form-group ">
                                            <label for="" style="font-size: 18px;">ชื่อคำร้อง</label>
                                            <input type="text" class="form-control mt-2  text-right" placeholder="รายงานการประชุม/อบรม/สัมมนา/กิจกรรม/โครงการ/งาน" readonly>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">ชื่อผู้ยื่น</label>
                                            <input type="text" class="form-control mt-2" placeholder="ชื่อผู้ยื่น">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">สถานที่</label>
                                            <input type="text" class="form-control mt-2" placeholder="สถานที">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">เรื่อง</label>
                                            <input type="text" class="form-control mt-2" placeholder="เรื่อง">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <?php
                                    $dates1 = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31);
                                    // สร้างอะเรย์ของเดือน
                                    $months1 = array(
                                        1 => 'มกราคม',
                                        2 => 'กุมภาพันธ์',
                                        3 => 'มีนาคม',
                                        4 => 'เมษายน',
                                        5 => 'พฤษภาคม',
                                        6 => 'มิถุนายน',
                                        7 => 'กรกฎาคม',
                                        8 => 'สิงหาคม',
                                        9 => 'กันยายน',
                                        10 => 'ตุลาคม',
                                        11 => 'พฤศจิกายน',
                                        12 => 'ธันวาคม'
                                    );
                                    ?>
                                    <div class="col-2 mt-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">วันที่</label>
                                            <div class="">
                                                <select name="date" class="form-control mt-2" required>
                                                    <option value="">เลือกวันที่</option>
                                                    <?php
                                                    foreach ($dates1 as $date1) {
                                                        echo "<option value='{$date1}'>{$date1}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2 mt-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">เดือน</label>
                                            <div class="">
                                                <select name="month" class="form-control mt-2" required>
                                                    <option value="">เลือกเดือน</option>
                                                    <?php
                                                    foreach ($months1 as $num1 => $name1) {
                                                        echo "<option value='{$num1}'>{$name1}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2 mt-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">พ.ศ.</label>
                                            <input type="text" class="form-control mt-2" placeholder="พ.ศ.">
                                        </div>
                                    </div>
                                    <div class="col-4 mt-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">ผู้จัดงาน</label>
                                            <input type="text" class="form-control mt-2" placeholder="ผู้จัดงาน">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-4 mt-4">
                                        <div class="host5"></div>
                                        <div class="row justify-content-center form-group ">
                                            <button class="add_fields5 btn btn-primary" style="font-size: 16px;">เพิ่มรายชื่อผู้เข้าร่วมงาน</button>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">สรุปผลการเข้าร่วมงาน</label>
                                            <textarea class="form-control" placeholder="สรุปผลการเข้าร่วมงาน" id="floatingTextarea"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <div class=" text-center">
                                        <button type="submit" class="btn " style="background-color:#BB6AFB ; color:#FFFFFF">บันทึกข้อมูล</button>
                                        <button type="submit" class="btn" style="background-color:#FF0505 ; color:#FFFFFF">ยกเลิก</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- แบบสำรวจอัตรากำลังครู -->
            <div class="modal fade" id="exampleModal9" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row mb-3">
                                    <div class="col-4 ">
                                        <div class="form-group ">
                                            <label for="" style="font-size: 18px;">ชื่อคำร้อง</label>
                                            <input type="text" class="form-control mt-2  text-right" placeholder="แบบสำรวจอัตรากำลังครู" readonly>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">ชื่อผู้ยื่น</label>
                                            <input type="text" class="form-control mt-2" placeholder="ชื่อผู้ยื่น">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-4">
                                        <div class="form-group ">
                                            <label for="" style="font-size: 18px;">กลุ่มสาระการเรียนรู้</label>
                                            <input type="text" class="form-control mt-2" placeholder="กลุ่มสาระการเรียนรู้">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">ภาคเรียนที่</label>
                                            <input type="text" class="form-control mt-2" placeholder="ภาคเรียนที่">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">ปีการศึกษา</label>
                                            <input type="text" class="form-control mt-2" placeholder="ปีการศึกษา">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">จำนวนครูปัจจุบัน</label>
                                            <input type="text" class="form-control mt-2" placeholder="จำนวนครูปัจจุบัน">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">จำนวนครูที่เกษียณอายุราชการ</label>
                                            <input type="text" class="form-control mt-2" placeholder="จำนวนครูที่เกษียณอายุราชการ">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-4">
                                        <div class="form-group ">
                                            <label for="" style="font-size: 18px;">จำนวนครูที่ขาด</label>
                                            <input type="text" class="form-control mt-2" placeholder="จำนวนครูที่ขาด">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">เหตุผล</label>
                                            <textarea class="form-control" placeholder="เหตุผล" id="floatingTextarea2" style="height: 100px"></textarea>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group ">
                                            <label for="" style="font-size: 18px;">จำนวนครูที่เกิน</label>
                                            <input type="text" class="form-control mt-2" placeholder="สถานที่">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group ">
                                            <label for="" style="font-size: 18px;">เหตุผล</label>
                                            <textarea name="std_address" required placeholder="เหตุผล" class="form-control mt-2"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group ">
                                            <label for="" style="font-size: 18px;">จำนวนครูที่ขอเพิ่ม</label>
                                            <input type="text" class="form-control mt-2" placeholder="สถานที่">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group ">
                                            <label for="" style="font-size: 18px;">เหตุผล</label>
                                            <textarea name="std_address" required placeholder="เหตุผล" class="form-control mt-2"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3 mt-3">
                                        <div class=" text-center">
                                            <button type="submit" class="btn " style="background-color:#BB6AFB ; color:#FFFFFF">บันทึกข้อมูล</button>
                                            <button type="submit" class="btn" style="background-color:#FF0505 ; color:#FFFFFF">ยกเลิก</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- การยื่นแบบสำรวจคาบสอนของครูผู้สอน -->
            <div class="modal fade" id="exampleModal10" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">แบบสำรวจคาบสอนของครูผู้สอน</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row mb-3">
                                    <div class="col-4 ">
                                        <div class="form-group ">
                                            <label for="" style="font-size: 18px;">ชื่อคำร้อง</label>
                                            <input type="text" class="form-control mt-2  text-right" placeholder="แบบสำรวจคาบสอนของครูผู้สอน" disabled>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">ชื่อผู้ยื่น</label>
                                            <input type="text" class="form-control mt-2" placeholder="ชื่อผู้ยื่น">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-4">
                                        <div class="form-group ">
                                            <label for="" style="font-size: 18px;">กลุ่มสาระการเรียนรู้</label>
                                            <input type="text" class="form-control mt-2" placeholder="กลุ่มสาระการเรียนรู้">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">ภาคเรียนที่</label>
                                            <input type="text" class="form-control mt-2" placeholder="ภาคเรียนที่">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">ปีการศึกษา</label>
                                            <input type="text" class="form-control mt-2" placeholder="ปีการศึกษา">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <!-- <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">สอนวิชาคู่กับครู</label>
                                            <input type="text" class="form-control mt-2" placeholder="จำนวนครูปัจจุบัน">
                                        </div>
                                    </div> -->
                                    <div class="text-center mt-4">
                                        <div class="host6"></div>
                                        <div class=" justify-content-center form-group ">
                                            <button class="add_fields6 btn btn-primary" style="font-size: 16px; width: 500px;">เพิ่มรายละเอียดแบบสำรวจคาบสอน</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-3 mt-3">
                                        <div class=" text-center">
                                            <button type="submit" class="btn " style="background-color:#BB6AFB ; color:#FFFFFF">บันทึกข้อมูล</button>
                                            <button type="submit" class="btn" style="background-color:#FF0505 ; color:#FFFFFF">ยกเลิก</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- การขออนุญาตผู้บังคับบัญชาพานักเรียนไปนอกสถานศึกษา -->
            <div class="modal fade" id="exampleModal11" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content" style="background-color: #F8F8FF;">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">ยื่นคำร้อง การขออนุญาตผู้บังคับบัญชาพานักเรียนไปนอกสถานศึกษา</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row mb-3">
                                    <div class="col-4 ">
                                        <div class="form-group ">
                                            <label for="" style="font-size: 18px;">ชื่อคำร้อง</label>
                                            <input type="text" class="form-control mt-2  text-right" placeholder="การขออนุญาตผู้บังคับบัญชาพานักเรียนไปนอกสถานศึกษา" disabled>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">ชื่อผู้ยื่น</label>
                                            <input type="text" class="form-control mt-2" placeholder="ชื่อผู้ยื่น">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <?php
                                    $dates2 = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31);
                                    // สร้างอะเรย์ของเดือน
                                    $months2 = array(
                                        1 => 'มกราคม',
                                        2 => 'กุมภาพันธ์',
                                        3 => 'มีนาคม',
                                        4 => 'เมษายน',
                                        5 => 'พฤษภาคม',
                                        6 => 'มิถุนายน',
                                        7 => 'กรกฎาคม',
                                        8 => 'สิงหาคม',
                                        9 => 'กันยายน',
                                        10 => 'ตุลาคม',
                                        11 => 'พฤศจิกายน',
                                        12 => 'ธันวาคม'
                                    );
                                    ?>
                                    <div class="col-2 mt-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">วันที่</label>
                                            <div class="">
                                                <select name="date" class="form-control mt-2" required>
                                                    <option value="">เลือกวันที่</option>
                                                    <?php
                                                    foreach ($dates2 as $date2) {
                                                        echo "<option value='{$date2}'>{$date2}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2 mt-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">เดือน</label>
                                            <div class="">
                                                <select name="month" class="form-control mt-2" required>
                                                    <option value="">เลือกเดือน</option>
                                                    <?php
                                                    foreach ($months2 as $num2 => $name2) {
                                                        echo "<option value='{$num2}'>{$name2}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2 mt-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">พ.ศ.</label>
                                            <input type="text" class="form-control mt-2" placeholder="พ.ศ.">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 mt-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">ขออนุญาตนำนักเรียนไป</label>
                                            <input type="text" class="form-control mt-2" placeholder="ขออนุญาตนำนักเรียนไป">
                                        </div>
                                    </div>
                                    <div class="col-2 mt-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">จำนวนนักเรียน</label>
                                            <input type="text" class="form-control mt-2" placeholder="จำนวนนักเรียน">
                                        </div>
                                    </div>
                                    <div class="col-2 mt-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">จำนวนครูผู้ควบคุม</label>
                                            <input type="text" class="form-control mt-2" placeholder="จำนวนครูผู้ควบคุม">
                                        </div>
                                    </div>
                                    <div class="col-4 mt-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">เหตุผลในการไปควบคุม</label>
                                            <textarea class="form-control" placeholder="เหตุผลในการไปควบคุม" id="floatingTextarea2"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-4 mt-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">ชื่อสถานที่</label>
                                            <input type="text" class="form-control mt-2" placeholder="ชื่อสถานที่">
                                        </div>
                                    </div>
                                </div>
                                <h3 class="mt-3  text-center">ออกเดินทาง</h3>
                                <div class="row">
                                    <?php
                                    $dates3 = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31);
                                    // สร้างอะเรย์ของเดือน
                                    $months3 = array(
                                        1 => 'มกราคม',
                                        2 => 'กุมภาพันธ์',
                                        3 => 'มีนาคม',
                                        4 => 'เมษายน',
                                        5 => 'พฤษภาคม',
                                        6 => 'มิถุนายน',
                                        7 => 'กรกฎาคม',
                                        8 => 'สิงหาคม',
                                        9 => 'กันยายน',
                                        10 => 'ตุลาคม',
                                        11 => 'พฤศจิกายน',
                                        12 => 'ธันวาคม'
                                    );
                                    ?>
                                    <div class="col-2 mt-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">วันที่</label>
                                            <div class="">
                                                <select name="date" class="form-control mt-2" required>
                                                    <option value="">เลือกวันที่</option>
                                                    <?php
                                                    foreach ($dates3 as $date3) {
                                                        echo "<option value='{$date3}'>{$date3}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2 mt-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">เดือน</label>
                                            <div class="">
                                                <select name="month" class="form-control mt-2" required>
                                                    <option value="">เลือกเดือน</option>
                                                    <?php
                                                    foreach ($months3 as $num3 => $name3) {
                                                        echo "<option value='{$num3}'>{$name3}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2 mt-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">พ.ศ.</label>
                                            <input type="text" class="form-control mt-2" placeholder="พ.ศ.">
                                        </div>
                                    </div>
                                    <div class="col-2 mt-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">เวลาเดินทาง</label>
                                            <input type="text" class="form-control mt-2" placeholder="เวลาเดินทาง">
                                        </div>
                                    </div>
                                    <div class="col-4 mt-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">เส้นทางในการเดินทาง</label>
                                            <input type="text" class="form-control mt-2" placeholder="เส้นทางในการเดินทาง">
                                        </div>
                                    </div>
                                </div>
                                <h3 class="mt-3  text-center">เดินทางกลับ</h3>
                                <div class="row">
                                    <?php
                                    $dates4 = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31);
                                    // สร้างอะเรย์ของเดือน
                                    $months4 = array(
                                        1 => 'มกราคม',
                                        2 => 'กุมภาพันธ์',
                                        3 => 'มีนาคม',
                                        4 => 'เมษายน',
                                        5 => 'พฤษภาคม',
                                        6 => 'มิถุนายน',
                                        7 => 'กรกฎาคม',
                                        8 => 'สิงหาคม',
                                        9 => 'กันยายน',
                                        10 => 'ตุลาคม',
                                        11 => 'พฤศจิกายน',
                                        12 => 'ธันวาคม'
                                    );
                                    ?>
                                    <div class="col-2 mt-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">วันที่</label>
                                            <div class="">
                                                <select name="date" class="form-control mt-2" required>
                                                    <option value="">เลือกวันที่</option>
                                                    <?php
                                                    foreach ($dates4 as $date4) {
                                                        echo "<option value='{$date4}'>{$date4}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2 mt-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">เดือน</label>
                                            <div class="">
                                                <select name="month" class="form-control mt-2" required>
                                                    <option value="">เลือกเดือน</option>
                                                    <?php
                                                    foreach ($months4 as $num4 => $name4) {
                                                        echo "<option value='{$num4}'>{$name4}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2 mt-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">พ.ศ.</label>
                                            <input type="text" class="form-control mt-2" placeholder="พ.ศ.">
                                        </div>
                                    </div>
                                    <div class="col-2 mt-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">เวลาถึงสถานศึกษา</label>
                                            <input type="text" class="form-control mt-2" placeholder="เวลาถึงสถานศึกษา">
                                        </div>
                                    </div>
                                    <div class="col-4 mt-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">จำนวนเงินค่าใช้จ่ายต่อคน</label>
                                            <input type="text" class="form-control mt-2" placeholder="จำนวนเงินค่าใช้จ่ายต่อคน">
                                        </div>
                                    </div>
                                    <div class=" col-4 text-center mt-3">
                                        <div class="host7"></div>
                                        <div class="row justify-content-center form-group ">
                                            <button class="add_fields7 btn btn-primary" style="font-size: 16px; width:500px;">เพิ่มชื่อครูผู้ควบคุม</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3 mt-3">
                                    <div class=" text-center">
                                        <button type="submit" class="btn " style="background-color:#BB6AFB ; color:#FFFFFF">บันทึกข้อมูล</button>
                                        <button type="submit" class="btn" style="background-color:#FF0505 ; color:#FFFFFF">ยกเลิก</button>
                                    </div>
                                </div>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- ออนุญาตนำนักเรียนเข้าร่วมกิจกรรมในเวลาเรียน -->
            <div class="modal fade" id="exampleModal12" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content" style="background-color: #F8F8FF;">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">ยื่นคำร้อง ขออนุญาตนำนักเรียนเข้าร่วมกิจกรรมในเวลาเรียน</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row mb-3">
                                    <div class="col-4 ">
                                        <div class="form-group ">
                                            <label for="" style="font-size: 18px;">ชื่อคำร้อง</label>
                                            <input type="text" class="form-control mt-2  text-right" placeholder="ขออนุญาตนำนักเรียนเข้าร่วมกิจกรรมในเวลาเรียน" disabled>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">ชื่อผู้ยื่น</label>
                                            <input type="text" class="form-control mt-2" placeholder="ชื่อผู้ยื่น">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <?php
                                    $dates2 = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31);
                                    // สร้างอะเรย์ของเดือน
                                    $months2 = array(
                                        1 => 'มกราคม',
                                        2 => 'กุมภาพันธ์',
                                        3 => 'มีนาคม',
                                        4 => 'เมษายน',
                                        5 => 'พฤษภาคม',
                                        6 => 'มิถุนายน',
                                        7 => 'กรกฎาคม',
                                        8 => 'สิงหาคม',
                                        9 => 'กันยายน',
                                        10 => 'ตุลาคม',
                                        11 => 'พฤศจิกายน',
                                        12 => 'ธันวาคม'
                                    );
                                    ?>
                                    <div class="col-2 mt-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">วันที่</label>
                                            <div class="">
                                                <select name="date" class="form-control mt-2" required>
                                                    <option value="">เลือกวันที่</option>
                                                    <?php
                                                    foreach ($dates2 as $date2) {
                                                        echo "<option value='{$date2}'>{$date2}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2 mt-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">เดือน</label>
                                            <div class="">
                                                <select name="month" class="form-control mt-2" required>
                                                    <option value="">เลือกเดือน</option>
                                                    <?php
                                                    foreach ($months2 as $num2 => $name2) {
                                                        echo "<option value='{$num2}'>{$name2}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2 mt-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">พ.ศ.</label>
                                            <input type="text" class="form-control mt-2" placeholder="พ.ศ.">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 mt-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">ชื่อกิจกรรม งาน/โครงการ</label>
                                            <input type="text" class="form-control mt-2" placeholder="ชื่อกิจกรรม งาน/โครงการ">
                                        </div>
                                    </div>
                                    <div class="col-4 mt-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">เหตุผลในการนำเข้า</label>
                                            <textarea class="form-control" placeholder="เหตุผลในการนำเข้า" id="floatingTextarea2"></textarea>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <?php
                                    $dates3 = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31);
                                    // สร้างอะเรย์ของเดือน
                                    $months3 = array(
                                        1 => 'มกราคม',
                                        2 => 'กุมภาพันธ์',
                                        3 => 'มีนาคม',
                                        4 => 'เมษายน',
                                        5 => 'พฤษภาคม',
                                        6 => 'มิถุนายน',
                                        7 => 'กรกฎาคม',
                                        8 => 'สิงหาคม',
                                        9 => 'กันยายน',
                                        10 => 'ตุลาคม',
                                        11 => 'พฤศจิกายน',
                                        12 => 'ธันวาคม'
                                    );
                                    ?>
                                    <div class="col-2 mt-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">วันที่</label>
                                            <div class="">
                                                <select name="date" class="form-control mt-2" required>
                                                    <option value="">เลือกวันที่</option>
                                                    <?php
                                                    foreach ($dates3 as $date3) {
                                                        echo "<option value='{$date3}'>{$date3}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2 mt-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">เดือน</label>
                                            <div class="">
                                                <select name="month" class="form-control mt-2" required>
                                                    <option value="">เลือกเดือน</option>
                                                    <?php
                                                    foreach ($months3 as $num3 => $name3) {
                                                        echo "<option value='{$num3}'>{$name3}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2 mt-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">พ.ศ.</label>
                                            <input type="text" class="form-control mt-2" placeholder="พ.ศ.">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class=" col-12mt-3">
                                        <div class="host8"></div>
                                        <div class="row justify-content-center form-group ">
                                            <button class="add_fields8 btn btn-primary" style="font-size: 16px; width:500px;">เพิ่มรายชื่อนักเรียน</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3 mt-3">
                                    <div class=" text-center">
                                        <button type="submit" class="btn " style="background-color:#BB6AFB ; color:#FFFFFF">บันทึกข้อมูล</button>
                                        <button type="submit" class="btn" style="background-color:#FF0505 ; color:#FFFFFF">ยกเลิก</button>
                                    </div>
                                </div>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- การขออนุญาตให้นักเรียนไปโรงเรียนเป็นกรณีพิเศษ -->
            <div class="modal fade" id="exampleModal13" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row mb-3">
                                    <div class="col-4 ">
                                        <div class="form-group ">
                                            <label for="" style="font-size: 18px;">ชื่อคำร้อง</label>
                                            <input type="text" class="form-control mt-2  text-right" placeholder="การยื่นฟอร์มปะหน้า" readonly>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">ชื่อผู้ยื่น</label>
                                            <input type="text" class="form-control mt-2" placeholder="ชื่อผู้ยื่น">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-2">
                                        <div class="form-group ">
                                            <label for="" style="font-size: 18px;">วันที่</label>
                                            <input type="text" class="form-control mt-2" placeholder="วันที่">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">เดือน</label>
                                            <input type="text" class="form-control mt-2" placeholder="เดือน">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">พ.ศ.</label>
                                            <input type="text" class="form-control mt-2" placeholder="พ.ศ.">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">โรงเรียนมีความประสงค์</label>
                                            <input type="text" class="form-control mt-2" placeholder="ที่">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">นักเรียนชั้น</label>
                                            <input type="text" class="form-control mt-2" placeholder="ชื่อ-นามสกุล">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">ห้อง</label>
                                            <input type="text" class="form-control mt-2" placeholder="ตำแหน่ง">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">เหตุผล</label>
                                            <input type="text" class="form-control mt-2" placeholder="เหตุผล">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-2">
                                        <div class="form-group ">
                                            <label for="" style="font-size: 18px;">วันที่</label>
                                            <input type="text" class="form-control mt-2" placeholder="วันที่">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">เดือน</label>
                                            <input type="text" class="form-control mt-2" placeholder="เดือน">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">พ.ศ.</label>
                                            <input type="text" class="form-control mt-2" placeholder="พ.ศ.">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">เวลา</label>
                                            <input type="text" class="form-control mt-2" placeholder="เวลา">
                                        </div>
                                    </div>
                                    <div class="col-1 mt-5">
                                        <h5>ถึง</h5>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">เวลา</label>
                                            <input type="text" class="form-control mt-2" placeholder="เวลา">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group ">
                                            <label for="" style="font-size: 18px;">จำนวนครูผู้ดูแล</label>
                                            <input type="text" class="form-control mt-2" placeholder="จำนวนครูผู้ดูแล">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group ">
                                            <label for="" style="font-size: 18px;">สถานที่ส่งเอกสาร</label>
                                            <input type="text" class="form-control mt-2" placeholder="สถานที่ส่งเอกสาร">
                                        </div>
                                    </div>
                                </div>
                                <div class=" mt-3">
                                    <div class="host9"></div>
                                    <div class="row justify-content-center form-group ">
                                        <button class="add_fields9 btn btn-primary" style="font-size: 16px; width:500px;">เพิ่มรายชื่อครูผู้ดูแล</button>
                                    </div>
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <div class=" text-center">
                                        <button type="submit" class="btn " style="background-color:#BB6AFB ; color:#FFFFFF">บันทึกข้อมูล</button>
                                        <button type="submit" class="btn" style="background-color:#FF0505 ; color:#FFFFFF">ยกเลิก</button>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>
</div>


</div>
</div>

<?php include("../footer.php") ?>