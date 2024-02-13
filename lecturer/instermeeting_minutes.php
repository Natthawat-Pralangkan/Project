<?php
include("../servers/connect.php");


$name_from = $_POST["name_from"];
// $petition_name = $_POST["petition_name"];
$location = $_POST["location"];
$subject = $_POST["subject"];
$joining_date = $_POST["joining_date"];
$organizer = $_POST["organizer"];
$summary_of_results_of_participation_in_the_event = $_POST["summary_of_results_of_participation_in_the_event"];
$id_user = $_POST["id_user"];

// Prepared Statemen
$query = "INSERT INTO report_request (id_from ,name_from, petition_name, location, subject, joining_date, organizer, summary_of_results_of_participation_in_the_event,id_user) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)";
try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $newID);
    $stmt->bindParam(2, $name_from);
    $stmt->bindParam(3, $petition_name);
    $stmt->bindParam(4, $location);
    $stmt->bindParam(5, $subject);
    $stmt->bindParam(6, $joining_date);
    $stmt->bindParam(7, $organizer);
    $stmt->bindParam(8, $summary_of_results_of_participation_in_the_event);
    $stmt->bindParam(9, $id_user);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo json_encode(['status' => 200]);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 400, "mgs" => $e->getMessage()]);
}
