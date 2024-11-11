<?php
include("../servers/connect.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a user_id is sent via POST
    if (!isset($_POST["user_id"])) {
        echo json_encode(['status' => 400, 'msg' => 'User ID not provided']);
        exit; // Exit the script if user_id is not provided
    }

    try {
        $user_id = $_POST["user_id"];
        // Prepare and execute a SELECT query to fetch existing picture information
        $sql = "SELECT * FROM `teacher_personnel_information` WHERE user_id = :user_id";
        $stmt_picture = $db->prepare($sql);
        $stmt_picture->bindParam(':user_id', $user_id);
        $stmt_picture->execute();
        $row = $stmt_picture->fetch(PDO::FETCH_ASSOC);

        // Check if a picture file is uploaded
        if (isset($_FILES['picture_1']) && $_FILES['picture_1']['error'] === UPLOAD_ERR_OK) {
            $tmp = $_FILES['picture_1']['tmp_name'];
            $imgname = $_FILES['picture_1']['name'];
            $path = "../images/" . $imgname;
            move_uploaded_file($tmp, $path); // Move uploaded file to destination

            // Use the newly uploaded image name
            $imgname = $imgname;
        } else {
            // Use the existing image name from database if no new file uploaded
            $imgname = $row['picture'];
        }

        // Prepare and execute an UPDATE query to update picture field in database
        $query = "UPDATE teacher_personnel_information SET picture=:picture WHERE user_id = :user_id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':picture', $imgname);
        $stmt->execute();

        // Check if the update was successful
        if ($stmt->rowCount() > 0) {
            echo json_encode(['status' => 200]);
        } else {
            echo json_encode(['status' => 400, 'msg' => 'Failed to update picture']);
        }
    } catch (Exception $e) {
        echo json_encode(['status' => 400, 'msg' => $e->getMessage()]);
    }
}
