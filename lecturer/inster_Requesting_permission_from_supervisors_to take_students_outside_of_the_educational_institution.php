<?php
include("../servers/connect.php");
// การขออนุญาตผู้บังคับบัญชาพานักเรียนไปนอกสถานศึกษา

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
$Vehicle_for_traveling = $_POST["Vehicle_for_traveling"];
$id_subject_group = $_POST["id_subject_group_5"];
$addIdValues = implode(",", $_POST["addIdValues"]);
$user_id = $_POST["user_id"];

$details = $allow_student.",".$student_total.",".$teacher_total.",".$reason_controll.",".$school_name.",".$date_travel.",".$travel_time.",".$travel_route.",".$travel_back.",".$Time_to_arrive.",".$amount_person.",".$Vehicle_for_traveling.",".$addIdValues;


// Prepared Statemen
$query = "INSERT INTO details_ppetiton (user_id,petition_id,petition_type,details,id_subject_group,id_status) 
VALUES (?, ?, ?, ?, ?, ?)";
try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $user_id);
    $stmt->bindValue(2, "9");
    $stmt->bindValue(3, "1");
    $stmt->bindParam(4, $details);
    $stmt->bindParam(5, $id_subject_group);
    $stmt->bindValue(6, "8");
    

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo json_encode(['status' => 200]);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 400, "mgs" => $e->getMessage()]);
}
