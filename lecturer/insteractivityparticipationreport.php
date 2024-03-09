<?php
include("../servers/connect.php");

// Assuming your form data is structured correctly

$school_year = $_POST["school_year"];
$user_id = $_POST["user_id"];
$addIdValues = $_POST["addIdValues"];
$product_name1 =  $_POST["product_name1"];
$product_name2 = $_POST["product_name2"];
$product_name3 = $_POST["product_name3"];
$product_name4 = $_POST["product_name4"];
$product_name5 =  $_POST["product_name5"];
$product_name6 = $_POST["product_name6"];
$id_subject_group = $_POST["id_subject_group_2"];
$number = 1;
$products = [];

foreach ($addIdValues as $index => $row) {
  
    $name1 = $product_name1[$index];
    $name2 = $product_name2[$index];
    $name3 = $product_name3[$index];
    $name4 = $product_name4[$index];
    $name5 = $product_name5[$index];
    $name6 = $product_name6[$index];
    $product =   $number++.",".$name1.",".$name2.",".$name3.",".$name4.",".$name5.",".$name6;
    $products[] = $product; // Collect all product strings in an array
}

// Convert products array to string
$productStr = implode(',',$products); // Use a delimiter that does not conflict with your data
// print_r($productStr);
// exit;
// Convert addIdValues array to string
// $addIdValuesStr = implode(",", $addIdValues);

$details = $school_year.",".$productStr;

$query = "INSERT INTO details_ppetiton (user_id, petition_id, petition_type, details,id_subject_group,id_status) 
VALUES (?, ?, ?, ?, ?, ?)";

try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $user_id);
    $stmt->bindValue(2, "2"); // Assuming these values are static
    $stmt->bindValue(3, "1"); // Assuming these values are static
    $stmt->bindParam(4, $details);
    $stmt->bindParam(5, $id_subject_group);
    $stmt->bindValue(6, "8");

    if ($stmt->execute()) {
        echo json_encode(['status' => 200]);
    }else{
        $errorInfo = $stmt->errorInfo();
        echo json_encode(['status' => 400, "msg" => $errorInfo[2]]);
        exit;
    }
} catch (Exception $e) {
    echo json_encode(['status' => 400, "msg" => $e->getMessage()]);
}
