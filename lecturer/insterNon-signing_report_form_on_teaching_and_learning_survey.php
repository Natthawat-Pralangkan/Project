<?php
include("../servers/connect.php");
// $query = "SELECT MAX(id_from ) AS max_id FROM modal_title_3";
// $result = $db->prepare($query);
// $result->execute();
// $row = $result->fetch(PDO::FETCH_ASSOC);
// $maxID = $row['max_id'];
// $newID = $maxID + 1;

// $name_from = $_POST["name_from"];
// $petition_name = $_POST["petition_name"];
$level = $_POST["level"];
$teach_week = $_POST["teach_week"];
$date_teach_start = $_POST["date_teach_start"];
$date_teach_end = $_POST["date_teach_end"];
$id_user = $_POST["id_user"];

// Prepared Statemen
$query = "INSERT INTO modal_title_3 (id_from ,name_from, petition_name, level, teach_week, date_teach_start, date_teach_end,id_user) 
              VALUES (?, ?, ?, ?, ?, ?, ?,?)";
try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $newID);
    $stmt->bindParam(2, $name_from);
    $stmt->bindParam(3, $petition_name);
    $stmt->bindParam(4, $level);
    $stmt->bindParam(5, $teach_week);
    $stmt->bindParam(6, $date_teach_start);
    $stmt->bindParam(7, $date_teach_end);
    $stmt->bindParam(8, $id_user);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo json_encode(['status' => 200]);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 400, "mgs" => $e->getMessage()]);
}
