<?php
include("../servers/connect.php");

if (isset($_POST['user_id'])) {
    $userId = $_POST['user_id'];
    // ตรวจสอบว่ารับค่า user_id ได้หรือไม่
    echo "Received user_id: " . $userId;

    $query = "SELECT user_name, telephone_number, position FROM teacher_personnel_information WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        echo json_encode(['status' => 'success', 'user_name' => $user['user_name'], 'telephone_number' => $user['telephone_number'], 'position' => $user['position']]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'ไม่พบข้อมูลผู้ใช้']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'ไม่มีการส่งค่า user_id']);
}
?>
