<?php
include("../servers/connect.php");


$name_from = $_POST["name_from"];
$allow_student = $_POST["allow_student"];
$student_total = $_POST["student_total"];
$teacher_total = $_POST["teacher_total"];
$reason_controll = $_POST["reason_controll"];
$school_name = $_POST["school_name"];
$date_travel = $_POST["date_travel"];
$travel_time = $_POST["travel_time"];
$travel_route = $_POST["travel_route"];
$travel_back = $_POST["travel_back"];
$Time_to_arrive = $_POST["Time_to_arrive"];
$amount_person = $_POST["amount_person"];
$id_user = $_POST["id_user"];
// Prepared Statemen
$query = "INSERT INTO students_outside_school_1 (id_from ,name_from, petition_name, allow_student, student_total, teacher_total, reason_controll, school_name, date_travel, travel_time, travel_route, travel_back, Time_to_arrive, amount_person,id_user) 
              VALUES (?, ?, ?, ?, ?,?, ?, ?, ?, ?,?, ?, ?,?,?)";
try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $newID);
    $stmt->bindParam(2, $name_from);
    $stmt->bindParam(3, $petition_name);
    $stmt->bindParam(4, $allow_student);
    $stmt->bindParam(5, $student_total);
    $stmt->bindParam(6, $teacher_total);
    $stmt->bindParam(7, $reason_controll);
    $stmt->bindParam(8, $school_name);
    $stmt->bindParam(9, $date_travel);
    $stmt->bindParam(10, $travel_time);
    $stmt->bindParam(11, $travel_route);
    $stmt->bindParam(12, $travel_back);
    $stmt->bindParam(13, $Time_to_arrive);
    $stmt->bindParam(14, $amount_person);
    $stmt->bindParam(15, $id_user);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo json_encode(['status' => 200]);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 400, "mgs" => $e->getMessage()]);
}
