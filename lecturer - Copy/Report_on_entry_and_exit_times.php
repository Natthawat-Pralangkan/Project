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
                    <h2 class="m-0">รายงานการลง เวลาเข้า - ออกงาน</h2>
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="./home.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">รายงานการลง เวลาเข้า - ออกงาน</li>
                    </ol>
                </div>
            </div>
            <a href=""></a>
        </div>
        <div class="content">
            <div class="text-center mt-5">
                <h2 class="mb-4">ค้นหาข้อมูลตามวันที่</h2>
                <form id="myForm" action="" method="get">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-1 mb-0">
                            <label for="start_date" class="form-label mb-0">วันที่เริ่มต้น:</label>
                        </div>
                        <div class="col-md-2 mb-0">
                            <input type="date" class="form-control" id="start_date" name="start_date">
                        </div>
                        <div class="col-md-1 mb-0">
                            <label for="end_date" class="form-label mb-0">วันที่สิ้นสุด:</label>
                        </div>
                        <div class="col-md-2 mb-0">
                            <input type="date" class="form-control" id="end_date" name="end_date">
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" style="width: 250px; background-color: #BB6AFB; color:#FFFFFF " class="btn  text-center">ค้นหา</button>

                    </div>
                </form>
                <button id="pdfButton" style="display:none;" onclick="createPDF()" class="btn btn-danger mt-3" ">Generate PDF</button>
            </div>
                <table class=" table mt-3" style="display:none;" id="">
                    <thead>
                        <tr class="text-center p-3">
                            <th scope="col" class="align-middle pl-3 pr-3">ลำดับ</th>
                            <th scope="col" class="align-middle pl-3 pr-3">วันที่</th>
                            <th scope="col" class="align-middle pl-3 pr-3">ชื่อ-นามสกุล</th>
                            <th scope="col" class="align-middle pl-3 pr-3">เวลาเข้างาน</th>
                            <th scope="col" class="align-middle pl-3 pr-3">เวลาออกงาน</th>
                            <th scope="col" class="align-middle pl-3 pr-3">หมายเกตุ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data rows will be inserted here -->
                    </tbody>
                    </table>
            </div>
        </div>

    </div>
</div>
<script>
    if (localStorage.getItem("id_type") != "7" && localStorage.getItem("user_id") == null) {
        localStorage.clear()
        window.location.href = "../"
    }
    $(document).ready(function() {
        $('#myForm').submit(function(event) {
            event.preventDefault(); // Prevent the form from submitting via the browser.
            var startDate = $('#start_date').val();
            var endDate = $('#end_date').val();

            $.ajax({
                url: 'submit_data.php',
                type: 'GET',
                data: {
                    user_id: localStorage.getItem("user_id"),
                    start_date: startDate,
                    end_date: endDate
                },
                dataType: 'json', // Expect JSON response
                success: function(data) {
                    updateTable(data); // No need to parse JSON manually
                },
                error: function(xhr, status, error) {
                    console.error("Error: " + error);
                    console.log(xhr.responseText); // Log the response text to see the error or invalid JSON
                }
            });
        });
    });

    function formatDateToThai(dateString) {
        const monthNames = [
            "มกราคม", "กุมภาพันธ์", "มีนาคม",
            "เมษายน", "พฤษภาคม", "มิถุนายน",
            "กรกฎาคม", "สิงหาคม", "กันยายน",
            "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
        ];

        const date = new Date(dateString);
        const day = date.getDate();
        const monthIndex = date.getMonth();
        const year = date.getFullYear() + 543; // แปลงค.ศ. เป็น พ.ศ.

        return `${day} ${monthNames[monthIndex]} ${year}`;
    }


    function updateTable(data) {
        // Ensure the table is displayed and the PDF button is visible
        document.querySelector('.table').style.display = '';
        document.getElementById('pdfButton').style.display = '';

        // Check if DataTable is already initialized
        if ($.fn.DataTable.isDataTable('.table')) {
            // If the DataTable instance already exists, clear and repopulate it
            $('.table').DataTable().clear().rows.add(data).draw();
        } else {
            // Initialize DataTable on your table
            $('.table').DataTable({
                data: data,
                columns: [{
                        title: "ลำดับ",
                        data: null,
                        render: (data, type, row, meta) => meta.row + 1,
                        className: "text-center"
                    },
                    {
                        title: "วันที่",
                        data: "created_at",
                        className: "text-center",
                        render: function(data, type, row) {
                            return formatDateToThai(data); // ใช้ฟังก์ชันที่สร้างขึ้นเพื่อแปลงวันที่
                        }
                    },
                    {
                        title: "ชื่อ-นามสกุล",
                        data: null,
                        render: (data) => `${data.name} ${data.last_name}`,
                        className: "text-center"
                    },
                    {
                        title: "เวลาเข้างาน",
                        data: "attend_work",
                        className: "text-center",
                        render: function(data, type, row) {
                            // Split the datetime string by space and take the time part
                            return data.split(' ')[1];
                        }
                    },
                    {
                        title: "เวลาออกงาน",
                        data: "leaving_work",
                        className: "text-center",
                        render: function(data, type, row) {
                            // Split the datetime string by space and take the time part
                            return data.split(' ')[1];
                        }
                    },
                    {
                        title: "หมายเกตุ",
                        data: "attendance_status"
                    }
                ],
                destroy: true // This allows you to reinitialize DataTable without throwing an error
            });
        }
    }

    function createPDF() {
        var startDate = $('#start_date').val();
        var endDate = $('#end_date').val();
        var userId = localStorage.getItem("user_id"); // Properly retrieve the user_id from localStorage

        // Include user_id in the URL parameters
        window.open(`./Report_on_entry_and_exit_times_pdf.php?start_date=${startDate}&end_date=${endDate}&user_id=${userId}`, '_blank');
    }

    $(document).ready(function() {
        $('#myTable').DataTable(); // เปลี่ยน #myTable เป็น ID ของตารางของคุณ
    });
</script>
<?php include("../footer.php") ?>