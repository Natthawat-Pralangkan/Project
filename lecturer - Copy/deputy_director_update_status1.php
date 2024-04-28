<?php
header('Content-Type: application/json');
include("../servers/connect.php");

$id = $_POST['id'] ;
$id_status = $_POST['id_status'] ;
$save_a_message = $_POST['save_a_message'] ;
$memo_type = $_POST['memo_type'] ;
$currentDate = date('Y-m-d H:i:s');
$query = "UPDATE details_ppetiton SET id_status = ? , save_a_message =? , memo_type = ? ,date_director =?  , id_Director = 1  WHERE id = ?";

// $stmt = $db->prepare($query);
try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $id_status);
    $stmt->bindParam(2, $save_a_message);
    $stmt->bindParam(3, $memo_type);
    $stmt->bindParam(4, $currentDate);
    $stmt->bindParam(5, $id);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo json_encode(['status' => 200]);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 400, "mgs" => $e->getMessage()]);
}
