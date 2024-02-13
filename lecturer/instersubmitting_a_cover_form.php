<?php
include("../servers/connect.php");

// $name_from = $_POST["name_from"];
$date_report_send = $_POST["date_report_send"];
$document_name_consider = $_POST["document_name_consider"];
$subject_group = $_POST["subject_group"];
$activity_name = $_POST["activity_name"];
$according_project = $_POST["according_project"];
$date_activity = $_POST["date_activity"];
$activity_where = $_POST["activity_where"];
$summary_details = $_POST["summary_details"];
$id_user = $_POST["id_user"];
// Prepared Statemen
$query = "INSERT INTO modal_title_2 (id_from ,name_from, petition_name, date_report_send, document_name_consider, subject_group, activity_name, according_project, date_activity, activity_where, summary_details,id_user) 
              VALUES (?, ?, ?, ?, ?,?, ?, ?, ?, ?,?,?)";
try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $newID);
    $stmt->bindParam(2, $name_from);
    $stmt->bindParam(3, $petition_name);
    $stmt->bindParam(4, $date_report_send);
    $stmt->bindParam(5, $document_name_consider);
    $stmt->bindParam(6, $subject_group);
    $stmt->bindParam(7, $activity_name);
    $stmt->bindParam(8, $according_project);
    $stmt->bindParam(9, $date_activity);
    $stmt->bindParam(10, $activity_where);
    $stmt->bindParam(11, $summary_details);
    $stmt->bindParam(11, $id_user);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo json_encode(['status' => 200]);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 400, "mgs" => $e->getMessage()]);
}
