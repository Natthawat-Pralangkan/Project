<?php include("../servers/connect.php"); ?>
<?php include("../header.php"); ?>

<div class="wrapper">
    <?php include('./navbar/sidebar.php'); ?>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <?php include('./navbar/navuser.php'); ?>
        <script src="./js/submit_a_complaint.js"></script>
        <script src="./js/parent_permission_form.js"></script>
        <script src="./js/request_payment_for_parcels.js"></script>
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
                        $sql = "SELECT * FROM `petition_name` LEFT JOIN petition_type ON petition_name.id_petition_general = petition_type.id WHERE petition_name.id_petition_general = 2";
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
                <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">แบบขออนุญาตผู้ปกครอง</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="" id="id_from" value="1">
                                <div class="row mt-2">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">ชื่อสถานที่</label>
                                            <input type="text" class="form-control mt-2" id="school_name" name="school_name" placeholder="ชื่อสถานที่">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">เหตุผลที่พาไป</label>
                                            <textarea name="std_address" required placeholder="เหตุผลที่พาไป" id="reason_controlling" class="form-control mt-2"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">ณ.</label>
                                            <input type="text" class="form-control mt-2" id="student_total" name="student_total" placeholder="ณ.">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">จังหวัด</label>
                                            <input type="text" class="form-control mt-2" id="province" name="province" placeholder="จังหวัด">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">จำนวนนักเรียน</label>
                                            <input type="text" class="form-control mt-2" id="number_of_students" name="number_of_students" placeholder="จำนวนนักเรียน">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">จำนวนครูผู้ควบคุม</label>
                                            <input type="text" class="form-control mt-2" id="number_of_supervisor_teachers" name="number_of_supervisor_teachers" placeholder="จำนวนครูผู้ควบคุม">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">พาหนะที่ใช้เดินทาง</label>
                                            <input type="text" class="form-control mt-2" id="vehicle_used_for_traveling" name="vehicle_used_for_traveling" placeholder="พาหนะที่ใช้เดินทาง">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">เส้นทางในการเดินทาง</label>
                                            <input type="text" class="form-control mt-2" id="travel_route" name="travel_route" placeholder="เส้นทางในการเดินทาง">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">วันที่เดินทาง</label>
                                            <input type="date" class="form-control mt-2" id="date_of_travel" name="date_of_travel" placeholder="จำนวนครูผู้ควบคุม">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">เวลา</label>
                                            <input type="time" class="form-control mt-2" id="time" name="time" placeholder="กรุณาเลือกเวลา">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">วันที่เดินทางกลับ</label>
                                            <input type="date" class="form-control mt-2" id="return_date" name="return_date" placeholder="จำนวนครูผู้ควบคุม">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">เวลา</label>
                                            <input type="time" class="form-control mt-2" id="time_return" name="time_return" placeholder="กรุณาเลือกเวลา">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">ค่าใช่จ่ายนักเรียนแต่ละคน</label>
                                            <input type="text" class="form-control mt-2" id="cost_per_student" name="cost_per_student" placeholder="ค่าใช่จ่ายนักเรียนแต่ละคน">
                                        </div>
                                    </div>
                                    <div class="col-4 mt-4">
                                        <div class="host1"></div>
                                        <div class="text-center form-group mt-3 ">
                                            <button class="add_fields1 btn btn-primary" style="font-size: 16px;">เพิ่มชื่อครูผู้ควบคุม</button>
                                        </div>
                                    </div>
                                    <div class="col-4 mt-4">
                                        <div class="host2"></div>
                                        <div class="text-center form-group mt-3 ">
                                            <button class="add_fields2 btn btn-primary" style="font-size: 16px;">เพิ่มชื่อนักเรียน</button>
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
                </div>
                <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">แบบฟอร์มขอการเบิก-จ่ายพัสดุ </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="" id="id_from" value="1">
                                <div class="row mt-2">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">ชื่อผู้ขอเบิกพัสดุ</label>
                                            <input type="text" class="form-control mt-2" id="name" name="name" placeholder="ชื่อผู้ขอเบิกวัสดุ">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group ">
                                            <label for="" style="font-size: 18px;">ตำแหน่ง</label>
                                            <input type="text" class="form-control mt-2" id="position" name="position" placeholder="ตำแหน่ง">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" style="font-size: 18px;">เบอร์โทรติดต่อ</label>
                                            <input type="text" class="form-control mt-2" id="contact_number" name="contact_number" placeholder="เบอร์โทรติดต่อ">
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <div class="host3"></div>
                                        <div class="text-center  mt-3 ">
                                            <button class="add_fields3 btn btn-primary" style="font-size: 16px;">เพิ่มรายละเอียดเบิกพัสดุ</button>
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