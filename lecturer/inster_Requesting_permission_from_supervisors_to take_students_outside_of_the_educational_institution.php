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
$id_user = $_POST["id_user"];

$details = $allow_student.",".$student_total.",".$teacher_total.",".$reason_controll.",".$school_name.",".$date_travel.",".$travel_time.",".$travel_route.",".$travel_back.",".$Time_to_arrive.",".$amount_person;


// Prepared Statemen
$query = "INSERT INTO details_ppetiton (id_user,petition_id,petition_type,details) 
VALUES (?, ?, ?, ?)";
try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $id_user);
    $stmt->bindValue(2, "9");
    $stmt->bindValue(3, "1");
    $stmt->bindParam(4, $details);
    

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo json_encode(['status' => 200]);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 400, "mgs" => $e->getMessage()]);
}
