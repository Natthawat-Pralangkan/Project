<?php
include("../servers/connect.php");

// Check if start_date, end_date, and user_id are sent
if (isset($_GET['start_date']) && isset($_GET['end_date']) && isset($_GET['user_id'])) {
    $startDate = $_GET['start_date'];
    $endDate = $_GET['end_date'];
    $userId = $_GET['user_id']; // Ensure consistency in variable naming

    // Prepare SQL query to fetch data matching the condition
    // Corrected SQL query: Added 'FROM your_table_name' and corrected 'user_id : user_id' to 'user_id = :user_id'
    $sql = "SELECT * FROM face_recognition_data WHERE created_at BETWEEN :start_date AND :end_date AND user_id = :user_id"; // Replace 'your_table_name' with the actual table name
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':start_date', $startDate);
    $stmt->bindParam(':end_date', $endDate);
    $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT); // Assuming user_id is an integer, specify the parameter type
    $stmt->execute();

    // Fetch all the matching records
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Set header to indicate JSON response
    header('Content-Type: application/json');

    // Encode and return the data as JSON
    echo json_encode($records);
} else {
    // Respond with an error if start_date, end_date, and user_id are not provided
    echo json_encode(["error" => "Missing required data"]);
}
