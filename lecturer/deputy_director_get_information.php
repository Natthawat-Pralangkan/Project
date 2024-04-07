<?php include("../servers/connect.php"); ?>
<?php include("../header.php"); ?>
<?php
// Ensure you have a database connection established here
function ConvertToThaiDate($value, $short = '1', $need_time = '1', $need_time_second = '0')
{
    $date_arr = explode(' ', $value);
    $date = $date_arr[0];
    if (isset($date_arr[1])) {
        $time = $date_arr[1];
    } else {
        $time = '';
    }
    $value = $date;
    if ($value != "0000-00-00" && $value != '') {
        $x = explode("-", $value);
        if ($short == false)
            $arrMM = array(1 => "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
        else
            $arrMM = array(1 => "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
        // return $x[2]." ".$arrMM[(int)$x[1]]." ".($x[0]>2500?$x[0]:$x[0]+543);
        if ($need_time == '1') {
            if ($need_time_second == '1') {
                $time_format = $time != '' ? date('H:i:s น.', strtotime($time)) : '';
            } else {
                $time_format = $time != '' ? date('H:i น.', strtotime($time)) : '';
            }
        } else {
            $time_format = '';
        }

        return (int)$x[2] . " " . $arrMM[(int)$x[1]] . " " . ($x[0] > 2500 ? $x[0] : $x[0] + 543) . " " . $time_format;
    } else
        return "";
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Fetch the record's data based on $id, including the picture name or path
        $query = $db->prepare("SELECT *,name_type FROM `teacher_personnel_information`JOIN type ON teacher_personnel_information.position = type.id_type WHERE id = :id ");
        $query->execute(['id' => $id]);
        $data = $query->fetch(PDO::FETCH_ASSOC);

        $dateOfBirth = new DateTime($data['date_month_yearofbirth']);
        // สร้าง object DateTime สำหรับวันปัจจุบัน
        $today = new DateTime(date("Y-m-d"));
        // คำนวณช่วงเวลาต่างๆ
        $diff = $today->diff($dateOfBirth);
        // อายุเป็นจำนวนปี
        $age_data = $diff->y;
        $newdate = ConvertToThaiDate($data['date_month_yearofbirth'], 0, 0);
        $newdate1 = ConvertToThaiDate($data['start_date'], 0, 0);


        if ($data) {
            if (!empty($data['picture'])) {
                // The picture column contains the name or path of the image
                $pictureName = $data['picture'];
                // If the image is stored in a directory, specify it here, otherwise adjust as necessary
                $picturePath = "./api/images/" . $pictureName;
            } else {
                // Handle case where no picture is associated with the record
                echo "No picture available for this record.";
            }
        } else {
            echo "No data found for ID: $id";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "ID not provided";
}
?>



<div style="  display: flex;flex-direction: row;">
    <?php include('./navbar/sidebar.php'); ?>
    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <?php include('./navbar/navuser.php'); ?>
        <!-- <script src="./js/addpersonnelinformation.js"></script> -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <h2 class="m-0">ข้อมูลบุคลากร</h2>
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="./home.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">ข้อมูลบุคลากร</li>
                    </ol>
                </div>
            </div>
            <a href=""></a>
        </div>
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-6 text-center">
                    <img id="picture" src="" alt="" style="width: 250px; height: 250px;">
                    <div id="name_type" style="font-size: 18px;" class="mt-3 "> <span class="menu-text">ตำแหน่ง :</span> <br><?php echo $data['name_type']?></div>

                </div>
            </div>
            <div class="row mt-5 ">
                <div class="col-6">
                    <div class="" style="font-size: 20px;">
                        <i class="fa-solid fa-user spani"></i><span class="menu-text">ข้อมูลประวัติส่วนตัว</span>
                    </div>
                    <div class=" mt-5 mx-5" style="font-size: 16px;">
                        <p>ชื่อ-นามสกุล : <?php echo $data['user_name'] . " " . $data['last_name'] ?></p>
                        <p>เลขที่บัตรประชาชน : <?php echo $data['id_card_number'] ?></p>
                        <p>วัน เดือนปี เกิด : <?php echo $newdate ?></p>
                        <p>สัญชาติ : <?php echo $data['nationality'] ?></p>
                        <!-- <p id="age">อายุ :</p>
                        <p id="email">อีเมล์ :</p> -->
                        <p></i> อายุ : <?php echo $age_data?></p>
                        <p></i> อีเมล์ : <?php echo $data['email'] ?></p>

                        <p>เบอร์โทรศัพท์ : <?php echo $data['telephone_number'] ?></p>
                        <p>วันที่เริ่มทำงาน : <?php echo  $newdate1 ?></p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="" style="font-size: 20px;">
                        <i class="fa-solid fa-house-chimney-user spani"></i><span class="menu-text">ข้อมูลตามทะเบียนบ้าน</span>
                    </div>
                    <div class=" mt-3 mx-5" style="font-size: 16px;">
                        <p>รหัสประจำบ้าน : <?php echo $data['house_code'] ?></p>
                        <p>เลขที่ : <?php echo $data['number_house'] ?></p>
                        <p>หมู่ที่ : <?php echo $data['village'] ?></p>
                        <p>ตำบล : <?php echo $data['district'] ?></p>
                        <p>อำเภอ : <?php echo $data['prefecture'] ?></p>
                        <p>จังหวัด : <?php echo $data['province'] ?></p>
                        <p>ถนน : <?php echo $data['road'] ?></p>
                        <p>รหัสไปรษณีย์ : <?php echo $data['zip_code'] ?></p>
                    </div>
                </div>
            </div>

            <div class="" style="font-size: 20px;">
                <i class="fa-solid fa-book spani"></i></i><span class="menu-text">ข้อมูลการศึกษา</span>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class=" mt-2 mx-5" style="font-size: 20px;">
                        <span>ปริญญาตรี</span>
                    </div>
                    <div class=" mt-2" style="font-size: 16px;  margin-left: 100px;">
                        <p>คณะ : <?php echo $data['faculty_bachelor_s_degree'] ?></p>
                        <p>สาขาวิชา : <?php echo $data['field_of_study_bachelor_s_degree'] ?></p>
                    </div>
                </div>
                <div class="col-6">
                    <div class=" mt-2 mx-5" style="font-size: 20px;">
                        <span>ปริญญาโท</span>
                    </div>
                    <div class=" mt-2" style="font-size: 16px;  margin-left: 100px;">
                        <p>คณะ : <?php echo $data['faculty_master_s_degree'] ?></p>
                        <p>สาขาวิชา : <?php echo $data['field_of_study_master_s_degree'] ?></p>
                        <p>ใบประกอบวิชาชีพผู้บริหาร : <?php echo $data['executive_professional_certificate'] ?></p>
                    </div>
                </div>
                <div class="col-6">
                    <div class=" mt-2 mx-5" style="font-size: 20px;">
                        <span>ต่ำกว่าปริญญาตรี</span>
                    </div>
                    <div class=" mt-2" style="font-size: 16px;  margin-left: 100px;">
                        <p>คณะ : <?php echo $data['faculty_less_than_bachelor_s_degree'] ?></p>
                        <p>สาขาวิชา : <?php echo $data['field_of_study_less_than_bachelor_s_degree'] ?></p>
                        <p>ใบประกอบวิชาชีพ : <?php echo $data['executive_professional_certificate_less_than_bachelor_s_degree'] ?></p>
                        <p>นักธรรม/ธรรมศึกษา : <?php echo $data['dhamma_expert_dhamma_studies'] ?></p>
                        <p>เปรียญธรรม/บาลีศึกษา : <?php echo $data['precepts_pali_studies'] ?></p>
                        <p>วุฒิการศึกษา : <?php echo $data['educational_qualification'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    if (localStorage.getItem("id_type") != "6" && localStorage.getItem("user_id") == null) {
        localStorage.clear()
        window.location.href = "../"
    }
</script>

<?php include("../footer.php") ?>