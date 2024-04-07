<?php
header('Content-Type: application/json');
include("../../servers/connect.php");

$id = $_POST['id'] ;
$id_status = $_POST['id_status'] ;
$Secondary_opinion = $_POST['Secondary_opinion'] ;
$currentDate = date('Y-m-d H:i:s'); 
$query = "UPDATE details_ppetiton SET id_status = ? , Secondary_opinion =? , date_deputydirector = ? , idDeputy_Director = 2  WHERE id = ?";

// $stmt = $db->prepare($query);
try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $id_status);
    $stmt->bindParam(2, $Secondary_opinion);
    $stmt->bindParam(3, $currentDate);
    $stmt->bindParam(4, $id);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo json_encode(['status' => 200]);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 400, "mgs" => $e->getMessage()]);
}
