<?php
require_once('../../fpdf186/fpdf.php');
require_once('../../FPDI/src/autoload.php');
include("../../servers/connect.php");

class PDF extends FPDF
{
    // การกำหนดฟอนต์
    function setThaiFont()
    {
        $this->AddFont('THSarabunNew', '', 'THSarabunNew.php');
        $this->SetFont('THSarabunNew', '', 12);
    }
}

$pdf = new \setasign\Fpdi\Fpdi();

$pageCount = $pdf->setSourceFile('./file/aaa.pdf');
$pageId = $pdf->importPage(1, \setasign\Fpdi\PdfReader\PageBoundaries::MEDIA_BOX);

$pdf->addPage();
$pdf->useImportedPage($pageId);


$id = isset($_POST['id']) ? $_POST['id'] : null;
if ($id === null) {
    echo 'ID is missing.';
    exit;
}
function ConvertToThaiDate($date, $showTime = false, $showSeconds = false)
{
    // ตรวจสอบความถูกต้องของวันที่ที่รับเข้ามา
    if ($date == '0000-00-00' || empty($date)) {
        return '';
    }

    $monthNames = ["ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค."];
    $day = date('j', strtotime($date));
    $month = $monthNames[date('n', strtotime($date)) - 1];
    $year = date('Y', strtotime($date)) + 543; // แปลงเป็นพ.ศ.

    $formattedDate = "$day $month $year";

    if ($showTime) {
        $timeFormat = $showSeconds ? 'H:i:s' : 'H:i';
        $time = date($timeFormat, strtotime($date));
        $formattedDate .= " $time";
    }

    return $formattedDate;
}

$stmt = $db->prepare("SELECT * FROM `details_ppetiton`
JOIN petition_name ON details_ppetiton.petition_id = petition_name.id
JOIN petition_type ON petition_name.id_petition = petition_type.id 
JOIN request_status ON details_ppetiton.id_status = request_status.id_status
JOIN teacher_personnel_information ON details_ppetiton.id_user = teacher_personnel_information.user_id
WHERE details_ppetiton.petition_type = 1 AND details_ppetiton.id = ? ORDER BY details_ppetiton.date DESC;");
$stmt->execute([$id]);
// After fetching data from the database
$rows = $stmt->fetch(PDO::FETCH_ASSOC);

// Add the Thai font for printing Thai characters
$pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
$pdf->AddFont('THSarabunNew', 'BI', 'THSarabunNew_b.php');
$pdf->SetFont('THSarabunNew', 'BI', 18);
print_r($rows);
// Check if details exist and are not empty before proceeding
if (!empty($rows) && !empty($rows['details'])) {
    $detailsArray = explode(",", $rows['details']);

    // Iterate through the details and print them if they exist
    // Note: You will need to adjust the X and Y coordinates according to your layout
    $positions = [
        // Example positions for each detail, adjust as necessary
        [110, 57], [100, 64], [127, 64], [65, 79], [85, 86],
        [60, 101], [45, 108], [55, 145], [45, 153], [60, 189], [45, 196]
    ];

    foreach ($detailsArray as $index => $detail) {
        if (isset($positions[$index])) {
            $x = $positions[$index][0];
            $y = $positions[$index][1];
            $pdf->SetXY($x, $y);
            $pdf->Cell(10, 10, iconv('UTF-8', 'cp874', $detail));
        }
    }
} else {
    // Handle the case when there are no details or $rows is empty
    echo 'No details found or the details are empty.';
    exit;
}

// Example for setting the date, assuming you've processed it earlier
$newdate = ConvertToThaiDate($rows['date'], false, false);
if ($newdate !== '') {
    $pdf->SetXY(130, 262);
    $pdf->SetFont('THSarabunNew', 'BI', 16);
    $pdf->Cell(10, 10, iconv('UTF-8', 'cp874', $newdate));
}

// Output the PDF
$pdf->Output('F', './file/aaa.pdf');
