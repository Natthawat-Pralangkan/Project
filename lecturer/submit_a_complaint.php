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
        <script src="./js/Requesting_permission_from_supervisors_to take_students_outside_of_the_educational_institution.js"></script>
        <!-- ขออนุญาตนำนักเรียนเข้าร่วมกิจกรรมในเวลาเรียน -->
        <script src="./js/Request_permission_to_bring_students_to_participate_in_activities_during_class_time.js"></script>
        <!-- การขออนุญาตให้นักเรียนไปโรงเรียนเป็นกรณีพิเศษ -->
        <script src="./js/Requesting_permission_for_students_to_go_to_school_in_special_cases.js"></script>
        <script src="./js/Submitting_a_cover_form.js"></script>
        <script src="./js/inster.js"></script>
        <script src="./js/Request_permission_to_leave.js"></script>

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
                        <?php
                        // คำสั่ง SQL เพื่อดึงข้อมูล
                        $sql = "SELECT *FROM `petition_name`LEFT JOIN `petition_type` ON `petition_name`.`id_petition` = `petition_type`.`id`
                        WHERE `petition_name`.`id_petition` IN (1, 2, 3, 4) ;";
                        $result = $db->prepare($sql);
                        $result->execute();
                        // ตรวจสอบว่ามีข้อมูลในฐานข้อมูลหรือไม่

                        // เลือกข้อมูลรายการแรกเท่านั้น
                        $row = $result->fetchAll(PDO::FETCH_ASSOC);
                        $key = 1;
                        $keynew = 1;
                        foreach ($row as $keyall) {
                            echo "<tr>";
                            echo "<td>" . $key++ . "</td>";
                            echo "<td>" . $keyall['petition_name'] . "</td>";
                            echo "<td>" . $keyall['request_type_name'] . "</td>";
                            echo "<td>";
                            echo "<button type='submit' class='btn ' style='background-color:#BB6AFB ; color:#FFFFFF' data-bs-toggle='modal' data-bs-target='#exampleModal" . $keynew++ . "'>เลือก</button> ";
                            echo "</td>";
                            echo "</tr>";
                        }



                        ?>
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
                            <input type="hidden" name="" id="id_from" value="1">
                            <div class="row mt-2">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">กลุ่มสาระการเรียนรู้</label>
                                        <select class="form-select mt-2" id="id_subject_group" name="id_subject_group">
                                            <option value="">เลือกกลุ่มสาระการเรียนรู้</option>
                                            <option value="1">กลุ่มสาระการเรียนรู้ภาษาไทย</option>
                                            <option value="2">กลุ่มสาระการเรียนรู้คณิตศาสตร์</option>
                                            <option value="3">กลุ่มสาระการเรียนรู้วิทยาศาตร์</option>
                                            <option value="4">กลุ่มสาระการเรียนรู้การงานอาชีพ</option>
                                            <option value="5">กลุ่มสาระการเรียนรู้สุขศึกษา</option>
                                            <option value="6">กลุ่มสาระการเรียนรู้สังคมศึกษา</option>
                                            <option value="7">กลุ่มสาระการเรียนรู้ภาษาต่างประเทศ</option>
                                            <option value="8">กลุ่มสาระการเรียนรู้ศิลปะ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">ชื่อสถานที่</label>
                                        <input type="text" class="form-control mt-2" id="school_name" name="school_name" placeholder="ชื่อสถานที่">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">ณ.</label>
                                        <input type="text" class="form-control mt-2" id="school_name1" name="school_name1" placeholder="ณ">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">จำนวนนักเรียน</label>
                                        <input type="text" class="form-control mt-2" id="student_total" name="student_total" placeholder="จำนวนนักเรียน">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">จำนวนครูผู้ควบคุม</label>
                                        <input type="text" class="form-control mt-2" id="teacher_total" name="teacher_total" placeholder="ครูผู้ควบคุม">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">เหตุในการไปควบคุม</label>
                                        <textarea name="std_address" required placeholder="เหตุในการไปควบคุม" id="reason_controlling" class="form-control mt-2"></textarea>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">วันที่เดินทาง</label>
                                        <input type="date" class="form-control mt-2" id="date_travel" name="date_travel" placeholder="วันที่">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">เวลาเดินทาง</label>
                                        <input type="text" class="form-control mt-2" id="time1" name="time1" placeholder="เวลาเดินทาง">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">พาหนะที่ใช้เดินทาง</label>
                                        <input type="text" class="form-control mt-2" id="trave_vehicle" name="trave_vehicle" placeholder="พาหนะที่ใช้เดินทาง">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">เส้นทางในการเดินทาง</label>
                                        <textarea name="std_address" required placeholder="เส้นทางในการเดินทาง" id="travel_route" class="form-control mt-2"></textarea>
                                    </div>
                                </div>

                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">วันที่เดินทางกลับ</label>
                                        <input type="date" class="form-control mt-2" id="travel_back" name="travel_back">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">เวลาเดินทางกลับ</label>
                                        <input type="text" class="form-control mt-2" id="time2" name="time2" placeholder="เวลาเดินทางกลับ">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">รายละเอียดการเดินทางครั้งนี้</label>
                                        <textarea name="std_address" required placeholder="รายละเอียดการเดินทางครั้งนี้" id="details_of_this_trip" class="form-control mt-2"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mt-4">
                                    <div class="host1"></div>
                                    <div class="text-center form-group mt-3 ">
                                        <button class="add_fields1 btn btn-primary" style="font-size: 16px;">เพิ่มชื่อครูผู้ควบคุม</button>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group mb-3 mt-3">
                                <div class=" text-center">
                                    <button type="submit" class="btn " id="server_report" style="background-color:#BB6AFB ; color:#FFFFFF">บันทึกข้อมูล</button>
                                    <button type="submit" class="btn" style="background-color:#FF0505 ; color:#FFFFFF">ยกเลิก</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- รายงานการเข้าร่วมกิจกรรม -->
            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="addactivityparticipationreportModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="addactivityparticipationreportModalLabel">รายงานการเข้าร่วมกิจกรรม</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="" id="id_from" value="2">
                            <div class="row mt-2">
                                <div class="col-4">
                                    <div class="form-group ">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">กลุ่มสาระการเรียนรู้</label>
                                            <select class="form-select mt-2" id="id_subject_group_2" name="id_subject_group_2">
                                                <option value="">เลือกกลุ่มสาระการเรียนรู้</option>
                                                <option value="8">กลุ่มสาระการเรียนรู้ภาษาไทย</option>
                                                <option value="9">กลุ่มสาระการเรียนรู้คณิตศาสตร์</option>
                                                <option value="10">กลุ่มสาระการเรียนรู้วิทยาศาตร์</option>
                                                <option value="11">กลุ่มสาระการเรียนรู้การงานอาชีพ</option>
                                                <option value="12">กลุ่มสาระการเรียนรู้สุขศึกษา</option>
                                                <option value="13">กลุ่มสาระการเรียนรู้สังคมศึกษา</option>
                                                <option value="14">กลุ่มสาระการเรียนรู้ภาษาต่างประเทศ</option>
                                                <option value="15">กลุ่มสาระการเรียนรู้ศิลปะ</option>
                                            </select>
                                        </div>
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
                                <button type="submit" class="btn btn-primary" id="saveform">บันทึก</button>
                            </div>
                            <!-- </form> -->
                        </div>

                    </div>
                </div>
            </div>
            <!-- การยื่นฟอร์มปะหน้า -->
            <div class="modal fade" id="exampleModal6" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">ฟอร์มปะหน้า</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="" id="id_from" value="3">
                            <div class="row mt-2">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">ชื่อเอกสาร พิจารณา</label>
                                        <input type="text" class="form-control mt-2" id="document_name_consider" name="document_name_consider" placeholder="ชื่อเอกสาร พิจารณา">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <!-- <div class="form-group">
                                        <label for="" style="font-size: 18px;">กลุ่มบริหาร/กลุ่มสาระฯ/งาน</label>
                                        <input type="text" class="form-control mt-2" id="subject_group_1" name="subject_group_1" placeholder="กลุ่มบริหาร/กลุ่มสาระฯ/งาน">
                                    </div> -->
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">กลุ่มสาระการเรียนรู้</label>
                                        <select class="form-select mt-2" id="id_subject_group_10" name="id_subject_group_10">
                                            <option value="">เลือกกลุ่มสาระการเรียนรู้</option>
                                            <option value="3">กลุ่มสาระการเรียนรู้ภาษาไทย</option>
                                            <option value="4">กลุ่มสาระการเรียนรู้คณิตศาสตร์</option>
                                            <option value="5">กลุ่มสาระการเรียนรู้วิทยาศาตร์</option>
                                            <option value="6">กลุ่มสาระการเรียนรู้การงานอาชีพ</option>
                                            <option value="7">กลุ่มสาระการเรียนรู้สุขศึกษา</option>
                                            <option value="8">กลุ่มสาระการเรียนรู้สังคมศึกษา</option>
                                            <option value="9">กลุ่มสาระการเรียนรู้ภาษาต่างประเทศ</option>
                                            <option value="10">กลุ่มสาระการเรียนรู้ศิลปะ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">ชื่อกิจกรรม</label>
                                        <input type="text" class="form-control mt-2" id="activity_name" name="activity_name" placeholder="ชือกิจกรรม">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">ตามโครงการ</label>
                                        <input type="text" class="form-control mt-2" id="according_project" name="according_project" placeholder="ตามโครงการ">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-2">
                                    <div class="form-group ">
                                        <label for="" style="font-size: 18px;">วันที่</label>
                                        <input type="date" class="form-control mt-2 " id="date_activity" name="date_activity" placeholder="วันที่">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group ">
                                        <label for="" style="font-size: 18px;">สถานที่</label>
                                        <input type="text" class="form-control mt-2" id="activity_where" name="activity_where" placeholder="สถานที่">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group ">
                                        <label for="" style="font-size: 18px;">สรุปรายละเอียด</label>
                                        <textarea name="std_address" required placeholder="สรุปรายละเอียด" id="summary_details" class="form-control mt-2"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">พิจารณา</label>
                                        <select class="form-select mt-2" id="memo_id" name="memo_id">
                                            <option value="0">เลือกพิจารณา</option>
                                            <option value="1">อนุญาต</option>
                                            <option value="2">อนุมัติ</option>
                                            <option value="3">เห็นชอบ</option>
                                            <option value="4">ลงนาม</option>
                                            <option value="5">สั่ง</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group ">
                                        <label for="" style="font-size: 18px;">ละเอียดพิจารณา</label>
                                        <textarea name="save_message" required placeholder="สรุปรายละเอียด" id="save_message" class="form-control mt-2"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3 mt-3">
                                <div class=" text-center">
                                    <button type="submit" class="btn " id="server_from" style="background-color:#BB6AFB ; color:#FFFFFF">บันทึกข้อมูล</button>
                                    <button type="submit" class="btn" style="background-color:#FF0505 ; color:#FFFFFF">ยกเลิก</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- แบบรายงานการไม่ลงนามในแบบสำรวจการเรียนการสอน  -->
            <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">แบบรายงานการไม่ลงนามในแบบสำรวจการเรียนการสอน</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="" id="id_from" value="4">
                            <div class="row ">
                                <div class="col-4 mt-3">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">ระดับชั้นมัธยมศึกษาปีที่</label>
                                        <input type="text" class="form-control mt-2" placeholder="ระดับชั้นมัธยมศึกษาปีที่" id="level" name="level">
                                    </div>
                                </div>
                                <div class="col-4 mt-3">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">สัปดาห์ที่</label>
                                        <input type="text" class="form-control mt-2" placeholder="สัปดาห์ที่" id="teach_week" name="teach_week">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">

                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">วันที่สอนตั้งแต่</label>
                                        <input type="date" class="form-control mt-2" id="date_teach_start" name="date_teach_start">
                                    </div>
                                </div>
                                <div class="col-1 mt-5">
                                    <h5>ระหว่าง</h5>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">วันที่สอนถึง</label>
                                        <input type="date" class="form-control mt-2" id="date_teach_end" name="date_teach_end">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <div class="host4"></div>
                                <div class=" justify-content-center form-group ">
                                    <button class="add_fields4 btn btn-primary" style="font-size: 16px; width: 500px;">เพิ่มรายละเอียดไม่ลงนามในแบบสำรวจการเรียนการสอน </button>
                                </div>

                            </div>
                            <div class="form-group mb-3 mt-3">
                                <div class=" text-center">
                                    <button type="submit" class="btn " id="server_non" style="background-color:#BB6AFB ; color:#FFFFFF">บันทึกข้อมูล</button>
                                    <button type="submit" class="btn" style="background-color:#FF0505 ; color:#FFFFFF">ยกเลิก</button>
                                </div>
                            </div>

                            <!-- </form> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- การจัดตารางสอนแทนครูที่ไม่มาปฏิบัติราชการ -->
            <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">การจัดตารางสอนแทนครูที่ไม่มาปฏิบัติราชการ</h1>
                            <!-- <span aria-hidden="true">&times;</span> -->
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="" id="id_from" value="5">
                            <div class="row mt-2">
                                <div class="col-4">
                                    <!-- <div class="form-group">
                                        <label for="" style="font-size: 18px;">กลุ่มสาระการเรียนรู้</label>
                                        <input type="text" id="subject_group_4" name="subject_group_4" class="form-control mt-2" placeholder="กลุ่มสาระการเรียนรู้">
                                    </div> -->
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">กลุ่มสาระการเรียนรู้</label>
                                        <select class="form-select mt-2" id="id_subject_group_7" name="id_subject_group_7">
                                            <option value="">เลือกกลุ่มสาระการเรียนรู้</option>
                                            <option value="8">กลุ่มสาระการเรียนรู้ภาษาไทย</option>
                                            <option value="9">กลุ่มสาระการเรียนรู้คณิตศาสตร์</option>
                                            <option value="10">กลุ่มสาระการเรียนรู้วิทยาศาตร์</option>
                                            <option value="11">กลุ่มสาระการเรียนรู้การงานอาชีพ</option>
                                            <option value="12">กลุ่มสาระการเรียนรู้สุขศึกษา</option>
                                            <option value="13">กลุ่มสาระการเรียนรู้สังคมศึกษา</option>
                                            <option value="14">กลุ่มสาระการเรียนรู้ภาษาต่างประเทศ</option>
                                            <option value="15">กลุ่มสาระการเรียนรู้ศิลปะ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">ภาคเรียนที่</label>
                                        <input type="text" id="semester" name="semester" class="form-control mt-2" placeholder="ภาคเรียนที่">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">ปีการศึกษา</label>
                                        <input type="text" id="school_year_4" name="school_year_4" class="form-control mt-2" placeholder="ปีการศึกษา">
                                    </div>
                                </div>
                            </div>
                            <div class=" mt-3">
                                <div class="mt-4">
                                    <div class="host15"></div>
                                    <div class=" text-center form-group mt-3 ">
                                        <button class="add_fields15 btn btn-primary" style="font-size: 16px;">เพิ่มรายชื่อครูที่ไม่มาปฏิบัติงาน</button>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer mb-3 mt-3">
                                <div class=" text-center">
                                    <button type="submit" class="btn " id="ser_from_1" style="background-color:#BB6AFB ; color:#FFFFFF">บันทึกข้อมูล</button>
                                    <button type="submit" class="btn" style="background-color:#FF0505 ; color:#FFFFFF">ยกเลิก</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- รายงานการประชุม / อบรม / สัมมนา / กิจกรรม / โครงการ / งาน -->
            <div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">รายงานการประชุม/อบรม/สัมมนา/กิจกรรม/โครงการ/งาน</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="" id="id_from" value="6">
                            <div class="row mt-2">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">กลุ่มสาระการเรียนรู้</label>
                                        <select class="form-select mt-2" id="id_subject_group_3" name="id_subject_group_3">
                                            <option value="">เลือกกลุ่มสาระการเรียนรู้</option>
                                            <option value="8">กลุ่มสาระการเรียนรู้ภาษาไทย</option>
                                            <option value="9">กลุ่มสาระการเรียนรู้คณิตศาสตร์</option>
                                            <option value="10">กลุ่มสาระการเรียนรู้วิทยาศาตร์</option>
                                            <option value="11">กลุ่มสาระการเรียนรู้การงานอาชีพ</option>
                                            <option value="12">กลุ่มสาระการเรียนรู้สุขศึกษา</option>
                                            <option value="13">กลุ่มสาระการเรียนรู้สังคมศึกษา</option>
                                            <option value="14">กลุ่มสาระการเรียนรู้ภาษาต่างประเทศ</option>
                                            <option value="15">กลุ่มสาระการเรียนรู้ศิลปะ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">สถานที่</label>
                                        <input type="text" class="form-control mt-2" placeholder="สถานที" id="location_5" name="location_5">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">เรื่อง</label>
                                        <input type="text" class="form-control mt-2" placeholder="เรื่อง" id="subject_5" name="subject_5">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2 mt-3">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">วันที่เข้าร่วม</label>
                                        <input type="date" class="form-control mt-2" id="joining_date_5" name="joining_date_5">
                                    </div>
                                </div>
                                <div class="col-2 mt-3">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">เวลาเข้าร่วม</label>
                                        <input type="text" class="form-control mt-2" id="time_1" name="time_1">
                                    </div>
                                </div>
                                <div class="col-2 mt-3">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">เวลาเลิก</label>
                                        <input type="text" class="form-control mt-2" id="time_2" name="time_2">
                                    </div>
                                </div>
                                <div class="col-4 mt-3">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">ผู้จัดงาน</label>
                                        <input type="text" class="form-control mt-2" placeholder="ผู้จัดงาน" name="organizer_5" id="organizer_5">
                                    </div>
                                </div>
                                <div class="col-4 mt-3">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">สรุปผลการเข้าร่วมงาน</label>
                                        <textarea class="form-control" placeholder="สรุปผลการเข้าร่วมงาน" id="summary_of_results_of_participation_in_the_event" name="summary_of_results_of_participation_in_the_event"></textarea>
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
                            </div>
                            <div class="form-group mb-3 mt-3">
                                <div class=" text-center">
                                    <button type="submit" class="btn " id="server_meeting" style="background-color:#BB6AFB ; color:#FFFFFF">บันทึกข้อมูล</button>
                                    <button type="submit" class="btn" style="background-color:#FF0505 ; color:#FFFFFF">ยกเลิก</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- แบบสำรวจอัตรากำลังครู -->
            <div class="modal fade" id="exampleModal7" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">แบบสำรวจอัตรากำลังครู</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="" id="id_from" value="7">
                            <div class="row mt-2">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">กลุ่มสาระการเรียนรู้</label>
                                        <select class="form-select mt-2" id="id_subject_group_4" name="id_subject_group_4">
                                            <option value="">เลือกกลุ่มสาระการเรียนรู้</option>
                                            <option value="8">กลุ่มสาระการเรียนรู้ภาษาไทย</option>
                                            <option value="9">กลุ่มสาระการเรียนรู้คณิตศาสตร์</option>
                                            <option value="10">กลุ่มสาระการเรียนรู้วิทยาศาตร์</option>
                                            <option value="11">กลุ่มสาระการเรียนรู้การงานอาชีพ</option>
                                            <option value="12">กลุ่มสาระการเรียนรู้สุขศึกษา</option>
                                            <option value="13">กลุ่มสาระการเรียนรู้สังคมศึกษา</option>
                                            <option value="14">กลุ่มสาระการเรียนรู้ภาษาต่างประเทศ</option>
                                            <option value="15">กลุ่มสาระการเรียนรู้ศิลปะ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">ภาคเรียนที่</label>
                                        <input type="text" class="form-control mt-2" placeholder="ภาคเรียนที่" id="semester_6" name="semester_6">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">ปีการศึกษา</label>
                                        <input type="text" class="form-control mt-2" placeholder="ปีการศึกษา" id="school_yea_6" name="school_yea_6">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">จำนวนครูปัจจุบัน</label>
                                        <input type="text" class="form-control mt-2" placeholder="จำนวนครูปัจจุบัน" id="teacher_total_now_6" name="teacher_total_now_6">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">จำนวนครูที่เกษียณอายุราชการ</label>
                                        <input type="text" class="form-control mt-2" placeholder="จำนวนครูที่เกษียณอายุราชการ" id="teacher_total_out_6" name="teacher_total_out_6">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-4">
                                    <div class="form-group ">
                                        <label for="" style="font-size: 18px;">จำนวนครูที่ขาด</label>
                                        <input type="text" class="form-control mt-2" placeholder="จำนวนครูที่ขาด" id="teacher_total_broken_6" name="teacher_total_broken_6">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">เหตุผลจำนวนที่ขาด</label>
                                        <textarea class="form-control" placeholder="เหตุผล" id="teacher_broken_reason_6" style="height: 100px"></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group ">
                                        <label for="" style="font-size: 18px;">จำนวนครูที่เกิน</label>
                                        <input type="text" class="form-control mt-2" placeholder="จำนวนครูที่เกิน" id="teacher_total_over_6" name="teacher_total_over">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group ">
                                        <label for="" style="font-size: 18px;">เหตุผลจำนวนที่เกิน</label>
                                        <textarea name="std_address" required placeholder="เหตุผล" id="teacher_over_reason_6" class="form-control mt-2"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group ">
                                        <label for="" style="font-size: 18px;">จำนวนครูที่ขอเพิ่ม</label>
                                        <input type="text" class="form-control mt-2" placeholder="จำนวนครูที่ขอเพิ่ม" id="teacher_total_add_6" name="teacher_total_add_6">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group ">
                                        <label for="" style="font-size: 18px;">เหตุผลจำนวนครูที่ขอเพิ่ม</label>
                                        <textarea name="std_address" required placeholder="เหตุผล" id="teacher_add_reason_6" class="form-control mt-2"></textarea>
                                    </div>
                                </div>

                                <div class="form-group mb-3 mt-3">
                                    <div class=" text-center">
                                        <button type="submit" class="btn " id="ser_from_6" style="background-color:#BB6AFB ; color:#FFFFFF">บันทึกข้อมูล</button>
                                        <button type="submit" class="btn" style="background-color:#FF0505 ; color:#FFFFFF">ยกเลิก</button>
                                    </div>
                                </div>
                            </div>
                            <!-- </form> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- การยื่นแบบสำรวจคาบสอนของครูผู้สอน -->
            <div class="modal fade" id="exampleModal8" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">แบบสำรวจคาบสอนของครูผู้สอน</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="" id="id_from" value="8">
                            <div class="row mb-3">
                                <div class="row mt-2">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">กลุ่มสาระการเรียนรู้</label>
                                            <select class="form-select mt-2" id="id_subject_group_11" name="id_subject_group_11">
                                                <option value="">เลือกกลุ่มสาระการเรียนรู้</option>
                                                <option value="8">กลุ่มสาระการเรียนรู้ภาษาไทย</option>
                                                <option value="9">กลุ่มสาระการเรียนรู้คณิตศาสตร์</option>
                                                <option value="10">กลุ่มสาระการเรียนรู้วิทยาศาตร์</option>
                                                <option value="11">กลุ่มสาระการเรียนรู้การงานอาชีพ</option>
                                                <option value="12">กลุ่มสาระการเรียนรู้สุขศึกษา</option>
                                                <option value="13">กลุ่มสาระการเรียนรู้สังคมศึกษา</option>
                                                <option value="14">กลุ่มสาระการเรียนรู้ภาษาต่างประเทศ</option>
                                                <option value="15">กลุ่มสาระการเรียนรู้ศิลปะ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">ภาคเรียนที่</label>
                                            <input type="text" class="form-control mt-2" placeholder="ภาคเรียนที่" id="semester_7" name="semester_7">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">ปีการศึกษา</label>
                                            <input type="text" class="form-control mt-2" placeholder="ปีการศึกษา" id="school_year_7" name="school_year_7">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="mt-4">
                                        <div class="host6"></div>
                                        <div class="text-center form-group mt-3">
                                            <button class="add_fields6 btn btn-primary" style="font-size: 16px; width: 500px;">เพิ่มรายละเอียดแบบสำรวจคาบสอน</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-3 mt-3">
                                        <div class=" text-center">
                                            <button type="submit" class="btn " id="server_from_7" style="background-color:#BB6AFB ; color:#FFFFFF">บันทึกข้อมูล</button>
                                            <button type="submit" class="btn" style="background-color:#FF0505 ; color:#FFFFFF">ยกเลิก</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- การขออนุญาตผู้บังคับบัญชาพานักเรียนไปนอกสถานศึกษา -->
            <div class="modal fade" id="exampleModal9" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content" style="background-color: #F8F8FF;">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">การขออนุญาตผู้บังคับบัญชาพานักเรียนไปนอกสถานศึกษา</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="" id="id_from" value="9">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">กลุ่มสาระการเรียนรู้</label>
                                        <select class="form-select mt-2" id="id_subject_group_5" name="id_subject_group_5">
                                            <option value="">เลือกกลุ่มสาระการเรียนรู้</option>
                                            <option value="8">กลุ่มสาระการเรียนรู้ภาษาไทย</option>
                                            <option value="9">กลุ่มสาระการเรียนรู้คณิตศาสตร์</option>
                                            <option value="10">กลุ่มสาระการเรียนรู้วิทยาศาตร์</option>
                                            <option value="11">กลุ่มสาระการเรียนรู้การงานอาชีพ</option>
                                            <option value="12">กลุ่มสาระการเรียนรู้สุขศึกษา</option>
                                            <option value="13">กลุ่มสาระการเรียนรู้สังคมศึกษา</option>
                                            <option value="14">กลุ่มสาระการเรียนรู้ภาษาต่างประเทศ</option>
                                            <option value="15">กลุ่มสาระการเรียนรู้ศิลปะ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4 ">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">ขออนุญาตนำนักเรียนไป</label>
                                        <input type="text" class="form-control mt-2" placeholder="ขออนุญาตนำนักเรียนไป" id="allow_student_8" name="allow_student_8">
                                    </div>
                                </div>
                                <div class="col-2 mt-3">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">จำนวนนักเรียน</label>
                                        <input type="text" class="form-control mt-2" placeholder="จำนวนนักเรียน" id="student_total_8" name="student_total_8">
                                    </div>
                                </div>
                                <div class="col-2 mt-3">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">จำนวนครูผู้ควบคุม</label>
                                        <input type="text" class="form-control mt-2" placeholder="จำนวนครูผู้ควบคุม" id="teacher_total_8" name="teacher_total_8">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">เหตุผลในการไปควบคุม</label>
                                        <textarea class="form-control" placeholder="เหตุผลในการไปควบคุม" id="reason_controll_8"></textarea>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">ชื่อสถานที่</label>
                                        <input type="text" class="form-control mt-2" placeholder="ชื่อสถานที่" id="school_name_8" name="school_name_8">
                                    </div>
                                </div>
                            </div>
                            <h3 class="mt-3  text-center">ออกเดินทาง</h3>
                            <div class="row">
                                <div class="col-2 mt-3">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">วันที่</label>
                                        <input type="date" class="form-control mt-2" placeholder="เวลาถึงสถานศึกษา" name="date_travel_8" id="date_travel_8">
                                    </div>
                                </div>
                                <div class="col-2 mt-3">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">เวลาเดินทาง</label>
                                        <input type="text" class="form-control mt-2" placeholder="เวลาเดินทาง" id="travel_time_8" name="travel_time_8">
                                    </div>
                                </div>
                                <div class="col-4 mt-3">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">เส้นทางในการเดินทาง</label>
                                        <input type="text" class="form-control mt-2" placeholder="เส้นทางในการเดินทาง" id="travel_route_8" name="travel_route_8">
                                    </div>
                                </div>
                                <div class="col-4 mt-3">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">พาหนะที่ใช้เดินทาง</label>
                                        <input type="text" class="form-control mt-2" placeholder="พาหนะที่ใช้เดินทาง" id="Vehicle_for_traveling_8" name="Vehicle_for_traveling_8">
                                    </div>
                                </div>
                            </div>
                            <h3 class="mt-3  text-center">เดินทางกลับ</h3>
                            <div class="row">
                                <div class="col-2 mt-3">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">วันที่</label>
                                        <input type="date" class="form-control mt-2" placeholder="เวลาถึงสถานศึกษา" id="travel_back_8" name="travel_back_8">
                                    </div>
                                </div>
                                <div class="col-2 mt-3">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">เวลาถึงสถานศึกษา</label>
                                        <input type="text" class="form-control mt-2" placeholder="เวลาถึงสถานศึกษา" id="Time_to_arrive_8" name="Time_to_arrive_8">
                                    </div>
                                </div>
                                <div class="col-4 mt-3">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">จำนวนเงินค่าใช้จ่ายต่อคน</label>
                                        <input type="text" class="form-control mt-2" placeholder="จำนวนเงินค่าใช้จ่ายต่อคน" id="amount_person_8" name="amount_person_8">
                                    </div>
                                </div>
                                <div class=" col-4 text-center mt-5">
                                    <div class="host7"></div>
                                    <div class="row justify-content-center form-group ">
                                        <button class="add_fields7 btn btn-primary" style="font-size: 16px; width:500px;">เพิ่มชื่อครูผู้ควบคุม</button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3 mt-3">
                                <div class=" text-center">
                                    <button type="submit" class="btn " id="server_from_8" style="background-color:#BB6AFB ; color:#FFFFFF">บันทึกข้อมูล</button>
                                    <button type="submit" class="btn" style="background-color:#FF0505 ; color:#FFFFFF">ยกเลิก</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ขอนุญาตนำนักเรียนเข้าร่วมกิจกรรมในเวลาเรียน -->
            <div class="modal fade" id="exampleModal10" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content" style="background-color: #F8F8FF;">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">ยื่นคำร้อง ขออนุญาตนำนักเรียนเข้าร่วมกิจกรรมในเวลาเรียน</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="" id="id_from" value="10">
                            <div class="row mb-3">
                            </div>
                            <div class="row">
                                <div class="col-4 mt-3">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">ชื่อกิจกรรม งาน/โครงการ</label>
                                        <input type="text" class="form-control mt-2" placeholder="ชื่อกิจกรรม งาน/โครงการ" id="activity_name_9" name="activity_name_9">
                                    </div>
                                </div>
                                <div class="col-4 mt-3">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">เหตุผลในการนำเข้า</label>
                                        <textarea class="form-control" placeholder="เหตุผลในการนำเข้า" id="reason_project_9"></textarea>
                                    </div>
                                </div>
                                <div class="col-2 mt-3">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">วันที่เข้าร่วม</label>
                                        <input type="date" class="form-control mt-2" id="date_activity_9" name="date_activity_9">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class=" col-12mt-3">
                                    <div class="host8"></div>
                                    <div class="row justify-content-center form-group ">
                                        <button class="add_fields8 btn btn-primary" style="font-size: 16px; width:500px;">เพิ่มรายชื่อนักเรียน</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3 mt-3">
                                <div class=" text-center">
                                    <button type="submit" class="btn " id="server_from_10" style="background-color:#BB6AFB ; color:#FFFFFF">บันทึกข้อมูล</button>
                                    <button type="submit" class="btn" style="background-color:#FF0505 ; color:#FFFFFF">ยกเลิก</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- การขออนุญาตให้นักเรียนไปโรงเรียนเป็นกรณีพิเศษ -->
            <div class="modal fade" id="exampleModal11" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">ขออนุญาตให้นักเรียนไปโรงเรียนเป็นกรณีพิเศษ</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="" id="id_from" value="11">
                            <div class="row mt-2">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">โรงเรียนมีความประสงค์</label>
                                        <input type="text" class="form-control mt-2" placeholder="โรงเรียนมีความประสงค์" id="school_wishes_10" name="school_wishes_10">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">นักเรียนชั้น</label>
                                        <input type="text" class="form-control mt-2" placeholder="นักเรียนชั้น" id="class_student_10" name="class_student_10">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">ห้อง</label>
                                        <input type="text" class="form-control mt-2" placeholder="ห้อง" id="room_10" name="room_10">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">เหตุผล</label>
                                        <input type="text" class="form-control mt-2" placeholder="เหตุผล" id="reason_project_10" name="reason_project_10">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-2">
                                    <div class="form-group ">
                                        <label for="" style="font-size: 18px;">วันที่</label>
                                        <input type="date" class="form-control mt-2" placeholder="วันที่" id="date_activity_10" name="date_activity_10">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">เวลา</label>
                                        <input type="text" class="form-control mt-2" placeholder="เวลา" id="Time_to_go_10" name="Time_to_go_10">
                                    </div>
                                </div>
                                <div class="col-1 mt-5">
                                    <h5>ถึง</h5>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">เวลา</label>
                                        <input type="text" class="form-control mt-2" placeholder="เวลา" id="Return_time_10" name="Return_time_10">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group ">
                                        <label for="" style="font-size: 18px;">จำนวนครูผู้ดูแล</label>
                                        <input type="text" class="form-control mt-2" placeholder="จำนวนครูผู้ดูแล" id="Number_of_supervising_teachers" name="Number_of_supervising_teachers">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group ">
                                        <label for="" style="font-size: 18px;">สถานที่ส่งเอกสาร</label>
                                        <input type="text" class="form-control mt-2" placeholder="สถานที่ส่งเอกสาร" id="Place_of_sending_documents" name="Place_of_sending_documents">
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
                                    <button type="submit" class="btn " id="server_from_11" style="background-color:#BB6AFB ; color:#FFFFFF">บันทึกข้อมูล</button>
                                    <button type="submit" class="btn" style="background-color:#FF0505 ; color:#FFFFFF">ยกเลิก</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="exampleModal12" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">ขออนุญาตลา คลอด ป่วย กิจ</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="" id="id_from" value="11">
                            <div class="row mt-2">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">เรื่อง</label>
                                        <input type="text" class="form-control mt-2" placeholder="เรื่อง" id="subject" name="subject">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">ชื่อ - นามสกุล</label>
                                        <input type="text" class="form-control mt-2" placeholder="ชื่อ - นามสกุล" id="Name_Surname" name="Name_Surname">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">ตำแหน่ง</label>
                                        <input type="text" class="form-control mt-2" placeholder="ตำแหน่ง" id="position" name="position">
                                    </div>
                                </div>
                                <div class="col-3 mt-2">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">สาหตุในการลา</label>
                                        <select class="form-select mt-2" id="reason_for_leave" name="reason_for_leave">
                                            <option value="">เลือกสาหตุในการลา</option>
                                            <option value="1">ป่วย</option>
                                            <option value="2">กิจส่วนตัว</option>
                                            <option value="3">คลอดบุตร</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4 mt-2" style="color: #000000; display: none;" id="personal_affairs_container">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">เหตุผล</label>
                                        <input type="text" class="form-control mt-2" placeholder="เหตุผล" id="Personal_affairs" name="Personal_affairs">
                                    </div>
                                </div>

                                <div class="col-2 mt-2">
                                    <div class="form-group ">
                                        <label for="" style="font-size: 18px;">ตั้งแต่วันที่</label>
                                        <input type="date" class="form-control mt-2" placeholder="วันที่" id="date_activity_12" name="date_activity_12">
                                    </div>
                                </div>
                                <div class="col-2 mt-2">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">ถึงวันที่</label>
                                        <input type="date" class="form-control mt-2" placeholder="เวลา" id="date_activity_13" name="date_activity_13">
                                    </div>
                                </div>
                                <div class="col-2 mt-2">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">มีกำหนด</label>
                                        <input type="text" class="form-control mt-2" placeholder="จำนวนวัน" id="scheduled_2" name="scheduled_2">
                                    </div>
                                </div>
                                <div class="col-2 mt-2">
                                    <div class="form-group">
                                        <label for="" style="font-size: 18px;">เบอร์โทรศัพท์</label>
                                        <input type="text" class="form-control mt-2" placeholder="เบอร์โทรศัพท์" id="telephone_number_1" name="telephone_number_1">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3 mt-3">
                                <div class=" text-center">
                                    <button type="submit" class="btn " id="server_from_leave" style="background-color:#BB6AFB ; color:#FFFFFF">บันทึกข้อมูล</button>
                                    <button type="submit" class="btn" style="background-color:#FF0505 ; color:#FFFFFF">ยกเลิก</button>
                                </div>
                            </div>
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
</script>
<?php include("../footer.php") ?>