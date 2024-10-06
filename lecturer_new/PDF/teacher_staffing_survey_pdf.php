<?php
require_once(__DIR__ . '/../../fpdf186/fpdf.php'); // ต้องเติม / ในช่องว่างระหว่าง PDF และ ../../
require_once(__DIR__ . '/../../FPDI/src/autoload.php'); // เดียวกัน
include(__DIR__ . '/../../servers/connect.php'); // เดียวกัน


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
$pdf->setSourceFile('../file/แบบสำรวจอัตรากำลังครู.pdf');

// Add a page
$pdf->AddPage();

// Import the first page of the source PDF
$tplIdx = $pdf->importPage(1);

// Use the imported page as a template
$pdf->useTemplate($tplIdx, 0, 0);

// Fetch data from the database

$id = $_GET['id'] ?? exit('ID required');

$stmt = $db->prepare("SELECT 
details_ppetiton.*, 
petition_name.*, 
petition_type.*, 
request_status.*, 
teacher_personnel_information.*, 
subject_group_na.*, 
subject_group.*, 
memo_type.*,
dDeputy.director_name AS DeputyDirectorName, 
dDirector.director_name AS DirectorName
FROM details_ppetiton
JOIN petition_name ON details_ppetiton.petition_id = petition_name.id
JOIN petition_type ON petition_name.id_petition = petition_type.id 
JOIN request_status ON details_ppetiton.id_status = request_status.id_status
JOIN teacher_personnel_information ON details_ppetiton.user_id = teacher_personnel_information.user_id
LEFT JOIN subject_group_na ON details_ppetiton.id_subject_group = subject_group_na.id
LEFT JOIN subject_group ON details_ppetiton.user_subject = subject_group.id 
LEFT JOIN memo_type ON details_ppetiton.memo_type = memo_type.id
LEFT JOIN director AS dDeputy ON details_ppetiton.idDeputy_Director = dDeputy.id
LEFT JOIN director AS dDirector ON details_ppetiton.id_Director = dDirector.id
WHERE details_ppetiton.petition_type IN (1, 2, 3, 4) AND details_ppetiton.id = ?;
");
$stmt->execute([$id]);
$row = $stmt->fetchAll(PDO::FETCH_ASSOC);



$pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
$pdf->AddFont('THSarabunNew', 'BI', 'THSarabunNew_b.php');
$pdf->SetFont('THSarabunNew', 'BI', 16);

// $pdf->Image('../img/logo.png', 10, 10, 50);
// $imagePath = '../../img/logo.png';
// list($imageWidth, $imageHeight) = getimagesize($imagePath);
// $targetWidth = 30; // กำหนดความกว้างของรูปภาพที่ต้องการ
// $targetHeight = $imageHeight * ($targetWidth / $imageWidth); // คำนวณความสูงของรูปภาพโดยอัตราส่วนคงที่

// $pdf->Image($imagePath, ($pdf->GetPageWidth() - $targetWidth) / 2, 10, $targetWidth, $targetHeight);

// $pdf->SetXY(140, 20);
// $pdf->MultiCell(0, 8, iconv('UTF-8', 'cp874', "โรงเรียนนันทบุรีวิทยา\nเลขที่ 13 ถนนสุริยพงษ์ ตำบลในเวียง\nอำเภอเมืองน่าน จังหวัดน่าน 55000"), 0,);

// Add data to the PDF form fields
$pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
$pdf->AddFont('THSarabunNew', '', 'THSarabunNew_b.php');
$pdf->SetFont('THSarabunNew', 'BI', 16);
// print_r($results);
foreach ($row as $result) {
    $details = explode(",", $result['details']);
    $pdf->SetXY(110, 57);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $result['subject_name']), 0, 1);

    $pdf->SetXY(98, 64);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $details[0]), 0, 'C');
    $pdf->SetXY(127, 64);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $details[1]), 0, 'C');
    $pdf->SetXY(65, 79);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $details[2]), 0, 'C');
    $pdf->SetXY(85, 86);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $details[3]), 0, 'C');
    $pdf->SetXY(60, 101);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $details[4]), 0, 'C');
    $pdf->SetXY(45, 108);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $details[5]), 0, 'C');
    $pdf->SetXY(55, 145);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $details[6]), 0, 'C');
    $pdf->SetXY(45, 153);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $details[7]), 0, 'C');
    $pdf->SetXY(60, 189);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $details[8]), 0, 'C');
    $pdf->SetXY(45, 197);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $details[9]), 0, 'C');

    $thai_month_arr1 = array(
        "01" => "ม.ค.",
        "02" => "ก.พ.",
        "03" => "มี.ค.",
        "04" => "เม.ย.",
        "05" => "พ.ค.",
        "06" => "มิ.ย.",
        "07" => "ก.ค.",
        "08" => "ส.ค.",
        "09" => "ก.ย.",
        "10" => "ต.ค.",
        "11" => "พ.ย.",
        "12" => "ธ.ค."
    );
    list($year, $month1, $day) = explode("-", $result['date_learning']);
    $thai_month1 = $thai_month_arr1[$month1];
    $newdate = date("d H:i:s", strtotime($result['date_learning']));

    $newdate = ConvertToThaiDate($result['date_learning']);
    $pdf->SetXY(130, 262);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', date("d", strtotime($result['date_learning']))), 0, 1);
    $pdf->SetXY(140, 262);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $thai_month1), 0, 1);
    $pdf->SetXY(153, 262);;
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $year + 543), 0, 1);

    $userName = $result['group_leader_name'];
    // Use preg_replace to remove titles, can be customized further as needed
    // Adding proper delimiters and escaping where necessary
    $cleanName = preg_replace('/(นาย|นางสาว|นาง|ดร\.|ผศ\.|รศ\.|ศ\.|Mr\.|Mrs\.|Ms\.|Dr)/i', '', $userName);

    // Convert the cleaned name to a format usable in TCPDF

    $pdf->SetXY(120, 240);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $result['group_leader_name']), 0, 1);

    $pdf->SetXY(120, 248);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $cleanName), 0, 1);
}


$pdf->Output('I', 'แบบฟอร์มการเบิก.pdf');
