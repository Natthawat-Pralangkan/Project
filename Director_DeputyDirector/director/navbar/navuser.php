<nav class="navbar navbar-expand-lg" id="bgnav">
    <ul class="navbar-nav">
        <li class="nav-item">
            <button id="toggleSidebar" class="btn">
                <i class="fas fa-bars" style="font-size: 20px;"></i>
            </button>
        </li>
    </ul>
    <ul class="navbar-nav ms-auto d-flex flex-row">
        <li class="nav-item">
            <i class="fa-solid fa-arrow-right-from-bracket text-white" style="font-size: 20px;"></i>
        </li>
        <li class="nav-item">
            <h6 class="me-4 ms-3 text-white" id="nock">ออกจากระบบ</h6>
        </li>
    </ul>
</nav>

<script>
    $(document).ready(function() {
        $("#nock").click(function() {
            // กำหนดค่าให้กับตัวแปร response
            var response = {
                message: ""
            };

            // แสดงกล่องข้อความแจ้งเตือน
            Swal.fire({
                title: "ยืนยันการออกระบบ!",
                text: response.message,
                icon: "success",
                confirmButtonText: "ยืนยัน"
            }).then((result) => {
                if (result.isConfirmed) {
                    localStorage.clear();
                    window.location.href = "../../";
                }
            });
        });
        
    });
</script>