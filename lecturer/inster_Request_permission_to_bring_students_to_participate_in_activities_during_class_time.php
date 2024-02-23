<?php
include("../servers/connect.php");

// ขออนุญาตนำนักเรียนเข้าร่วมกิจกรรมในเวลาเรียน

$activity_name = $_POST["activity_name"];
$reason_project = $_POST["reason_project"];
$date_activity = $_POST["date_activity"];
$user_id = $_POST["user_id"];


$details = $activity_name.",".$reason_project.",".$date_activity;
// Prepared Statemen
$query = "INSERT INTO details_ppetiton (user_id,petition_id,petition_type,details) 
              VALUES (?, ?, ?, ?)";
try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $user_id);
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
