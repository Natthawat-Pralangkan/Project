<?php include("../servers/connect.php"); ?>
<?php
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
if (isset($_POST["user_id"]) && $_POST["user_id"]) {

    $user_id = $_POST["user_id"];

    $sql = "SELECT * FROM `teacher_personnel_information` WHERE user_id = ? ";
    $result = $db->prepare($sql);
    $result->bindParam(1, $user_id);
    $result->execute();
    $row = $result->fetch(PDO::FETCH_ASSOC);
    // print_r($row);
    // exit;
    $keeall = array(); // สร้าง array เพื่อเก็บข้อมูลทั้งหมดก่อนส่ง JSON กลับ
    $newdate = ConvertToThaiDate($row['date_month_yearofbirth'], 0, 0);
    $newdate1 = ConvertToThaiDate($row['start_date'], 0, 0);
    $keeall[] = array(
        "user_name" => $row['user_name'] . ' ' . $row['last_name'],
        "id_card_number" => $row['id_card_number'],
        "date" => $newdate, // เปลี่ยนเป็น $newdate ที่แปลงเป็นวันที่ไทยแล้ว
        "age" => $row['age'],
        "nationality" => $row['nationality'],
        "house_code" => $row['house_code'],
        "number_house" => $row['number_house'],
        "village" => $row['village'],
        "district" => $row['district'],
        "prefecture" => $row['prefecture'],
        "province" => $row['province'],
        "road" => $row['road'],
        "zip_code" => $row['zip_code'],
        "email" => $row['email'],
        "telephone_number" => $row['telephone_number'],
        "start_date" => $newdate1,
        "faculty_bachelor_s_degree" => $row['faculty_bachelor_s_degree'],
        "field_of_study_bachelor_s_degree" => $row['field_of_study_bachelor_s_degree'],
        "faculty_master_s_degree" => $row['faculty_master_s_degree'],
        "field_of_study_master_s_degree" => $row['field_of_study_master_s_degree'],
        "executive_professional_certificate" => $row['executive_professional_certificate'],
        "faculty_less_than_bachelor_s_degree" => $row['faculty_less_than_bachelor_s_degree'],
        "field_of_study_less_than_bachelor_s_degree" => $row['field_of_study_less_than_bachelor_s_degree'],
        "executive_professional_certificate_less_than_bachelor_s_degree" => $row['executive_professional_certificate_less_than_bachelor_s_degree'],
        "dhamma_expert_dhamma_studies" => $row['dhamma_expert_dhamma_studies'],
        "precepts_pali_studies" => $row['precepts_pali_studies'],
        "educational_qualification" => $row['educational_qualification'],
        "picture" => "../officer/addpersonnelinformation/api/images/". $row['picture'],
    );

    echo json_encode($keeall); // ส่ง JSON กลับหลังจากวนลูปเสร็จสิ้นทั้งหมด
}


?>
