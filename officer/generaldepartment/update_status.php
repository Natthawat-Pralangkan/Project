<?php
header('Content-Type: application/json');
include("../../servers/connect.php");

$id = $_POST['id'] ?? null;
$id_status = $_POST['id_status'] ?? null;

if ($id && $id_status) {
    $stmt = $db->prepare("UPDATE details_ppetiton SET id_status = ? WHERE id = ?");
    if ($stmt->execute([$id_status, $id])) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Update failed.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Missing parameters.']);
}
