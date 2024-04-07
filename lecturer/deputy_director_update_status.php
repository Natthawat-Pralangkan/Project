<?php
header('Content-Type: application/json');
include("../servers/connect.php");

$id = $_POST['id'] ?? null;
$id_status = $_POST['id_status'] ?? null;
$currentDate = date('Y-m-d H:i:s'); 
if ($id && $id_status) {
    // Corrected SQL query: Added a comma between `id_status = ?` and `idDeputy_Director = 2`
    $stmt = $db->prepare("UPDATE details_ppetiton SET id_status = ?, id_Director = 1 , date_director = ? WHERE id = ?");
    if ($stmt->execute([$id_status, $currentDate, $id])) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Update failed.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Missing parameters.']);
}
