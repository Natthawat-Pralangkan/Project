<?php
include("../../servers/connect.php");

header('Content-Type: application/json'); // Set appropriate content type for JSON response

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['reason'], $_POST['id_status'], $_POST['id_officer'])) {
        $id = $_POST['id'];
        $reason = $_POST['reason'];
        $id_status = $_POST['id_status'];
        $id_officer = $_POST['id_officer'];

        $sql = "UPDATE details_ppetiton SET reason = ?, id_status = ? ,id_officer = ? WHERE id = ?";
        $stmt = $db->prepare($sql);

        if ($stmt->execute([$reason, $id_status,$id_officer ,$id])) {
            http_response_code(200); // OK
            echo json_encode(["success" => true, "message" => "Record updated successfully"]);
        } else {
            http_response_code(500); // Internal Server Error
            echo json_encode(["success" => false, "message" => "Error updating record"]);
        }
    } else {
        http_response_code(400); // Bad Request
        echo json_encode(["success" => false, "message" => "Invalid request"]);
    }
} catch (PDOException $e) {
    http_response_code(500); // Internal Server Error
    echo json_encode(["success" => false, "message" => "Database error: " . $e->getMessage()]);
}
