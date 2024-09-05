<?php
include("../servers/connect.php"); // Ensure this path correctly points to your database connection script

// Query to fetch personnel data
$sql = "SELECT user_id, user_name, last_name, name_type,position  FROM `teacher_personnel_information` JOIN type on teacher_personnel_information.position = type.id_type;"; // Adjust table and column names as necessary

$result = $db->query($sql);

$personnel = [];

if ($result) {
    // Fetch all results at once
    $personnel = $result->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($personnel);
} else {
    echo json_encode([]);
}

?>
