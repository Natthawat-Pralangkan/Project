<aside class="sidebar" id="bg">
    <div class="text-center my-4" style="height : 28px">
        <h4 id="title_web" class="text-white">NUNTABUREE-ครู</h4>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/lecturer/home') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link active d-inline-block" style="font-size: 16px;" href="./home.php">
                <i class="fa-solid fa-house spani"></i><span class="menu-text">หน้าหลัก</span>
            </a>
        </li>
        <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/lecturer/personal_information') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link active d-inline-block" style="font-size: 16px;" href="./personal_information.php">
                <i class="fa-solid fa-user spani"></i><span class="menu-text">ข้อมูลส่วนตัว</span>
            </a>
        </li>
        <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/lecturer/submit_a_complaint') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link active d-inline-block" style="font-size: 16px;" href="./submit_a_complaint.php">
                <i class="fa-solid fa-file-lines spani"></i><span class="menu-text">ยื่นคำร้อง</span>
            </a>
        </li>
        <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/lecturer/follow_up_on_requests') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link d-inline-block" style="font-size: 16px;" href="./follow_up_on_requests.php">
                <i class="fa-solid fa-file-lines spani"></i><span class="menu-text">ติดตามคำร้อง</span>
            </a>
        </li>
        <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/lecturer/order_inside_outside') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link d-inline-block" style="font-size: 16px;" href="./order_inside_outside.php">
                <i class="fa-solid fa-file-lines spani"></i><span class="menu-text">คำสั่งภายใน - ภายนอก</span>
            </a>
        </li>
        <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/lecturer/Report_on_entry_and_exit_times') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link d-inline-block" style="font-size: 16px;" href="./Report_on_entry_and_exit_times.php">
                <i class="fa-solid fa-file-lines spani"></i><span class="menu-text">ขอรายงานการลง เวลาเข้า - ออกงาน</span>
            </a>
        </li>
        <li style="display: none;" id="subject" class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/lecturer/Subject_group_leader') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link d-inline-block" style="font-size: 16px;" href="./Subject_group_leader.php">
                <i class="fa-solid fa-file-lines spani"></i><span class="menu-text">หัวหน้ากลุ่มสาระ</span>
            </a>
        </li>
    </ul>

</aside>
<script>
    $.ajax({
        url: "./navbar/get_user", // ตรวจสอบ URL ให้ถูกต้องตามไฟล์ PHP ที่คุณใช้
        type: "POST",
        data: {
            user_id: localStorage.getItem("user_id")
        },
        success: function(res) {
            var datas = JSON.parse(res);
            console.log(datas);

            // ตรวจสอบว่าผู้ใช้มี id_subject_group หรือไม่
            if (datas[0].id_subject_group != null && datas[0].id_subject_group != '') {
                // ถ้ามี, แสดงเมนู "หัวหน้ากลุ่มสาระ"
                $('#subject').show(); // ใช้ .show() ของ jQuery เพื่อแสดงเมนู
            }
        }
    });

    // $(document).ready(function() {
    //     let status = true;
    //     $("#toggleSidebar").click(function() {
    //         status = !status; // Toggle the status variable
    //         $("#title_web").toggleClass("d-none", !status).toggleClass("d-block", status);
    //         $(".menu-text").toggleClass("d-none", !status).toggleClass("d-block,menu-text", status);
    //     });
    // });
</script>