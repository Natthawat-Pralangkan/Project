<?php
include("../servers/connect.php");



// $name_from = $_POST["name_from"];
$school_name = $_POST["school_name"];
$student_total = $_POST["student_total"];
$teacher_total = $_POST["teacher_total"];
$reason_controlling = $_POST["reason_controlling"];
$date_travel = $_POST["date_travel"];
$travel_route = $_POST["travel_route"];
$trave_vehicle = $_POST["trave_vehicle"];
$travel_back = $_POST["travel_back"];
$time = $_POST["time"];
$details_of_this_trip = $_POST["details_of_this_trip"];
$id_user = $_POST["id_user"];
// print_r($_POST);
// Prepared Statemen
$query = "INSERT INTO students_outside_school (id_from ,name_from, petition_name, school_name, student_total, teacher_total, reason_controlling, date_travel, travel_route, trave_vehicle, travel_back, time, details_of_this_trip,id_user) 
              VALUES (?, ?, ?, ?, ?,?, ?, ?, ?, ?,?, ?,?,?)";
try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $newID);
    $stmt->bindParam(2, $name_from);
    $stmt->bindParam(3, $petition_name);
    $stmt->bindParam(4, $school_name);
    $stmt->bindParam(5, $student_total);
    $stmt->bindParam(6, $teacher_total);
    $stmt->bindParam(7, $reason_controlling);
    $stmt->bindParam(8, $date_travel);
    $stmt->bindParam(9, $travel_route);
    $stmt->bindParam(10, $trave_vehicle);
    $stmt->bindParam(11, $travel_back);
    $stmt->bindParam(12, $time);
    $stmt->bindParam(13, $details_of_this_trip);
    $stmt->bindParam(14, $id_user);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo json_encode(['status' => 200]);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 400, "mgs" => $e->getMessage()]);
}
