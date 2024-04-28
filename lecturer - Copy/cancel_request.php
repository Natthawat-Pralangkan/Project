<?php
// path/to/your/server/script.php
include("../servers/connect.php");

// ตรวจสอบว่ามีการส่งข้อมูล ID และ id_status
if(isset($_POST['id']) && isset($_POST['id_status'])) {
    $id = $_POST['id'];
    $id_status = $_POST['id_status'];

    // สร้างคำสั่ง SQL สำหรับอัปเดตสถานะ
    $sql = "UPDATE details_ppetiton SET id_status = ? WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(1, $id_status, PDO::PARAM_INT);
    $stmt->bindParam(2, $id, PDO::PARAM_INT);
    if($stmt->execute()) {
        echo "คำร้องถูกยกเลิกสำเร็จ";
    } else {
        echo "เกิดข้อผิดพลาดในการยกเลิกคำร้อง";
    }
}
?>
