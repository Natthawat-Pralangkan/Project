<?php
include("../../servers/connect.php");

header('Content-Type: application/json'); // Set appropriate content type for JSON response

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['reason'], $_POST['id_status'], $_POST['id_Director'])) {
        $id = $_POST['id'];
        $reason = $_POST['reason'];
        $id_status = $_POST['id_status'];
        $id_Director = $_POST['id_Director'];

        $sql = "UPDATE details_ppetiton SET reason = ?, id_status = ?, id_Director = ? WHERE id = ?";
        $stmt = $db->prepare($sql);

        // แก้ไข: เพิ่มพารามิเตอร์ $idDeputy_Director และ $id
        if ($stmt->execute([$reason, $id_status, $id_Director, $id])) {
            http_response_code(200); // OK
            echo json_encode([
                "message" => "Record updated successfully",
                "success" => true  // เพิ่ม success เพื่อให้ client ตรวจสอบได้ง่าย
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
