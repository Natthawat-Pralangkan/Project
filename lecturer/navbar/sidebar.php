<aside class="sidebar" id="bg">
    <a href="http://localhost/importexcel/pages/student_classroom/" class="brand-link" id="bg">
        <!-- <img src="http://localhost/importexcel/images/teacher_1048950.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-light menu-text">NUNTABUREE- ครู </span>
    </a>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active d-inline-block" style="font-size: 20px;" href="./home.php">
                <i class="fa-solid fa-house spani"></i><span class="menu-text">หน้าหลัก</span>
            </a>

        </li>
        <li class="nav-item">
            <a class="nav-link active d-inline-block" style="font-size: 20px;" href="./submit_a_complaint.php">
            <i class="fa-solid fa-file-lines spani"></i><span class="menu-text">ยื่นคำร้อง</span>
            </a>

        </li>
        <li class="nav-item">
            <a class="nav-link d-inline-block" style="font-size: 20px;" href="./follow_up_on_requests.php">
            <i class="fa-solid fa-file-lines spani"></i><span class="menu-text">ติดตามคำร้อง</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link d-inline-block" style="font-size: 20px;" href="./Report_on_entry_and_exit_times.php">
            <i class="fa-solid fa-file spani"></i></i></i></i><span class="menu-text">ขอรายงานการลง เวลาเข้า - ออกงาน</span>
            </a> 
        </li>
        <li class="nav-item">
            <a class="nav-link d-inline-block" style="font-size: 20px;" href="./order_inside_outside.php">
            <i class="fa-solid fa-clipboard spani"></i></i><span class="menu-text">คำสั่งภายใน - ภายนอก</span>
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
</script>