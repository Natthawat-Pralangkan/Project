<?php
include("../servers/connect.php");
// ขออนุญาตให้นักเรียนไปโรงเรียนเป็นกรณีพิเศษ

$school_wishes = $_POST["school_wishes"];
$class_student = $_POST["class_student"];
$room = $_POST["room"];
$reason_project = $_POST["reason_project"];
$date_activity = $_POST["date_activity"];
$Time_to_go = $_POST["Time_to_go"];
$Return_time = $_POST["Return_time"];
$Number_of_supervising_teachers = $_POST["Number_of_supervising_teachers"];
$Place_of_sending_documents = $_POST["Place_of_sending_documents"];
$user_id = $_POST["user_id"];
$addIdValues = $_POST["addIdValues"];
$product_name1 =  $_POST["product_name1"];
$product_name2 = $_POST["product_name2"];


// $number = 1;
$products = [];

foreach ($addIdValues as $index => $row) {

    $name1 = $product_name1[$index];
    $name2 = $product_name2[$index];

    $product =    $name1 . "," . $name2;
    $products[] = $product; // Collect all product strings in an array
}
$productStr = implode(',', $products);
$details = $school_wishes . "," . $class_student . "," . $room . "," . $reason_project . "," . $date_activity . "," . $Time_to_go . "," . $Return_time . "," . $Number_of_supervising_teachers . "," . $Place_of_sending_documents.",".$productStr;
// Prepared Statemen
$query = "INSERT INTO details_ppetiton (user_id,petition_id,petition_type,details) 
              VALUES (?, ?, ?, ?)";
try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $user_id);
    $stmt->bindValue(2, "11");
    $stmt->bindValue(3, "1");
    $stmt->bindParam(4, $details);;

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo json_encode(['status' => 200]);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 400, "mgs" => $e->getMessage()]);
}
