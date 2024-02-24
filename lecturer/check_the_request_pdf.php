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
$pdf->SetFont('THSarabunNew', 'BI', 16);
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

    list($year, $month1, $day) = explode("-", $row['date']);

    $thai_month1 = $thai_month_arr1[$month1];
    // แปลงให้อยู่ในรูปแบบไทย
    $newdate = date("d H:i:s", strtotime($row['date']));

    $newdate = ConvertToThaiDate($row['date']);
    $pdf->SetXY(130, 262);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', date("d", strtotime($row['date']))), 0, 1);
    $pdf->SetXY(140, 262);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $thai_month1), 0, 1);
    $pdf->SetXY(153, 262);;
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $year + 543), 0, 1);
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
        [70, 64], [155, 88], [53, 96], [130, 96], [40, 103],
        [125, 103], [80, 110]
        // , [65, 110], [45, 153], [60, 189], [45, 196]
    ];
    foreach ($details as $index => $detail) {
        if (isset($positions[$index])) {
            list($x, $y) = $positions[$index];
            // กำหนดค่าเดือนแบบภาษาไทย
            $thai_month_arr = array(
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

            // แปลงเดือนให้เป็นภาษาไทย
            $month_thai = $thai_month_arr[date("m", strtotime($detail))];

            // ตรวจสอบว่าข้อมูลที่ต้องการแสดงเป็นวันที่หรือไม่
            if ($index == 4) { // ตำแหน่งที่ 5 ของ $details เป็นวันที่ (เหมือนเดิม)
                // แยกวัน เดือน และปีออกจากกัน
                $date_components = explode('-', $detail);
                $day = $date_components[2];
                $month_thai = $thai_month_arr[date("m", strtotime($detail))]; // เดือนภาษาไทย
                $year = date("Y", strtotime($detail)) + 543; // เพิ่ม 543 เพื่อแปลงเป็นปีไทย

                // แสดงข้อมูลในรูปแบบไทยและแยกออกเป็นวัน เดือน และปี
                $pdf->SetXY($x + 4, $y);
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $day), 0, 1);
                $pdf->SetXY($x + 30, $y);
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $month_thai), 0, 1);
                $pdf->SetXY($x + 65, $y);
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $year), 0, 1);
            } else {
                // แสดงข้อมูลอื่นๆ ที่ไม่ใช่วันที่
                $pdf->SetXY($x, $y);
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $detail), 0, 1);
            }
        }
    }
    $pdf->SetXY(115, 193);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $row['user_name'] . ' ' . $row['last_name']), 0, 1);

    $userName = $row['user_name'];
    // Use preg_replace to remove titles, can be customized further as needed
    // Adding proper delimiters and escaping where necessary
    $cleanName = preg_replace('/(นาย|นางสาว|นาง|ดร\.|ผศ\.|รศ\.|ศ\.|Mr\.|Mrs\.|Ms\.|Dr\.)/i', '', $userName);

    // Convert the cleaned name to a format usable in TCPDF
    $pdf->SetXY(120, 200);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $cleanName . ' ' . $row['last_name']), 0, 1);


    $thai_month_arr = array(
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

    list($year, $month1, $day) = explode("-", $row['date']);
    list($year, $month, $day) = explode("-", $row['date']);
    $thai_month = $thai_month_arr[$month];
    $thai_month1 = $thai_month_arr1[$month1];
    // แปลงให้อยู่ในรูปแบบไทย
    $newdate = date("d H:i:s", strtotime($row['date']));

    $newdate = ConvertToThaiDate($row['date']);
    $pdf->SetXY(120, 55);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', date("d", strtotime($row['date']))), 0, 1);
    $pdf->SetXY(140, 55);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $thai_month1), 0, 1);
    $pdf->SetXY(170, 55);;
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $year + 543), 0, 1);

    $newdate = ConvertToThaiDate($row['date']);
    $pdf->SetXY(115, 215);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', date("d", strtotime($row['date']))), 0, 1);
    $pdf->SetXY(128, 215);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $thai_month), 0, 1);
    $pdf->SetXY(143, 215);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $year + 543), 0, 1);
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
        [90, 55], [132, 73], [175, 73], [50, 87], [140, 94],
        [120, 101], [45, 108], [140, 108], [45, 115], [100, 121], 
        [50, 101],[40,80],[90,80],[40,94]
    ];
    foreach ($details as $index => $detail) {
        if (isset($positions[$index])) {
            list($x, $y) = $positions[$index];
            // กำหนดค่าเดือนแบบภาษาไทย
            $thai_month_arr = array(
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

            // แปลงเดือนให้เป็นภาษาไทย
            $month_thai = $thai_month_arr[date("m", strtotime($detail))];

            // ตรวจสอบว่าข้อมูลที่ต้องการแสดงเป็นวันที่หรือไม่
            if ($index == 4) { // ตำแหน่งที่ 5 ของ $details เป็นวันที่ (เหมือนเดิม)
                // แยกวัน เดือน และปีออกจากกัน
                $date_components = explode('-', $detail);
                $day = $date_components[2];
                $month_thai = $thai_month_arr[date("m", strtotime($detail))]; // เดือนภาษาไทย
                $year = date("Y", strtotime($detail)) + 543; // เพิ่ม 543 เพื่อแปลงเป็นปีไทย

                // แสดงข้อมูลในรูปแบบไทยและแยกออกเป็นวัน เดือน และปี
                $pdf->SetXY($x - 12, $y);
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $day), 0, 1);
                $pdf->SetXY($x + 3, $y);
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $month_thai), 0, 1);
                $pdf->SetXY($x + 26, $y);
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $year), 0, 1);
            } elseif ($index == 7) { // ตำแหน่งที่ 8 ของ $details เป็นวันที่ (ตำแหน่งใหม่)
                // แยกวัน เดือน และปีออกจากกัน
                $date_components = explode('-', $detail);
                $day = $date_components[2];
                $month_thai = $thai_month_arr[date("m", strtotime($detail))]; // เดือนภาษาไทย
                $year = date("Y", strtotime($detail)) + 543; // เพิ่ม 543 เพื่อแปลงเป็นปีไทย

                // แสดงข้อมูลในรูปแบบไทยและแยกออกเป็นวัน เดือน และปี
                $pdf->SetXY($x + 1, $y); // เปลี่ยนตำแหน่ง X เพื่อให้เหมือนเดิม
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $day), 0, 1);
                $pdf->SetXY($x + 16, $y); // เปลี่ยนตำแหน่ง X เพื่อให้เหมือนเดิม
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $month_thai), 0, 1);
                $pdf->SetXY($x + 38, $y); // เปลี่ยนตำแหน่ง X เพื่อให้เหมือนเดิม
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $year), 0, 1);
            } else {
                // แสดงข้อมูลอื่นๆ ที่ไม่ใช่วันที่
                $pdf->SetXY($x, $y);
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $detail), 0, 1);
            }
        }
    }

    $pdf->SetXY(108, 185);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $row['user_name'] . ' ' . $row['last_name']), 0, 1);

    $userName = $row['user_name'];
    // Use preg_replace to remove titles, can be customized further as needed
    // Adding proper delimiters and escaping where necessary
    $cleanName = preg_replace('/(นาย|นางสาว|นาง|ดร\.|ผศ\.|รศ\.|ศ\.|Mr\.|Mrs\.|Ms\.|Dr\.)/i', '', $userName);

    // Convert the cleaned name to a format usable in TCPDF
    $pdf->SetXY(112, 192);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $cleanName . ' ' . $row['last_name']), 0, 1);
    $thai_month_arr = array(
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
    // แยกวันที่ออกเป็นสามส่วน (วัน เดือน ปี)
    list($year, $month, $day) = explode("-", $row['date']);
    list($year, $month1, $day) = explode("-", $row['date']);
    $thai_month = $thai_month_arr[$month];
    $thai_month1 = $thai_month_arr1[$month1];
    // แปลงให้อยู่ในรูปแบบไทย
    $newdate = date("d H:i:s", strtotime($row['date']));

    // แสดงวันที่แยกแล้วในรูปแบบไทย
    $pdf->SetXY(117, 46);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', date("d", strtotime($row['date']))), 0, 1);
    $pdf->SetXY(138, 46);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $thai_month), 0, 1);
    $pdf->SetXY(168, 46);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $year + 543), 0, 1);
    $pdf->SetXY(112, 226);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', date("d", strtotime($row['date']))), 0, 1);
    $pdf->SetXY(122, 226);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $thai_month1), 0, 1);
    $pdf->SetXY(134, 226);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $year + 543), 0, 1);
    $pdf->Output('I', 'generated_pdf.pdf');
} elseif ($row['petition_id'] == 2) {
    $templatePath = __DIR__ . '/file/แบบรายงานการเข้าร่วมกิจกรรม.docx.pdf'; // Adjust path as necessary
    // Process and display the details
    $details = explode(",", $row['details']);

    if (!file_exists($templatePath)) {
        exit('Template PDF not found at path: ' . $templatePath);
    }

    $pageCount = $pdf->setSourceFile($templatePath);
    $pageId = $pdf->importPage(1, \setasign\Fpdi\PdfReader\PageBoundaries::MEDIA_BOX);

    $pdf->addPage('L');
    $pdf->useImportedPage($pageId);
    $details = explode(",", $row['details']);
    $positions = [
        [163, 46], [220, 46], [127, 64], [65, 79], [85, 86],
        [60, 101], [45, 108], [55, 145], [45, 153], [60, 189], [45, 196]
    ];
    foreach ($details as $index => $detail) {
        if (isset($positions[$index])) {
            list($x, $y) = $positions[$index];
            $pdf->SetXY($x, $y);
            $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $detail), 0, 1);
        }
    }

    $pdf->SetXY(220, 120);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $row['user_name'] . ' ' . $row['last_name']), 0, 1);

    $userName = $row['user_name'];
    // Use preg_replace to remove titles, can be customized further as needed
    // Adding proper delimiters and escaping where necessary
    $cleanName = preg_replace('/(นาย|นางสาว|นาง|ดร\.|ผศ\.|รศ\.|ศ\.|Mr\.|Mrs\.|Ms\.|Dr\.)/i', '', $userName);

    // Convert the cleaned name to a format usable in TCPDF
    $pdf->SetXY(225, 128);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $cleanName . ' ' . $row['last_name']), 0, 1);

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

    list($year, $month1, $day) = explode("-", $row['date']);

    $thai_month1 = $thai_month_arr1[$month1];
    // แปลงให้อยู่ในรูปแบบไทย
    $newdate = date("d H:i:s", strtotime($row['date']));

    $newdate = ConvertToThaiDate($row['date']);
    $pdf->SetXY(228, 142);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', date("d", strtotime($row['date']))), 0, 1);
    $pdf->SetXY(237, 142);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $thai_month1), 0, 1);
    $pdf->SetXY(248, 142);;
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $year + 543), 0, 1);
    $pdf->Output('I', 'generated_pdf.pdf');
} elseif ($row['petition_id'] == 3) {
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
        [110, 55], [140, 55], [70, 63], [125, 63], [85, 86],
        [60, 101], [45, 108], [55, 145], [45, 153], [60, 189], [45, 196]
    ];
    foreach ($details as $index => $detail) {
        if (isset($positions[$index])) {
            list($x, $y) = $positions[$index];
            // กำหนดค่าเดือนแบบภาษาไทย
            $thai_month_arr = array(
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

            // แปลงเดือนให้เป็นภาษาไทย
            $month_thai = $thai_month_arr[date("m", strtotime($detail))];

            // ตรวจสอบว่าข้อมูลที่ต้องการแสดงเป็นวันที่หรือไม่
            if ($index == 2) { // ตำแหน่งที่ 5 ของ $details เป็นวันที่ (เหมือนเดิม)
                // แยกวัน เดือน และปีออกจากกัน
                $date_components = explode('-', $detail);
                $day = $date_components[2];
                $month_thai = $thai_month_arr[date("m", strtotime($detail))]; // เดือนภาษาไทย
                $year = date("Y", strtotime($detail)) + 543; // เพิ่ม 543 เพื่อแปลงเป็นปีไทย

                // แสดงข้อมูลในรูปแบบไทยและแยกออกเป็นวัน เดือน และปี
                $pdf->SetXY($x - 12, $y);
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $day), 0, 1);
                $pdf->SetXY($x + 3, $y);
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $month_thai), 0, 1);
                $pdf->SetXY($x + 32, $y);
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $year), 0, 1);
            } elseif ($index == 3) { // ตำแหน่งที่ 8 ของ $details เป็นวันที่ (ตำแหน่งใหม่)
                // แยกวัน เดือน และปีออกจากกัน
                $date_components = explode('-', $detail);
                $day = $date_components[2];
                $month_thai = $thai_month_arr[date("m", strtotime($detail))]; // เดือนภาษาไทย
                $year = date("Y", strtotime($detail)) + 543; // เพิ่ม 543 เพื่อแปลงเป็นปีไทย

                // แสดงข้อมูลในรูปแบบไทยและแยกออกเป็นวัน เดือน และปี
                $pdf->SetXY($x + 1, $y); // เปลี่ยนตำแหน่ง X เพื่อให้เหมือนเดิม
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $day), 0, 1);
                $pdf->SetXY($x + 20, $y); // เปลี่ยนตำแหน่ง X เพื่อให้เหมือนเดิม
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $month_thai), 0, 1);
                $pdf->SetXY($x + 48, $y); // เปลี่ยนตำแหน่ง X เพื่อให้เหมือนเดิม
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $year), 0, 1);
            } else {
                // แสดงข้อมูลอื่นๆ ที่ไม่ใช่วันที่
                $pdf->SetXY($x, $y);
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $detail), 0, 1);
            }
        }
    }
    $pdf->Output('I', 'generated_pdf.pdf');
} elseif ($row['petition_id'] == 4) {
    $templatePath = __DIR__ . '/file/การจัดตารางสอนแทนครูที่ไม่มาปฏิบัติราชการ.docx.pdf'; // Adjust path as necessary
    // Process and display the details
    $details = explode(",", $row['details']);

    if (!file_exists($templatePath)) {
        exit('Template PDF not found at path: ' . $templatePath);
    }

    $pageCount = $pdf->setSourceFile($templatePath);
    $pageId = $pdf->importPage(1, \setasign\Fpdi\PdfReader\PageBoundaries::MEDIA_BOX);

    $pdf->addPage('L');
    $pdf->useImportedPage($pageId);
    $details = explode(",", $row['details']);
    $positions = [
        [110, 54], [190, 54], [217, 54], [65, 79], [85, 86],
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
} elseif ($row['petition_id'] == 5) {
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
    // $details = explode(",", $row['details']);
    $positions = [
        [45, 53], [128, 53], [50, 60], [45, 67], [35, 133],
        [60, 101], [45, 108], [55, 145], [45, 153], [60, 189], [45, 196]
    ];
    foreach ($details as $index => $detail) {
        if (isset($positions[$index])) {
            list($x, $y) = $positions[$index];
            // กำหนดค่าเดือนแบบภาษาไทย
            $thai_month_arr = array(
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

            // แปลงเดือนให้เป็นภาษาไทย
            $month_thai = $thai_month_arr[date("m", strtotime($detail))];

            // ตรวจสอบว่าข้อมูลที่ต้องการแสดงเป็นวันที่หรือไม่
            if ($index == 2) { // ตำแหน่งที่ 5 ของ $details เป็นวันที่ (เหมือนเดิม)
                // แยกวัน เดือน และปีออกจากกัน
                $date_components = explode('-', $detail);
                $day = $date_components[2];
                $month_thai = $thai_month_arr[date("m", strtotime($detail))]; // เดือนภาษาไทย
                $year = date("Y", strtotime($detail)) + 543; // เพิ่ม 543 เพื่อแปลงเป็นปีไทย

                // แสดงข้อมูลในรูปแบบไทยและแยกออกเป็นวัน เดือน และปี
                $pdf->SetXY($x - 12, $y);
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $day), 0, 1);
                $pdf->SetXY($x + 8, $y);
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $month_thai), 0, 1);
                $pdf->SetXY($x + 50, $y);
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $year), 0, 1);
            } else {
                // แสดงข้อมูลอื่นๆ ที่ไม่ใช่วันที่
                $pdf->SetXY($x, $y);
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $detail), 0, 1);
            }
        }
    }
    $pdf->SetXY(135, 200);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $row['user_name'] . ' ' . $row['last_name']), 0, 1);

    $userName = $row['user_name'];
    // Use preg_replace to remove titles, can be customized further as needed
    // Adding proper delimiters and escaping where necessary
    $cleanName = preg_replace('/(นาย|นางสาว|นาง|ดร\.|ผศ\.|รศ\.|ศ\.|Mr\.|Mrs\.|Ms\.|Dr\.)/i', '', $userName);

    // Convert the cleaned name to a format usable in TCPDF
    $pdf->SetXY(138, 207);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $cleanName . ' ' . $row['last_name']), 0, 1);

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

    list($year, $month1, $day) = explode("-", $row['date']);

    $thai_month1 = $thai_month_arr1[$month1];
    // แปลงให้อยู่ในรูปแบบไทย
    $newdate = date("d H:i:s", strtotime($row['date']));

    $newdate = ConvertToThaiDate($row['date']);
    $pdf->SetXY(138, 214);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', date("d", strtotime($row['date']))), 0, 1);
    $pdf->SetXY(150, 214);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $thai_month1), 0, 1);
    $pdf->SetXY(160, 214);;
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $year + 543), 0, 1);
    $pdf->Output('I', 'generated_pdf.pdf');
} elseif ($row['petition_id'] == 8) {
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
} elseif ($row['petition_id'] == 9) {
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
        [78, 71], [123, 91], [178, 91], [52, 105], [38, 112],
        [130, 112], [52, 119], [120, 119], [155, 126], [58, 133], 
        [125, 133], [58, 126], [37, 98], [80, 98], [130, 98]
    ];
    foreach ($details as $index => $detail) {
        if (isset($positions[$index])) {
            list($x, $y) = $positions[$index];
            // กำหนดค่าเดือนแบบภาษาไทย
            $thai_month_arr = array(
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

            // แปลงเดือนให้เป็นภาษาไทย
            $month_thai = $thai_month_arr[date("m", strtotime($detail))];

            // ตรวจสอบว่าข้อมูลที่ต้องการแสดงเป็นวันที่หรือไม่
            if ($index == 5) { // ตำแหน่งที่ 5 ของ $details เป็นวันที่ (เหมือนเดิม)
                // แยกวัน เดือน และปีออกจากกัน
                $date_components = explode('-', $detail);
                $day = $date_components[2];
                $month_thai = $thai_month_arr[date("m", strtotime($detail))]; // เดือนภาษาไทย
                $year = date("Y", strtotime($detail)) + 543; // เพิ่ม 543 เพื่อแปลงเป็นปีไทย

                // แสดงข้อมูลในรูปแบบไทยและแยกออกเป็นวัน เดือน และปี
                $pdf->SetXY($x - 3, $y);
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $day), 0, 1);
                $pdf->SetXY($x + 13, $y);
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $month_thai), 0, 1);
                $pdf->SetXY($x + 37, $y);
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $year), 0, 1);
            } elseif ($index == 8) { // ตำแหน่งที่ 8 ของ $details เป็นวันที่ (ตำแหน่งใหม่)
                // แยกวัน เดือน และปีออกจากกัน
                $date_components = explode('-', $detail);
                $day = $date_components[2];
                $month_thai = $thai_month_arr[date("m", strtotime($detail))]; // เดือนภาษาไทย
                $year = date("Y", strtotime($detail)) + 543; // เพิ่ม 543 เพื่อแปลงเป็นปีไทย

                // แสดงข้อมูลในรูปแบบไทยและแยกออกเป็นวัน เดือน และปี
                $pdf->SetXY($x + 1, $y); // เปลี่ยนตำแหน่ง X เพื่อให้เหมือนเดิม
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $day), 0, 1);
                $pdf->SetXY($x + 15, $y); // เปลี่ยนตำแหน่ง X เพื่อให้เหมือนเดิม
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $month_thai), 0, 1);
                $pdf->SetXY(33, 133); // เปลี่ยนตำแหน่ง X เพื่อให้เหมือนเดิม
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $year), 0, 1);
            } else {
                // แสดงข้อมูลอื่นๆ ที่ไม่ใช่วันที่
                $pdf->SetXY($x, $y);
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $detail), 0, 1);
            }
        }
    }
    $pdf->SetXY(105, 180);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $row['user_name'] . ' ' . $row['last_name']), 0, 1);

    $userName = $row['user_name'];
    // Use preg_replace to remove titles, can be customized further as needed
    // Adding proper delimiters and escaping where necessary
    $cleanName = preg_replace('/(นาย|นางสาว|นาง|ดร\.|ผศ\.|รศ\.|ศ\.|Mr\.|Mrs\.|Ms\.|Dr\.)/i', '', $userName);

    // Convert the cleaned name to a format usable in TCPDF
    $pdf->SetXY(107, 187);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $cleanName . ' ' . $row['last_name']), 0, 1);


    $thai_month_arr = array(
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

    list($year, $month1, $day) = explode("-", $row['date']);
    list($year, $month, $day) = explode("-", $row['date']);
    $thai_month = $thai_month_arr[$month];
    $thai_month1 = $thai_month_arr1[$month1];
    // แปลงให้อยู่ในรูปแบบไทย
    $newdate = date("d H:i:s", strtotime($row['date']));
    $newdate = ConvertToThaiDate($row['date']);
    $pdf->SetXY(118, 62);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', date("d", strtotime($row['date']))), 0, 1);
    $pdf->SetXY(140, 62);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $thai_month), 0, 1);
    $pdf->SetXY(170, 62);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $year + 543), 0, 1);

    $newdate = ConvertToThaiDate($row['date']);
    $pdf->SetXY(110, 222);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', date("d", strtotime($row['date']))), 0, 1);
    $pdf->SetXY(123, 222);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $thai_month1), 0, 1);
    $pdf->SetXY(135, 222);;
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $year + 543), 0, 1);

    $pdf->Output('I', 'generated_pdf.pdf');
} elseif ($row['petition_id'] == 10) {
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
        [95, 74], [38, 81], [130, 81], [65, 79], [85, 86],
        [60, 101], [45, 108], [55, 145], [45, 153], [60, 189], [45, 196]
    ];
    foreach ($details as $index => $detail) {
        if (isset($positions[$index])) {
            list($x, $y) = $positions[$index];
            // กำหนดค่าเดือนแบบภาษาไทย
            $thai_month_arr = array(
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

            // แปลงเดือนให้เป็นภาษาไทย
            $month_thai = $thai_month_arr[date("m", strtotime($detail))];

            // ตรวจสอบว่าข้อมูลที่ต้องการแสดงเป็นวันที่หรือไม่
            if ($index == 2) { // ตำแหน่งที่ 5 ของ $details เป็นวันที่ (เหมือนเดิม)
                // แยกวัน เดือน และปีออกจากกัน
                $date_components = explode('-', $detail);
                $day = $date_components[2];
                $month_thai = $thai_month_arr[date("m", strtotime($detail))]; // เดือนภาษาไทย
                $year = date("Y", strtotime($detail)) + 543; // เพิ่ม 543 เพื่อแปลงเป็นปีไทย

                // แสดงข้อมูลในรูปแบบไทยและแยกออกเป็นวัน เดือน และปี
                $pdf->SetXY($x + 5, $y);
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $day), 0, 1);
                $pdf->SetXY($x + 23, $y);
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $month_thai), 0, 1);
                $pdf->SetXY($x + 50, $y);
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $year), 0, 1);
            } else {
                // แสดงข้อมูลอื่นๆ ที่ไม่ใช่วันที่
                $pdf->SetXY($x, $y);
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $detail), 0, 1);
            }
        }
    }

    $userName = $row['user_name'];
    $cleanName = preg_replace('/(นาย|นางสาว|นาง|ดร\.|ผศ\.|รศ\.|ศ\.|Mr\.|Mrs\.|Ms\.|Dr\.)/i', '', $userName);
    $pdf->SetXY(100, 66);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $cleanName . ' ' . $row['last_name']), 0, 1);


    $thai_month_arr = array(
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


    list($year, $month, $day) = explode("-", $row['date']);
    $thai_month = $thai_month_arr[$month];
    // แปลงให้อยู่ในรูปแบบไทย
    $newdate = date("d H:i:s", strtotime($row['date']));
    $newdate = ConvertToThaiDate($row['date']);
    $pdf->SetXY(118, 48);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', date("d", strtotime($row['date']))), 0, 1);
    $pdf->SetXY(140, 48);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $thai_month), 0, 1);
    $pdf->SetXY(170, 48);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $year + 543), 0, 1);

    $pdf->SetXY(30, 245);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $row['user_name'] . ' ' . $row['last_name']), 0, 1);
    $userName = $row['user_name'];
    $cleanName = preg_replace('/(นาย|นางสาว|นาง|ดร\.|ผศ\.|รศ\.|ศ\.|Mr\.|Mrs\.|Ms\.|Dr\.)/i', '', $userName);
    $pdf->SetXY(30, 252);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $cleanName . ' ' . $row['last_name']), 0, 1);

    $pdf->Output('I', 'generated_pdf.pdf');
} elseif ($row['petition_id'] == 11) {
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
        [115, 101], [52, 108], [60, 108], [108, 108], [40, 115],
        [113, 115], [145, 115], [70, 123], [60, 233], [60, 189], [45, 196]
    ];
    foreach ($details as $index => $detail) {
        if (isset($positions[$index])) {
            list($x, $y) = $positions[$index];
            // กำหนดค่าเดือนแบบภาษาไทย
            $thai_month_arr = array(
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

            // แปลงเดือนให้เป็นภาษาไทย
            $month_thai = $thai_month_arr[date("m", strtotime($detail))];

            // ตรวจสอบว่าข้อมูลที่ต้องการแสดงเป็นวันที่หรือไม่
            if ($index == 4) { // ตำแหน่งที่ 5 ของ $details เป็นวันที่ (เหมือนเดิม)
                // แยกวัน เดือน และปีออกจากกัน
                $date_components = explode('-', $detail);
                $day = $date_components[2];
                $month_thai = $thai_month_arr[date("m", strtotime($detail))]; // เดือนภาษาไทย
                $year = date("Y", strtotime($detail)) + 543; // เพิ่ม 543 เพื่อแปลงเป็นปีไทย

                // แสดงข้อมูลในรูปแบบไทยและแยกออกเป็นวัน เดือน และปี
                $pdf->SetXY($x + 17, $y);
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $day), 0, 1);
                $pdf->SetXY($x + 30, $y);
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $month_thai), 0, 1);
                $pdf->SetXY($x + 54, $y);
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $year), 0, 1);
            } else {
                // แสดงข้อมูลอื่นๆ ที่ไม่ใช่วันที่
                $pdf->SetXY($x, $y);
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $detail), 0, 1);
            }
        }
    }
    // $newdate = ConvertToThaiDate($row['date']);
    // $pdf->SetXY(120,276);
    // $pdf->Cell(0, 0, iconv('UTF-8', 'cp874', $newdate), 0, 1);
    $pdf->Output('I', 'generated_pdf.pdf');
} else {
    // Handle unexpected petition_id values
    exit('No template defined for the given petition_id.');
}
