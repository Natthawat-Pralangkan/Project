<?php
include("../servers/connect.php");

function ConvertToThaiDate($value, $short = '1', $need_time = '1', $need_time_second = '0') {
    $date_arr = explode(' ', $value);
    $date = $date_arr[0];
    $time = isset($date_arr[1]) ? $date_arr[1] : '';
    $value = $date;
    if ($value != "0000-00-00" && $value != '') {
        $x = explode("-", $value);
        $arrMM = $short ? array(1 => "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.") 
                        : array(1 => "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
        $time_format = $need_time ? ($time ? date($need_time_second ? 'H:i:s น.' : 'H:i น.', strtotime($time)) : '') : '';
        return (int)$x[2] . " " . $arrMM[(int)$x[1]] . " " . ($x[0] > 2500 ? $x[0] : $x[0] + 543) . " " . $time_format;
    } else {
        return "";
    }
}

$user_id = $_POST["user_id"];
$filterType = $_POST['filterType'] ?? '';
$filterStatus = $_POST['filterStatus'] ?? '';
$startDate = $_POST['startDate'] ?? '';
$endDate = $_POST['endDate'] ?? '';

// สร้าง SQL พื้นฐาน
$sql = "SELECT *, `details_ppetiton`.`id`, `details_ppetiton`.`petition_id`, details_ppetiton.id_status, `details_ppetiton`.`date` 
        FROM `details_ppetiton`
        JOIN petition_name ON details_ppetiton.petition_id = petition_name.id
        JOIN petition_type ON petition_name.id_petition = petition_type.id 
        JOIN request_status ON details_ppetiton.id_status = request_status.id_status
        WHERE details_ppetiton.user_id = ? AND `details_ppetiton`.`id_status` IN (3, 4, 5, 6, 7, 9)";

// เพิ่มเงื่อนไขการกรองตามค่าที่ผู้ใช้เลือก
$params = [$user_id];
if (!empty($filterType)) {
    $sql .= " AND petition_type.id = ?";
    $params[] = $filterType;
}
if (!empty($filterStatus)) {
    $sql .= " AND request_status.id_status = ?";
    $params[] = $filterStatus;
}
if (!empty($startDate) && !empty($endDate)) {
    $sql .= " AND details_ppetiton.date BETWEEN ? AND ?";
    $params[] = $startDate;
    $params[] = $endDate;
}

// กำหนดลำดับการเรียงข้อมูล
$sql .= " ORDER BY details_ppetiton.id DESC";

$result = $db->prepare($sql);
$result->execute($params);
$row = $result->fetchAll(PDO::FETCH_ASSOC);

$keeall = [];
foreach ($row as $kee) {
    $newdate = ConvertToThaiDate($kee['date'], 0, 0);
    $keeall[] = array(
        "id" => $kee['id'],
        "petition_id" => $kee['petition_id'],
        "date" => $newdate,
        "petition_name" => $kee['petition_name'],
        "request_type_name" => $kee['request_type_name'],
        "name_status" => $kee['name_status'],
        "reason" => $kee['reason'],
        "id_status" => $kee['id_status'],
    );
}

echo json_encode($keeall);

?>
