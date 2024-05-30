<aside class="sidebar" id="bg">
    <div class="text-center my-4" style="height : 28px">
        <h4 id="title_web" class="text-white">NUNTABUREE-เจ้าหน้าที่ฝ่ายทั่วไป</h4>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/General_staff/home') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link active d-inline-block" style="font-size: 16px;" href="./home.php">
                <i class="fa-solid fa-house spani"></i><span class="menu-text">หน้าหลัก</span>
            </a>
        </li>
        <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/General_staff/submit_a_complaint') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link active d-inline-block" style="font-size: 16px;" href="./submit_a_complaint.php">
                <i class="fa-solid fa-file-lines spani"></i><span class="menu-text">ยื่นคำร้อง</span>
            </a>
        </li>
        <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/General_staff/follow_up_on_requests') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link d-inline-block" style="font-size: 16px;" href="./follow_up_on_requests.php">
                <i class="fa-solid fa-file-lines spani"></i><span class="menu-text">ติดตามคำร้อง</span>
            </a>
        </li>
        <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/General_staff/uploadcommand') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link d-inline-block" style="font-size: 16px;" href="./uploadcommand.php">
                <i class="fa-solid fa-file-lines spani"></i><span class="menu-text">อัพโหลดคำสั่งภายใน - ภายนอก</span>
            </a>
        </li>
        <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/General_staff/Report_on_entry_and_exit_times') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link d-inline-block" style="font-size: 16px;" href="./Report_on_entry_and_exit_times.php">
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
            $(".menu-text").toggleClass("d-none", !status).toggleClass("d-block,menu-text", status);
        });
    });
</script>