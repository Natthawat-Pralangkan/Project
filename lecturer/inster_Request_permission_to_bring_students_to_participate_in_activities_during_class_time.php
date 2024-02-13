<?php
include("../servers/connect.php");


$name_from = $_POST["name_from"];

$activity_name = $_POST["activity_name"];
$reason_project = $_POST["reason_project"];
$date_activity = $_POST["date_activity"];
$id_user = $_POST["id_user"];


$details = $name_from.",".$activity_name.",".$reason_project.",".$date_activity;
// Prepared Statemen
$query = "INSERT INTO details_ppetiton (id_user,petition_id,petition_type,details) 
              VALUES (?, ?, ?, ?)";
try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $id_user);
    $stmt->bindValue(2, "10");
    $stmt->bindValue(3, "1");
    $stmt->bindParam(4, $details);

  

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo json_encode(['status' => 200]);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 400, "mgs" => $e->getMessage()]);
}
