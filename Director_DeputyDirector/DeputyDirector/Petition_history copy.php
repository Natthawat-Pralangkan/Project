<?php include("../../header.php"); ?>
<?php include("../../servers/connect.php"); ?>
<div class="wrapper">
    <?php include('./navbar/sidebar.php'); ?>
    <div class="content-wrapper">
        <?php include('./navbar/navuser.php'); ?>
        <script src="./js/check_the_request copy.js"></script>
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

                        $sql = "SELECT details_ppetiton.id, 
               details_ppetiton.date, 
               petition_name.petition_name, 
               teacher_personnel_information.user_name, 
               teacher_personnel_information.last_name, 
               request_status.name_status, 
               details_ppetiton.id_status
        FROM details_ppetiton
        JOIN petition_name ON details_ppetiton.petition_id = petition_name.id
        JOIN petition_type ON petition_name.id_petition = petition_type.id
        JOIN request_status ON details_ppetiton.id_status = request_status.id_status
        JOIN teacher_personnel_information ON details_ppetiton.user_id = teacher_personnel_information.user_id
        WHERE details_ppetiton.id_status IN (4, 5, 6, 7) 
        ORDER BY details_ppetiton.id DESC";

                        $result = $db->query($sql);

                        if ($result->rowCount() > 0) {
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                // Convert date to Thai format using ConvertToThaiDate function
                                $newdate = ConvertToThaiDate($row['date'], 0, 0);
                        ?>
                                <tr>
                                    <!-- Display converted date -->
                                    <td> <?php echo $newdate; ?> </td>

                                    <!-- Display petition name -->
                                    <td> <?php echo htmlspecialchars($row['petition_name']); ?> </td>

                                    <!-- Display user name and last name -->
                                    <td> <?php echo htmlspecialchars($row['user_name'] . ' ' . $row['last_name']); ?> </td>

                                    <!-- Status logic: Show "อนุมัติแล้ว" if id_status is 2, 3, or 4, else show the status -->
                                    <td>
                                        <?php
                                        if (in_array($row['id_status'], [2, 3, 4])) {
                                            echo "อนุมัติแล้ว";
                                        } else {
                                            echo htmlspecialchars($row['name_status']);
                                        }
                                        ?>
                                    </td>

                                    <!-- Link to PDF details -->
                                    <td>
                                        <a href="check_the_request_pdf.php?id=<?php echo $row['id']; ?>" class="btn btn-primary" target="_blank">ดูรายละเอียด</a>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='5'>ไม่มีข้อมูล</td></tr>";
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
                                <iframe id="pdfViewer" width="100%" height="500px" frameborder="0"></iframe>
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

        // Setup for handling clicks on "อนุมัติ" button
        $("#approveButton").on('click', function(event) {
            event.preventDefault();
            var id = $('#exampleModal7').data('id');
            var id_status = 2; // Define and assign a value to id_status
            console.log("Sending ID:", id, "Status:", id_status);

            // AJAX call to update the status
            $.ajax({
                url: "update_status",
                type: "POST",
                data: {
                    id: id,
                    id_status: id_status
                },
                success: function(response) {
                    if (response.status === "success") {
                        Swal.fire({
                            title: "อนุมัติคำร้องสำเร็จ!",
                            text: response.message,
                            icon: "success",
                            confirmButtonText: "ยืนยัน" // เปลี่ยนข้อความของปุ่มยืนยัน
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload(); // รีเฟรชหน้าเว็บหลังจากกดยืนยัน
                            }
                        });
                        $('#exampleModal7').modal('hide'); // ซ่อน modal ที่ต้องการ
                    } else {
                        alert("เกิดข้อผิดพลาด: " + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error); // แสดงข้อผิดพลาดในคอนโซล
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
            var id_status = 6;
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
                    if (response.status === "success") {
                        Swal.fire({
                            title: "บันทึกสำเร็จ!",
                            text: response.message,
                            icon: "success",
                            confirmButtonText: "ยืนยัน" // เปลี่ยนข้อความของปุ่มยืนยัน
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload(); // รีเฟรชหน้าเว็บหลังจากกดยืนยัน
                            }
                        });
                        $('#exampleModal1').modal('hide'); // ซ่อน modal ที่ต้องการ
                    } else {
                        alert("เกิดข้อผิดพลาด: " + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error); // แสดงข้อผิดพลาดในคอนโซล
                }

            });
        });
    });
</script>
<?php include("../../footer.php") ?>