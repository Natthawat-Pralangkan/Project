<?php
include("../servers/connect.php");

// ขออนุญาตนำนักเรียนเข้าร่วมกิจกรรมในเวลาเรียน
$step_1 = false;
$step_2 = false;

$name = $_POST["name"];
$position = $_POST["position"];
$contact_number = $_POST["contact_number"];
$user_id = $_POST["user_id"];
$addIdValues = $_POST["addIdValues"];
$product_name1 =  $_POST["product_name1"];
$product_name2 = $_POST["product_name2"];
$product_name3 = $_POST["product_name3"];
$product_name4 = $_POST["product_name4"];
$product_name5 =  $_POST["product_name5"];


$details = $name.",".$position.",".$contact_number ;
// Prepared Statemen
$query = "INSERT INTO details_ppetiton (user_id,petition_id,petition_type,details) 
              VALUES (?, ?, ?, ?)";

$query_user = "INSERT INTO parcel_information (withdrawallist,counting_unit,per_unit,withdraw,pay,id_details) 
              VALUES (?,?,?,?,?,?)";
try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $user_id);
    $stmt->bindValue(2, "13");
    $stmt->bindValue(3, "3");
    $stmt->bindParam(4, $details);

    if ($stmt->execute()) {
        $step_1 = true;
    }
    $id = $db->lastInsertId();
    foreach ($addIdValues as $index => $row) {

        $stmt_user = $db->prepare($query_user);
        $stmt_user->bindParam(1, $product_name1[$index]);
        $stmt_user->bindParam(2, $product_name2[$index]);
        $stmt_user->bindParam(3, $product_name3[$index]);
        $stmt_user->bindParam(4, $product_name4[$index]);
        $stmt_user->bindParam(5, $product_name5[$index]);
        $stmt_user->bindParam(6, $id);
        if ($stmt_user->execute()) {
            $step_2 = true;
        }
    }
    // Execute the prepared statement
    if ($step_1 && $step_2) {
        echo json_encode(['status' => 200]);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 400, "mgs" => $e->getMessage()]);
}