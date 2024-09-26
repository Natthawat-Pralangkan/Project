<?php
include("../servers/connect.php");

if (isset($_FILES['picture']) && $_FILES['picture']['error'] === UPLOAD_ERR_OK) {
    $tmp = $_FILES['picture']['tmp_name'];
    $imgname = $_FILES['picture']['name'];
    $path = "../Face_scanning_system/images_time/" . $imgname;
    move_uploaded_file($tmp, $path);
} else {
    $imgname = "";
}

$user_id = $_POST["user_id"];
$user_name = $_POST["user_name"];
$last_name = $_POST["last_name"];
$position = $_POST["position"];

$query = "INSERT INTO time_clocking_system (user_id, user_name, last_name, id_type ,photo) VALUES (?, ?, ?, ?, ?)";
// exit;
// print_r($query);
try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $user_id);
    $stmt->bindParam(2, $user_name);
    $stmt->bindParam(3, $last_name);
    $stmt->bindParam(4, $position);
    $stmt->bindParam(5, $imgname);

    if ($stmt->execute()) {
        echo json_encode(['status' => 200]);
    } else {
        echo json_encode(['status' => 400, 'msg' => 'Failed to save data']);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 400, 'msg' => $e->getMessage()]);
}
