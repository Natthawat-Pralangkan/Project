<?php
include("../servers/connect.php");


$semester = $_POST["semester"];
$school_year = $_POST["school_year"];
$user_id = $_POST["user_id"];
$addIdValues = $_POST["addIdValues"];
$product_name_0 =  $_POST["product_name_0"];
$product_name_0_1 =  $_POST["product_name_0_1"];
$product_name_0_2 =  $_POST["product_name_0_2"];
$product_name1 =  $_POST["product_name1"];
$product_name1_1 =  $_POST["product_name1_1"];
$product_name1_2 =  $_POST["product_name1_2"];
$product_name2 = $_POST["product_name2"];
$product_name2_1 = $_POST["product_name2_1"];
$product_name2_2 = $_POST["product_name2_2"];
$product_name3 = $_POST["product_name3"];
$product_name3_1 = $_POST["product_name3_1"];
$product_name3_2 = $_POST["product_name3_2"];
$product_name4 = $_POST["product_name4"];
$product_name4_1 = $_POST["product_name4_1"];
$product_name4_2 = $_POST["product_name4_2"];
$product_name5 =  $_POST["product_name5"];
$product_name5_1 =  $_POST["product_name5_1"];
$product_name5_2 =  $_POST["product_name5_2"];
$product_name6 = $_POST["product_name6"];
$product_name6_1 = $_POST["product_name6_1"];
$product_name6_2 = $_POST["product_name6_2"];
$product_name7 = $_POST["product_name7"];
$product_name7_1 = $_POST["product_name7_1"];
$product_name7_2 = $_POST["product_name7_2"];
$id_subject_group = $_POST["id_subject_group_11"];
$number = 1;
$products = [];

foreach ($addIdValues as $index => $row) {

    $name_0 = $product_name_0[$index];
    $name_0_1 = $product_name_0_1[$index];
    $name_0_2 = $product_name_0_2[$index];
    $name1 = $product_name1[$index];
    $name1_1 = $product_name1_1[$index];
    $name1_2 = $product_name1_2[$index];
    $name2 = $product_name2[$index];
    $name2_1 = $product_name2_1[$index];
    $name2_2 = $product_name2_2[$index];
    $name3 = $product_name3[$index];
    $name3_1 = $product_name3_1[$index];
    $name3_2 = $product_name3_2[$index];
    $name4 = $product_name4[$index];
    $name4_1 = $product_name4_1[$index];
    $name4_2 = $product_name4_2[$index];
    $name5 = $product_name5[$index];
    $name5_1 = $product_name5_1[$index];
    $name5_2 = $product_name5_2[$index];
    $name6 = $product_name6[$index];
    $name6_1 = $product_name6_1[$index];
    $name6_2 = $product_name6_2[$index];
    $name7 = $product_name7[$index];
    $name7_1 = $product_name7_1[$index];
    $name7_2 = $product_name7_2[$index];
    $product =    $number++ . "," . $name_0 . "," . $name1 . "," . $name2 . "," . $name3 . "," . $name4 . "," . $name5 . "," . $name6 . "," . $name7
        . "," . $name_0_1 . "," . $name1_1 . "," . $name2_1 . "," . $name3_1 . "," . $name4_1 . "," . $name5_1 . "," . $name6_1 . "," . $name7_1
        . "," . $name_0_2 . "," . $name1_2 . "," . $name2_2 . "," . $name3_2 . "," . $name4_2 . "," . $name5_2 . "," . $name6_2 . "," . $name7_2;
    $products[] = $product; // Collect all product strings in an array
}
$productStr = implode(',', $products); // Use a delimiter that does not conflict with your data
$details =  $semester . "," . $school_year . "," . $productStr;

// Prepared Statemen
$query = "INSERT INTO details_ppetiton (user_id,petition_id,petition_type,details,id_subject_group,id_status) 
VALUES (?, ?, ?, ?, ?, ?)";
try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $user_id);
    $stmt->bindValue(2, "8");
    $stmt->bindValue(3, "1");
    $stmt->bindParam(4, $details);
    $stmt->bindParam(5, $id_subject_group);
    $stmt->bindValue(6, "8");


    // Execute the prepared statement
    if ($stmt->execute()) {
        echo json_encode(['status' => 200]);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 400, "mgs" => $e->getMessage()]);
}
