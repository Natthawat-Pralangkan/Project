<?php
include("../../servers/connect.php");

// Assuming user_id and id_status should influence the query, but your original query does not use them.
// If they are indeed needed for filtering, the SQL query should be adjusted to include these parameters properly.
// However, based on your initial SQL, it seems you're counting records with a specific petition_type and id_status, which doesn't directly involve user_id or id_status as parameters.

$sql = "SELECT COUNT(position) AS count 
FROM teacher_personnel_information 
WHERE position IN (1, 2, 3, 4, 5, 6, 7,8,9,10,11,12,13,14,15,16,17,18)";
$stmt = $db->prepare($sql);
$stmt->execute(); // Removed parameters as they are not used in your SQL.
$result = $stmt->fetch();

// It's better to check if result is not false before encoding it to JSON.
if ($result !== false) {
    header('Content-Type: application/json');
    echo json_encode(['count' => $result['count']]);
} else {
    // Only send the error message if there was an issue fetching the result.
    header('Content-Type: application/json');
    echo json_encode(['error' => 'An error occurred fetching the count']);
}
