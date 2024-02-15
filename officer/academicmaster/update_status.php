<?php
// เชื่อมต่อกับฐานข้อมูล
include("../../servers/connect.php");

if(isset($_POST['id_status'])) {
    // รับค่า id_status ที่ส่งมาจาก AJAX
    $id_status = $_POST['id_status'];

    // ทำการอัพเดท id_status ในฐานข้อมูล
    $sql = "UPDATE details_ppetiton SET id_status = :id_status WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id_status', $id_status);
    // ค่า id ของข้อมูลที่จะอัพเดท ควรมาจากการระบุในตัวแปร POST หรือ GET
    $stmt->bindParam(':id', $_POST['id']); // ตั้งชื่อตัวแปร id ให้ตรงกับข้อมูลที่ต้องการอัพเดท
    $stmt->execute();

    echo "อัพเดทสถานะสำเร็จ";
} else {
    echo "ไม่พบข้อมูลที่ต้องการอัพเดท";
}
?>
