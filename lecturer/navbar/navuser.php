<nav class="navbar navbar-expand-lg" id="bgnav">
    <ul class="navbar-nav">
        <li class="nav-item">
            <button id="toggleSidebar" class="btn">
                <i class="fas fa-bars" style="font-size: 20px;"></i>
            </button>
        </li>
    </ul>
    <ul class="navbar-nav ms-auto d-flex flex-row align-items-center">
        <!-- Profile Picture and User Name -->
        <li class="nav-item d-flex align-items-center" style="margin-right: 30px;"> <!-- Increased right margin -->
            <img id="picture_nav" src="" alt="Profile Picture" style="width: 40px; height: 40px; border-radius: 50%; margin-right: 10px;">
            <span id="username" class="text-white"></span> <!-- User name will be displayed here -->
        </li>
        <!-- Logout Icon -->
        <li class="nav-item">
            <i class="fa-solid fa-arrow-right-from-bracket text-white" style="font-size: 20px;"></i>
        </li>
        <!-- Logout Text -->
        <li class="nav-item">
            <h6 class="me-4 ms-3 text-white" id="nock">ออกจากระบบ</h6>
        </li>
    </ul>
</nav>

<script>
    $(document).ready(function() {
        // Logout function
        $("#nock").click(function() {
            Swal.fire({
                title: "ยืนยันการออกระบบ!",
                text: "คุณต้องการออกจากระบบหรือไม่?",
                icon: "warning",
                confirmButtonText: "ยืนยัน"
            }).then((result) => {
                if (result.isConfirmed) {
                    localStorage.clear();
                    window.location.href = ".././";
                }
            });
        });

        // Fetch user data
        $.ajax({
            url: "http://localhost/Project/lecturer/navbar/get_userid",
            method: "POST",
            data: {
                user_id: localStorage.getItem("user_id")
            },
            success: function(response) {
                var data = JSON.parse(response);
                // console.log(data); // for debugging, ensure you're getting the correct data

                // Set profile picture
                $('#picture_nav').attr('src', data[0].picture);

                // Display user name and last name
                $('#username').text(data[0].user_name + " " + data[0].last_name);
            }
        });
    });
</script>
