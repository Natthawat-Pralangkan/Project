<?php
include("../servers/connect.php");

header('Content-Type: application/json'); // Set appropriate content type for JSON response

try {
    // ตรวจสอบว่าการร้องขอเป็น POST และมีข้อมูล id, reason, id_status หรือไม่
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['reason'], $_POST['id_status'])) {
        $id = $_POST['id'];
        $reason = $_POST['reason'];
        $id_status = $_POST['id_status'];

        // เตรียมคำสั่ง SQL สำหรับการอัปเดตข้อมูล
        $sql = "UPDATE details_ppetiton SET reason = ?, id_status = ? WHERE id = ?";
        $stmt = $db->prepare($sql);

        // ตรวจสอบว่าการอัปเดตสำเร็จหรือไม่
        if ($stmt->execute([$reason, $id_status, $id])) {
            http_response_code(200); // OK
            echo json_encode([
                "message" => "Record updated successfully",
                "success" => true // เพิ่ม success เพื่อบอกฝั่ง client ว่าทำงานสำเร็จ
            ]);
        } else {
            http_response_code(500); // Internal Server Error
            echo json_encode([
                "message" => "Error updating record",
                "success" => false
            ]);
        }
    } else {
        http_response_code(400); // Bad Request
        echo json_encode([
            "message" => "Invalid request",
            "success" => false
        ]);
    }
} catch (PDOException $e) {
    http_response_code(500); // Internal Server Error
    echo json_encode([
        "message" => "Database error: " . $e->getMessage(),
        "success" => false
    ]);
}
?>
