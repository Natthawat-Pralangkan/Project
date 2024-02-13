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

$user_id = $_POST["id_user"];
// print_r($_POST);
$sql = "SELECT * FROM `details_ppetiton`
                        JOIN petition_name ON details_ppetiton.petition_id = petition_name.id
                        JOIN petition_type ON petition_name.id_petition = petition_type.id WHERE details_ppetiton.id_user = ? ORDER by details_ppetiton.date desc ";
$result = $db->prepare($sql);
$result->bindParam(1, $user_id);
$result->execute();
$row = $result->fetchAll(PDO::FETCH_ASSOC);
foreach ($row as $kee) {
    $newdate = ConvertToThaiDate($kee['date'], 0, 0);
    $keeall[] = array(
        "date" => $kee['date'],
        "petition_name" => $kee['petition_name'],
        "request_type_name" => $kee['request_type_name'],
        "status_from" => $kee['status_from'],
    );
    // print_r($keeall);
    echo json_encode($keeall);
}

// แสดงข้อมูลในตารา
?>
