<?php
require_once(__DIR__ . '/../fpdf186/fpdf.php');
require_once(__DIR__ . '/../FPDI/src/autoload.php');
include(__DIR__ . '/../servers/connect.php');

$id = $_GET['id'] ?? exit('ID required');


function ConvertToThaiDate($date, $showTime = false, $showSeconds = false)
{
    if ($date == '0000-00-00' || empty($date)) {
        return '';
    }
    $monthNames = ["ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค."];
    $day = date('j', strtotime($date));
    $month = $monthNames[date('n', strtotime($date)) - 1];
    $year = date('Y', strtotime($date)) + 543; // Convert to Buddhist era

    $formattedDate = "$day $month $year";
    if ($showTime) {
        $timeFormat = $showSeconds ? 'H:i:s' : 'H:i';
        $time = date($timeFormat, strtotime($date));
        $formattedDate .= " $time";
    }
    return $formattedDate;
}

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
$stmt = $db->prepare("SELECT * FROM `details_ppetiton` 
JOIN parcel_information on details_ppetiton.id = parcel_information.id_details 
JOIN teacher_personnel_information on details_ppetiton.user_id = teacher_personnel_information.user_id
WHERE details_ppetiton.id = ?");
$stmt->execute([$id]);
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
$pdf->SetFont('THSarabunNew', 'BI', 16);

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
$y = 105;
// Add data to the PDF form fields
$pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
$pdf->AddFont('THSarabunNew', '', 'THSarabunNew_b.php');
$pdf->SetFont('THSarabunNew', 'BI', 16);
// print_r($results);
foreach ($results as $result) {
    $details = explode(",", $result['details']);
    $pdf->SetXY(25, 64);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $details[0]), 0, 'C');
    $pdf->SetXY(150, 64);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $details[1]), 0, 'C');
    $pdf->SetXY(132, 71);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $details[2]), 0, 'C');

    $thai_month_arr1 = array(
        "01" => "มกราคม",
        "02" => "กุมภาพันธ์",
        "03" => "มีนาคม",
        "04" => "เมษายน",
        "05" => "พฤษภาคม",
        "06" => "มิถุนายน",
        "07" => "กรกฎาคม",
        "08" => "สิงหาคม",
        "09" => "กันยายน",
        "10" => "ตุลาคม",
        "11" => "พฤศจิกายน",
        "12" => "ธันวาคม"
    );
    list($year, $month1, $day) = explode("-", $result['date']);
    $thai_month1 = $thai_month_arr1[$month1];
    $newdate = date("d H:i:s", strtotime($result['date']));
    $pdf->SetXY(25, 71);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', date("d", strtotime($result['date']))), 0, 1);
    $pdf->SetXY(45, 71);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $thai_month1), 0, 1);
    $pdf->SetXY(77, 71);;
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $year + 543), 0, 1);



    $pdf->SetXY(17, $y);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $number++), 0, 'C');
    $pdf->SetXY(40, $y);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $result['withdrawallist']), 0, 'C'); /////รายการเบิก
    $pdf->SetXY(105, $y);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $result['counting_unit']), 0, 'C'); /////หน่วยนับ
    $pdf->SetXY(133, $y);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $result['per_unit']), 0, 'C'); /////ราคาต่อหน่วย
    $pdf->SetXY(153, $y);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $result['withdraw']), 0, 'C'); ////เบิก
    $pdf->SetXY(165, $y);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $result['pay']), 0, 'C'); ////จ่าย
    $pdf->SetXY(185, $y);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $result['pay'] * $result['per_unit']), 0, 'C'); /////ราคา

    $pdf->SetXY(25, 225);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $result['user_name'] . ' ' . $result['last_name']), 0, 'C');

    $thai_month_arr1 = array(
        "01" => "มกราคม",
        "02" => "กุมภาพันธ์",
        "03" => "มีนาคม",
        "04" => "เมษายน",
        "05" => "พฤษภาคม",
        "06" => "มิถุนายน",
        "07" => "กรกฎาคม",
        "08" => "สิงหาคม",
        "09" => "กันยายน",
        "10" => "ตุลาคม",
        "11" => "พฤศจิกายน",
        "12" => "ธันวาคม"
    );
    list($year, $month1, $day) = explode("-", $result['date']);
    $thai_month1 = $thai_month_arr1[$month1];
    $newdate = date("d H:i:s", strtotime($result['date']));
    $pdf->SetXY(25, 240);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', date("d", strtotime($result['date']))), 0, 1);
    $pdf->SetXY(35, 240);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $thai_month1), 0, 1);
    $pdf->SetXY(53, 240);;
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $year + 543), 0, 1);

    $y += 8;
}


$pdf->Output('I', 'แบบฟอร์มการเบิก.pdf');
