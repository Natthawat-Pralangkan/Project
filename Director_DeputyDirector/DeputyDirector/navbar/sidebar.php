<aside class="sidebar" id="bg">
    <div class="text-center my-4" style="height : 28px">
        <h4 id="title_web" class="text-secondary">NUNTABUREE-ผู้อำนวยการ</h4>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/Director_DeputyDirector/DeputyDirector/home') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link active d-inline-block" style="font-size: 16px;" href="./home.php">
                <i class="fa-solid fa-house spani"></i><span class="menu-text">หน้าหลัก</span>
            </a>
        </li>
        <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/Director_DeputyDirector/DeputyDirector/Personnel_information') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link active d-inline-block" style="font-size: 16px;" href="./Personnel_information.php">
                <i class="fa-solid fa-file-lines spani"></i><span class="menu-text">ตรวจสอบข้อมูลบุคลากร</span>
            </a>
        </li>
        <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/Director_DeputyDirector/DeputyDirector/check_the_request') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link d-inline-block" style="font-size: 16px;" href="./check_the_request.php">
                <i class="fa-solid fa-file-lines spani"></i><span class="menu-text">ตรวจสอบ/พิจารณาและอนุมัติคำร้อง</span>
            </a>
        </li>
        <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/Director_DeputyDirector/DeputyDirector/Report_on_entry_and_exit_times') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link d-inline-block" style="font-size: 16px;" href="./Report_on_entry_and_exit_times.php">
                <i class="fa-solid fa-file-lines spani"></i><span class="menu-text">รายงานการลง เวลาเข้า - ออกงาน</span>
            </a>
        </li>
        <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/Director_DeputyDirector/DeputyDirector/Request_form_more_system') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link d-inline-block" style="font-size: 16px;" href="./Request_form_more_system.php">
                <i class="fa-solid fa-file-lines spani"></i><span class="menu-text">ตรวจสอบ/พิจารณาและอนุมัติคำร้อง</span>
            </a>
        </li>
    </ul>
</aside>

<script>
    $.ajax({
        url: "../../servers/function",
        type: "POST",
        data: {
            function: "get_userbyid",
            user_id: localStorage.getItem("user_id")
        },
        success: function(res) {
            var datas = JSON.parse(res)
            $("#imageUser").attr('src', datas[0].image_user).show();
            $("#fullnameNav").html(datas[0].user_name)
        }
    })

    $(document).ready(function() {
        let status = true;
        $("#toggleSidebar").click(function() {
            status = !status; // Toggle the status variable
            $("#title_web").toggleClass("d-none", !status).toggleClass("d-block", status);
        });
    });
</script>