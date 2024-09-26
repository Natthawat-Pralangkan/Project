<aside class="sidebar" id="bg">
    <div class="text-center my-4" style="height : 28px;">
        <h5 id="title_web" class="text-white">NUNTABUREE-ผู้ดูแลระบบ</h5>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/admin/home') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link active d-inline-block" style="font-size: 18px;" href="./home.php">
                <i class="fa-solid fa-house spani"></i><span class="menu-text">หน้าหลัก</span>
            </a>
        </li>
        <!-- <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/admin/Manage_requests') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link active d-inline-block" style="font-size: 18px;" href="./Manage_requests.php">
                <i class="fa-solid fa-file-lines spani"></i><span  class="menu-text">จัดการคำร้อง</span>
            </a>
        </li> -->
        <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/admin/Report_a_request') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link active d-inline-block" style="font-size: 18px;" href="./Report_a_request.php">
                <i class="fa-solid fa-file-lines spani"></i><span class="menu-text">รายงานคำร้อง</span>
            </a>
        </li>
        <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/admin/Check_the_request') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link active d-inline-block" style="font-size: 18px;" href="./Check_the_request.php">
                <i class="fa-solid fa-file-lines spani"></i><span class="menu-text">ตรวจสอบคำร้อง</span>
            </a>
        </li>
        <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/admin/Request_a_time_entry_and_exit_report') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link active d-inline-block" style="font-size: 18px;" href="./Request_a_time_entry_and_exit_report.php">
                <i class="fa-solid fa-file-lines spani"></i><span class="menu-text">รายงานการลง เวลาเข้า - ออกงาน</span>
            </a>
        </li>
        <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/admin/addpersonnelinformation') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link active d-inline-block" style="font-size: 18px;" href="./addpersonnelinformation.php">
                <i class="fa-solid fa-user-plus spani"></i><span class="menu-text">จัดการข้อมูลผู้ใช้ระบบ</span>
            </a>
        </li>
        <!-- <li class="nav-item ms-3 me-1 py-1">
            <a class="nav-link d-inline-block" style="font-size: 18px;" href="#timeClockingDropdown" data-bs-toggle="collapse" aria-expanded="false">
                <i class="fa-solid fa-user-plus spani"></i><span class="menu-text">จัดการระบบลงเวลาเข้า - ออกงาน</span>
            </a>
            <div class="collapse <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/admin/time_clocking_system') !== false ? 'show' : ''; ?>" id="timeClockingDropdown">
                <ul class="list-unstyled ms-3">
                    <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/admin/time_clocking_system?page=1') !== false ? 'active-menu' : ''; ?>">
                        <a class=" nav-item ms-3 me-1 py-1 nav-link " href="./time_clocking_system.php?page=1" style="font-size: 18px;" ata-bs-toggle="collapse">
                            <span class="menu-text">เพิ่มข้อมูลลงเวลา เข้า - ออกงาน</span>
                        </a>
                    </li>
                    <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/admin/manage_work_hours?page=2') !== false ? 'active-menu' : ''; ?>">
                        <a class=" nav-item ms-3 me-1 py-1 nav-link " href="./manage_work_hours.php?page=2" style="font-size: 18px;" ata-bs-toggle="collapse">
                            <span class="menu-text">จัดการเวลาการลงเวลา เข้า - ออกงาน</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li> -->
        <li class="nav-item ms-3 me-1 py-1">
            <a class="nav-link d-inline-block" style="font-size: 18px;" href="#timeClockingDropdown" data-bs-toggle="collapse" aria-expanded="<?php echo strpos($_SERVER['REQUEST_URI'], 'Project/admin/manage_work_hours') !== false || strpos($_SERVER['REQUEST_URI'], 'Project/admin/time_clocking_system') !== false ? 'true' : 'false'; ?>">
                <i class="fa-solid fa-user-plus spani"></i><span class="menu-text">จัดการระบบลงเวลาเข้า - ออกงาน</span>
            </a>
            <div class="collapse <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/admin/manage_work_hours') !== false || strpos($_SERVER['REQUEST_URI'], 'Project/admin/time_clocking_system') !== false ? 'show' : ''; ?>" id="timeClockingDropdown">
                <ul class="list-unstyled ms-3">
                    <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/admin/time_clocking_system?page=1') !== false ? 'active-menu' : ''; ?>">
                        <a class="nav-item ms-3 me-1 py-1 nav-link" href="./time_clocking_system.php?page=1" style="font-size: 18px;">
                            <span class="menu-text">เพิ่มข้อมูลลงเวลา เข้า - ออกงาน</span>
                        </a>
                    </li>
                    <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/admin/manage_work_hours?page=2') !== false ? 'active-menu' : ''; ?>">
                        <a class="nav-item ms-3 me-1 py-1 nav-link" href="./manage_work_hours.php?page=2" style="font-size: 18px;">
                            <span class="menu-text">จัดการเวลาการลงเวลา เข้า - ออกงาน</span>
                        </a>
                    </li>
                </ul>
            </div>
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