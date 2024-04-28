<?php
include("../servers/connect.php");

// การจัดตารางสอนแทนครูที่ไม่มาปฏิบัติราชการ
// $subject_group = $_POST["subject_group"];
$semester = $_POST["semester"];
$school_year = $_POST["school_year"];
$user_id = $_POST["user_id"];
$addIdValues = $_POST["addIdValues"];
$product_name_0 =  $_POST["product_name_0"];
$product_name1 =  $_POST["product_name1"];
$product_name2 = $_POST["product_name2"];
$product_name3 = $_POST["product_name3"];
$product_name4 = $_POST["product_name4"];
$product_name5 =  $_POST["product_name5"];
$product_name6 = $_POST["product_name6"];
$product_name7 = $_POST["product_name7"];
$id_subject_group = $_POST["id_subject_group_7"];
$products = [];

foreach ($addIdValues as $index => $row) {

    $name_0 = $product_name_0[$index];
    $name1 = $product_name1[$index];
    $name2 = $product_name2[$index];
    $name3 = $product_name3[$index];
    $name4 = $product_name4[$index];
    $name5 = $product_name5[$index];
    $name6 = $product_name6[$index];
    $name7 = $product_name7[$index];
    $product =     $name_0 . "," . $name1 . "," . $name2 . "," . $name3 . "," . $name4 . "," . $name5 . "," . $name6 . "," . $name7;
    $products[] = $product; // Collect all product strings in an array
}
$productStr = implode(',', $products);
$details = $semester.",".$school_year.",".$productStr;

// Prepared Statemen
$query = "INSERT INTO details_ppetiton (user_id,petition_id,petition_type,details,id_subject_group,id_status) 
              VALUES (?, ?, ?, ?, ?, ?)";
try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $user_id);
    $stmt->bindValue(2, "4");
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
