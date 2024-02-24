<?php
include("../servers/connect.php");
// รายงานผลการพานักเรียนไปนอกสถานศึกษา


$school_name = $_POST["school_name"];
$school_name1 = $_POST["school_name1"];
$student_total = $_POST["student_total"];
$teacher_total = $_POST["teacher_total"];
$reason_controlling = $_POST["reason_controlling"];
$date_travel = $_POST["date_travel"];
$travel_route = $_POST["travel_route"];
$trave_vehicle = $_POST["trave_vehicle"];
$travel_back = $_POST["travel_back"];
$time1 = $_POST["time1"];
$time2 = $_POST["time2"];
$details_of_this_trip = $_POST["details_of_this_trip"];
$user_id = $_POST["user_id"];
$addIdValues = implode(",", $_POST["addIdValues"]);
$details = $school_name.",".$student_total.",".$teacher_total.",".$reason_controlling.",".$date_travel.",".$travel_route.",".$trave_vehicle.",".$travel_back.",".$time2.",".$details_of_this_trip.",".$time1.",".$addIdValues.",".$school_name1;

$query = "INSERT INTO details_ppetiton (user_id,petition_id,petition_type,details )  
              VALUES (?, ?, ?, ?)";
try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $user_id);
    $stmt->bindValue(2, "1");
    $stmt->bindValue(3, "1");
    $stmt->bindParam(4, $details);


    // Execute the prepared statement
    if ($stmt->execute()) {
        echo json_encode(['status' => 200]);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 400, "mgs" => $e->getMessage()]);
}
