<?php
include("../servers/connect.php");
// รายงานผลการพานักเรียนไปนอกสถานศึกษา

$step_1 = false;
$step_2 = false;

$school_name = $_POST["school_name"];
$reason_controlling = $_POST["reason_controlling"];
$student_total = $_POST["student_total"];
$province = $_POST["province"];
$number_of_students = $_POST["number_of_students"];
$number_of_supervisor_teachers = $_POST["number_of_supervisor_teachers"];
$vehicle_used_for_traveling = $_POST["vehicle_used_for_traveling"];
$travel_route = $_POST["travel_route"];
$date_of_travel = $_POST["date_of_travel"];
$time = $_POST["time"];
$return_date = $_POST["return_date"];
$time_return = $_POST["time_return"];
$cost_per_student = $_POST["cost_per_student"];
$user_id = $_POST["user_id"];
$addIdValues = implode(",", $_POST["addIdValues"]);
$addIdValues_2 =  $_POST["addIdValues_2"];

$details = $school_name . "," . $reason_controlling . "," . $student_total . "," . $province . "," . $number_of_students . "," . $number_of_supervisor_teachers . "," . $vehicle_used_for_traveling . ",". $travel_route . "," . $date_of_travel . "," . $time . "," . $return_date . "," . $time_return . "," . $cost_per_student . "," . $addIdValues;

$query = "INSERT INTO details_ppetiton (user_id,petition_id,petition_type,details,id_status,id_petition_general)  
              VALUES (?, ?, ?, ?, ?,?)";
$query_user = "INSERT INTO general_staff (student_name,id_details) 
VALUES (?,?)";
try {

    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $user_id);
    $stmt->bindValue(2, "12");
    $stmt->bindValue(3, "3");
    $stmt->bindParam(4, $details);
    $stmt->bindValue(5, "1");
    $stmt->bindValue(6, "12");

    if ($stmt->execute()) {
        $step_1 = true;
    }
    $id = $db->lastInsertId();
    foreach ($addIdValues_2 as $index => $row) {

        $stmt_user = $db->prepare($query_user);
        $stmt_user->bindParam(1, $addIdValues_2[$index]);
        $stmt_user->bindParam(2, $id);
        if ($stmt_user->execute()) {
            $step_2 = true;
        }
    }
    // Execute the prepared statement
    if ($step_1 && $step_2) {
        echo json_encode(['status' => 200]);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 400, "mgs" => $e->getMessage()]);
}
