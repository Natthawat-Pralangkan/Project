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
                <table id="check_consider_and_approve_the_request" class="table">
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
                        $sql = "SELECT *,`details_ppetiton`.`id`,details_ppetiton.petition_id FROM `details_ppetiton`
                        JOIN petition_name ON details_ppetiton.petition_id = petition_name.id
                        JOIN petition_type ON petition_name.id_petition = petition_type.id 
                        JOIN request_status ON details_ppetiton.id_status = request_status.id_status
                        JOIN teacher_personnel_information ON details_ppetiton.user_id = teacher_personnel_information.user_id
                        WHERE details_ppetiton.petition_type in (1, 2, 3, 4);";
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
                                    <td> <?php echo $row['user_name'] . $row['last_name'] ?> </td>
                                    <td> <?php echo $row['name_status'] ?> </td>
                                    <td>
                                        <?php if ($row['petition_id'] == 6) { ?>
                                            <button class="btn btn-primary manage-button" data-id="<?php echo $row['id']; ?>" data-petition_id="<?php echo $row['petition_id']; ?>" onclick="openAnotherModal(this)">จัดการ</button>
                                        <?php } else { ?>
                                            <button class="btn btn-primary manage-button" data-id="<?php echo $row['id']; ?>" data-petition_id="<?php echo $row['petition_id']; ?>">จัดการ</button>
                                        <?php  }; ?>
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
                <div class="modal fade" id="exampleModal7" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">ข้อมูลคำร้อง</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <iframe id="pdfViewer1" width="100%" height="500px" frameborder="0"></iframe>
                                <input type="hidden" id="hiddenIdField" value="">
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" id="approveButton" class="btn text-center some-element" style="background-color: #8B39F4; color: #fcfafa;">อนุมัติ</button>
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
                                    <input type="hidden" id="hiddenIdField" value="">
                                </div>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" id="confirmDisapproval" class="btn text-center disapproveButton" data-bs-dismiss="modal" style="background-color: #8B39F4; color: #fcfafa;">ยืนยัน</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="anotherModalId" tabindex="-1" aria-labelledby="anotherModalLabel" aria-hidden="true">
                    <div class="modal-dialog  modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="anotherModalLabel">ข้อมูลคำร้อง..</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <iframe id="pdfViewer2" width="100%" height="500px" frameborder="0"></iframe>
                                <input type="hidden" id="hiddenIdField" value="">
                            </div>
                            <div class="row mx-3">
                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            อนุญาต
                                        </label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            อนุมัติ
                                        </label>
                                    </div>
                                </div>
                                <!-- แก้ไข id ให้เป็น unique สำหรับ radio ต่อไปนี้ -->
                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" value="3">
                                        <label class="form-check-label" for="flexRadioDefault3">
                                            เห็นชอบ
                                        </label>
                                    </div>
                                </div>
                                <!-- เพิ่มต่อไป -->
                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4" value="4">
                                        <label class="form-check-label" for="flexRadioDefault4">
                                            ลงนาม
                                        </label>
                                    </div>
                                </div>

                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault5" value="5">
                                        <label class="form-check-label" for="flexRadioDefault5">
                                            สั่ง
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-3 mt-3">
                                <div id="inputContainer" style="display: none;">
                                    <input type="text" class="form-control" placeholder="กรอกข้อมูลที่นี่">
                                </div>
                            </div>
                            <div class="modal-footer justify-content-center mt-3">
                                <button type="button" id="approveButton2" class="btn text-center some-element" style="background-color: #8B39F4; color: #fcfafa;">อนุมัติ</button>
                                <button class="btn mr-2" style="background-color: #ff0000; color: #fcfafa;" data-bs-toggle="modal" data-bs-target="#exampleModal1">ไม่อนุมัติ</button>
                            </div>
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
    $(document).ready(function() {
        $('.manage-button').on('click', function() {
            var id = $(this).data('id');
            var petitionId = $(this).data('petition_id');
            console.log("ID:" + id + "Petition ID:" + petitionId); // Check the values

            var pdfUrl = 'check_the_request_pdf.php?id=' + id; // Construct the URL for the PDF

            // Decide which modal to show based on petitionId
            if (petitionId == 6) {
                $('#pdfViewer2').attr('src', pdfUrl); // Assuming this is for petition_id = 6
                $('#anotherModalId').data('id', id).modal('show');
            } else {
                $('#pdfViewer1').attr('src', pdfUrl); // For other IDs
                $('#exampleModal7').data('id', id).modal('show');
            }
        });

        // Setup for handling clicks on "อนุมัติ" button
        $("#approveButton").on('click', function(event) {
            event.preventDefault();
            var id = $('#exampleModal7').data('id');
            var id_status = 3; // Define and assign a value to id_status
            console.log("Sending ID:", id, "Status:", id_status);

            // AJAX call to update the status
            $.ajax({
                url: "update_status",
                type: "POST",
                data: {
                    id: id,
                    id_status: id_status,
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

        $("#approveButton2").on('click', function(event) {
            event.preventDefault();

            // Retrieve the id from the appropriate modal
            var id = $('#anotherModalId').data('id'); // Assuming the id is stored in the second modal
            var id_status = 3; // Define and assign a value to id_status
            var memo_type = $('input[name="flexRadioDefault"]:checked').val();
            var save_a_message = $('#inputContainer input').val(); // Read value from input field if present

            console.log("Sending ID:", id, "Status:", id_status);
            console.log(save_a_message,memo_type);
            // AJAX call to update the status
            $.ajax({
                url: "update_status1",
                type: "POST",
                data: {
                    id: id,
                    id_status: id_status,
                    save_a_message: save_a_message,
                    memo_type: memo_type
                },
                success: function(response) {
                    // var data = JSON.parse(response);
                    console.log(response);
                    if (response.status === 200) {
                        alert("อัปเดตข้อมูลเรียบร้อย");
                        location.reload();
                    } else {
                        console.log(response);
                        alert("เกิดข้อผิดพลาดในการอัปเดตข้อมูล");
                        location.reload();
                    }
                },
                error: function(xhr, status, error) {
                    alert("เกิดข้อผิดพลาดในการส่งข้อมูล: " + error);
                }
            });
        });

        $('#exampleModal1').on('show.bs.modal', function() {
            var id = $('#exampleModal7').data('id');
            $('#hiddenIdField').val(id); // Transfer the id to a hidden input within the disapproval reason modal
        });

        // Handle the confirmation of disapproval
        $('#confirmDisapproval').click(function() {
            var id = $('#hiddenIdField').val(); // Retrieve the id
            var reason = $('#formGroupExampleInput').val(); // Get the disapproval reason
            if (!reason.trim()) {
                alert("Please enter a reason for disapproval.");
                return;
            }
            var id_status = 5;
            // AJAX call to update the reason and status to "Disapproved"
            $.ajax({
                url: 'update_reason', // Adjust the URL as necessary
                type: 'POST', // Make sure this is POST
                data: {
                    id: id, // Ensure these variables are correctly defined in your JS
                    reason: reason,
                    id_status: id_status
                },
                success: function(response) {
                    alert("อัปเดตข้อมูลเรียบร้อย");
                    $('#exampleModal1').modal('hide');
                    location.reload();
                    console.log('Success:', response);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });

        // Show input field if radio button is checked
        $('input[type="radio"][name="flexRadioDefault"]').change(function() {
            if ($(this).is(":checked")) {
                $('#inputContainer').show();
            }
        });

    });
</script>
<?php include("../../footer.php") ?>