<?php include("../servers/connect.php"); ?>
<?php include("../header.php"); ?>
<div class="wrapper">
    <?php include('./navbar/sidebar.php'); ?>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <?php include('./navbar/navuser.php'); ?>
        <script src="./js/addpersonnelinformation.js"></script>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <h2 class="m-0">เพิ่มข้อมูลบุคลากร</h2>
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="./home.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">เพิ่มข้อมูลบุคลากร</li>
                    </ol>
                </div>
            </div>
            <a href=""></a>
        </div>
        <div class="mt-5 mx-3">
            <div class="mt-3">
                <table id="addpersonnelinformation" class="table">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>รูปภาพ</th>
                            <th>คำนำหน้า</th>
                            <th>ชื่อ</th>
                            <th>นามสกุล</th>
                            <th>ตำแหน่ง</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
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

    function submitForm() {
        // รับค่าจากฟอร์ม
        var userName = document.getElementById('user-name').value;
        var userId = document.getElementById('user-id').value;

        // สร้าง FormData และเพิ่มข้อมูล
        var formData = new FormData();
        formData.append('user_name', userName);
        formData.append('user_id', userId);

        // ส่งข้อมูลไปยังเซิร์ฟเวอร์ผ่าน AJAX
        fetch('path/to/your/server/script.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                // ปิด modal หลังจากบันทึกข้อมูลสำเร็จ
                $('#insertModal').modal('hide');
                // อัปเดต UI หรือแสดงข้อความสำเร็จ
            })
            .catch(error => console.error('Error:', error));
    }
</script>
<?php include("../../footer.php") ?>