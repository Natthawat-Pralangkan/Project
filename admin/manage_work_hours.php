<?php include("../servers/connect.php"); ?>
<?php
include("../header.php");

// ดึงข้อมูลเวลาออกจากฐานข้อมูล
$query = "SELECT check_in_time, check_out_time FROM time_logs ORDER BY id DESC LIMIT 1";
$stmt = $db->prepare($query);
$stmt->execute();

$timeLogs = $stmt->fetch(PDO::FETCH_ASSOC);


?>

<style>
    #currentTime {
        font-size: 24px;
    }

    .time-container {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 20px;
        /* ช่องว่างระหว่างเวลาเข้าและเวลาออก */
    }
</style>

<body>
    <div class="wrapper">
        <?php include('./navbar/sidebar.php'); ?>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <?php include('./navbar/navuser.php'); ?>
            <script src="./js/time_clocking_system.js"></script>
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <h2 class="m-0">จัดการเวลาการลงเวลา เข้า - ออกงาน</h2>
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="./home.php">หน้าหลัก</a></li>
                            <li class="breadcrumb-item active">จัดการเวลาการลงเวลา เข้า - ออกงาน</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5 mx-3">
                <div id="currentTime" class="mt-3" style="font-size: 24px;"></div>

                <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal" style="font-size: 24px;">
                    เพิ่มเวลาเข้าออกงาน
                </button>

                <div id="currentTime" class="mt-3 text-center" style="font-size: 24px;">
                    <?php if ($timeLogs): ?>
                        <div class="time-container">
                            <div class="time-item">
                                <p>เวลาเข้า: <?php echo htmlspecialchars($timeLogs['check_in_time']); ?></p>
                            </div>
                            <div class="time-item">
                                <p>เวลาออก: <?php echo htmlspecialchars($timeLogs['check_out_time']); ?></p>
                            </div>
                        </div>
                    <?php else: ?>
                        <p>ยังไม่มีข้อมูลเวลา</p>
                    <?php endif; ?>
                </div>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content px-2">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">เลือกเวลา เข้า - ออกงาน</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                        <label for="checkInTime" class="form-label">เวลาเข้า:</label>
                                        <div class="row">
                                            <div class="col-5">
                                                <select name="checkInHour" id="checkInHour" class="form-control text-center">
                                                    <option value="" disabled selected>เลือกชั่วโมง</option>
                                                    <option value="00">00</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                </select>
                                            </div>
                                            <div class="col-2">
                                                :
                                            </div>
                                            <div class="col-5">
                                                <select name="checkInMinute" id="checkInMinute" class="form-control text-center">
                                                    <option value="" disabled selected>เลือกนาที</option>
                                                    <option value="00">00</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                    <option value="24">24</option>
                                                    <option value="25">25</option>
                                                    <option value="26">26</option>
                                                    <option value="27">27</option>
                                                    <option value="28">28</option>
                                                    <option value="29">29</option>
                                                    <option value="30">30</option>
                                                    <option value="31">31</option>
                                                    <option value="32">32</option>
                                                    <option value="33">33</option>
                                                    <option value="34">34</option>
                                                    <option value="35">35</option>
                                                    <option value="36">36</option>
                                                    <option value="37">37</option>
                                                    <option value="38">38</option>
                                                    <option value="39">39</option>
                                                    <option value="40">40</option>
                                                    <option value="41">41</option>
                                                    <option value="42">42</option>
                                                    <option value="43">43</option>
                                                    <option value="44">44</option>
                                                    <option value="45">45</option>
                                                    <option value="46">46</option>
                                                    <option value="47">47</option>
                                                    <option value="48">48</option>
                                                    <option value="49">49</option>
                                                    <option value="50">50</option>
                                                    <option value="51">51</option>
                                                    <option value="52">52</option>
                                                    <option value="53">53</option>
                                                    <option value="54">54</option>
                                                    <option value="55">55</option>
                                                    <option value="56">56</option>
                                                    <option value="57">57</option>
                                                    <option value="58">58</option>
                                                    <option value="59">59</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="checkOutTime" class="form-label">เวลาออก:</label>
                                        <div class="row">
                                            <div class="col-5">
                                                <select name="checkOutHour" id="checkOutHour" class="form-control text-center">
                                                    <option value="" disabled selected>เลือกชั่วโมง</option>
                                                    <option value="00">00</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                </select>
                                            </div>
                                            <div class="col-2">
                                                :
                                            </div>
                                            <div class="col-5">
                                                <select name="checkOutMinute" id="checkOutMinute" class="form-control text-center">
                                                    <option value="" disabled selected>เลือกนาที</option>
                                                    <option value="00">00</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                    <option value="24">24</option>
                                                    <option value="25">25</option>
                                                    <option value="26">26</option>
                                                    <option value="27">27</option>
                                                    <option value="28">28</option>
                                                    <option value="29">29</option>
                                                    <option value="30">30</option>
                                                    <option value="31">31</option>
                                                    <option value="32">32</option>
                                                    <option value="33">33</option>
                                                    <option value="34">34</option>
                                                    <option value="35">35</option>
                                                    <option value="36">36</option>
                                                    <option value="37">37</option>
                                                    <option value="38">38</option>
                                                    <option value="39">39</option>
                                                    <option value="40">40</option>
                                                    <option value="41">41</option>
                                                    <option value="42">42</option>
                                                    <option value="43">43</option>
                                                    <option value="44">44</option>
                                                    <option value="45">45</option>
                                                    <option value="46">46</option>
                                                    <option value="47">47</option>
                                                    <option value="48">48</option>
                                                    <option value="49">49</option>
                                                    <option value="50">50</option>
                                                    <option value="51">51</option>
                                                    <option value="52">52</option>
                                                    <option value="53">53</option>
                                                    <option value="54">54</option>
                                                    <option value="55">55</option>
                                                    <option value="56">56</option>
                                                    <option value="57">57</option>
                                                    <option value="58">58</option>
                                                    <option value="59">59</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                            </div>

                            <div class="d-grid gap-2 mt-4 pb-2">
                                <button type="button" id="submitTime" class="btn btn-primary">บันทึกเวลา</button>
                            </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>

    <!-- Script สำหรับแสดงเวลาปัจจุบัน -->
    <script>
        if (localStorage.getItem("id_type") != "0" && localStorage.getItem("id_user") == null) {
            localStorage.clear();
            window.location.href = "../";
        }

        function updateTime() {
            const currentTimeElement = document.getElementById('currentTime');
            const now = new Date();
            const timeString = now.toLocaleTimeString('th-TH', {
                timeZone: 'Asia/Bangkok'
            });
            currentTimeElement.textContent = 'เวลาปัจจุบัน: ' + timeString;
        }

        // อัปเดตเวลาทุกวินาที
        setInterval(updateTime, 1000);
        updateTime(); // เรียกครั้งแรกเพื่อแสดงเวลาทันทีที่โหลดหน้าเว็บ

        // ใช้ Swal.fire เพื่อแสดงผลลัพธ์หลังจากส่งข้อมูลสำเร็จ
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('submitTime').addEventListener('click', function(event) {
                event.preventDefault(); // ป้องกันการรีเฟรชหน้า

                // ดึงค่าจาก select input
                let checkInHour = document.getElementById('checkInHour').value;
                let checkInMinute = document.getElementById('checkInMinute').value;
                let checkOutHour = document.getElementById('checkOutHour').value;
                let checkOutMinute = document.getElementById('checkOutMinute').value;

                // ตรวจสอบว่าค่าถูกต้องก่อนส่ง
                if (!checkInHour || !checkInMinute || !checkOutHour || !checkOutMinute) {
                    Swal.fire({
                        title: "ข้อมูลไม่ครบถ้วน",
                        text: 'กรุณาเลือกเวลาทั้งหมด',
                        icon: "warning",
                        confirmButtonText: "ตกลง",
                    });
                    return;
                }

                // สร้างเวลาในฟอร์แมต HH:MM:SS
                let checkInTime = `${checkInHour}:${checkInMinute}:00`;
                let checkOutTime = `${checkOutHour}:${checkOutMinute}:00`;

                // ใช้ Ajax ส่งข้อมูลไปยัง PHP
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "save_time", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        Swal.fire({
                            title: "บันทึกเวลาสำเร็จ!",
                            // text: xhr.responseText, // แสดงข้อความจาก PHP
                            icon: "success",
                            confirmButtonText: "ยืนยัน", // เปลี่ยนข้อความของปุ่มยืนยัน
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload(); // รีเฟรชหน้าเมื่อคลิกปุ่มยืนยัน
                            }
                        });
                    }
                };
                xhr.send(`checkInTime=${checkInTime}&checkOutTime=${checkOutTime}`);
            });
        });
    </script>
</body>

<?php include("../footer.php") ?>