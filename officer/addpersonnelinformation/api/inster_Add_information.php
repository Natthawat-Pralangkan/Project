<?php
include("../../../servers/connect.php");
// ขออนุญาตให้นักเรียนไปโรงเรียนเป็นกรณีพิเศษ



if (isset($_FILES['picture']) && $_FILES['picture']['error'] === UPLOAD_ERR_OK) {
    $tmp = $_FILES['picture']['tmp_name'];
    $imgname = $_FILES['picture']['name'];
    $path = "./images/" . $imgname;
    move_uploaded_file($tmp, $path);
} else {
    $imgname = "";
}
function generate_student_id($db)
{
    $school_code = "70";
    $year = substr(date('Y') + 543, -2); // ปีไทย 2 หลัก
    $stmt = $db->prepare("SELECT MAX(user_id) as maxid FROM teacher_personnel_information");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $max_id = $row['maxid'];
    // ตรวจสอบว่า $max_id นั้นมีค่าหรือไม่ และตัดให้เหลือเพียง 4 หลักสุดท้ายจาก MAX(user_id) + 1
    if ($max_id === null) {
        $new_id = 1;
    } else {
        // ตรวจสอบและตัดส่วนที่เกินของ $max_id หากมีความยาวมากกว่า 4 หลัก
        $new_id = substr($max_id, -4);
        $new_id = (int)$new_id + 1; // แปลงเป็น integer และเพิ่มค่า
    }

    // จัดรูปแบบให้เป็น 9 หลัก
    $formatted_id = $school_code . $year . "1" . str_pad($new_id, 4, "0", STR_PAD_LEFT);

    // ตรวจสอบว่า $formatted_id ยาวเกินกว่า 9 ตัวอักษรหรือไม่ ถ้าใช่ ตัดให้เหลือ 9 ตัวอักษรจากด้านหลัง
    if (strlen($formatted_id) > 9) {
        $formatted_id = substr($formatted_id, -9);
    }

    return $formatted_id;
}



// print_r($_POST);
// exit;
$user_id = generate_student_id($db); // ตรวจสอบว่า $db ถูกส่งเข้าไปในฟังก์ชั่นอย่างถูกต้อง
$id_user = $_POST["id_user"];
$user_name = $_POST["user_name"];
$last_name = $_POST["last_name"];
$id_card_number = $_POST["id_card_number"];
$date_month_yearofbirth = $_POST["date_month_yearofbirth"];
$age = $_POST["age"];
$nationality = $_POST["nationality"];
$house_code = $_POST["house_code"];
$number_house = $_POST["number_house"];
$village = $_POST["village"];
$district = $_POST["district"];
$prefecture = $_POST["prefecture"];
$province = $_POST["province"];
$road = $_POST["road"];
$zip_code = $_POST["zip_code"];
$email = $_POST["email"];
$telephone_number = $_POST["telephone_number"];
$start_date = $_POST["start_date"];
$faculty_bachelor_s_degree = $_POST["faculty_bachelor_s_degree"];
$field_of_study_bachelor_s_degree = $_POST["field_of_study_bachelor_s_degree"];
$faculty_master_s_degree = $_POST["faculty_master_s_degree"];
$field_of_study_master_s_degree = $_POST["field_of_study_master_s_degree"];
$executive_professional_certificate = $_POST["executive_professional_certificate"];
$faculty_less_than_bachelor_s_degree = $_POST["faculty_less_than_bachelor_s_degree"];
$field_of_study_less_than_bachelor_s_degree = $_POST["field_of_study_less_than_bachelor_s_degree"];
$executive_professional_certificate_less_than_bachelor_s_degree = $_POST["executive_professional_certificate_less_than_bachelor_s_degree"];
$dhamma_expert_dhamma_studies = $_POST["dhamma_expert_dhamma_studies"];
$precepts_pali_studies = $_POST["precepts_pali_studies"];
$educational_qualification = $_POST["educational_qualification"];
$position = $_POST["position"];
// $picture = $_POST["picture"];




$query = "INSERT INTO teacher_personnel_information (id_user, user_id, user_name, last_name, id_card_number, date_month_yearofbirth, age, nationality, house_code, number_house, village, district, prefecture, province, road, zip_code, email, telephone_number, start_date, faculty_bachelor_s_degree, field_of_study_bachelor_s_degree, faculty_master_s_degree, field_of_study_master_s_degree, executive_professional_certificate, faculty_less_than_bachelor_s_degree, field_of_study_less_than_bachelor_s_degree, executive_professional_certificate_less_than_bachelor_s_degree, dhamma_expert_dhamma_studies, precepts_pali_studies, educational_qualification, picture, position) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? , ?)";

try {
    $stmt = $db->prepare($query);

    $stmt->bindParam(1, $id_user);
    $stmt->bindParam(2, $user_id);
    $stmt->bindParam(3, $user_name);
    $stmt->bindParam(4, $last_name);
    $stmt->bindParam(5, $id_card_number);
    $stmt->bindParam(6, $date_month_yearofbirth);
    $stmt->bindParam(7, $age);
    $stmt->bindParam(8, $nationality);
    $stmt->bindParam(9, $house_code);
    $stmt->bindParam(10, $number_house);
    $stmt->bindParam(11, $village);
    $stmt->bindParam(12, $district);
    $stmt->bindParam(13, $prefecture);
    $stmt->bindParam(14, $province);
    $stmt->bindParam(15, $road);
    $stmt->bindParam(16, $zip_code);
    $stmt->bindParam(17, $email);
    $stmt->bindParam(18, $telephone_number);
    $stmt->bindParam(19, $start_date);
    $stmt->bindParam(20, $faculty_bachelor_s_degree);
    $stmt->bindParam(21, $field_of_study_bachelor_s_degree);
    $stmt->bindParam(22, $faculty_master_s_degree);
    $stmt->bindParam(23, $field_of_study_master_s_degree);
    $stmt->bindParam(24, $executive_professional_certificate);
    $stmt->bindParam(25, $faculty_less_than_bachelor_s_degree);
    $stmt->bindParam(26, $field_of_study_less_than_bachelor_s_degree);
    $stmt->bindParam(27, $executive_professional_certificate_less_than_bachelor_s_degree);
    $stmt->bindParam(28, $dhamma_expert_dhamma_studies);
    $stmt->bindParam(29, $precepts_pali_studies);
    $stmt->bindParam(30, $educational_qualification);
    $stmt->bindParam(31, $imgname);
    $stmt->bindParam(32, $position);

    if ($stmt->execute()) {
        echo json_encode(['status' => 200]);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 400, "mgs" => $e->getMessage()]);
}

