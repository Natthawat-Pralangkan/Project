<?php
// require '../fpdf186/fpdf.php'; // ตรวจสอบเส้นทางไฟล์ให้ถูกต้อง
// require '../FPDI/src/autoload.php'; // ตรวจสอบเส้นทางไฟล์ให้ถูกต้อง
require_once(__DIR__ . '/../fpdf186/fpdf.php');
require_once(__DIR__ . '/../FPDI/src/autoload.php');
include(__DIR__ . '/../servers/connect.php');


$id = $_GET['id'] ?? exit('ID required');


use setasign\Fpdi\Fpdi;

$pdf = new Fpdi();
$pdf->AddPage("P");
// $standardWidth = 220; // ความกว้างมาตรฐานของ A4 ในมิลลิเมตร
// $customHeight = 310; // ตัวอย่างความสูงที่เพิ่มขึ้น, คุณสามารถปรับให้เหมาะสม

// // กำหนดขนาดหน้าเมื่อเพิ่มหน้าใหม่
// $pdf->AddPage("P", array($standardWidth, $customHeight));
// ตรวจสอบว่าได้เรียกใช้ฟอนต์ที่ถูกต้อง
$pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
$pdf->AddFont('THSarabunNew', 'BI', 'THSarabunNew_b.php');
$pdf->SetFont('THSarabunNew', 'BI', 16);

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
            $arrMM = array(1 => "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
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
// $stmt = $db->prepare("SELECT 
// details_ppetiton.*, 
// petition_name.*, 
// petition_type.*, 
// request_status.*, 
// teacher_personnel_information.*, 
// subject_group_na.*, 
// subject_group.*, 
// memo_type.*,
// dDeputy.director_name AS DeputyDirectorName, 
// dDirector.director_name AS DirectorName
// FROM details_ppetiton
// JOIN petition_name ON details_ppetiton.petition_id = petition_name.id
// JOIN petition_type ON petition_name.id_petition = petition_type.id 
// JOIN request_status ON details_ppetiton.id_status = request_status.id_status
// JOIN teacher_personnel_information ON details_ppetiton.user_id = teacher_personnel_information.user_id
// LEFT JOIN subject_group_na ON details_ppetiton.id_subject_group = subject_group_na.id
// LEFT JOIN subject_group ON details_ppetiton.user_subject = subject_group.id 
// LEFT JOIN memo_type ON details_ppetiton.memo_type = memo_type.id
// LEFT JOIN director AS dDeputy ON details_ppetiton.idDeputy_Director = dDeputy.id
// LEFT JOIN director AS dDirector ON details_ppetiton.id_Director = dDirector.id
// WHERE details_ppetiton.petition_type IN (1, 2, 3, 4) AND details_ppetiton.id = ?;
// ");
// $stmt->execute([$id]);
// $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// $pdf->Image('../img/logo.png', 10, 10, 50);
$imagePath = '../img/logo.png';
list($imageWidth, $imageHeight) = getimagesize($imagePath);
$targetWidth = 30; // กำหนดความกว้างของรูปภาพที่ต้องการ
$targetHeight = $imageHeight * ($targetWidth / $imageWidth); // คำนวณความสูงของรูปภาพโดยอัตราส่วนคงที่

$pdf->Image($imagePath, ($pdf->GetPageWidth() - $targetWidth) / 2, 10, $targetWidth, $targetHeight);

// แสดงข้อความที่ด้านบนและชิดขวา
$pdf->SetXY(140, 20);
$pdf->MultiCell(0, 8, iconv('UTF-8', 'cp874', "โรงเรียนนันทบุรีวิทยา\nเลขที่ 13 ถนนสุริยพงษ์ ตำบลในเวียง\nอำเภอเมืองน่าน จังหวัดน่าน 55000"), 0,);
$pdf->Ln(10);
$pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
$pdf->AddFont('THSarabunNew', 'BI', 'THSarabunNew_b.php');
$pdf->SetFont('THSarabunNew', 'BI', 16);

$pdf->Ln(10);
$pdf->SetXY(20, 55);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "เรื่อง ขออนุญาตใหนักเรียนไป"));
$pdf->SetXY(20, 65);
$pdf->Cell(0, 5, iconv('UTF-8', 'cp874', "เรียน ผู้ปกครองนักเรียน"));

$pdf->SetXY(40, 75);
$pdf->Cell(0, 5, iconv('UTF-8', 'cp874', "ด้วยโรงเรียนนันทบุรวิทยา มีความประสงค์จะขออนุญาตนำ"));
$pdf->SetXY(20, 80);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "นักเรียนชั้น ม ........"));
$pdf->SetXY(50, 80);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "/......."));
$pdf->SetXY(60, 80);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "ไปเพื่อ............................."));
$pdf->SetXY(100, 80);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "ณ..............................................."));
$pdf->SetXY(150, 80);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "จังหวัด......................."));
$pdf->SetXY(20, 90);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "ในการไปครั้งนี้มีนักเรียนจำนวน..........."));
$pdf->SetXY(80, 90);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "รูป/คน"));
$pdf->SetXY(100, 90);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "มีครูควบคุม............"));
$pdf->SetXY(130, 90);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "รูป/คน"));
$pdf->SetXY(20, 98);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "ได้แก่............................................................................................................................................................"));

$pdf->SetXY(155, 105);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "เป็นผู้ควบคุมไป"));

$pdf->SetXY(20, 105);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "เดินทางโดย..........................................."));
$pdf->SetXY(80, 105);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "เดินทางไปตามเส้นทาง........................................."));

$pdf->SetXY(20, 113);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "เริ่มออกเดินทาง"));
$pdf->SetXY(45, 113);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "วันที่..................."));
$pdf->SetXY(70, 113);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "เดือน..............................."));
$pdf->SetXY(110, 113);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "พ.ศ..................."));
$pdf->SetXY(140, 113);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "เวลา...................."));
$pdf->SetXY(170, 113);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "น."));

$pdf->SetXY(20, 120);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "และกลับถึงสถานศึกษา"));
$pdf->SetXY(58, 120);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "วันที่............"));
$pdf->SetXY(78, 120);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "เดือน............................."));
$pdf->SetXY(115, 120);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "พ.ศ................"));
$pdf->SetXY(140, 120);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "เวลา..................."));
$pdf->SetXY(170, 120);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "น."));

$pdf->SetXY(20, 128);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "นักเรียนมีค่าใช้จ่ายจำนวนทั้งสิ้นคนละ..........."));
$pdf->SetXY(90, 128);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "บาท ทั้งนี้เป็นไปตามความสมัครใจของนักเรียนและผู้ปกครอง"));

$pdf->SetXY(38, 135);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "จึงเรียนมาเพื่อขออนุญาตนำ....................................................................."));
// $pdf->SetXY(85,170);
// $pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "สามเณร ณัฐวัตร ประลังการ"));
$pdf->SetXY(148, 135);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "นักเรียนชั้น ม....... "));
$pdf->SetXY(175, 135);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "/........"));

$pdf->SetXY(20, 143);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "ไปเข้าร่วมกิจกรรมดังกล่าวและการไปครั้งนี้ได้ปฏิบัตตามระเบียบกระทรวงศึกษาธิการว่าด้วยการพานักเรียน"));
$pdf->SetXY(20, 150);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "ไปนอกสถานศึกษาแล้ว"));

$pdf->SetXY(90, 155);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "ขอแสดงความนับถือ"));
$pdf->SetXY(92, 170);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "( พระครูสิรินันทวิทย์ )"));
$pdf->SetXY(80, 180);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "ผู้อำนวยการโรงเรียนนันทบุรีวิทยา"));

$pdf->SetXY(20, 190);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "ติดต่อกลุ่มงานวิชาการ 080-769-3503"));

$pdf->SetXY(20, 198);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "ติดต่อครูผู้ควบคุม"));
$pdf->SetXY(60, 198);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "๑."));
$pdf->SetXY(120, 198);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "เบอร์โทรศัพท์มือถือ"));

$pdf->SetXY(60, 205);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "๒."));
$pdf->SetXY(120, 205);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "เบอร์โทรศัพท์มือถือ"));

$pdf->SetXY(20, 210);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "............................................................................................................................................................................."));

$pdf->SetXY(50, 220);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "โปรดส่งใบตอบรับคืนให้ครูผู้เกี่ยวข้องก่อนเดินทางไม่น้อยกว่า ๓ วัน"));

$pdf->SetXY(20, 228);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "ข้าพเจ้า....................................................................."));
$pdf->SetXY(100, 228);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "เป็นผู้ปกครองของ..............................................................."));

$pdf->SetXY(20, 237);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "นักเรียนชั้นมัธยมศึกษาปีที่.........."));
$pdf->SetXY(70, 237);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "/........"));


$imagePath = './img/stop.png';
$pdf->Image($imagePath, 85, 239, 5, 5);
$pdf->SetXY(90, 237);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "อนุญาต"));

$pdf->Image($imagePath, 105, 239, 5, 5);
$pdf->SetXY(110, 237);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "ไม่อนุญาต"));

$pdf->SetXY(128, 237);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "ให้ไป......................................................."));

$pdf->SetXY(20, 245);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "ณ......................................................................................."));
$pdf->SetXY(110, 245);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "ตามที่แจ้งในหนังสือ ที่ ปส.08065501/...................."));

$pdf->SetXY(20, 253);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', "ลงวันที่"));

$pdf->SetXY(105, 323);
$pdf->Cell(0, -120, iconv('UTF-8', 'cp874', "ลงชื่อ.................................................(ผู้ปกครอง)"));
$pdf->SetXY(115, 332);
$pdf->Cell(0, -120, iconv('UTF-8', 'cp874', "(..............................................)"));
$pdf->SetXY(115, 338);
$pdf->Cell(0, -115, iconv('UTF-8', 'cp874', "......../....................../................"));
$pdf->SetXY(115, 345);
$pdf->Cell(0, -115, iconv('UTF-8', 'cp874', "โทร.............................................."));
$pdf->Output();
