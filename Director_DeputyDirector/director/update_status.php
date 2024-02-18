<?php

// เชื่อมต่อกับฐานข้อมูล
include("../../servers/connect.php");
// print_r($_POST);
// exit;
// รับข้อมูลที่ส่งมาจาก AJAX
$id_status = 3; // กำหนดค่า id_status เป็น 2 ตามที่ต้องการอัพเดท
$id_user = $_POST['id_user'];

// อัพเดทสถานะในฐานข้อมูล
$sql = "UPDATE details_ppetiton SET id_status = 3 WHERE id = 28";

try {
    $stmt = $db->prepare($sql);
    // $stmt->bindParam(1, $id_status);
    // $stmt->bindParam(1, $id_user);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo json_encode(['status' => 200]);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 400, "mgs" => $e->getMessage()]);
}

?>
