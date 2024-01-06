<aside class="sidebar" id="bg">
    <div class="text-center my-4" style="height : 28px">
        <h4 id="title_web" class="text-secondary">NUNTABUREE-ผู้ดูแลระบบ</h4>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/director/home') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link active d-inline-block" style="font-size: 16px;" href="./home.php">
                <i class="fa-solid fa-house spani"></i><span class="menu-text">หน้าหลัก</span>
            </a>
        </li>
        <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/director/Personnel_information') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link active d-inline-block" style="font-size: 16px;" href="./Personnel_information.php">
                <i class="fa-solid fa-file-lines spani"></i><span class="menu-text">ตรวจสอบข้อมูลบุคลากร</span>
            </a>
        </li>
        <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/director/check_consider_and_approve_the_request') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link d-inline-block" style="font-size: 16px;" href="./check_consider_and_approve_the_request.php">
                <i class="fa-solid fa-file-lines spani"></i><span class="menu-text">ตรวจสอบ/พิจารณาและอนุมัติคำร้อง</span>
            </a>
        </li>
        <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Request_a_time_entry_and_exit_report.php') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link d-inline-block" style="font-size: 16px;" href="./Request_a_time_entry_and_exit_report.php">
                <i class="fa-solid fa-file-lines spani"></i><span class="menu-text">ขอรายงานการลง เวลาเข้า - ออกงาน</span>
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