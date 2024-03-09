<?php
header('Content-Type: application/json');
include("../servers/connect.php");

$id = $_POST['id']?? null;
$id_status = $_POST['id_status']?? null;
$id_subject_group = $_POST['id_subject_group']?? null;
$currentDate = date('Y-m-d H:i:s');
// print_r($_POST);
// exit;

if ($id && $id_status) {
    $query = $db->prepare("UPDATE details_ppetiton SET id_status = ? , user_subject = ? , date_learning = ? WHERE id = ?");
    if ($query->execute([$id_status, $id_subject_group ,$currentDate ,$id])) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Update failed.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Missing parameters.']);
}

