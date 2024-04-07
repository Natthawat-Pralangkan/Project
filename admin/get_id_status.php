<?php
include("../servers/connect.php");

$sql = "SELECT COUNT(id_status) AS count FROM details_ppetiton";
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
?>
