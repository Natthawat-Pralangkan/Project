<?php
// Include database connection
include_once("connect.php");

// Check if user_name and password are provided
if (isset($_POST['user_name']) && isset($_POST['password'])) {
    // Retrieve user_name and password from POST data
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    // Prepare SQL statement to retrieve user information based on user_name and password
    $sql = "SELECT * FROM user WHERE user_name = :user_name AND password = :password";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':user_name', $user_name); // Change from ':email' to ':user_name'
    $stmt->bindParam(':password', $password);

    // Execute the prepared statement
    if ($stmt->execute()) {
        // Check if there is a matching user
        if ($stmt->rowCount() == 1) {
            // Fetch user information
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $user_id = $row['user_id'];
            $user_name = $row['user_name'];
            $id_subject_group = $row['id_subject_group'];

            $updatetime = $db->prepare("UPDATE user SET date_login = now() WHERE user_id = ?");
            $updatetime->bindParam(1, $user_id);
            if ($updatetime->execute()) {
                echo json_encode(["statusCode" => 200, "user_id" => $user_id, "user_name" => $user_name, "id_type" => $row['id_type'], "id_subject_group" => $row['id_subject_group']]);
            }
            // Return success status and user information
        } else {
            // No user found with the provided credentials
            echo json_encode(["statusCode" => 401]);
        }
    } else {
        // Error executing the SQL statement
        echo json_encode(["statusCode" => 500]);
    }
} else {
    // user_name and password are not provided
    echo json_encode(["statusCode" => 400]);
}
