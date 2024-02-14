<?php
include("../servers/connect.php");


// $name_from = $_POST["name_from"];
// $petition_name = $_POST["petition_name"];
$location = $_POST["location"];
$subject = $_POST["subject"];
$joining_date = $_POST["joining_date"];
$organizer = $_POST["organizer"];
$summary_of_results_of_participation_in_the_event = $_POST["summary_of_results_of_participation_in_the_event"];
$id_user = $_POST["id_user"];

$details = $location . "," . $subject . "," . $joining_date . "," . $organizer . "," . $summary_of_results_of_participation_in_the_event;

// Prepared Statemen
$query = "INSERT INTO details_ppetiton (id_user,petition_id,petition_type,details) 
VALUES (?, ?, ?, ?)";
try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $id_user);
    $stmt->bindValue(2, "5");
    $stmt->bindValue(3, "1");
    $stmt->bindParam(4, $details);


    // Execute the prepared statement
    if ($stmt->execute()) {
        echo json_encode(['status' => 200]);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 400, "mgs" => $e->getMessage()]);
}
