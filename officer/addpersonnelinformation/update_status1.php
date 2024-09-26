<?php
header('Content-Type: application/json');
include("../../servers/connect.php");

$id = $_POST['id'] ?? null;
$id_status = $_POST['id_status'] ?? null;
$Officer_comments = $_POST['Officer_comments'] ?? null;
$id_officer = $_POST['id_officer'] ?? null;

if ($id && $id_status && $Officer_comments && $id_officer) {
    $query = "UPDATE details_ppetiton SET id_status = ?, Officer_comments = ?, id_officer = ? WHERE id = ?";

    try {
        $stmt = $db->prepare($query);
        $stmt->bindParam(1, $id_status);
        $stmt->bindParam(2, $Officer_comments);
        $stmt->bindParam(3, $id_officer);
        $stmt->bindParam(4, $id);

        // Execute the prepared statement
        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Record updated successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update record']);
        }
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Missing required parameters']);
}
