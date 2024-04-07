<?php include("../servers/connect.php"); ?>
<?php include("../header.php"); ?>
<div class="wrapper">
    <?php include('./navbar/sidebar.php'); ?>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <?php include('./navbar/navuser.php'); ?>
        <!-- <script src="./js/addpersonnelinformation.js"></script> -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <h2 class="m-0">จัดการข้อมูลผู้ใช้ระบบ</h2>
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="./home.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">จัดการข้อมูลผู้ใช้ระบบ</li>
                    </ol>
                </div>
            </div>
            <a href=""></a>
        </div>
        <div class="mt-5 mx-3">
            <div class="mt-3">
                <table id="mytable" class="table">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ไอดีผู้ใช้</th>
                            <th>ชื่อ - นามสกุล</th>
                            <th>ตำแหน่ง</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    if (localStorage.getItem("id_type") != "0" && localStorage.getItem("id_user") == null) {
        localStorage.clear()
        window.location.href = "../"
    }
    $(document).ready(function() {
        // Initial rendering of DataTable
        $.ajax({
            url: 'get_fetchPersonnel', // Make sure this path is correct
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var table = $('#mytable').DataTable({
                    data: data,
                    columns: [{
                            // Use the render function to create a dynamic counter
                            data: null,
                            render: function(data, type, row, meta) {
                                return meta.row + 1; // meta.row starts at 0 for the first row
                            }
                        },
                        {
                            data: 'user_id'
                        },
                        {
                            data: 'user_name'
                        },
                        {
                            data: 'name_type'
                        },
                        {
                            data: null,
                            render: function(data, type, row) {
                                // Return the button with data attributes for user id and modal target
                                return '<button class="btn btn-danger cancel-button" data-id="' + row.id + '">ลบ</button>';
                            }
                        }
                    ],
                    "destroy": true // This ensures the table is reinitialized properly
                });
            },
            error: function(xhr, status, error) {
                console.error("An error occurred: " + status + " " + error);
            }
        });
    });
    $(document).on('click', '.cancel-button', function() {
        var id = $(this).data('id'); // Get the ID of the request to be cancelled

        $.ajax({
            url: 'update_status', // URL to the server-side script for updating status
            type: 'POST',
            data: {
                id: id,
                status: 1
            }, // Send ID and new status
            dataType: 'json', // Expect JSON response
            success: function(response) {
                // Handle successful response
                Swal.fire({
                    title: "ลบผู้ใช้งานสำเร็จ!",
                    text: response.message,
                    icon: "success",
                    confirmButtonText: "ยืนยัน" // Change the text of the confirmation button
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload(); // Reload the page after confirmation
                    }
                });
            },
            error: function(xhr, status, error) {
                // Handle error response
                alert('ไม่สามารถลบผู้ใช้งานได้');
            }
        });
    });
</script>
<?php include("../footer.php") ?>