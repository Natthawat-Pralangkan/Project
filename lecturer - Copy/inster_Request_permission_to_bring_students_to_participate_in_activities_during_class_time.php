<?php
include("../servers/connect.php");

// ขออนุญาตนำนักเรียนเข้าร่วมกิจกรรมในเวลาเรียน

$activity_name = $_POST["activity_name"];
$reason_project = $_POST["reason_project"];
$date_activity = $_POST["date_activity"];
$user_id = $_POST["user_id"];
$addIdValues = $_POST["addIdValues"];
$product_name1 =  $_POST["product_name1"];
$product_name2 = $_POST["product_name2"];
$product_name3 = $_POST["product_name3"];
$product_name4 = $_POST["product_name4"];
$product_name5 =  $_POST["product_name5"];

$number = 1;
$products = [];

foreach ($addIdValues as $index => $row) {

    $name1 = $product_name1[$index];
    $name2 = $product_name2[$index];
    $name3 = $product_name3[$index];
    $name4 = $product_name4[$index];
    $name5 = $product_name5[$index];
    $product =    $number++. "," .$name1 . "," . $name2 . "," . $name3 . "," . $name4 . "," . $name5;
    $products[] = $product; // Collect all product strings in an array
}
$productStr = implode(',', $products); // Use a delimiter that does not conflict with your data
$details = $activity_name.",".$reason_project.",".$date_activity.",".$productStr ;
// Prepared Statemen
$query = "INSERT INTO details_ppetiton (user_id,petition_id,petition_type,details) 
              VALUES (?, ?, ?, ?)";
try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $user_id);
    $stmt->bindValue(2, "10");
    $stmt->bindValue(3, "1");
    $stmt->bindParam(4, $details);

  

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo json_encode(['status' => 200]);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 400, "mgs" => $e->getMessage()]);
}
