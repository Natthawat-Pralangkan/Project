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

$pageCount = $pdf->setSourceFile('../../officer/academicmaster/file/aaa.pdf');
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
$rows = $result->fetch(PDO::FETCH_ASSOC);
// extract($rows);
$pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
$pdf->AddFont('THSarabunNew', 'BI', 'THSarabunNew_b.php');
$pdf->SetFont('THSarabunNew', 'BI', 18);

$newdate = ConvertToThaiDate($rows['date'], 0, 0);
$pdf->SetXY(110, 57);
$pdf->Cell(10, 10, iconv('UTF-8', 'cp874', (explode(",", $rows['details']))[0]));
$pdf->SetXY(100, 64);
$pdf->Cell(10, 10, iconv('UTF-8', 'cp874', (explode(",", $rows['details']))[1]));
$pdf->SetXY(127, 64);
$pdf->Cell(10, 10, iconv('UTF-8', 'cp874', (explode(",", $rows['details']))[2]));
$pdf->SetXY(65, 79);
$pdf->Cell(10, 10, iconv('UTF-8', 'cp874', (explode(",", $rows['details']))[3]));
$pdf->SetXY(85, 86);
$pdf->Cell(10, 10, iconv('UTF-8', 'cp874', (explode(",", $rows['details']))[4]));
$pdf->SetXY(60, 101);
$pdf->Cell(10, 10, iconv('UTF-8', 'cp874', (explode(",", $rows['details']))[5]));
$pdf->SetXY(45, 108);
$pdf->Cell(10, 10, iconv('UTF-8', 'cp874', (explode(",", $rows['details']))[6]));
$pdf->SetXY(55, 145);
$pdf->Cell(10, 10, iconv('UTF-8', 'cp874', (explode(",", $rows['details']))[7]));
$pdf->SetXY(45, 153);
$pdf->Cell(10, 10, iconv('UTF-8', 'cp874', (explode(",", $rows['details']))[8]));
$pdf->SetXY(60, 189);
$pdf->Cell(10, 10, iconv('UTF-8', 'cp874', (explode(",", $rows['details']))[9]));
$pdf->SetXY(45, 196);
$pdf->Cell(10, 10, iconv('UTF-8', 'cp874', (explode(",", $rows['details']))[10]));

$pdf->SetXY(130, 262);
$pdf->Cell(10, 10, iconv('UTF-8', 'cp874', (explode(",",$newdate))[0]));
$pdf->Output('I', './file/aaa.pdf');
