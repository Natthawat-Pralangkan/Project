<?php
require '../fpdf186/fpdf.php'; // ตรวจสอบเส้นทางไฟล์ให้ถูกต้อง
require '../FPDI/src/autoload.php'; // ตรวจสอบเส้นทางไฟล์ให้ถูกต้อง
include "../servers/connect.php";

// ค้นหาจากฐานข้อมูลและสร้าง PDF ตามปกติ
// $startDate = $_GET['start_date'] ?? '2024-01-01'; // ตัวอย่างค่าเริ่มต้น
// $endDate = $_GET['end_date'] ?? '2024-12-31'; // ตัวอย่างค่าเริ่มต้น
$startDate = $_GET['start_date'] ; // ตัวอย่างค่าเริ่มต้น
$endDate = $_GET['end_date']; // ตัวอย่างค่าเริ่มต้น

use setasign\Fpdi\Fpdi;

$pdf = new Fpdi();
$pdf->AddPage("L");

// ตรวจสอบว่าได้เรียกใช้ฟอนต์ที่ถูกต้อง
$pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
$pdf->AddFont('THSarabunNew', 'BI', 'THSarabunNew_b.php');
$pdf->SetFont('THSarabunNew', 'BI', 16);

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
            $arrMM = array(1 => "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
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
$query = "SELECT details_ppetiton.*, petition_type.request_type_name, teacher_personnel_information.user_name , teacher_personnel_information.last_name, petition_name.petition_name  FROM `details_ppetiton`
JOIN petition_type ON details_ppetiton.petition_type = petition_type.id
JOIN teacher_personnel_information ON details_ppetiton.user_id = teacher_personnel_information.user_id 
JOIN petition_name on details_ppetiton.petition_id = petition_name.id
WHERE date BETWEEN :start_date AND :end_date";
$stmt = $db->prepare($query);
$stmt->bindParam(':start_date', $startDate);
$stmt->bindParam(':end_date', $endDate);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);


// $pdf->Image('../img/logo.png', 10, 10, 50);
$imagePath = '../img/logo.png';
list($imageWidth, $imageHeight) = getimagesize($imagePath);
$targetWidth = 30; // กำหนดความกว้างของรูปภาพที่ต้องการ
$targetHeight = $imageHeight * ($targetWidth / $imageWidth); // คำนวณความสูงของรูปภาพโดยอัตราส่วนคงที่

$pdf->Image($imagePath, ($pdf->GetPageWidth() - $targetWidth) / 2, 10, $targetWidth, $targetHeight);

// แสดงข้อความที่ด้านบนและชิดขวา
$pdf->SetXY(($pdf->GetPageWidth() - 200) / 2, 10);
$pdf->MultiCell(235, 10, iconv('UTF-8', 'cp874', "โรงเรียนนันทบุรีวิทยา\nเลขที่ 13 ถนนสุริยพงษ์ตำบลในเวียง\nอำเภอเมืองน่าน จังหวัดน่าน 55000"), 0, 'R');
$pdf->Ln(10);
$pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
$pdf->AddFont('THSarabunNew', 'BI', 'THSarabunNew_b.php');
$pdf->SetFont('THSarabunNew', 'BI', 24);

// $pdf->SetXY(45, 10); // 45 คือความกว้างของหน้าระดับความสูง 210 หาร 2 (หน่วยเป็น mm)
$pdf->MultiCell(280, 10, iconv('UTF-8', 'cp874', "รายงานสถิติคำร้อง"), 0, 'C');

$pdf->Ln(10);

$pdf->MultiCell(280, 10, iconv('UTF-8', 'cp874', "ระหว่าง วันที่: " . ConvertToThaiDate($startDate) . " ถึง วันที่: " . ConvertToThaiDate($endDate)), 0, 'C');

$pdf->Ln(10);
$pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
$pdf->AddFont('THSarabunNew', 'BI', 'THSarabunNew_b.php');
$pdf->SetFont('THSarabunNew', 'BI', 20);
$pdf->Cell(15, 10, iconv('UTF-8', 'cp874', "ลำดับ"), 1, 0, 'C');
$pdf->Cell(80, 10, iconv('UTF-8', 'cp874', "วันที่ยื่น"), 1, 0, 'C');
$pdf->Cell(100, 10, iconv('UTF-8', 'cp874', "ชื่อคำร้อง"), 1, 0, 'C');
$pdf->Cell(80, 10, iconv('UTF-8', 'cp874', "ชื่อผู้ยื่น"), 1, 0, 'C');
$pdf->Ln();

$pdf->SetFont('THSarabunNew', 'BI', 16);
foreach ($results as $index => $row) {
    $newdate = ConvertToThaiDate($row['date'], 0, 0);
    $pdf->Cell(15, 10, iconv('UTF-8', 'cp874', $index + 1), 1, 0, 'C');
    $pdf->Cell(80, 10, iconv('UTF-8', 'cp874', $newdate), 1, 0, 'L');
    $pdf->Cell(100, 10, iconv('UTF-8', 'cp874', $row['petition_name']), 1, 0, 'L');
    $pdf->Cell(80, 10, iconv('UTF-8', 'cp874', $row['user_name'] . " " . $row['last_name']), 1, 0, 'L');
    $pdf->Ln();
}



$pdf->Output();
