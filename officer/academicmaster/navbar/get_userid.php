<?php
include("../../servers/connect.php"); // Correct the path to the connect.php file

// Check if user_id is provided and sanitize it
if (isset($_POST["user_id"])) {
    $user_id = $_POST["user_id"];
    
    // Prepare the SQL query
    $sql = "SELECT teacher_personnel_information.id, teacher_personnel_information.picture, type.name_type 
            FROM teacher_personnel_information 
            JOIN type ON teacher_personnel_information.position = type.id_type 
            WHERE teacher_personnel_information.user_id = ?";
    
    $result = $db->prepare($sql);
    
    // Bind the user_id parameter to the query
    $result->bindParam(1, $user_id, PDO::PARAM_INT);
    
    // Execute the query and fetch the data
    $result->execute();
    $row = $result->fetch(PDO::FETCH_ASSOC);

    $keeall = array(); // Create an array to store the data

    // Check if data was fetched
    if ($row) {
        $keeall[] = array(
            "id" => $row['id'],
            "name_type" => $row['name_type'],
            "picture" => "http://localhost/Project/images/" . $row['picture'] // Concatenating the image URL
        );
    } else {
        // Handle case when no data is returned
        $keeall[] = array(
            "error" => "No user found with the provided user_id."
        );
    }

    // Return the JSON response
    echo json_encode($keeall);
} else {
    // Handle missing user_id
    echo json_encode(array("error" => "user_id not provided."));
}
?>
