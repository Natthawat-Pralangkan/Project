<?php include("../servers/connect.php"); ?>
<?php include("../header.php"); ?>
<div class="wrapper">
    <?php include('./navbar/sidebar.php'); ?>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <?php include('./navbar/navuser.php'); ?>
        <script src="./js/order_inside_outside.js"></script>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <h2 class="m-0">คำสั่งภายใน - ภายนอก</h2>
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="./home.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">คำสั่งภายใน - ภายนอก</li>
                    </ol>
                </div>
            </div>
            <a href=""></a>
        </div>
        <div class="content">
            <div class="mt-3">
                <table id="order_inside_outside" class="table">
                    <thead>
                        <tr>
                            <th>วัน/เดือน/ปี</th>
                            <th>ชื่อหัวข้อคำสั่ง</th>
                            <th>ไฟล์คำสั่งภายใน/ภายนอก</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>12/06/66</td>
                            <td>การยื่นใบขอเบิกจ่ายค่าพัสดุ</td>
                            <td>คำร้องงบประมาณ</td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include("../footer.php") ?>