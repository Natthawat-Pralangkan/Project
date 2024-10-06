<?php
include("../servers/connect.php");


// $name_from = $_POST["name_from"];
// $petition_name = $_POST["petition_name"];
$location = $_POST["location"];
$subject = $_POST["subject"];
$joining_date = $_POST["joining_date"];
$organizer = $_POST["organizer"];
$summary_of_results_of_participation_in_the_event = $_POST["summary_of_results_of_participation_in_the_event"];
$user_id = $_POST["user_id"];
$addIdValues = implode(",", $_POST["addIdValues"]);
$time_1 = $_POST["time_1"];
$time_2 = $_POST["time_2"];
$id_subject_group = $_POST["id_subject_group_3"];

$details = $location . "," . $subject . "," . $joining_date . "," . $organizer . "," . $summary_of_results_of_participation_in_the_event.",".$time_1.",".$time_2.",".$addIdValues;

// Prepared Statemen
$query = "INSERT INTO details_ppetiton (user_id,petition_id,petition_type,details,id_status,id_subject_group) 
VALUES (?, ?, ?, ?, ?, ?)";
try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $user_id);
    $stmt->bindValue(2, "5");
    $stmt->bindValue(3, "2");
    $stmt->bindParam(4, $details);
    $stmt->bindValue(5, "8");
    $stmt->bindParam(6, $id_subject_group);


    // Execute the prepared statement
    if ($stmt->execute()) {
        echo json_encode(['status' => 200]);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 400, "mgs" => $e->getMessage()]);
}
