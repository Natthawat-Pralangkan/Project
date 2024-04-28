<?php include("../servers/connect.php");

// รับค่าจาก AJAX
$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';
$id_status = isset($_POST['id_status']) ? $_POST['id_status'] : '';

// ตรวจสอบข้อมูลที่ได้รับ
if (!empty($user_id) && !empty($id_status)) {
    // เตรียมคำสั่ง SQL และดำเนินการค้นหา
    $sql = "SELECT COUNT(id_status) AS count FROM details_ppetiton WHERE user_id = :user_id AND id_status = :id_status";
    $stmt = $db->prepare($sql);
    $stmt->execute([':user_id' => $user_id, ':id_status' => $id_status]);
    $result = $stmt->fetch();
    
    // ส่งค่ากลับเป็น JSON
    header('Content-Type: application/json');
    echo json_encode(['count' => $result['count']]);
} else {
    // ส่งข้อผิดพลาดหากไม่มี user_id หรือ id_status
    echo json_encode(['error' => 'Missing user_id or id_status']);
}