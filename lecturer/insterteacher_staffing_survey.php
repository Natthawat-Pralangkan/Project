<?php
include("../servers/connect.php");
//  print_r($_POST);
//  exit;
$subject_group = $_POST["subject_group"];
$semester = $_POST["semester"];
$school_yea = $_POST["school_yea"];
$teacher_total_now = $_POST["teacher_total_now"];
$teacher_total_out = $_POST["teacher_total_out"];
$teacher_total_broken = $_POST["teacher_total_broken"];
$teacher_broken_reason = $_POST["teacher_broken_reason"];
$teacher_total_over = $_POST["teacher_total_over"];
$teacher_over_reason = $_POST["teacher_over_reason"];
$teacher_total_add = $_POST["teacher_total_add"];
$teacher_add_reason = $_POST["teacher_add_reason"];
$id_user = $_POST["id_user"];

$details = $subject_group . "," . $semester . "," . $school_yea . "," . $teacher_total_now . "," . $teacher_total_out . "," . $teacher_total_broken . "," .$teacher_broken_reason.",".$teacher_total_over.",".$teacher_over_reason.",".$teacher_total_add.",".$teacher_add_reason;
    // Prepared Statemen
    $query = "INSERT INTO details_ppetiton (id_user,petition_id,petition_type,details) 
              VALUES (?, ?, ?, ?)";
try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $id_user);
    $stmt->bindValue(2, "7");
    $stmt->bindValue(3, "1");
    $stmt->bindParam(4, $details);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo json_encode(['status' => 200]);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 400, "mgs" => $e->getMessage()]);
}
