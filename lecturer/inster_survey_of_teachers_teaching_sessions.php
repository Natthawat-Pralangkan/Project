<?php
include("../servers/connect.php");

$name_from = $_POST["name_from"];
$subject_group = $_POST["subject_group"];
$semester = $_POST["semester"];
$school_year = $_POST["school_year"];
$id_user = $_POST["id_user"];

// Prepared Statemen
$query = "INSERT INTO teach_place__absent_teacher (id_from,id_user ,name_from, petition_name, subject_group, semester, school_year,id_user) 
              VALUES (?, ?, ?, ?, ?, ?,?,?)";
try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $newID);
    $stmt->bindParam(2, $id_user);
    $stmt->bindParam(3, $name_from);
    $stmt->bindParam(4, $petition_name);
    $stmt->bindParam(5, $subject_group);
    $stmt->bindParam(6, $semester);
    $stmt->bindParam(7, $school_year);
    $stmt->bindParam(8, $id_user);
    

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo json_encode(['status' => 200]);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 400, "mgs" => $e->getMessage()]);
}
