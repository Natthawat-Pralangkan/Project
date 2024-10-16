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

                        $sql = "SELECT *, `details_ppetiton`.`id` 
                                FROM `details_ppetiton`
                                JOIN petition_name ON details_ppetiton.petition_id = petition_name.id
                                JOIN petition_type ON petition_name.id_petition = petition_type.id
                                JOIN request_status ON details_ppetiton.id_status = request_status.id_status
                                JOIN teacher_personnel_information ON details_ppetiton.user_id = teacher_personnel_information.user_id
                                WHERE details_ppetiton.petition_type = 4
                                AND details_ppetiton.id_status IN (2, 3, 4, 5, 6, 7,8,9);";
                        $result = $db->query($sql);
                        ?>

                        <?php
                        if ($result->rowCount() > 0) {
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                // แปลงวันที่ให้เป็นรูปแบบไทย
                                $newdate = ConvertToThaiDate($row['date'], 0, 0);
                        ?>
                                <tr>
                                    <td> <?php echo $newdate ?> </td>
                                    <td> <?php echo $row['petition_name'] ?> </td>
                                    <td> <?php echo $row['user_name'] ?> </td>
                                    <td class="<?php echo 'status' . $row['id_status']; ?>">
                                        <?php
                                        // ตรวจสอบค่า id_status และแสดงข้อความตามสถานะที่กำหนด
                                        if (in_array($row['id_status'], [2, 3, 4])) {
                                            echo "ผ่านพิจารณา";
                                        } elseif ($row['id_status'] == 6) {
                                            echo "ไม่ผ่านพิจารณา";
                                        } elseif ($row['id_status'] == 7) {
                                            echo "ยกเลิก";
                                        } elseif ($row['id_status'] == 8) {
                                            echo "รอหัวหน้ากลุ่มสาระพิจารณา";
                                        } else {
                                            echo $row['name_status']; // แสดงสถานะตามปกติถ้าไม่ตรงกับเงื่อนไขใดๆ
                                        }
                                        ?>

                                    </td>
                                    <td>
                                        <a href="check_the_request_pdf.php?id=<?php echo $row['id']; ?>" class="btn btn-primary" target="_blank">ดูรายละเอียด</a>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>
                    </tbody>
                </table>
                <!-- Modal -->
            </div>
        </div>

    </div>
</div>
<script>
    if (localStorage.getItem("id_type") != "3" && localStorage.getItem("user_id") == null) {
        localStorage.clear()
        window.location.href = "../"
    }
    $(document).ready(function() {
        $('.manage-button').on('click', function() {
            var id = $(this).data('id'); // Fetch the data-id attribute of the clicked button
            console.log(id); // Debugging line to ensure the id is captured correctly

            var pdfUrl = 'check_the_request_pdf.php?id=' + id; // Construct the URL for the PDF

            $('#pdfViewer').attr('src', pdfUrl); // Set the iframe's source to the constructed URL
            $('#exampleModal7').modal('show'); // Open the modal that contains the iframe
        });

        // Setup for handling clicks on "จัดการ" buttons
        $('.manage-button').on('click', function() {
            var petitionId = $(this).data('id');
            // Store this ID in the modal for later use
            $('#exampleModal7').data('id', petitionId);
            // Now open the modal
            $('#exampleModal7').modal('show');
        });
    });
</script>
<?php include("../../footer.php") ?>