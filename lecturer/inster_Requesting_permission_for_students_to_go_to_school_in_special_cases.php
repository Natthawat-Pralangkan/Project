<?php
include("../servers/connect.php");



$name_from = $_POST["name_from"];
$school_wishes = $_POST["school_wishes"];
$class_student = $_POST["class_student"];
$room = $_POST["room"];
$reason_project = $_POST["reason_project"];
$date_activity = $_POST["date_activity"];
$Time_to_go = $_POST["Time_to_go"];
$Return_time = $_POST["Return_time"];
$Number_of_supervising_teachers = $_POST["Number_of_supervising_teachers"];
$Place_of_sending_documents = $_POST["Place_of_sending_documents"];
$id_user = $_POST["id_user"];

// Prepared Statemen
$query = "INSERT INTO modal_title_5 (id_from ,name_from, petition_name, school_wishes, class_student, room, reason_project, date_activity, Time_to_go, Return_time, Number_of_supervising_teachers, Place_of_sending_documents,id_user) 
              VALUES (?, ?, ?, ?, ?,?, ?, ?, ?, ?,?, ?,?)";
try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $newID);
    $stmt->bindParam(2, $name_from);
    $stmt->bindParam(3, $petition_name);
    $stmt->bindParam(4, $school_wishes);
    $stmt->bindParam(5, $class_student);
    $stmt->bindParam(6, $room);
    $stmt->bindParam(7, $reason_project);
    $stmt->bindParam(8, $date_activity);
    $stmt->bindParam(9, $Time_to_go);
    $stmt->bindParam(10, $Return_time);
    $stmt->bindParam(11, $Number_of_supervising_teachers);
    $stmt->bindParam(12, $Place_of_sending_documents);
    $stmt->bindParam(13, $id_user);
;

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo json_encode(['status' => 200]);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 400, "mgs" => $e->getMessage()]);
}
