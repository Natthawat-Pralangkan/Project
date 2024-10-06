<?php
include("../servers/connect.php");
// รับค่าตัวแปรจาก $_POST
$user_id = $_POST['user_id']; // ตรวจสอบและทำความสะอาดข้อมูล
$telephone_number = $_POST['telephone_number']; // ตรวจสอบและทำความสะอาดข้อมูล

// โค้ด SQL สำหรับอัพเดทข้อมูล
$query = "UPDATE teacher_personnel_information SET telephone_number = ? WHERE user_id = ?";

// สร้าง prepared statement
$stmt = $db->prepare($query);
try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $telephone_number);
    $stmt->bindParam(2, $user_id);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo json_encode(['status' => 200]);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 400, "mgs" => $e->getMessage()]);
}
