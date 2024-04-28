<?php
include("../../servers/connect.php"); 


if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $tmp = $_FILES['file']['tmp_name'];
    $filename = $_FILES['file']['name'];
    $path = "./order/" . $filename;
    move_uploaded_file($tmp, $path);
} else {
    $filename = "";
}

// print_r($_POST);
// exit;
// $user_id = generate_student_id($db);
$id_user = $_POST["id_user"];
$name_order = $_POST["name_order"];
$order_type = $_POST["order_type"];
// $file = $_POST["file"];





$query = "INSERT INTO order_inside (id_user,name_order,order_type,file) 
              VALUES (?, ?, ?, ?)";
try {
    $stmt = $db->prepare($query);

    $stmt->bindParam(1, $id_user);
    // $stmt->bindParam(2, $user_id);
    $stmt->bindParam(2, $name_order);
    $stmt->bindParam(3, $order_type);
    $stmt->bindParam(4, $filename);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo json_encode(['status' => 200]);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 400, "mgs" => $e->getMessage()]);
}
