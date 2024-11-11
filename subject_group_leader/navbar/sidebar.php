<aside class="sidebar" id="bg">
    <div class="text-center my-4" style="height : 28px">
        <h4 id="title_web" class="text-white">NUNTABUREE - ระบบบุคลากร</h4>
    </div>
    <ul class="nav flex-column">
            <li style="" id="" class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/subject_group_leader/Subject_group_home') !== false ? 'active-menu' : ''; ?>">
                <a class="nav-link d-inline-block" style="font-size: 16px;" href="./Subject_group_home.php">
                    <i class="fa-solid fa-file-lines spani"></i><span class="menu-text">หน้าหลัก</span>
                </a>
            </li>
            <li style="" id="" class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/subject_group_leader/Subject_group_leader') !== false ? 'active-menu' : ''; ?>">
                <a class="nav-link d-inline-block" style="font-size: 16px;" href="./Subject_group_leader.php">
                    <i class="fa-solid fa-file-lines spani"></i><span class="menu-text">พิจารณาและอนุมัติคำร้อง</span>
                </a>
            </li>
            <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/subject_group_leader/Petition_history') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link d-inline-block" style="font-size: 16px;" href="./Petition_history.php">
                <i class="fa-solid fa-file-lines spani"></i><span class="menu-text">ประวัติคำร้อง</span>
            </a>
        </li>
        
    </ul>

</aside>
