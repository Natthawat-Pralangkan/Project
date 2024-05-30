<?php
header('Content-Type: application/json');
include("../../servers/connect.php");

$id = $_POST['id'] ;
$id_status = $_POST['id_status'] ;
$Officer_comments = $_POST['Officer_comments'] ;
$id_officer = $_POST['id_officer'] ;
$query = "UPDATE details_ppetiton SET id_status = ? , Officer_comments =? , id_officer = ?    WHERE id = ?";

// $stmt = $db->prepare($query);
try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $id_status);
    $stmt->bindParam(2, $Officer_comments);
    $stmt->bindParam(3, $id_officer);
    $stmt->bindParam(4, $id);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo json_encode(['status' => 200]);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 400, "mgs" => $e->getMessage()]);
}
