<?php
include("../servers/connect.php");
// การยื่นฟอร์มปะหน้า
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
$details = $date_report_send.",".$document_name_consider.",".$subject_group.",".$activity_name.",".$according_project.",".$date_activity.",".$activity_where.",".$summary_details;

$query = "INSERT INTO details_ppetiton (id_user,petition_id,petition_type,details ) 
              VALUES (?, ?, ?, ?)";
try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $id_user);
    $stmt->bindValue(2, "6");
    $stmt->bindValue(3, "1");
    $stmt->bindParam(4, $details);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo json_encode(['status' => 200]);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 400, "mgs" => $e->getMessage()]);
}
