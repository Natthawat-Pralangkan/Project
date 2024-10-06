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
$pdf = new Fpdi();

$pdf->setSourceFile('../file/แบบฟอร์มปะหน้า.docx.pdf');
$tplIdx1 = $pdf->importPage(1);
// $tplIdx2 = $pdf->importPage(2);

$pdf->AddPage();
$pdf->useTemplate($tplIdx1, 0, 0);

// เพิ่มข้อมูลที่ต้องการแสดงในหน้า 1
// ย้ายโค้ดที่เกี่ยวข้องกับหน้า 1 มาที่นี่

// $pdf->AddPage();
// $pdf->useTemplate($tplIdx2, 0, 0);



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


$pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
$pdf->AddFont('THSarabunNew', '', 'THSarabunNew_b.php');
$pdf->SetFont('THSarabunNew', 'BI', 16);
// print_r($results);
foreach ($row as $result) {
    $details = explode(",", $result['details']);
    $pdf->SetXY(155, 88);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $result['subject_name']), 0, 1);
    $pdf->SetXY(70, 64);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $details[0]), 0, 'C');
    $pdf->SetXY(53, 96);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $details[1]), 0, 'C');
    $pdf->SetXY(130, 96);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $details[2]), 0, 'C');
    // $pdf->SetXY(40, 103);
    // $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $details[3]), 0, 'C');
    // แยกวันที่ออกเป็นส่วนย่อย
    $dateParts = explode(' ', ConvertToThaiDate($details[3]));
    $dayMonthYear = explode(' ', $dateParts[0]);
    $day = $dayMonthYear[0];
    $month = $dayMonthYear[1];
    $year = $dayMonthYear[2];

    $pdf->SetXY(117, 55);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $day), 0, 'C'); // วัน
    $pdf->SetXY(137, 55);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $month), 0, 'C'); // เดือน
    $pdf->SetXY(170, 55);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $year), 0, 'C'); // ปี


    $pdf->SetXY(125, 103);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $details[4]), 0, 'C');
    $pdf->SetXY(80, 110);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $details[5]), 0, 'C');
}


$pdf->Output('I', 'แบบฟอร์มการเบิก.pdf');
