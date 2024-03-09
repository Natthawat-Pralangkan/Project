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

$stmt = $db->prepare("SELECT *,`details_ppetiton`.`id`, details_ppetiton.`memo_type` FROM `details_ppetiton`
JOIN petition_name ON details_ppetiton.petition_id = petition_name.id
JOIN petition_type ON petition_name.id_petition = petition_type.id 
JOIN request_status ON details_ppetiton.id_status = request_status.id_status
JOIN teacher_personnel_information ON details_ppetiton.user_id = teacher_personnel_information.user_id
LEFT JOIN memo_type ON details_ppetiton.memo_type = memo_type.id
WHERE details_ppetiton.petition_type IN (1, 2, 3, 4) AND details_ppetiton.id = ?");
$stmt->execute([$id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    exit('No data found for the provided ID.');
}

// Example of handling potentially missing data
$memo_id = isset($row['memo_id']) ? $row['memo_id'] : 'Default memo_id';
$save_message = isset($row['save_message']) ? $row['save_message'] : 'Default save_message';
$save_a_message = isset($row['save_a_message']) ? $row['save_a_message'] : 'Default save_a_message';
$memo_description = isset($row['memo_description']) ? $row['memo_description'] : 'Default memo_description';

// Proceed with your normal operation, now that you have default values for potentially missing data


use setasign\Fpdi\Fpdi;

$pdf = new Fpdi('P', 'mm', 'A4');

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

    // การพิจารณาสั่งการของครู
    $iconPositions_1 = [
        '1' => ['x' => 145, 'y' => 163, 'icon' => './img/8666665_check_icon.png'],
        '2' => ['x' => 58, 'y' => 163, 'icon' => './img/8666665_check_icon.png'],
        '3' => ['x' => 140, 'y' => 163, 'icon' => './img/8666665_check_icon.png'],
        '4' => ['x' => 160, 'y' => 163, 'icon' => './img/8666665_check_icon.png'],
        '5' => ['x' => 180, 'y' => 163, 'icon' => './img/8666665_check_icon.png']
    ];
    if (isset($row['memo_id']) && array_key_exists($row['memo_id'], $iconPositions_1)) {
        // หากมี memo_type ที่เป็นไปได้ใน $iconPositions จะแสดงไอคอน
        $icon = $iconPositions_1[$row['memo_id']]['icon'];


        $x = $iconPositions_1[$row['memo_id']]['x'];

        $y = $iconPositions_1[$row['memo_id']]['y'];
        $pdf->Image($icon, $x, $y, 5, 10);
    }
    $pdf->SetXY(40, 178);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $row['save_message']), 0, 1);

    // การพิจารณาสั่งการของโรงเรียน
    $iconPositions = [
        '1' => ['x' => 145, 'y' => 242, 'icon' => './img/8666665_check_icon.png'],
        '2' => ['x' => 172, 'y' => 242, 'icon' => './img/8666665_check_icon.png'],
        '3' => ['x' => 140, 'y' => 70, 'icon' => './img/8666665_check_icon.png'],
        '4' => ['x' => 160, 'y' => 80, 'icon' => './img/8666665_check_icon.png'],
        '5' => ['x' => 180, 'y' => 90, 'icon' => './img/8666665_check_icon.png']
    ];
    if (isset($row['memo_type']) && array_key_exists($row['memo_type'], $iconPositions)) {
        // หากมี memo_type ที่เป็นไปได้ใน $iconPositions จะแสดงไอคอน
        $icon = $iconPositions[$row['memo_type']]['icon'];


        $x = $iconPositions[$row['memo_type']]['x'];

        $y = $iconPositions[$row['memo_type']]['y'];
        $pdf->Image($icon, $x, $y, 5, 10);
    }
    $pdf->SetXY(162, 257);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $row['save_a_message']), 0, 1);

    $pdf->Output('I', '/file/generated_pdf.pdf');
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
        [50, 101], [40, 80], [90, 80], [40, 94]
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
        [163, 46], [220, 46],
        [17, 64], [27, 64], [50, 64], [105, 64], [155, 64], [217, 64], [227, 64],
        [17, 70], [27, 70], [50, 70], [105, 70], [155, 70], [217, 70], [227, 70],
        [17, 76], [27, 76], [50, 76], [105, 76], [155, 76], [217, 76], [227, 76],
        [17, 82], [27, 82], [50, 82], [105, 82], [155, 82], [217, 82], [227, 82],
        [17, 88], [27, 88], [50, 88], [105, 88], [155, 88], [217, 88], [227, 88],
        [17, 95], [27, 95], [50, 95], [105, 95], [155, 95], [217, 95], [227, 95],
        [17, 103], [27, 103], [50, 103], [105, 103], [155, 103], [217, 103], [227, 103],
        [17, 110], [27, 110], [50, 110], [105, 110], [155, 110], [217, 110], [227, 110],
    ];
    $datePositions = [3, 10, 17, 24, 31, 38, 45, 52];

    foreach ($details as $index => $detail) {
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

        if (isset($positions[$index])) {
            list($x, $y) = $positions[$index];
            $pdf->SetXY($x, $y);

            // Check if current position is one of the specified date positions
            if (in_array($index, $datePositions)) {
                // Assuming $detail is in 'Y-m-d' format, convert it to Thai date format
                $dateComponents = explode('-', $detail);
                $year = $dateComponents[0] + 543; // Convert year to Thai year
                $month = $dateComponents[1];
                $day = $dateComponents[2];
                $thaiMonth = $thai_month_arr1[$month]; // Use short month name

                // Reformat the date as desired, for example: "31 ม.ค. 2563"
                $formattedDate = $day . '' . $thaiMonth . '' . $year;

                // Display the formatted date
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $formattedDate), 0, 1);
            } else {
                // Display other details normally
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $detail), 0, 1);
            }
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
        [110, 55], [140, 55], [70, 63], [125, 63],
        [40, 90], [89, 90], [115, 90], [130, 90], [155, 90], [165, 90],
        [45, 196]
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
    $standardWidth = 215; // ความกว้างมาตรฐานของ A4 ในมิลลิเมตร
    $customHeight = 297; // ตัวอย่างความสูงที่เพิ่มขึ้น, คุณสามารถปรับให้เหมาะสม

    // กำหนดขนาดหน้าเมื่อเพิ่มหน้าใหม่
    $pdf->AddPage('L', array($standardWidth, $customHeight));

    // $pdf->addPage('L', array(210, 297));
    $pdf->useImportedPage($pageId);
    $details = explode(",", $row['details']);
    $positions = [
        [110, 54], [190, 54], [217, 54],
        [25, 85], [55, 85], [100, 85], [132, 85], [160, 85], [175, 85], [185, 85], [208, 85],
        [25, 93], [55, 93], [100, 93], [132, 93], [160, 93], [175, 93], [185, 93], [208, 93],
        [25, 101], [55, 101], [100, 101], [132, 101], [160, 101], [175, 101], [185, 101], [208, 101],
        [25, 109], [55, 109], [100, 109], [132, 109], [160, 109], [175, 109], [185, 109], [208, 109],
        [25, 117], [55, 117], [100, 117], [132, 117], [160, 117], [175, 117], [185, 117], [208, 117],
        [25, 124], [55, 124], [100, 124], [132, 124], [160, 124], [175, 124], [185, 124], [208, 124],
        [25, 132], [55, 132], [100, 132], [132, 132], [160, 132], [175, 132], [185, 132], [208, 132],
        [25, 139], [55, 139], [100, 139], [132, 139], [160, 139], [175, 139], [185, 139], [208, 139],
        [25, 146], [55, 146], [100, 146], [132, 146], [160, 146], [175, 146], [185, 146], [208, 146],
        [25, 154], [55, 154], [100, 154], [132, 154], [160, 154], [175, 154], [185, 154], [208, 154],
        [25, 162], [55, 162], [100, 162], [132, 162], [160, 162], [175, 162], [185, 162], [208, 162],
        [25, 169], [55, 169], [100, 169], [132, 169], [160, 169], [175, 169], [185, 169], [208, 169],
        [25, 176], [55, 176], [100, 176], [132, 176], [160, 176], [175, 176], [185, 176], [208, 176],
        [25, 184], [55, 184], [100, 184], [132, 184], [160, 184], [175, 184], [185, 184], [208, 184],
    ];

    $datePositions = [3, 11, 19, 27, 35, 43, 51, 59, 67, 75, 83, 91, 99, 107];

    foreach ($details as $index => $detail) {
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

        if (isset($positions[$index])) {
            list($x, $y) = $positions[$index];
            $pdf->SetXY($x, $y);
            if (in_array($index, $datePositions)) {
                // Check if $detail is in the expected 'Y-m-d' format
                if (preg_match('/^(\d{4})-(\d{2})-(\d{2})$/', $detail, $matches)) {
                    $year = (int)$matches[1] + 543; // Convert year to Thai year and ensure it's an integer
                    $month = $matches[2];
                    $day = $matches[3];
                    if (isset($thai_month_arr1[$month])) { // Ensure the month exists in your array
                        $thaiMonth = $thai_month_arr1[$month]; // Use short month name
                        // Reformat the date as desired, for example: "31 ม.ค. 2563"
                        $formattedDate = $day . ' ' . $thaiMonth . ' ' . $year;

                        // Display the formatted date
                        $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $formattedDate), 0, 1);
                    }
                } else {
                    // Handle the case where $detail is not in the expected format
                    // For example, log an error or display a placeholder message
                }
            } else {
                // Display other details normally
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $detail), 0, 1);
            }
        }
    }
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
        [130, 60], [160, 60],
        [30, 82], [90, 82],
        [30, 89], [90, 89],
        [30, 97], [90, 97],
        [30, 104], [90, 104],
        [30, 111], [90, 111]
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
        [155, 43], [200, 43], [230, 43],
        [23, 79], [35, 70], [82, 70], [120, 70], [148, 70], [168, 70], [195, 70], [210, 70], [250, 70],
        [35, 78], [82, 78], [120, 78], [148, 78], [168, 78], [195, 78], [210, 78], [250, 78],
        [35, 87], [82, 87], [120, 87], [148, 87], [168, 87], [195, 87], [210, 87], [250, 87]
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
        [95, 74], [38, 81], [130, 81],
        [24, 110], [32, 110], [93, 110], [110, 110], [133, 110], [172, 110]
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

    $pdf->SetXY(28, 245);
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
    $standardWidth = 215; // ความกว้างมาตรฐานของ A4 ในมิลลิเมตร
    $customHeight = 310; // ตัวอย่างความสูงที่เพิ่มขึ้น, คุณสามารถปรับให้เหมาะสม

    // กำหนดขนาดหน้าเมื่อเพิ่มหน้าใหม่
    $pdf->AddPage('P', array($standardWidth, $customHeight));
    // $pdf->addPage();
    $pdf->useImportedPage($pageId);
    $details = explode(",", $row['details']);
    $positions = [
        [115, 101], [52, 108], [60, 108], [108, 108], [40, 115],
        [113, 115], [145, 115], [70, 123], [60, 233],
        [73, 218], [150, 218], [73, 226], [150, 226]

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
            $days_in_thai = array("อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัสบดี", "ศุกร์", "เสาร์");
            // แปลงเดือนให้เป็นภาษาไทย
            $month_thai = $thai_month_arr[date("m", strtotime($detail))];

            // ตรวจสอบว่าข้อมูลที่ต้องการแสดงเป็นวันที่หรือไม่
            if ($index == 4) { // ตำแหน่งที่ 5 ของ $details เป็นวันที่ (เหมือนเดิม)
                // แยกวัน เดือน และปีออกจากกัน
                setlocale(LC_TIME, 'th_TH');
                // $date = "2024-02-21"; // วันที่ต้องการแปลง
                $day_index = date('w', strtotime($detail));

                // รับชื่อวันภาษาไทยจาก array
                $day_name_thai = $days_in_thai[$day_index];
                // echo $day_name_thai; // ผลลัพธ์ที่คาดหวัง
                $date_components = explode('-', $detail);
                $day = $date_components[2];
                $month_thai = $thai_month_arr[date("m", strtotime($detail))]; // เดือนภาษาไทย
                $year = date("Y", strtotime($detail)) + 543; // เพิ่ม 543 เพื่อแปลงเป็นปีไทย

                // แสดงข้อมูลในรูปแบบไทยและแยกออกเป็นวัน เดือน และปี
                $pdf->SetXY($x - 2, $y);
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $day_name_thai), 0, 1);
                $pdf->SetXY($x + 17, $y);
                $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $day), 0, 1);
                $pdf->SetXY($x + 31, $y);
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
    $pdf->SetXY(109, 73);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', date("d", strtotime($row['date']))), 0, 1);
    $pdf->SetXY(115, 73);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $thai_month), 0, 1);
    $pdf->SetXY(130, 73);
    $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $year + 543), 0, 1);

    $newdate = ConvertToThaiDate($row['date']);
    $pdf->SetXY(93, 283);
    $pdf->Cell(0, 0, iconv('UTF-8', 'cp874', $newdate), 0, 1);
    $pdf->Output('I', 'generated_pdf.pdf');
} else {
    // Handle unexpected petition_id values
    exit('No template defined for the given petition_id.');
}
