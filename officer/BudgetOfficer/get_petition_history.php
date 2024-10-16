<?php include("../../servers/connect.php"); ?>

<?php
// Function to convert date to Thai format
function ConvertToThaiDate($value, $short = '1', $need_time = '1', $need_time_second = '0')
{
    $date_arr = explode(' ', $value);
    $date = $date_arr[0];
    $time = isset($date_arr[1]) ? $date_arr[1] : '';

    if ($value != "0000-00-00" && $value != '') {
        $x = explode("-", $date);
        $arrMM = $short == false
            ? array(1 => "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม")
            : array(1 => "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");

        $time_format = '';
        if ($need_time == '1') {
            $time_format = $time != '' ? date($need_time_second == '1' ? 'H:i:s น.' : 'H:i น.', strtotime($time)) : '';
        }

        return (int)$x[2] . " " . $arrMM[(int)$x[1]] . " " . ($x[0] > 2500 ? $x[0] : $x[0] + 543) . " " . $time_format;
    } else {
        return "";
    }
}

// SQL query without user_id filtering, only filtering by id_status
$sql = "SELECT details_ppetiton.id, details_ppetiton.petition_id, details_ppetiton.id_status, details_ppetiton.date, 
               petition_name.petition_name, petition_type.request_type_name, request_status.name_status, details_ppetiton.reason
        FROM details_ppetiton
        JOIN petition_name ON details_ppetiton.petition_id = petition_name.id
        JOIN petition_type ON petition_name.id_petition = petition_type.id
        JOIN request_status ON details_ppetiton.id_status = request_status.id_status
         WHERE details_ppetiton.petition_type = 3
         AND details_ppetiton.id_status IN (2, 3, 4, 6)
        ORDER BY details_ppetiton.id DESC";

// Prepare the SQL statement
$result = $db->prepare($sql);

// Execute the query
$result->execute();

// Fetch the results
$row = $result->fetchAll(PDO::FETCH_ASSOC);

// Create an array to store all the results
$keeall = array();

foreach ($row as $kee) {
    $newdate = ConvertToThaiDate($kee['date'], 0, 0);  // Convert the date to Thai format
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

// Return the result as JSON
echo json_encode($keeall);

?>
