<?php
require_once(__DIR__ . '/../../fpdf186/fpdf.php');
require_once(__DIR__ . '/../../FPDI/src/autoload.php');
include(__DIR__ . '/../../servers/connect.php');

// ค้นหาจากฐานข้อมูลและสร้าง PDF ตามปกติ
$startDate = $_GET['start_date'] ?? ''; 
$endDate = $_GET['end_date'] ?? ''; 
$id_type = $_GET['id_type'] ?? ''; 
$user_id = $_GET['user_id'] ?? null; // ตรวจสอบว่ามี user_id หรือไม่

use setasign\Fpdi\Fpdi;

$pdf = new Fpdi();
$pdf->AddPage("L");
$pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
$pdf->AddFont('THSarabunNew', 'BI', 'THSarabunNew_b.php');
$pdf->SetFont('THSarabunNew', 'BI', 16);

// ฟังก์ชันแปลงวันที่เป็นไทย
function ConvertToThaiDate($value, $short = '1', $need_time = '1', $need_time_second = '0') {
    $date_arr = explode(' ', $value);
    $date = $date_arr[0];
    $time = isset($date_arr[1]) ? $date_arr[1] : '';
    if ($value != "0000-00-00" && $value != '') {
        $x = explode("-", $value);
        $arrMM = array(1 => "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
        $time_format = $need_time == '1' ? ($time != '' ? date($need_time_second == '1' ? 'H:i:s น.' : 'H:i น.', strtotime($time)) : '') : '';
        return (int)$x[2] . " " . $arrMM[(int)$x[1]] . " " . ($x[0] > 2500 ? $x[0] : $x[0] + 543) . " " . $time_format;
    } else
        return "";
}

// ตรวจสอบว่ามีการส่ง user_id มาหรือไม่
$userName = "ทั้งหมด"; // ตั้งค่าเริ่มต้นเป็น "ทั้งหมด"
if ($user_id) {
    // ดึงชื่อบุคคลที่เลือกจากฐานข้อมูล
    $userQuery = "SELECT user_name FROM teacher_personnel_information WHERE id = :user_id";
    $userStmt = $db->prepare($userQuery);
    $userStmt->bindParam(':user_id', $user_id);
    $userStmt->execute();
    
    // ตรวจสอบผลการดึงข้อมูล
    if ($userStmt->rowCount() > 0) {
        $userName = $userStmt->fetchColumn(); // ดึงชื่อบุคคลที่เลือก
    } else {
        $userName = "ไม่พบชื่อบุคคล"; // ถ้าไม่พบข้อมูลในฐานข้อมูล
    }
}

// สร้าง query และตรวจสอบว่ามีการเลือก user_id หรือไม่
$query = "SELECT * FROM face_recognition_data WHERE created_at BETWEEN :start_date AND :end_date";

if ($user_id) {
    $query .= " AND user_id = :user_id";
} else {
    $query .= " AND id_type = :id_type";
}

$stmt = $db->prepare($query);
$stmt->bindParam(':start_date', $startDate);
$stmt->bindParam(':end_date', $endDate);

if ($user_id) {
    $stmt->bindParam(':user_id', $user_id); // ผูก user_id ถ้าเป็นรายบุคคล
} else {
    $stmt->bindParam(':id_type', $id_type); // ผูก id_type ถ้าเป็น "ทั้งหมด"
}

$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// แสดงโลโก้
$imagePath = '../../img/logo.png';
list($imageWidth, $imageHeight) = getimagesize($imagePath);
$targetWidth = 30;
$targetHeight = $imageHeight * ($targetWidth / $imageWidth);
$pdf->Image($imagePath, ($pdf->GetPageWidth() - $targetWidth) / 2, 10, $targetWidth, $targetHeight);

// แสดงหัวรายงาน
$pdf->SetXY(($pdf->GetPageWidth() - 200) / 2, 10);
$pdf->MultiCell(235, 10, iconv('UTF-8', 'cp874', "โรงเรียนนันทบุรีวิทยา\nเลขที่ 13 ถนนสุริยพงษ์ตำบลในเวียง\nอำเภอเมืองน่าน จังหวัดน่าน 55000"), 0, 'R');
$pdf->Ln(10);
$pdf->SetFont('THSarabunNew', 'BI', 24);
$pdf->MultiCell(280, 10, iconv('UTF-8', 'cp874', "รายงาน เวลาเข้างาน - เวลาออกงาน"), 0, 'C');

// เพิ่มชื่อบุคคลที่เลือก ถ้าเป็นรายบุคคล
// $pdf->Ln(10);
// $pdf->MultiCell(280, 10, iconv('UTF-8', 'cp874', "สำหรับ: " . $userName), 0, 'C');

$pdf->Ln(10);
$pdf->MultiCell(280, 10, iconv('UTF-8', 'cp874', "ระหว่าง วันที่: " . ConvertToThaiDate($startDate) . " ถึง วันที่: " . ConvertToThaiDate($endDate)), 0, 'C');

// สร้างตาราง
$tableWidth = 50 + 50 + 80 + 50 + 50 + 50;
$startX = ($pdf->GetPageWidth() - $tableWidth) / 2;
$pdf->SetX($startX);
$pdf->Ln(10);
$pdf->SetFont('THSarabunNew', 'BI', 20);
$pdf->Cell(15, 10, iconv('UTF-8', 'cp874', "ลำดับ"), 1, 0, 'C');
$pdf->Cell(50, 10, iconv('UTF-8', 'cp874', "วันที่-เดือน-ปี"), 1, 0, 'C');
$pdf->Cell(80, 10, iconv('UTF-8', 'cp874', "ชื่อ-นามสกุล"), 1, 0, 'C');
$pdf->Cell(50, 10, iconv('UTF-8', 'cp874', "เวลาเข้างาน"), 1, 0, 'C');
$pdf->Cell(50, 10, iconv('UTF-8', 'cp874', "เวลาออกงาน"), 1, 0, 'C');
$pdf->Cell(30, 10, iconv('UTF-8', 'cp874', "หมายเหตุ"), 1, 0, 'C');
$pdf->Ln();

$pdf->SetFont('THSarabunNew', 'BI', 16);

foreach ($results as $index => $row) {
    $newdate = ConvertToThaiDate($row['created_at'], 0, 0);
    $pdf->Cell(15, 8, iconv('UTF-8', 'cp874', $index + 1), 1, 0, 'C');
    $pdf->Cell(50, 8, iconv('UTF-8', 'cp874', $newdate), 1, 0, 'C');
    $pdf->Cell(80, 8, iconv('UTF-8', 'cp874', $row['name'] . " " . $row['last_name']), 1, 0, 'L');
    $pdf->Cell(50, 8, iconv('UTF-8', 'cp874', substr($row['attend_work'], 11, 5) . ' น.'), 1, 0, 'C');
    $pdf->Cell(50, 8, iconv('UTF-8', 'cp874', substr($row['leaving_work'], 11, 5) . ' น.'), 1, 0, 'C');
    $pdf->Cell(30, 8, iconv('UTF-8', 'cp874', $row['attendance_status']), 1, 0, 'C');
    $pdf->Ln();
}

$pdf->Output();
