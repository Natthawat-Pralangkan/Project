<?php
// เชื่อมต่อฐานข้อมูล
include "../../servers/connect.php";

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    
    // คำสั่ง SQL เพื่อดึงข้อมูลไฟล์ PDF
    $sql = "SELECT * FROM order_inside WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // ตรวจสอบว่าไฟล์ PDF มีอยู่หรือไม่
    if($row && !empty($row['file'])) {
        $pdfFile = $row['file'];
        echo "<embed src='./order/{$pdfFile}' type='application/pdf' width='100%' height='600px' />";
    } else {
        echo "ไม่พบไฟล์ PDF";
    }
}
?>
