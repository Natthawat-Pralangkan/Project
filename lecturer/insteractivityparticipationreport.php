<?php
include("../servers/connect.php");
// รายงานการเข้าร่วมกิจกรรม	
$subject_group = $_POST["subject_group"];
$school_year = $_POST["school_year"];
$user_id = $_POST["user_id"];

$details = $subject_group.",".$school_year;

// Prepared Statemen
$query = "INSERT INTO details_ppetiton (user_id,petition_id,petition_type,details) 
              VALUES (?, ?, ?, ?)";
try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $user_id);
    $stmt->bindValue(2, "2");
    $stmt->bindValue(3, "1");
    $stmt->bindParam(4, $details);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo json_encode(['status' => 200]);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 400, "mgs" => $e->getMessage()]);
}
