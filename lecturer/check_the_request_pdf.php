<?php
require_once(__DIR__ . '/../fpdf186/fpdf.php');
require_once(__DIR__ . '/../FPDI/src/autoload.php');
include(__DIR__ . '/../servers/connect.php');

// Define a function to convert dates to Thai format
function ConvertToThaiDate($date, $showTime = false, $showSeconds = false) {
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

$id = $_GET['id'] ?? exit('ID required');

$stmt = $db->prepare("SELECT *,`details_ppetiton`.`id` FROM `details_ppetiton`
JOIN petition_name ON details_ppetiton.petition_id = petition_name.id
JOIN petition_type ON petition_name.id_petition = petition_type.id 
JOIN request_status ON details_ppetiton.id_status = request_status.id_status
JOIN teacher_personnel_information ON details_ppetiton.user_id = teacher_personnel_information.user_id
WHERE details_ppetiton.petition_type = 1 AND details_ppetiton.id = ?");
$stmt->execute([$id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    exit('No data found for the provided ID.');
}

use setasign\Fpdi\Fpdi;
$pdf = new Fpdi();

$templatePath = __DIR__ . '/file/แบบสำรวจอัตรากำลังครู.pdf';
if (!file_exists($templatePath)) {
    exit('Template PDF not found at path: ' . $templatePath);
}

$pageCount = $pdf->setSourceFile($templatePath);
$pageId = $pdf->importPage(1, \setasign\Fpdi\PdfReader\PageBoundaries::MEDIA_BOX);

$pdf->addPage();
$pdf->useImportedPage($pageId);

// Set up the Thai font
$pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
$pdf->AddFont('THSarabunNew', 'BI', 'THSarabunNew_b.php');
$pdf->SetFont('THSarabunNew', 'BI', 18);

// Process and display the details
$details = explode(",", $row['details']);
$positions = [
    [110, 57], [100, 64], [127, 64], [65, 79], [85, 86],
    [60, 101], [45, 108], [55, 145], [45, 153], [60, 189], [45, 196]
];

foreach ($details as $index => $detail) {
    if (isset($positions[$index])) {
        list($x, $y) = $positions[$index];
        $pdf->SetXY($x, $y);
        $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $detail), 0, 1);
    }
}

// Display the date
$newdate = ConvertToThaiDate($row['date']);
$pdf->SetXY(130, 262);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $newdate), 0, 1);

// Output the PDF
$pdf->Output('I', 'generated_pdf.pdf');
