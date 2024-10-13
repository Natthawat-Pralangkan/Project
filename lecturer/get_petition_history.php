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

$user_id = $_POST["user_id"];

$sql = "SELECT *,`details_ppetiton`.`id`,`details_ppetiton`.`petition_id`,details_ppetiton.id_status,`details_ppetiton`.`date` FROM `details_ppetiton`
                        JOIN petition_name ON details_ppetiton.petition_id = petition_name.id
                        JOIN petition_type ON petition_name.id_petition = petition_type.id 
                        JOIN request_status ON details_ppetiton.id_status = request_status.id_status
                        WHERE details_ppetiton.user_id = ? AND `details_ppetiton`.`id_status` IN (4, 5, 6, 7)  ORDER BY  details_ppetiton.date DESC ";
$result = $db->prepare($sql);
$result->bindParam(1, $user_id);
$result->execute();
$row = $result->fetchAll(PDO::FETCH_ASSOC);
$keeall = array(); // สร้าง array เพื่อเก็บข้อมูลทั้งหมดก่อนส่ง JSON กลับ

foreach ($row as $kee) {
    $newdate = ConvertToThaiDate($kee['date'], 0, 0);
    $keeall[] = array(
        "id" => $kee['id'],
        "petition_id" => $kee['petition_id'],
        "date" => $newdate, // เปลี่ยนเป็น $newdate ที่แปลงเป็นวันที่ไทยแล้ว
        "petition_name" => $kee['petition_name'],
        "request_type_name" => $kee['request_type_name'],
        "name_status" => $kee['name_status'],
        "reason" => $kee['reason'],
        "id_status" => $kee['id_status'],
    );
}

echo json_encode($keeall); // ส่ง JSON กลับหลังจากวนลูปเสร็จสิ้นทั้งหมด

?>
