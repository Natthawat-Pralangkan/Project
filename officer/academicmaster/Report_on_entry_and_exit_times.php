<?php include("../../servers/connect.php"); ?>
<?php include("../../header.php"); ?>
<div class="wrapper">
    <?php include('./navbar/sidebar.php'); ?>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <?php include('./navbar/navuser.php'); ?>
        <script src="./js/Request_a_time_entry_and_exit_report.js"></script>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <h2 class="m-0">รายงานการลง เวลาเข้า - ออกงาน</h2>
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="./home.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">รายงานการลง เวลาเข้า - ออกงาน</li>
                    </ol>
                </div>
            </div>
            <a href=""></a>
        </div>
        <div class="mt-5 mx-3">
            <div class="d-flex justify-content-end">
                <div>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        พิมพ์รายงานการลงเวลาเข้า - ออกงาน
                    </button>
                </div>
            </div>
            <div class="text-center mt-3">
                <table id="Request_a_time_entry_and_exit_report" class="table">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ว/ด/ป</th>
                            <th>เวลาเข้า</th>
                            <th>เวลาออก</th>
                            <th>ชื่อ - นามสกุล</th>
                            <th>หมายเหตุ</th>
                        </tr>
                    <tbody>
                        <?php
                        function ConvertToThaiDate($value, $short = '1', $need_time = '1', $need_time_second = '0')
                        {
                            $date_arr = explode(' ', $value);
                            $date = $date_arr[0];
                            if (isset($date_arr[1])) {
                                $time = $date_arr[1];
                            } else {
                                $time = '';
                            }
                            $value = $date;
                            if ($value != "0000-00-00" && $value != '') {
                                $x = explode("-", $value);
                                if ($short == false)
                                    $arrMM = array(1 => "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
                                else
                                    $arrMM = array(1 => "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
                                // return $x[2]." ".$arrMM[(int)$x[1]]." ".($x[0]>2500?$x[0]:$x[0]+543);
                                if ($need_time == '1') {
                                    if ($need_time_second == '1') {
                                        $time_format = $time != '' ? date('H:i:s น.', strtotime($time)) : '';
                                    } else {
                                        $time_format = $time != '' ? date('H:i น.', strtotime($time)) : '';
                                    }
                                } else {
                                    $time_format = '';
                                }

                                return (int)$x[2] . " " . $arrMM[(int)$x[1]] . " " . ($x[0] > 2500 ? $x[0] : $x[0] + 543) . " " . $time_format;
                            } else
                                return "";
                        }
                        $sql = "SELECT * FROM `face_recognition_data` WHERE `id_type` = 3 ORDER BY `id` DESC;";
                        $result = $db->query($sql);
                        ?>
                        <?php
                        $num = 0;
                        if ($result->rowCount() > 0) {
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                // แปลงวันที่ให้เป็นรูปแบบไทย
                                $num++;
                                $newdate = ConvertToThaiDate($row['created_at'], 0, 0);
                        ?>
                                <tr>
                                    <td> <?php echo $num ?> </td>
                                    <td> <?php echo $newdate ?> </td>
                                    <td> <?php echo $row['name'] . ' ' . $row['last_name'] ?> </td>
                                    <td> <?php echo substr($row['attend_work'], 11) ?> </td>
                                    <td> <?php echo substr($row['leaving_work'], 11) ?> </td>
                                    <td> <?php echo $row['attendance_status'] ?> </td>
                                </tr>

                        <?php   }
                        } else {
                            echo "0 results";
                        }
                        ?>

                    </tbody>
                    </thead>
                </table>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">รายงานการลง เวลาเข้า - ออกงาน</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="d-flex justify-content-center align-items-center">
                                <form id="myForm" action="" method="get">
                                    <div class="row align-items-center justify-content-center">
                                        <!-- Dropdown สำหรับเลือกแบบรายงาน -->
                                        <div class="col-md-12 mb-0">
                                            <label for="report_type" class="form-label mb-0">เลือกแบบรายงาน:</label>
                                            <select class="form-control" id="report_type" name="report_type" onchange="toggleFields()">
                                                <option value="">-- เลือกแบบรายงาน --</option>
                                                <option value="all">ทั้งหมด</option>
                                                <option value="individual">รายบุคคล</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- ฟิลด์สำหรับเลือกบุคคล จะแสดงเฉพาะเมื่อเลือก "รายบุคคล" -->
                                    <div class="row align-items-center justify-content-center mt-3" id="individualFields" style="display: none;">
                                        <div class="col-md-12 mb-0">
                                            <label for="user_id" class="form-label mb-0">เลือกบุคคล:</label>
                                            <select class="form-control" id="user_id" name="user_id">
                                                <option value="">-- เลือกบุคคล --</option>
                                                <?php
                                                $sql = "SELECT user_id, user_name FROM teacher_personnel_information WHERE position = 3";
                                                $result = $db->query($sql);

                                                if ($result->rowCount() > 0) {
                                                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                                        echo "<option value='{$row['user_id']}'>{$row['user_name']}</option>";
                                                    }
                                                } else {
                                                    echo "<option value=''>ไม่มีข้อมูล</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- ฟิลด์สำหรับเลือกวันที่ จะซ่อนก่อนจนกว่าจะเลือกแบบรายงาน -->
                                    <div class="row align-items-center justify-content-center mt-3" id="dateFields" style="display: none;">
                                        <div class="d-flex align-items-center">
                                            <div class="col-md-5 mb-0">
                                                <label for="start_date" class="form-label mb-0">วันที่เริ่มต้น:</label>
                                                <input type="date" class="form-control" id="start_date" name="start_date">
                                            </div>
                                            <div class="col-md-2 mb-0 text-center mt-3">
                                                <h5>ระหว่าง</h5>
                                            </div>
                                            <div class="col-md-5 mb-0">
                                                <label for="end_date" class="form-label mb-0">วันที่สิ้นสุด:</label>
                                                <input type="date" class="form-control" id="end_date" name="end_date">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="text-center mt-3">
                                        <button id="pdfButton" onclick="createPDF()" class="btn btn-danger mt-3">พิมพ์รายงาน PDF</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        if (localStorage.getItem("id_type") != "3" && localStorage.getItem("user_id") == null) {
            localStorage.clear()
            window.location.href = "../"
        }

        function toggleFields() {
            var reportType = document.getElementById("report_type").value;
            var individualFields = document.getElementById("individualFields");
            var dateFields = document.getElementById("dateFields");

            if (reportType === "all") {
                individualFields.style.display = "none";
                dateFields.style.display = "block";
            } else if (reportType === "individual") {
                individualFields.style.display = "block";
                dateFields.style.display = "block";
            } else {
                individualFields.style.display = "none";
                dateFields.style.display = "none";
            }
        }

        function createPDF() {
            var reportType = $('#report_type').val();
            var startDate = $('#start_date').val();
            var endDate = $('#end_date').val();
            var idtype = localStorage.getItem("id_type");

            // ตรวจสอบว่าเลือก "รายบุคคล" หรือ "ทั้งหมด"
            if (reportType === "individual") {
                var userId = $('#user_id').val(); // เก็บ user_id
                if (userId === "") {
                    alert("กรุณาเลือกบุคคล");
                    return;
                }
                // ส่ง user_id ไปยังหน้า PDF พร้อมกับวันที่
                window.open(`./Report_on_entry_and_exit_times_pdf.php?start_date=${startDate}&end_date=${endDate}&id_type=${idtype}&user_id=${userId}`, '_blank');
            } else if (reportType === "all") {
                // ส่งเฉพาะ id_type และวันที่ไปยังหน้า PDF
                window.open(`./Report_on_entry_and_exit_times_pdf.php?start_date=${startDate}&end_date=${endDate}&id_type=${idtype}`, '_blank');
            }
        }
    </script>
    <?php include("../../footer.php") ?>