<?php
include("../servers/connect.php");

$level = $_POST["level"];
$teach_week = $_POST["teach_week"];
$date_teach_start = $_POST["date_teach_start"];
$date_teach_end = $_POST["date_teach_end"];
$user_id = $_POST["user_id"];

$details = $level.",".$teach_week.",".$date_teach_start.",".$date_teach_end;

// Prepared Statemen
$query = "INSERT INTO details_ppetiton (user_id,petition_id,petition_type,details ) 
              VALUES (?, ?, ?, ?)";
try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $user_id);
    $stmt->bindValue(2, "3");
    $stmt->bindValue(3, "1");
    $stmt->bindParam(4, $details);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo json_encode(['status' => 200]);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 400, "mgs" => $e->getMessage()]);
}
