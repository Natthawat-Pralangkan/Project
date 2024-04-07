<?php
include("../servers/connect.php"); // Ensure this path correctly points to your database connection script

// Query to fetch personnel data
$sql = "SELECT user.id,teacher_personnel_information.user_name,teacher_personnel_information.last_name , user.user_id , type.name_type, user.status FROM `user`
JOIN teacher_personnel_information on user.user_id = teacher_personnel_information.user_id
JOIN type on user.id_type = type.id_type
WHERE user.status = 0"; // Adjust table and column names as necessary

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
