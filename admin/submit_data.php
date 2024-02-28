<?php
include("../servers/connect.php");
// Check if start_date and end_date are sent
if (isset($_GET['start_date']) && isset($_GET['end_date'])) {
    $startDate = $_GET['start_date'];
    $endDate = $_GET['end_date'];

    // Prepare SQL query to fetch data matching the condition
    $sql = "SELECT details_ppetiton.*, petition_type.request_type_name, teacher_personnel_information.user_name , teacher_personnel_information.last_name, petition_name.petition_name  FROM `details_ppetiton`
    JOIN petition_type ON details_ppetiton.petition_type = petition_type.id
    JOIN teacher_personnel_information ON details_ppetiton.user_id = teacher_personnel_information.user_id 
    JOIN petition_name on details_ppetiton.petition_id = petition_name.id
    WHERE date BETWEEN :start_date AND :end_date";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':start_date', $startDate);
    $stmt->bindParam(':end_date', $endDate);
    $stmt->execute();

    // Fetch all the matching records
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Set header to indicate JSON response
    header('Content-Type: application/json');

    // Encode and return the data as JSON
    echo json_encode($records);
} else {
    // Respond with an error if start_date and end_date are not provided
    echo json_encode(["error" => "No data sent"]);
}
