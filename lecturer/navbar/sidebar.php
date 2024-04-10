<aside class="sidebar" id="bg">
    <div class="text-center my-4" style="height : 28px">
        <h4 id="title_web" class="text-white">NUNTABUREE - ระบบบุคลากร</h4>
    </div>
    <ul class="nav flex-column">
        <!-- <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/lecturer/home') !== false ? 'active-menu' : ''; ?>">
            <a class="nav-link active d-inline-block" style="font-size: 16px;" href="./home.php">
                <i class="fa-solid fa-house spani"></i><span class="menu-text">หน้าหลัก</span>
            </a>
        </li> -->
        <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/lecturer/home') !== false && strpos($_SERVER['REQUEST_URI'], 'Project/lecturer/home_director') === false ? 'active-menu' : ''; ?>">
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
        <br>
        <div style="color: #000000; display: none;" id="subject">
            <!-- <hr class="border-2 opacity-50"> -->
            <h5 class="mx-4" style="color: #000000;">หัวหน้ากลุ่มสาระการเรียนรู้</h5>
            <li style="" id="" class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/lecturer/Subject_group_leader') !== false ? 'active-menu' : ''; ?>">
                <a class="nav-link d-inline-block" style="font-size: 16px;" href="./Subject_group_leader.php">
                    <i class="fa-solid fa-file-lines spani"></i><span class="menu-text">หัวหน้ากลุ่มสาระ</span>
                </a>
            </li>
        </div>
        <br>
        <!-- รองผู้อำนวยการ -->
        <div style="color: #000000; display: none;" id="subjectdirector">

            <h5 class="mx-4" style="color: #000000;">รองผู้อำนวยการ</h5>
            <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/lecturer/director_home') !== false ? 'active-menu' : ''; ?>">
                <a class="nav-link active d-inline-block" style="font-size: 16px;" href="./director_home.php">
                    <i class="fa-solid fa-house spani"></i><span class="menu-text">หน้าหลัก</span>
                </a>
            </li>
            <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/lecturer/director_Personnel_information') !== false ? 'active-menu' : ''; ?>">
                <a class="nav-link active d-inline-block" style="font-size: 16px;" href="./director_Personnel_information.php">
                    <i class="fa-solid fa-file-lines spani"></i><span class="menu-text">ตรวจสอบข้อมูลบุคลากร</span>
                </a>
            </li>
            <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/lecturer/director_check_the_request') !== false ? 'active-menu' : ''; ?>">
                <a class="nav-link d-inline-block" style="font-size: 16px;" href="./director_check_the_request.php">
                    <i class="fa-solid fa-file-lines spani"></i><span class="menu-text">ตรวจสอบ/พิจารณาและอนุมัติคำร้อง</span>
                </a>
            </li>
            <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/lecturer/director_Report_on_entry_and_exit_times') !== false ? 'active-menu' : ''; ?>">
                <a class="nav-link d-inline-block" style="font-size: 16px;" href="./director_Report_on_entry_and_exit_times.php">
                    <i class="fa-solid fa-file-lines spani"></i><span class="menu-text">ขอรายงานการลง เวลาเข้า - ออกงาน</span>
                </a>
            </li>
        </div>

        <!-- ผู้อำนวยการ -->
        <div style="color: #000000; display: none;" id="subjectdeputy_director">

            <h5 class="mx-4" style="color: #000000;">ผู้อำนวยการ</h5>
            <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/lecturer/deputy_director_home') !== false ? 'active-menu' : ''; ?>">
                <a class="nav-link active d-inline-block" style="font-size: 16px;" href="./deputy_director_home.php">
                    <i class="fa-solid fa-house spani"></i><span class="menu-text">หน้าหลัก</span>
                </a>
            </li>
            <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/lecturer/deputy_director_Personnel_information') !== false ? 'active-menu' : ''; ?>">
                <a class="nav-link active d-inline-block" style="font-size: 16px;" href="./deputy_director_Personnel_information.php">
                    <i class="fa-solid fa-file-lines spani"></i><span class="menu-text">ตรวจสอบข้อมูลบุคลากร</span>
                </a>
            </li>
            <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/lecturer/deputy_director_check_the_request') !== false ? 'active-menu' : ''; ?>">
                <a class="nav-link d-inline-block" style="font-size: 16px;" href="./deputy_director_check_the_request.php">
                    <i class="fa-solid fa-file-lines spani"></i><span class="menu-text">ตรวจสอบ/พิจารณาและอนุมัติคำร้อง</span>
                </a>
            </li>
            <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/lecturer/deputy_director_Report_on_entry_and_exit_times.php') !== false ? 'active-menu' : ''; ?>">
                <a class="nav-link d-inline-block" style="font-size: 16px;" href="./deputy_director_Report_on_entry_and_exit_times.php">
                    <i class="fa-solid fa-file-lines spani"></i><span class="menu-text">ขอรายงานการลง เวลาเข้า - ออกงาน</span>
                </a>
            </li>
        </div>


        <!-- เจ้าหน้าที่วิชาการ -->
        <div style="color: #000000; display: none;" id="subjectacademic">

            <h5 class="mx-4" style="color: #000000;">เจ้าหน้าฝ่ายที่วิชาการ</h5>
            <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/lecturer/academic_home') !== false ? 'active-menu' : ''; ?>">
                <a class="nav-link active d-inline-block" style="font-size: 16px;" href="./academic_home.php">
                    <i class="fa-solid fa-house spani"></i><span class="menu-text">หน้าหลัก</span>
                </a>
            </li>
            <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/lecturer/academic_check_the_request') !== false ? 'active-menu' : ''; ?>">
                <a class="nav-link active d-inline-block" style="font-size: 16px;" href="./academic_check_the_request.php">
                    <i class="fa-solid fa-file-lines spani"></i><span class="menu-text">ตรวจสอบคำร้อง</span>
                </a>
            </li>
            <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/lecturer/academic_Report_on_entry_and_exit_times') !== false ? 'active-menu' : ''; ?>">
                <a class="nav-link d-inline-block" style="font-size: 16px;" href="./academic_Report_on_entry_and_exit_times.php">
                    <i class="fa-solid fa-file-lines spani"></i><span class="menu-text">ขอรายงานการลง เวลาเข้า - ออกงาน</span>
                </a>
            </li>
        </div>

        <!-- เจ้าหน้าที่บุคคล -->
        <div style="color: #000000; display: none;" id="subjectperson">

            <h5 class="mx-4" style="color: #000000;">เจ้าหน้าที่ฝ่ายบุคคล</h5>
            <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/lecturer/person_home') !== false ? 'active-menu' : ''; ?>">
                <a class="nav-link active d-inline-block" style="font-size: 18px;" href="./person_home.php">
                    <i class="fa-solid fa-house spani"></i><span id="text-a" class="menu-text">หน้าหลัก</span>
                </a>
            </li>
            <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/lecturer/person_check_the_request') !== false ? 'active-menu' : ''; ?>">
                <a class="nav-link active d-inline-block" style="font-size: 18px;" href="./person_check_the_request.php">
                    <i class="fa-solid fa-file-lines spani"></i><span id="text-b" class="menu-text">ตรวจสอบคำร้อง</span>
                </a>
            </li>
            <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/lecturer/person_Report_on_entry_and_exit_times') !== false ? 'active-menu' : ''; ?>">
                <a class="nav-link active d-inline-block" style="font-size: 18px;" href="./person_Report_on_entry_and_exit_times.php">
                    <i class="fa-solid fa-file-lines spani"></i><span id="text-c" class="menu-text">ขอรายงานการลง เวลาเข้า - ออกงาน</span>
                </a>
            </li>
            <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/lecturer/person_addpersonnelinformation') !== false ? 'active-menu' : ''; ?>">
                <a class="nav-link active d-inline-block" style="font-size: 18px;" href="./person_addpersonnelinformation.php">
                    <i class="fa-solid fa-user-plus spani "></i><span id="text-d" class="menu-text">เพิ่มข้อมูลบุคลากรน</span>
                </a>
            </li>
            <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/lecturer/person_List_of_learning_subject_gros') !== false ? 'active-menu' : ''; ?>">
                <a class="nav-link active d-inline-block" style="font-size: 18px;" href="./person_List_of_learning_subject_gros.php">
                    <i class="fa-solid fa-user-plus spani "></i><span id="text-d" class="menu-text">จัดการหัวหน้ากลุ่มสาระการเรียนรู้</span>
                </a>
            </li>
        </div>

        <!-- เจ้าหน้าที่งบประมาณ -->
        <div style="color: #000000; display: none;" id="subjectbudget">

            <h5 class="mx-4" style="color: #000000;">เจ้าหน้าที่ฝ่ายบุคคล</h5>
            <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/lecturer/budget_home') !== false ? 'active-menu' : ''; ?>">
                <a class="nav-link active d-inline-block" style="font-size: 16px;" href="./budget_home.php">
                    <i class="fa-solid fa-house spani"></i><span class="menu-text">หน้าหลัก</span>
                </a>
            </li>
            <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/lecturer/budget_check_the_request') !== false ? 'active-menu' : ''; ?>">
                <a class="nav-link active d-inline-block" style="font-size: 16px;" href="./budget_check_the_request.php">
                    <i class="fa-solid fa-file-lines spani"></i><span class="menu-text">ตรวจสอบคำร้อง</span>
                </a>
            </li>
            <li class="nav-item ms-3 me-1 py-1 <?php echo strpos($_SERVER['REQUEST_URI'], 'Project/lecturer/budget_Report_on_entry_and_exit_times') !== false ? 'active-menu' : ''; ?>">
                <a class="nav-link d-inline-block" style="font-size: 16px;" href="./budget_Report_on_entry_and_exit_times.php">
                    <i class="fa-solid fa-file-lines spani"></i><span class="menu-text">ขอรายงานการลง เวลาเข้า - ออกงาน</span>
                </a>
            </li>
        </div>

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
            // console.log(res);
            var datas = JSON.parse(res);
            console.log(datas);
            // ตรวจสอบว่าผู้ใช้มี id_subject_group หรือไม่
            if (datas[0].id_subject_group != null && datas[0].id_subject_group != '') {
                var id_subject_group = datas[0].id_subject_group; // กำหนดค่า id_subject_group
                if (id_subject_group == 3 || id_subject_group == 4 || id_subject_group == 5 || id_subject_group == 6 || id_subject_group == 7 || id_subject_group == 8 || id_subject_group == 9) {
                    // ถ้ามี, แสดงเมนู "หัวหน้ากลุ่มสาระ"
                    $('#subject').show(); // ใช้ .show() ของ jQuery เพื่อแสดงเมนู
                } else if (id_subject_group == 2) {
                    // <!-- รองผู้อำนวยการ -->
                    // ซ่อนเมนูเมื่อ id_subject_group เป็นค่าว่าง
                    $('#subjectdirector').show(); // ใช้ .show() ของ jQuery เพื่อแสดงเมนู
                } else if (id_subject_group == 1) {
                    // <!-- เจ้าหน้าที่วิชาการ -->
                    $('#subjectdeputy_director').show();
                } else if (id_subject_group == 14) {
                    // <!-- ผู้อำนวยการ -->
                    $('#subjectacademic').show();
                } else if (id_subject_group == 16) {
                    // <!-- เจ้าหน้าที่บุคคล -->
                    $('#subjectperson').show();
                } else if (id_subject_group == 11) {
                    // <!-- เจ้าหน้าที่งบประมาณ -->
                    $('#subjectbudget').show();
                } else {
                    $('#subject').hide(); // ใช้ .hide() ของ jQuery เพื่อซ่อนเมนู
                    $('#subjectdirector').hide(); // ใช้ .hide() ของ jQuery เพื่อซ่อนเมนู
                    $('#subjectdeputy_director').hide(); // ใช้ .hide() ของ jQuery เพื่อซ่อนเมนู
                    $('#subjectacademic').hide(); // ใช้ .hide() ของ jQuery เพื่อซ่อนเมนู
                    $('#subjectbudget').hide(); // ใช้ .hide() ของ jQuery เพื่อซ่อนเมนู
                }
            }
        }
    });
</script>