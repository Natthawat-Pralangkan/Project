<?php
include("../servers/connect.php");




$user_id = $_POST["user_id"];
$user_name = $_POST["user_name"];
$last_name = $_POST["last_name"];
$position = $_POST["position"];
$uploadDir = '../Face_scanning_system/images_time/' . $user_id . '/';
$imgname = [];

if (!empty($_FILES['files']['name'][0]) && $user_id != "") {
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true); // Ensure directory creation check
    }
    foreach ($_FILES['files']['tmp_name'] as $key => $value) {
        $fileTmpName = $_FILES['files']['tmp_name'][$key];
        $fileName = $_FILES['files']['name'][$key];
        $filePath = $uploadDir . basename($fileName); // Secure the file path to prevent directory traversal
        
        if (move_uploaded_file($fileTmpName, $filePath)) {
            $imgname[] = $fileName;
        }
    }
    $fileNameString = implode(", ", $imgname);
} else {
    echo json_encode(['status' => 400, 'msg' => 'No files uploaded or missing user ID']);
    exit;
}

$query = "INSERT INTO time_clocking_system (user_id, user_name, last_name, id_type, photo) VALUES (?, ?, ?, ?, ?)";
try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $user_id);
    $stmt->bindParam(2, $user_name);
    $stmt->bindParam(3, $last_name);
    $stmt->bindParam(4, $position);
    $stmt->bindParam(5, $fileNameString);

    if ($stmt->execute()) {
        echo json_encode(['status' => 200]);
    } else {
        echo json_encode(['status' => 400, 'msg' => 'Failed to save data']);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 400, 'msg' => $e->getMessage()]);
}
