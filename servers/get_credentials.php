<?php
// Include database dbection
include_once("connect.php");

// Prepare SQL statement to retrieve user_name and password from the database
$sql = "SELECT user_name, password FROM user LIMIT 1"; // เปลี่ยนตามความเหมาะสมของโครงสร้างฐานข้อมูลของคุณ

// Execute the SQL statement
$result = $db->query($sql);

if ($result->rowCount() > 0) {
    // Fetch the first row
    $row = $result->fetch(PDO::FETCH_ASSOC);

    // Retrieve user_name and password
    $user_name = $row['user_name'];
    $password = $row['password'];

    // Return user_name and password as JSON response
    echo json_encode(["statusCode" => 200, "user_name" => $user_name, "password" => $password]);
} else {
    // No user found in the database
    echo json_encode(["statusCode" => 404, "message" => "No user found in the database"]);
}

// Close the database dbection
$db = null;
?>
