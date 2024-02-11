<?php
include("../servers/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // $project_code = $_POST["project_code"];
    $name_from = $_POST["name_from"];
    $petition_name = $_POST["petition_name"];
    $subject_group = $_POST["subject_group"];
    $school_year = $_POST["school_year"];
    $status_from = $_POST["status_from"];

    // Prepared Statement
    $query = "INSERT INTO modal_title_1 (name_from, petition_name, subject_group, school_year, status_from) 
              VALUES (?, ?, ?, ?, 1)";

    // Execute the prepared statement
    if ($stmt = $conn->prepare($query)) {
        // Bind parameters, including the LPAD placeholder
        $stmt->bind_param("sssss", $name_from, $petition_name, $subject_group, $school_year, $status_from);

        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "error: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        echo "error"; // Send "error" response if the prepared statement cannot be prepared
    }

    // ...

}
