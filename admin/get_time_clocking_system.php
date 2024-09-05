<?php
include("../servers/connect.php"); // Ensure this path correctly points to your database connection script

// Query to fetch personnel data
$sql = "SELECT * FROM `time_clocking_system` JOIN type on time_clocking_system.id_type = type.id_type"; // Adjust table and column names as necessary

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
