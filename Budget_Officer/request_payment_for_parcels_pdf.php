<?php
require_once(__DIR__ . '/../fpdf186/fpdf.php');
require_once(__DIR__ . '/../FPDI/src/autoload.php');
include(__DIR__ . '/../servers/connect.php');

$id = $_GET['id'] ?? exit('ID required');

use setasign\Fpdi\Fpdi;

// Create a new instance of FPDI
$pdf = new Fpdi('P');

// Set source file
$pdf->setSourceFile('./file/แบบฟอร์มการเบิก.pdf');

// Add a page
$pdf->AddPage();

// Import the first page of the source PDF
$tplIdx = $pdf->importPage(1);

// Use the imported page as a template
$pdf->useTemplate($tplIdx, 0, 0);

// Fetch data from the database
$stmt = $db->prepare("SELECT * FROM `details_ppetiton`  WHERE id = 333");
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);



$pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
$pdf->AddFont('THSarabunNew', 'BI', 'THSarabunNew_b.php');
$pdf->SetFont('THSarabunNew', 'BI', 16);

// $pdf->Image('../img/logo.png', 10, 10, 50);
$imagePath = '../img/logo.png';
list($imageWidth, $imageHeight) = getimagesize($imagePath);
$targetWidth = 30; // กำหนดความกว้างของรูปภาพที่ต้องการ
$targetHeight = $imageHeight * ($targetWidth / $imageWidth); // คำนวณความสูงของรูปภาพโดยอัตราส่วนคงที่

$pdf->Image($imagePath, ($pdf->GetPageWidth() - $targetWidth) / 2, 10, $targetWidth, $targetHeight);

$pdf->SetXY(140, 20);
$pdf->MultiCell(0, 8, iconv('UTF-8', 'cp874', "โรงเรียนนันทบุรีวิทยา\nเลขที่ 13 ถนนสุริยพงษ์ ตำบลในเวียง\nอำเภอเมืองน่าน จังหวัดน่าน 55000"), 0,);

$pdf->Ln(10);
$pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
$pdf->AddFont('THSarabunNew', '', 'THSarabunNew_b.php');
$pdf->SetFont('THSarabunNew', '', 16);

$pdf->SetXY(105, 95);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "หน่วยนับ"));
$pdf->SetXY(133, 87);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "ราคา"));
$pdf->SetXY(130, 95);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "ต่อหน่วย"));
$pdf->SetXY(156, 87);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "จำนวน"));
$pdf->SetXY(153, 96);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "เบิก"));
$pdf->SetXY(165, 96);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "จ่าย"));
$pdf->SetXY(185, 90);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "ราคา"));
$pdf->SetXY(185, 97);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "(บาท)"));

$number = 1;
$y=105;
    // Add data to the PDF form fields
    $pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
    $pdf->AddFont('THSarabunNew', '', 'THSarabunNew_b.php');
    $pdf->SetFont('THSarabunNew', '', 16);
foreach ($results as $result) {
    $details = explode(",", $result['details']);
    $pdf->SetXY(25, 63);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $details[0]), 0, 'C'); 
    $pdf->SetXY(150, 63);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $details[1]), 0, 'C'); 
    $pdf->SetXY(132, 70);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $details[2]), 0, 'C'); 
    $pdf->SetXY(17, $y);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $number++), 0, 'C'); 
    $pdf->SetXY(50, $y);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $details[3]), 0, 'C'); 
    $pdf->SetXY(110, $y);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $details[4]), 0, 'C'); 
    $pdf->SetXY(130, $y);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $details[5]), 0, 'C'); 
    $pdf->SetXY(151, $y);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $details[6]), 0, 'C'); 
    $pdf->SetXY(163, $y);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $details[7]), 0, 'C'); 
    $pdf->SetXY(185, $y);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $details[8]), 0, 'C'); 
    $pdf->SetXY(50, $y+8);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $details[9]??""), 0, 'C'); 
    $y += 8;
}


$pdf->Output('I', 'แบบฟอร์มการเบิก.pdf');
