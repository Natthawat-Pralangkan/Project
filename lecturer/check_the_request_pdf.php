<?php
require_once(__DIR__ . '/../fpdf186/fpdf.php');
require_once(__DIR__ . '/../FPDI/src/autoload.php');
include(__DIR__ . '/../servers/connect.php');

// Define a function to convert dates to Thai format
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
$pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
$pdf->AddFont('THSarabunNew', 'BI', 'THSarabunNew_b.php');
$pdf->SetFont('THSarabunNew', 'BI', 18);
// $templatePath = __DIR__ . '/file/แบบสำรวจอัตรากำลังครู.pdf';
if ($row['petition_id'] == 7) {
    $templatePath = __DIR__ . '/file/แบบสำรวจอัตรากำลังครู.pdf';
    $details = explode(",", $row['details']);

    if (!file_exists($templatePath)) {
        exit('Template PDF not found at path: ' . $templatePath);
    }

    $pageCount = $pdf->setSourceFile($templatePath);
    $pageId = $pdf->importPage(1, \setasign\Fpdi\PdfReader\PageBoundaries::MEDIA_BOX);

    $pdf->addPage();
    $pdf->useImportedPage($pageId);

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
    $newdate = ConvertToThaiDate($row['date']);
    $pdf->SetXY(130, 262);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $newdate), 0, 1);
    $pdf->Output('I', 'generated_pdf.pdf');
} elseif ($row['petition_id'] == 6) {
    $templatePath = __DIR__ . '/file/แบบฟอร์มปะหน้า.docx.pdf'; // Adjust path as necessary
    // Process and display the details
    $details = explode(",", $row['details']);
    
    if (!file_exists($templatePath)) {
        exit('Template PDF not found at path: ' . $templatePath);
    }

    $pageCount = $pdf->setSourceFile($templatePath);
    $pageId = $pdf->importPage(1, \setasign\Fpdi\PdfReader\PageBoundaries::MEDIA_BOX);

    $pdf->addPage();
    $pdf->useImportedPage($pageId);
    $details = explode(",", $row['details']);
    $positions = [
        [70, 63], [100, 64], [127, 64], [65, 79], [85, 86],
        [60, 101], [45, 108], [55, 145], [45, 153], [60, 189], [45, 196]
    ];
    foreach ($details as $index => $detail) {
        if (isset($positions[$index])) {
            list($x, $y) = $positions[$index];
            $pdf->SetXY($x, $y);
            $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $detail), 0, 1);
        }
    }
    $newdate = ConvertToThaiDate($row['date']);
    $pdf->SetXY(130, 262);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $newdate), 0, 1);
    $pdf->Output('I', 'generated_pdf.pdf');
} elseif ($row['petition_id'] == 1) {
    $templatePath = __DIR__ . '/file/แบบรายงานผลการพานักเรียนไปนอกสถานศึกษา.docx.pdf'; // Adjust path as necessary
    // Process and display the details
    $details = explode(",", $row['details']);
    
    if (!file_exists($templatePath)) {
        exit('Template PDF not found at path: ' . $templatePath);
    }

    $pageCount = $pdf->setSourceFile($templatePath);
    $pageId = $pdf->importPage(1, \setasign\Fpdi\PdfReader\PageBoundaries::MEDIA_BOX);

    $pdf->addPage();
    $pdf->useImportedPage($pageId);
    $details = explode(",", $row['details']);
    $positions = [
        [100, 57], [100, 64], [127, 64], [65, 79], [85, 86],
        [60, 101], [45, 108], [55, 145], [45, 153], [60, 189], [45, 196]
    ];
    foreach ($details as $index => $detail) {
        if (isset($positions[$index])) {
            list($x, $y) = $positions[$index];
            $pdf->SetXY($x, $y);
            $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $detail), 0, 1);
        }
    }
    $newdate = ConvertToThaiDate($row['date']);
    $pdf->SetXY(130, 262);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $newdate), 0, 1);
    $pdf->Output('I', 'generated_pdf.pdf');
}elseif ($row['petition_id'] == 2) {
    $templatePath = __DIR__ . '/file/แบบรายงานการเข้าร่วมกิจกรรม.docx.pdf'; // Adjust path as necessary
    // Process and display the details
    $details = explode(",", $row['details']);
    
    if (!file_exists($templatePath)) {
        exit('Template PDF not found at path: ' . $templatePath);
    }

    $pageCount = $pdf->setSourceFile($templatePath);
    $pageId = $pdf->importPage(1, \setasign\Fpdi\PdfReader\PageBoundaries::MEDIA_BOX);

    $pdf->addPage();
    $pdf->useImportedPage($pageId);
    $details = explode(",", $row['details']);
    $positions = [
        [100, 57], [100, 64], [127, 64], [65, 79], [85, 86],
        [60, 101], [45, 108], [55, 145], [45, 153], [60, 189], [45, 196]
    ];
    foreach ($details as $index => $detail) {
        if (isset($positions[$index])) {
            list($x, $y) = $positions[$index];
            $pdf->SetXY($x, $y);
            $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $detail), 0, 1);
        }
    }
    $newdate = ConvertToThaiDate($row['date']);
    $pdf->SetXY(130, 262);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $newdate), 0, 1);
    $pdf->Output('I', 'generated_pdf.pdf');
}elseif ($row['petition_id'] == 3) {
    $templatePath = __DIR__ . '/file/แบบรายงานการไม่ลงนามในแบบสำรวจการเรียนการสอน.docx.pdf'; // Adjust path as necessary
    // Process and display the details
    $details = explode(",", $row['details']);
    
    if (!file_exists($templatePath)) {
        exit('Template PDF not found at path: ' . $templatePath);
    }

    $pageCount = $pdf->setSourceFile($templatePath);
    $pageId = $pdf->importPage(1, \setasign\Fpdi\PdfReader\PageBoundaries::MEDIA_BOX);

    $pdf->addPage();
    $pdf->useImportedPage($pageId);
    $details = explode(",", $row['details']);
    $positions = [
        [100, 57], [100, 64], [127, 64], [65, 79], [85, 86],
        [60, 101], [45, 108], [55, 145], [45, 153], [60, 189], [45, 196]
    ];
    foreach ($details as $index => $detail) {
        if (isset($positions[$index])) {
            list($x, $y) = $positions[$index];
            $pdf->SetXY($x, $y);
            $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $detail), 0, 1);
        }
    }
    $newdate = ConvertToThaiDate($row['date']);
    $pdf->SetXY(130, 262);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $newdate), 0, 1);
    $pdf->Output('I', 'generated_pdf.pdf');
}elseif ($row['petition_id'] == 4) {
    $templatePath = __DIR__ . '/file/การจัดตารางสอนแทนครูที่ไม่มาปฏิบัติราชการ.docx.pdf'; // Adjust path as necessary
    // Process and display the details
    $details = explode(",", $row['details']);
    
    if (!file_exists($templatePath)) {
        exit('Template PDF not found at path: ' . $templatePath);
    }

    $pageCount = $pdf->setSourceFile($templatePath);
    $pageId = $pdf->importPage(1, \setasign\Fpdi\PdfReader\PageBoundaries::MEDIA_BOX);

    $pdf->addPage();
    $pdf->useImportedPage($pageId);
    $details = explode(",", $row['details']);
    $positions = [
        [100, 57], [100, 64], [127, 64], [65, 79], [85, 86],
        [60, 101], [45, 108], [55, 145], [45, 153], [60, 189], [45, 196]
    ];
    foreach ($details as $index => $detail) {
        if (isset($positions[$index])) {
            list($x, $y) = $positions[$index];
            $pdf->SetXY($x, $y);
            $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $detail), 0, 1);
        }
    }
    $newdate = ConvertToThaiDate($row['date']);
    $pdf->SetXY(130, 262);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $newdate), 0, 1);
    $pdf->Output('I', 'generated_pdf.pdf');
}elseif ($row['petition_id'] == 5) {
    $templatePath = __DIR__ . '/file/รายงานการประชุม.docx.pdf'; // Adjust path as necessary
    // Process and display the details
    $details = explode(",", $row['details']);
    
    if (!file_exists($templatePath)) {
        exit('Template PDF not found at path: ' . $templatePath);
    }

    $pageCount = $pdf->setSourceFile($templatePath);
    $pageId = $pdf->importPage(1, \setasign\Fpdi\PdfReader\PageBoundaries::MEDIA_BOX);

    $pdf->addPage();
    $pdf->useImportedPage($pageId);
    $details = explode(",", $row['details']);
    $positions = [
        [100, 57], [100, 64], [127, 64], [65, 79], [85, 86],
        [60, 101], [45, 108], [55, 145], [45, 153], [60, 189], [45, 196]
    ];
    foreach ($details as $index => $detail) {
        if (isset($positions[$index])) {
            list($x, $y) = $positions[$index];
            $pdf->SetXY($x, $y);
            $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $detail), 0, 1);
        }
    }
    $newdate = ConvertToThaiDate($row['date']);
    $pdf->SetXY(130, 262);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $newdate), 0, 1);
    $pdf->Output('I', 'generated_pdf.pdf');
}elseif ($row['petition_id'] == 8) {
    $templatePath = __DIR__ . '/file/แบบสำรวจคาบสอนของครูผู้สอน.docx.pdf'; // Adjust path as necessary
    // Process and display the details
    $details = explode(",", $row['details']);
    // $pdf->AddPage('L'); // เพิ่มหน้าใหม่และกำหนดแนวหน้าเป็นแนวนอน (L หมายถึง Landscape)

    if (!file_exists($templatePath)) {
        exit('Template PDF not found at path: ' . $templatePath);
    }
    // $pdf = new FPDF('P','mm','A4');
    $pageCount = $pdf->setSourceFile($templatePath);
    $pageId = $pdf->importPage(1, \setasign\Fpdi\PdfReader\PageBoundaries::MEDIA_BOX);

    $pdf->addPage('L');
    $pdf->useImportedPage($pageId);
    $details = explode(",", $row['details']);
    $positions = [
        [155, 43], [200, 43], [230, 43], [65, 79], [85, 86],
        [60, 101], [45, 108], [55, 145], [45, 153], [60, 189], [45, 196]
    ];
    foreach ($details as $index => $detail) {
        if (isset($positions[$index])) {
            list($x, $y) = $positions[$index];
            $pdf->SetXY($x, $y);
            $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $detail), 0, 1);
        }
    }
    // $newdate = ConvertToThaiDate($row['date']);
    // $pdf->SetXY(130, 262);
    // $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $newdate), 0, 1);
    $pdf->Output('I', 'generated_pdf.pdf');
}elseif ($row['petition_id'] == 9) {
    $templatePath = __DIR__ . '/file/แบบขออนุญาตผู้บังคับบัญชาพานักเรียนไปนอกสถานศึกษา.docx.pdf'; // Adjust path as necessary
    // Process and display the details
    $details = explode(",", $row['details']);
    
    if (!file_exists($templatePath)) {
        exit('Template PDF not found at path: ' . $templatePath);
    }

    $pageCount = $pdf->setSourceFile($templatePath);
    $pageId = $pdf->importPage(1, \setasign\Fpdi\PdfReader\PageBoundaries::MEDIA_BOX);

    $pdf->addPage();
    $pdf->useImportedPage($pageId);
    $details = explode(",", $row['details']);
    $positions = [
        [100, 57], [100, 64], [127, 64], [65, 79], [85, 86],
        [60, 101], [45, 108], [55, 145], [45, 153], [60, 189], [45, 196]
    ];
    foreach ($details as $index => $detail) {
        if (isset($positions[$index])) {
            list($x, $y) = $positions[$index];
            $pdf->SetXY($x, $y);
            $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $detail), 0, 1);
        }
    }
    $newdate = ConvertToThaiDate($row['date']);
    $pdf->SetXY(130, 262);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $newdate), 0, 1);
    $pdf->Output('I', 'generated_pdf.pdf');
}elseif ($row['petition_id'] == 10) {
    $templatePath = __DIR__ . '/file/แบบขออนุญาตนำนักเรียนเข้าร่วมกิจกรรมในเวลาเรียน.docx.pdf'; // Adjust path as necessary
    // Process and display the details
    $details = explode(",", $row['details']);
    
    if (!file_exists($templatePath)) {
        exit('Template PDF not found at path: ' . $templatePath);
    }

    $pageCount = $pdf->setSourceFile($templatePath);
    $pageId = $pdf->importPage(1, \setasign\Fpdi\PdfReader\PageBoundaries::MEDIA_BOX);

    $pdf->addPage();
    $pdf->useImportedPage($pageId);
    $details = explode(",", $row['details']);
    $positions = [
        [100, 57], [100, 64], [127, 64], [65, 79], [85, 86],
        [60, 101], [45, 108], [55, 145], [45, 153], [60, 189], [45, 196]
    ];
    foreach ($details as $index => $detail) {
        if (isset($positions[$index])) {
            list($x, $y) = $positions[$index];
            $pdf->SetXY($x, $y);
            $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $detail), 0, 1);
        }
    }
    $newdate = ConvertToThaiDate($row['date']);
    $pdf->SetXY(130, 262);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $newdate), 0, 1);
    $pdf->Output('I', 'generated_pdf.pdf');
}elseif ($row['petition_id'] == 11) {
    $templatePath = __DIR__ . '/file/ขออนุญาตให้นักเรียนไปโรงเรียนเป็นกรณีพิเศษ.docx.pdf'; // Adjust path as necessary
    // Process and display the details
    $details = explode(",", $row['details']);
    
    if (!file_exists($templatePath)) {
        exit('Template PDF not found at path: ' . $templatePath);
    }

    $pageCount = $pdf->setSourceFile($templatePath);
    $pageId = $pdf->importPage(1, \setasign\Fpdi\PdfReader\PageBoundaries::MEDIA_BOX);

    $pdf->addPage();
    $pdf->useImportedPage($pageId);
    $details = explode(",", $row['details']);
    $positions = [
        [100, 57], [100, 64], [127, 64], [65, 79], [85, 86],
        [60, 101], [45, 108], [55, 145], [45, 153], [60, 189], [45, 196]
    ];
    foreach ($details as $index => $detail) {
        if (isset($positions[$index])) {
            list($x, $y) = $positions[$index];
            $pdf->SetXY($x, $y);
            $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $detail), 0, 1);
        }
    }
    $newdate = ConvertToThaiDate($row['date']);
    $pdf->SetXY(130, 262);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $newdate), 0, 1);
    $pdf->Output('I', 'generated_pdf.pdf');
}else {
    // Handle unexpected petition_id values
    exit('No template defined for the given petition_id.');
}

