<?php
include("../servers/connect.php");
$id = $_POST['id'] ;
$status = $_POST['status'] ;

$query = "UPDATE user SET status = ?  WHERE id = ?";

// $stmt = $db->prepare($query);
try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $status);
    $stmt->bindParam(2, $id);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo json_encode(['status' => 200]);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 400, "mgs" => $e->getMessage()]);
}
?>
