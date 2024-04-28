<?php
include("../servers/connect.php");

// ขออนุญาตนำนักเรียนเข้าร่วมกิจกรรมในเวลาเรียน

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
$product_name6 =  $_POST["product_name6"];

$products = [];

foreach ($addIdValues as $index => $row) {

    $name1 = $product_name1[$index];
    $name2 = $product_name2[$index];
    $name3 = $product_name3[$index];
    $name4 = $product_name4[$index];
    $name5 = $product_name5[$index];
    $name6 = $product_name6[$index];
    $product =    $name1 . "," . $name2 . "," . $name3 . "," . $name4 . "," . $name5. "," . $name6;
    $products[] = $product; // Collect all product strings in an array
}
$productStr = implode(',', $products); // Use a delimiter that does not conflict with your data
$details = $name.",".$position.",".$contact_number.",".$productStr ;
// Prepared Statemen
$query = "INSERT INTO details_ppetiton (user_id,petition_id,petition_type,details) 
              VALUES (?, ?, ?, ?)";
try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $user_id);
    $stmt->bindValue(2, "13");
    $stmt->bindValue(3, "2");
    $stmt->bindParam(4, $details);

  

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo json_encode(['status' => 200]);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 400, "mgs" => $e->getMessage()]);
}
