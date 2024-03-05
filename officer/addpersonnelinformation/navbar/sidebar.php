<aside class="sidebar" id="bg">
    <div class="text-center my-4" style="height : 28px;">
        <h5 id="title_web" class="text-white" >NUNTABUREE-เจ้าหน้าที่ฝ่ายบุคคล</h5>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/officer/addpersonnelinformation/home') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link active d-inline-block" style="font-size: 18px;" href="./home.php">
                <i class="fa-solid fa-house spani"></i><span id="text-a" class="menu-text">หน้าหลัก</span>
            </a>
        </li>
        <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/officer/addpersonnelinformation/check_the_request') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link active d-inline-block" style="font-size: 18px;" href="./check_the_request.php">
                <i class="fa-solid fa-file-lines spani"></i><span id="text-b" class="menu-text">ตรวจสอบคำร้อง</span>
            </a>
        </li>
        <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/officer/addpersonnelinformation/Report_on_entry_and_exit_times') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link active d-inline-block" style="font-size: 18px;" href="./Report_on_entry_and_exit_times.php">
                <i class="fa-solid fa-file-lines spani"></i><span id="text-c" class="menu-text">ขอรายงานการลง เวลาเข้า - ออกงาน</span>
            </a>
        </li>
        <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/officer/addpersonnelinformation/addpersonnelinformation') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link active d-inline-block" style="font-size: 18px;" href="./addpersonnelinformation.php">
                <i class="fa-solid fa-user-plus spani "></i><span id="text-d" class="menu-text">เพิ่มข้อมูลบุคลากรน</span>
            </a>
        </li>
        <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/officer/addpersonnelinformation/List_of_learning_subject_gros') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link active d-inline-block" style="font-size: 18px;" href="./List_of_learning_subject_gros.php">
                <i class="fa-solid fa-user-plus spani "></i><span id="text-d" class="menu-text">จัดการหัวหน้ากลุ่มสาระการเรียนรู้</span>
            </a>
        </li>
    </ul>

</aside>
<script>
    // $.ajax({
    //     url: "../../servers/function",
    //     type: "POST",
    //     data: {
    //         function: "get_userbyid",
    //         user_id: localStorage.getItem("user_id")
    //     },
    //     success: function(res) {
    //         var datas = JSON.parse(res)
    //         $("#imageUser").attr('src', datas[0].image_user).show();
    //         $("#fullnameNav").html(datas[0].user_name)
    //     }
    // })
    $(document).ready(function() {
        let status = true;
        $("#toggleSidebar").click(function() {
            status = !status; // Toggle the status variable
            $("#title_web").toggleClass("d-none", !status).toggleClass("d-block", status);
            $(".menu-text").toggleClass("d-none", !status).toggleClass("d-block,menu-text", status);
        });
    });
</script>