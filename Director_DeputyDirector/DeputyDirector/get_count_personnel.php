<?php
include("../../servers/connect.php");

// Adjust your query as needed. This example simply counts all records in the teacher_personnel_information table.
$sql = "SELECT COUNT(id) AS userCount FROM teacher_personnel_information";
$stmt = $db->prepare($sql);

// Always set your headers at the beginning
header('Content-Type: application/json');

if ($stmt->execute()) {
    $result = $stmt->fetch();

    if ($result !== false) {
        echo json_encode(['userCount' => $result['userCount'],'status' => 'success']);
     
    } else {
        // Consider using HTTP status codes to indicate errors
        http_response_code(500); // Internal Server Error
        echo json_encode(['error' => 'An error occurred fetching the user count']);
    }
} else {
    http_response_code(500); // Internal Server Error
    echo json_encode(['error' => 'Failed to execute the query']);
}
?>
