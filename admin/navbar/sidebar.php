<aside class="sidebar" id="bg">
    <div class="text-center my-4" style="height : 28px;">
        <h5 id="title_web" class="text-white">NUNTABUREE-ผู้ดูแลระบบ</h5>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/admin/home') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link active d-inline-block" style="font-size: 18px;" href="./home.php">
                <i class="fa-solid fa-house spani"></i><span  class="menu-text">หน้าหลัก</span>
            </a>
        </li>
        <!-- <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/admin/Manage_requests') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link active d-inline-block" style="font-size: 18px;" href="./Manage_requests.php">
                <i class="fa-solid fa-file-lines spani"></i><span  class="menu-text">จัดการคำร้อง</span>
            </a>
        </li> -->
        <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/admin/Report_a_request') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link active d-inline-block" style="font-size: 18px;" href="./Report_a_request.php">
                <i class="fa-solid fa-file-lines spani"></i><span  class="menu-text">รายงานคำร้อง</span>
            </a>
        </li>
        <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/admin/Check_the_request') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link active d-inline-block" style="font-size: 18px;" href="./Check_the_request.php">
                <i class="fa-solid fa-file-lines spani"></i><span  class="menu-text">ตรวจสอบคำร้อง</span>
            </a>
        </li>
        <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/admin/Request_a_time_entry_and_exit_report') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link active d-inline-block" style="font-size: 18px;" href="./Request_a_time_entry_and_exit_report.php">
                <i class="fa-solid fa-file-lines spani"></i><span  class="menu-text">รายงานการลง เวลาเข้า - ออกงาน</span>
            </a>
        </li>
        <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/admin/addpersonnelinformation') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link active d-inline-block" style="font-size: 18px;" href="./addpersonnelinformation.php">
                <i class="fa-solid fa-user-plus spani"></i><span  class="menu-text">จัดการข้อมูลผู้ใช้ระบบ</span>
            </a>
        </li>
    </ul>

</aside>
<script>

    $(document).ready(function() {
        let status = true;
        $("#toggleSidebar").click(function() {
            status = !status; // Toggle the status variable
            $("#title_web").toggleClass("d-none", !status).toggleClass("d-block", status);
            $(".menu-text").toggleClass("d-none", !status).toggleClass("d-block,menu-text", status);
        });
    });

    // $(document).ready(function() {
    //     let status = true;
    //     $("#toggleSidebar").click(function() {
    //         status = !status; // Toggle the status variable
    //         $("#title_web").toggleClass("d-none", !status).toggleClass("d-block", status);
    //     });
    // });
</script>