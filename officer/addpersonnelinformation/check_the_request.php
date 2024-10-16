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
                        $sql = "SELECT *,`details_ppetiton`.`id` FROM `details_ppetiton`
                        JOIN petition_name ON details_ppetiton.petition_id = petition_name.id
                        JOIN petition_type ON petition_name.id_petition = petition_type.id 
                        JOIN request_status ON details_ppetiton.id_status = request_status.id_status
                        JOIN teacher_personnel_information ON details_ppetiton.user_id = teacher_personnel_information.user_id
                        WHERE details_ppetiton.petition_type = 4 AND details_ppetiton.id_status = 1;";
                        $result = $db->query($sql); ?>
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
                                    <td> <?php echo $row['name_status'] ?> </td>
                                    <td><button class="btn btn-primary manage-button" data-id="<?php echo $row['id']; ?>" data-petition-id="<?php echo $row['petition_id']; ?>">จัดการ</button>
                                    </td>
                                </tr>

                        <?php   }
                        } else {
                            echo "0 results";
                        }
                        ?>
                    </tbody>
                </table>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal7" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">ข้อมูลคำร้อง</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="hiddenIdField" value=""> <!-- สมมุติว่ามีค่า id -->
                                <iframe id="pdfViewer1" width="100%" height="500px" frameborder="0"></iframe>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" id="approveButton" class="btn text-center some-element" style="background-color: #8B39F4; color: #fcfafa;">อนุมัติ</button>
                                <!-- เพิ่ม event handler เพื่อส่งค่า id ไปยัง #exampleModal1 -->
                                <button class="btn mr-2" id="disapproveButton7" style="background-color: #ff0000; color: #fcfafa;" data-bs-toggle="modal" data-bs-target="#exampleModal1">ไม่อนุมัติ</button>n>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="exampleModal14" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">ข้อมูลคำร้อง</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <iframe id="pdfViewer14" width="100%" height="500px" frameborder="0"></iframe>
                                <div class="form-group mt-3">
                                    <input type="hidden" id="hiddenIdField" value=""> <!-- สมมุติว่ามีค่า id -->
                                    <label for="reasonInput" class="form-label">ความเห็นเจ้าหน้าฝ่ายบุคคล:</label>
                                    <textarea class="form-control" id="reasonInput" rows="3" style="background-color: GhostWhite;"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" id="approveButton2" class="btn text-center some-element" style="background-color: #8B39F4; color: #fcfafa;">อนุมัติ</button>
                                <button class="btn mr-2" id="disapproveButton14" style="background-color: #ff0000; color: #fcfafa;" data-bs-toggle="modal" data-bs-target="#exampleModal1">ไม่อนุมัติ</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">เหตุผลไม่อนุมัติคำร้อง</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="hiddenIdField1" value=""> <!-- ฟิลด์นี้จะรับค่า id -->
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">เหตุผลไม่อนุมัติคำร้อง</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="เหตุผลไม่อนุมัติคำร้อง">

                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" id="confirmDisapproval" class="btn text-center disapproveButton" data-bs-dismiss="modal" style="background-color: #8B39F4; color: #fcfafa;">ยืนยัน</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    if (localStorage.getItem("id_type") != "6" && localStorage.getItem("user_id") == null) {
        localStorage.clear()
        window.location.href = "../"
    }
    $(document).ready(function() {
        $('.manage-button').on('click', function() {
            var id = $(this).data('id'); // ดึงค่า id จากปุ่ม
            var petitionId = $(this).data('petition-id'); // ดึงค่า petitionId จากปุ่ม

            console.log("ID:", id); // Debugging line
            console.log("Petition ID:", petitionId); // Debugging line

            var pdfUrl = 'check_the_request_pdf.php?id=' + id; // สร้าง URL สำหรับ PDF

            // ตรวจสอบว่าเป็นโมดัลไหน
            if (petitionId === 14) {
                $('#exampleModal14').data('id', id).modal('show'); // แสดง exampleModal14
                $('#pdfViewer14').attr('src', pdfUrl); // ตั้งค่า iframe
            } else {
                $('#exampleModal7').data('id', id).modal('show'); // แสดง exampleModal7
                $('#pdfViewer7').attr('src', pdfUrl); // ตั้งค่า iframe
            }
        });

        // Setup for handling clicks on "อนุมัติ" button
        $("#approveButton").on('click', function(event) {
            event.preventDefault();

            // ตรวจสอบให้แน่ใจว่า data-id ถูกตั้งค่าถูกต้อง
            var id = $('#exampleModal7').data('action-id'); // ดึงค่า data-action-id จาก modal
            var id_status = 2; // Define and assign a value to id_status

            // ตรวจสอบค่าที่ส่ง
            console.log("Sending ID:", id, "Status:", id_status);

            // ตรวจสอบว่า id ไม่เป็น undefined ก่อนส่ง AJAX
            if (id === undefined || id === null) {
                alert("เกิดข้อผิดพลาด: ไม่พบ ID สำหรับการอนุมัติ");
                return;
            }

            // AJAX call to update the status
            $.ajax({
                url: "update_status.php", // ตรวจสอบว่า URL ตรงกับไฟล์ PHP ของคุณ
                type: "POST",
                data: {
                    id: id,
                    id_status: id_status
                },
                success: function(response) {
                    if (response.status === "success") {
                        alert("อนุมัติคำร้องเรียบร้อยแล้ว");
                        $('#exampleModal7').modal('hide');
                        // Refresh or update the UI as necessary
                        location.reload(); // or use a more targeted update method
                    } else {
                        alert("เกิดข้อผิดพลาดในการอนุมัติคำร้อง: " + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    alert("เกิดข้อผิดพลาดในการส่งข้อมูล: " + error);
                }
            });
        });


        // เมื่อกดปุ่ม "ไม่อนุมัติ" ใน exampleModal7
        $('#disapproveButton7').on('click', function() {
            var id = $('#exampleModal7').data('id'); // ดึงค่า id จาก exampleModal7
            if (id) {
                $('#hiddenIdField1').val(id); // ส่งค่า id ไปยัง hidden field ใน exampleModal1
                console.log("ID ที่ส่งไปยัง exampleModal1 จาก Modal7:", id); // Debugging
            } else {
                console.error('ไม่พบค่า ID จาก exampleModal7');
            }
        });

        // เมื่อกดปุ่ม "ไม่อนุมัติ" ใน exampleModal14
        $('#disapproveButton14').on('click', function() {
            var id = $('#exampleModal14').data('id'); // ดึงค่า id จาก exampleModal14
            if (id) {
                $('#hiddenIdField1').val(id); // ส่งค่า id ไปยัง hidden field ใน exampleModal1
                console.log("ID ที่ส่งไปยัง exampleModal1 จาก Modal14:", id); // Debugging
            } else {
                console.error('ไม่พบค่า ID จาก exampleModal14');
            }
        });

        // เมื่อ exampleModal1 ถูกเปิด
        $('#exampleModal1').on('show.bs.modal', function(event) {
            var id = $('#hiddenIdField1').val(); // ดึงค่า id จาก hidden field
            if (id) {
                console.log("ID ที่ถูกส่งไปยัง exampleModal1 ขณะเปิด modal:", id); // Debugging
            } else {
                console.error('ID ไม่ถูกตั้งค่าก่อนเปิด exampleModal1');
            }
        });

        // เมื่อกดปุ่มยืนยันการไม่อนุมัติ
        $('#confirmDisapproval').click(function() {
            var id = $('#hiddenIdField1').val(); // ดึงค่า id จาก hidden field
            var reason = $('#formGroupExampleInput').val(); // ดึงเหตุผลที่กรอก
            
            // ตรวจสอบว่ามีการกรอกเหตุผลหรือไม่
            if (!reason.trim()) {
                alert("กรุณากรอกเหตุผลการไม่อนุมัติ");
                return;
            }

            var id_status = 6; // กำหนดสถานะเป็นไม่อนุมัติ
            var id_officer = 6;
            // ทำการเรียก AJAX เพื่ออัปเดตข้อมูลในเซิร์ฟเวอร์
            $.ajax({
                url: 'update_reason',
                type: 'POST',
                data: {
                    id: id,
                    reason: reason,
                    id_status: id_status,
                    id_officer: id_officer
                },
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            title: "สำเร็จ!",
                            text: response.message,
                            icon: "success",
                            confirmButtonText: "ยืนยัน"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    } else {
                        alert('ไม่สามารถอัปเดตข้อมูลได้: ' + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    alert('เกิดข้อผิดพลาดในการอัปเดตข้อมูล');
                    console.error('Error:', error);
                }
            });
        });
        $("#approveButton2").on('click', function(event) {
            event.preventDefault();

            // Retrieve the id from the appropriate modal
            var id = $('#exampleModal14').data('id'); // Assuming the id is stored in the second modal
            var id_status = 2; // Define and assign a value to id_status
            var id_officer = 6; // Define and assign a value to id_status
            var Officer_comments = $('#reasonInput').val(); // Read value from input field if present

            console.log("Sending ID:", id, "Status:", id_status);
            console.log(Officer_comments);
            // AJAX call to update the status
            $.ajax({
                url: "update_status1",
                type: "POST",
                data: {
                    id: id,
                    id_status: id_status,
                    id_officer: id_officer,
                    Officer_comments: Officer_comments
                },
                success: function(response) {
                    // ตรวจสอบว่า response.status เป็น 200 หรือ 'success'
                    if (response.status === 200 || response.status === "success") {
                        Swal.fire({
                            title: "อนุมัติคำร้องสำเร็จ!",
                            text: response.message,
                            icon: "success",
                            confirmButtonText: "ยืนยัน"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload(); // Reload the page after confirmation
                            }
                        });
                        $('#exampleModal7').modal('hide'); // ซ่อน modal ที่ต้องการ
                    } else {
                        alert("เกิดข้อผิดพลาดในการอนุมัติคำร้อง: " + response.message);
                    }
                }
            });
        });
    });
</script>
<?php include("../../footer.php") ?>