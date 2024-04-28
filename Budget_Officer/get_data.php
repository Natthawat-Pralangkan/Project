<?php
// เชื่อมต่อกับฐานข้อมูล
include("../servers/connect.php");

// ตรวจสอบว่ามีการส่ง ID มาหรือไม่
if (isset($_GET['id'])) {
    // ดึงข้อมูลจากฐานข้อมูลโดยใช้ ID
    $id = $_GET['id'];
    $sql = "SELECT * FROM details_ppetiton WHERE id = :id"; // เปลี่ยน your_table เป็นชื่อตารางของคุณ
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // สร้าง URL สำหรับไฟล์ PDF
    $pdfUrl = 'check_the_request_pdf'; // เปลี่ยนเป็น URL ของไฟล์ PDF ของคุณ

    // ส่งข้อมูลกลับเป็น JSON
    echo json_encode(array('pdfUrl' => $pdfUrl));
} else {
    echo "ID is not provided";
}
?>
