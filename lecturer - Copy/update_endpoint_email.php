<?php
include("../servers/connect.php");
// รับค่าตัวแปรจาก $_POST
$user_id = $_POST['user_id']; // ตรวจสอบและทำความสะอาดข้อมูล
$email = $_POST['email']; // ตรวจสอบและทำความสะอาดข้อมูล

// โค้ด SQL สำหรับอัพเดทข้อมูล
$query = "UPDATE teacher_personnel_information SET email = ? WHERE user_id = ?";

// สร้าง prepared statement
$stmt = $db->prepare($query);
try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $email);
    $stmt->bindParam(2, $user_id);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo json_encode(['status' => 200]);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 400, "mgs" => $e->getMessage()]);
}
