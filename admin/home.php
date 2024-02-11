<?php include("../header.php"); ?>
<div class="wrapper">
    <?php include('./navbar/sidebar.php'); ?>
    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <?php include('./navbar/navuser.php'); ?>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <h2 class="m-0">หน้าหลัก</h2>
                </div>
            </div>
            <a href=""></a>
        </div>
        <div class="content">
            <div class="row p-5 m-1">
                <div class="col-4">
                    <div class="shadow p-3 mb-5 bg-body rounded" style="width: 300px;height: 250px;">
                        <i class="fa-regular fa-id-card" style="font-size: 60px;"></i>
                        <h6 class="" style='font-size: 30px; text-align:right;width:100%;'>ครู/บุคคลากร</h6>
                        <h1 class="m-2" style='font-size: 50px; text-align:right;width:90%;'>30</h1>
                    </div>
                </div>
                <div class="col-4">
                    <div class="shadow p-3 mb-5 bg-body rounded" style="width: 300px;height: 250px;">
                        <i class="fa-solid fa-newspaper" style="font-size: 60px;"></i>
                        <h6 class="" style='font-size: 30px; text-align:right;width:100%;'>คำร้องทั้งหมด</h6>
                        <h1 class="m-2" style='font-size: 50px; text-align:right;width:90%;'>30</h1>
                    </div>
                </div>
                <div class="col-4">
                    <div class="shadow p-3 mb-5 bg-body rounded" style="width: 300px;height: 250px;">
                        <i class="fa-solid fa-newspaper" style="font-size: 60px;"></i>
                        <h6 class="" style='font-size: 30px; text-align:right;width:100%;'>คำร้องที่ยื่นทั้งหมด</h6>
                        <h1 class="m-2" style='font-size: 50px; text-align:right;width:90%;'>30</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    if(localStorage.getItem("type") != "0" && localStorage.getItem("id") == null){
        localStorage.clear()
        window.location.href ="../"
    }
</script>
<?php include("../footer.php") ?>