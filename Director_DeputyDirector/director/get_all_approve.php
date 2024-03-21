<?php
include("../../servers/connect.php");
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

try {
    // Corrected JOIN syntax and fixed the condition to match tables correctly
    $sql = "SELECT * FROM `details_ppetiton` 
    JOIN petition_type ON details_ppetiton.petition_type = petition_type.id
    JOIN teacher_personnel_information ON details_ppetiton.user_id = teacher_personnel_information.user_id
    JOIN petition_name ON details_ppetiton.petition_id = petition_name.id
    WHERE details_ppetiton.id_status = 4
    ORDER BY details_ppetiton.date DESC";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $newdate = ConvertToThaiDate($row['date'], 0, 0);
            echo "<tr>";
            // Ensure these column names exist in your query's result set
            echo "<td>"  . $newdate . "</td>"; // Assuming 'date' is a correct column name
            echo "<td>" . $row['user_name'] . ' ' . $row['last_name'] . "</td>"; // Assuming 'user_name' is provided by teacher_personnel_information
            echo "<td>" . $row['petition_name'] . "</td>"; // Assuming 'name' is the correct column from petition_name
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>ไม่พบข้อมูล</td></tr>";
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
