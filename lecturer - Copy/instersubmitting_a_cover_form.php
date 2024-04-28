<?php
include("../servers/connect.php");
// การยื่นฟอร์มปะหน้า
// $name_from = $_POST["name_from"];
// $date_report_send = $_POST["date_report_send"];
$document_name_consider = $_POST["document_name_consider"];
// $subject_group = $_POST["subject_group"];
$activity_name = $_POST["activity_name"];
$according_project = $_POST["according_project"];
$date_activity = $_POST["date_activity"];
$activity_where = $_POST["activity_where"];
$summary_details = $_POST["summary_details"];
$memo_id = $_POST["memo_id"];
$save_message = $_POST["save_message"];
$user_id = $_POST["user_id"];
$id_subject_group = $_POST["id_subject_group_10"];
// Prepared Statemen
$details = $document_name_consider.",".$activity_name.",".$according_project.",".$date_activity.",".$activity_where.",".$summary_details;

$query = "INSERT INTO details_ppetiton (user_id,petition_id,petition_type,details,memo_id,save_message,id_subject_group,id_status) 
              VALUES (?,?, ?, ?,?,?,?,?)";
try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $user_id);
    $stmt->bindValue(2, "6");
    $stmt->bindValue(3, "1");
    $stmt->bindParam(4, $details);
    $stmt->bindParam(5, $memo_id);
    $stmt->bindParam(6, $save_message);
    $stmt->bindParam(7, $id_subject_group);
    $stmt->bindValue(8, "8");

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo json_encode(['status' => 200]);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 400, "mgs" => $e->getMessage()]);
}
