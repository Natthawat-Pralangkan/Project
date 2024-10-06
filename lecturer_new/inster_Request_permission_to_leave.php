<?php
include("../servers/connect.php");

$subject = $_POST["subject"];
$Name_Surname = $_POST["Name_Surname"];
$position = $_POST["position"];
$reason_for_leave = $_POST["reason_for_leave"];
$Personal_affairs = $_POST["Personal_affairs"];
$date_activity_12 = $_POST["date_activity_12"];
$date_activity_13 = $_POST["date_activity_13"];
$scheduled_2 = $_POST["scheduled_2"];
$telephone_number_1 = $_POST["telephone_number_1"];

$user_id = $_POST["user_id"];

// Prepared Statement
$details = $subject.",".$Name_Surname.",".$position.",".$date_activity_12.",".$date_activity_13.",".$scheduled_2.",".$telephone_number_1;

$query = "INSERT INTO details_ppetiton (user_id, petition_id, petition_type, details, leave_type,reason_for_leave, id_status) 
              VALUES (?, ?, ?, ?, ?, ?,?)";
try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $user_id);
    $stmt->bindValue(2, "14");
    $stmt->bindValue(3, "4");
    $stmt->bindParam(4, $details);
    $stmt->bindParam(5, $reason_for_leave);
    $stmt->bindParam(6, $Personal_affairs); 
    $stmt->bindValue(7, "1");

    if ($stmt->execute()) {
        echo json_encode(['status' => 200]);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 400, "msg" => $e->getMessage()]); // Corrected typo in 'msg'
}
?>
