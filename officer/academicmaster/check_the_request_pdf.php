<?php
require_once('../../fpdf186/fpdf.php');
require_once('../../FPDI/src/autoload.php');
include("../../servers/connect.php");

class PDF extends FPDF {
    // การกำหนดฟอนต์
    function setThaiFont() {
        $this->AddFont('THSarabunNew', '', 'THSarabunNew.php');
        $this->SetFont('THSarabunNew', '', 12);
    }
}

$pdf = new \setasign\Fpdi\Fpdi();

$pageCount = $pdf->setSourceFile('./file/aaa.pdf');
$pageId = $pdf->importPage(1, \setasign\Fpdi\PdfReader\PageBoundaries::MEDIA_BOX);

$pdf->addPage();
$pdf->useImportedPage($pageId);
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
        // return $x[2]." ".$arrMM[(int)$x[1]]." ".($x[0]>2500?$x[0]:$x[0]+543);
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
$sql = "SELECT * FROM `details_ppetiton`
JOIN petition_name ON details_ppetiton.petition_id = petition_name.id
JOIN petition_type ON petition_name.id_petition = petition_type.id 
JOIN request_status ON details_ppetiton.id_status = request_status.id_status
JOIN teacher_personnel_information ON details_ppetiton.id_user = teacher_personnel_information.user_id
WHERE details_ppetiton.petition_type = 1 ORDER BY details_ppetiton.date DESC;";
$result = $db->query($sql);
$rows = $result->fetchAll(PDO::FETCH_ASSOC);
// กำหนดตำแหน่งและเพิ่มข้อมูลลงใน PDF
$pdf->SetXY(20, 20);
$pdf->SetFont('Arial', '', 12);
foreach ($rows as $row) {
    $newdate = ConvertToThaiDate($row['date'], 0, 0);
    $pdf->Cell(0, 10, 'วันที่: ' . $newdate, 0, 1);
    $pdf->Cell(0, 10, 'ชื่อคำร้อง: ' . $row['petition_name'], 0, 1);
    $pdf->Cell(0, 10, 'ประเภทคำร้อง: ' . $row['request_type_name'], 0, 1);
    $pdf->Cell(0, 10, 'สถานะ: ' . $row['name_status'], 0, 1);
}

$pdf->Output('I', 'generated.pdf');
