<?php
require '../fpdf186/fpdf.php'; // ตรวจสอบเส้นทางไฟล์ให้ถูกต้อง
require '../FPDI/src/autoload.php'; // ตรวจสอบเส้นทางไฟล์ให้ถูกต้อง
include "../servers/connect.php";

// รับค่าจาก URL
$id_type = $_GET['id_type'] ?? ''; // รับค่า id_type (ถ้าไม่มีให้เป็นค่าว่าง)
$startDate = $_GET['start_date'] ?? '2024-01-01'; // ค่าเริ่มต้นวันที่เริ่มต้น
$endDate = $_GET['end_date'] ?? '2024-12-31'; // ค่าเริ่มต้นวันที่สิ้นสุด

use setasign\Fpdi\Fpdi;

$pdf = new Fpdi();
$pdf->AddPage("L");

// เพิ่มฟอนต์ THSarabunNew
$pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
$pdf->AddFont('THSarabunNew', 'BI', 'THSarabunNew_b.php');
$pdf->SetFont('THSarabunNew', 'BI', 16);

// ฟังก์ชันแปลงวันที่เป็นรูปแบบไทย
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

// ถ้าเลือก "ทั้งหมด" หรือไม่มีการเลือก id_type ดึงข้อมูลทั้งหมด
if ($id_type === 'all' || $id_type === '') {
    $name_type = 'ทั้งหมด'; // ตั้งชื่อประเภทเป็น "ทั้งหมด"
} else {
    // ดึงชื่อประเภทตาม id_type
    $name_type = '';
    if ($id_type) {
        $typeQuery = "SELECT name_type FROM type WHERE id_type = :id_type";
        $typeStmt = $db->prepare($typeQuery);
        $typeStmt->bindParam(':id_type', $id_type);
        $typeStmt->execute();
        $typeResult = $typeStmt->fetch(PDO::FETCH_ASSOC);
        if ($typeResult) {
            $name_type = $typeResult['name_type']; // ดึงชื่อประเภท
        }
    }
}

// Query ข้อมูลจากฐานข้อมูลตามช่วงวันที่และ id_type
$query = "SELECT * FROM `face_recognition_data` WHERE created_at BETWEEN :start_date AND :end_date";

// ถ้าไม่ได้เลือก "ทั้งหมด" ให้กรองข้อมูลตาม id_type
if ($id_type !== 'all' && $id_type !== '') {
    $query .= " AND id_type = :id_type";
}

$stmt = $db->prepare($query);
$stmt->bindParam(':start_date', $startDate);
$stmt->bindParam(':end_date', $endDate);
if ($id_type !== 'all' && $id_type !== '') {
    // Bind ค่า id_type ถ้าไม่ใช่ "ทั้งหมด"
    $stmt->bindParam(':id_type', $id_type);
}
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// เพิ่มรูปภาพ
$imagePath = '../img/logo.png';
list($imageWidth, $imageHeight) = getimagesize($imagePath);
$targetWidth = 30; // กำหนดความกว้างของรูปภาพ
$targetHeight = $imageHeight * ($targetWidth / $imageWidth); // คำนวณความสูงของรูปภาพตามอัตราส่วน
$pdf->Image($imagePath, ($pdf->GetPageWidth() - $targetWidth) / 2, 10, $targetWidth, $targetHeight);

// ข้อความที่ด้านบน
$pdf->SetXY(($pdf->GetPageWidth() - 200) / 2, 10);
$pdf->MultiCell(235, 10, iconv('UTF-8', 'cp874', "โรงเรียนนันทบุรีวิทยา\nเลขที่ 13 ถนนสุริยพงษ์ตำบลในเวียง\nอำเภอเมืองน่าน จังหวัดน่าน 55000"), 0, 'R');
$pdf->Ln(10);
$pdf->SetFont('THSarabunNew', 'BI', 24);
$pdf->MultiCell(280, 10, iconv('UTF-8', 'cp874', "รายงานสถิติคำร้อง"), 0, 'C');

// แสดงวันที่ช่วงเวลาในรายงาน
$pdf->Ln(10);
$pdf->MultiCell(280, 10, iconv('UTF-8', 'cp874', "ระหว่าง วันที่: " . ConvertToThaiDate($startDate) . " ถึง วันที่: " . ConvertToThaiDate($endDate)), 0, 'C');

// แสดงชื่อประเภท (ถ้ามี)
if ($name_type) {
    $pdf->Ln(5);
    $pdf->MultiCell(280, 10, iconv('UTF-8', 'cp874', "ตำแหน่ง: $name_type"), 0, 'C');
}

// เพิ่มตารางหัวข้อใน PDF
$pdf->Ln(10);
$pdf->SetFont('THSarabunNew', 'BI', 20);
$pdf->Cell(15, 10, iconv('UTF-8', 'cp874', "ลำดับ"), 1, 0, 'C');
$pdf->Cell(50, 10, iconv('UTF-8', 'cp874', "วัน-เดือน-ปี"), 1, 0, 'C');
$pdf->Cell(80, 10, iconv('UTF-8', 'cp874', "ชื่อ-นามสกุล"), 1, 0, 'C');
$pdf->Cell(50, 10, iconv('UTF-8', 'cp874', "เวลาเข้างาน"), 1, 0, 'C');
$pdf->Cell(50, 10, iconv('UTF-8', 'cp874', "เวลาออกงาน"), 1, 0, 'C');
$pdf->Cell(30, 10, iconv('UTF-8', 'cp874', "หมายเหตุ"), 1, 0, 'C');
$pdf->Ln();

// วนลูปแสดงข้อมูล
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

// สร้างไฟล์ PDF
$pdf->Output();
