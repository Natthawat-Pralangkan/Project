<?php
header('Content-Type: application/json');
include("../servers/connect.php");

$id = $_POST['id'] ?? null;
$id_status = $_POST['id_status'] ?? null;
$decision = $_POST['decision'] ?? null;
$commandText = $_POST['commandText'] ?? null;
$id_subject_group = $_POST['id_subject_group'] ?? null;
$currentDate = date('Y-m-d H:i:s');

try {
    $stmt = $db->prepare("UPDATE details_ppetiton SET id_status = ?, user_subject = ?, date_learning = ?, details_group_leader = ? ,consider_group_leader = ? WHERE id = ?");
    $result = $stmt->execute([$id_status, $id_subject_group, $currentDate, $commandText,$decision, $id]);


    if ($result) {
        echo json_encode(['status' => 'success']);
    } else {
        // If execute() returns false, you can check for more error info
        $errorInfo = $stmt->errorInfo();
        echo json_encode(['status' => 'error', 'message' => 'Update failed.', 'errorInfo' => $errorInfo]);
    }
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
