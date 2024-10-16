<?php include("../servers/connect.php"); ?>
<?php include("../header.php"); ?>
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
            <div class=" mt-3">
                <table id="myTable" class="table">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>วัน-เดือน-ปี</th>
                            <th>ชื่อนามสกุล</th>
                            <th>เวลาเข้า</th>
                            <th>เวลาออก</th>
                            <th>หมายเหตุ</th>
                        </tr>
                    </thead>
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
                        $sql = "SELECT * FROM face_recognition_data";
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
                </table>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">รายงานการลง เวลาเข้า - ออกงาน </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="myForm" action="" method="get">
                                <div class="dropdown row justify-content-center">
                                    <div class="col-md-6 mt-5 text-center">
                                        <select class="form-select" id="type_select" name="id_type">
                                            <option value="">-- เลือกคำแหน่ง --</option>
                                            <option value="all">ทั้งหมด </option> <!-- เพิ่มตัวเลือกทั้งหมด -->
                                            <?php
                                            // Query to get the types
                                            $sql = "SELECT id_type, name_type FROM type";
                                            $result = $db->query($sql);

                                            if ($result->rowCount() > 0) {
                                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                                    echo "<option value='{$row['id_type']}'>{$row['name_type']}</option>";
                                                }
                                            } else {
                                                echo "<option value=''>ไม่มีข้อมูล</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div id="dateFields" style="display:none;">
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-md-4 mb-0">
                                            <label for="start_date" class="form-label mb-0">วันที่เริ่มต้น:</label>
                                            <input type="date" class="form-control" id="start_date" name="start_date">
                                        </div>
                                        <div class="col-md-2 mb-0 mt-5 text-center ">
                                            <h4>ระหว่าง</h4>
                                        </div>
                                        <div class="col-md-4 mb-0">
                                            <label for="end_date" class="form-label mb-0">วันที่สิ้นสุด:</label>
                                            <input type="date" class="form-control" id="end_date" name="end_date">
                                        </div>
                                        <div class="text-center mt-3">
                                            <button id="pdfButton" onclick="createPDF()" class="btn btn-danger mt-3">พิมพ์รายงาน PDF</button>
                                        </div>
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
<script>
    if (localStorage.getItem("id_type") != "0" && localStorage.getItem("id_user") == null) {
        localStorage.clear()
        window.location.href = "../"
    }
    document.getElementById("type_select").addEventListener("change", function() {
        var selectedValue = this.value;
        var dateFields = document.getElementById("dateFields");

        if (selectedValue) {
            dateFields.style.display = "block"; // แสดงฟิลด์วันที่เมื่อมีการเลือก
        } else {
            dateFields.style.display = "none"; // ซ่อนฟิลด์ถ้าไม่มีการเลือก
        }
    });

    function createPDF() {
        var idType = document.getElementById('type_select').value;
        var startDate = document.getElementById('start_date').value;
        var endDate = document.getElementById('end_date').value;

        // ตรวจสอบว่ามีการเลือก id_type ก่อนสร้าง PDF
        if (idType) {
            // เปิดหน้ารายงาน PDF โดยส่งค่า id_type, start_date และ end_date ไปด้วย
            window.open(`./Report_on_entry_and_exit_times_pdf.php?id_type=${idType}&start_date=${startDate}&end_date=${endDate}`, '_blank');
        } else {
            alert("กรุณาเลือกประเภทก่อนพิมพ์รายงาน");
        }
    }

    $(document).ready(function() {
        $('#myTable').DataTable(); // เปลี่ยน #myTable เป็น ID ของตารางของคุณ
    });


    $(document).ready(function() {
        $('#myTable').DataTable(); // เปลี่ยน #myTable เป็น ID ของตารางของคุณ
    });
</script>
<?php include("../footer.php") ?>