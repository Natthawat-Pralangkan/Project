<?php 
include("../servers/connect.php");

// รับค่าจาก AJAX
$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';
$id_status = isset($_POST['id_status']) ? $_POST['id_status'] : '';

// ตรวจสอบข้อมูลที่ได้รับ
if (!empty($user_id) && !empty($id_status) && is_array($id_status)) {
    // สร้างเงื่อนไขสำหรับการค้นหาหลาย id_status
    $placeholders = implode(',', array_fill(0, count($id_status), '?'));
    $sql = "SELECT COUNT(*) AS total FROM details_ppetiton WHERE user_id = ? AND id_status IN ($placeholders)";
    $stmt = $db->prepare($sql);
    // ผ่านค่า user_id และ id_status ไปยังคำสั่ง SQL
    $stmt->execute(array_merge([$user_id], $id_status));
    $result = $stmt->fetch();
    
    // ส่งค่ากลับเป็น JSON
    header('Content-Type: application/json');
    echo json_encode(['total' => $result['total']]);
} else {
    // ส่งข้อผิดพลาดหากไม่มี user_id หรือ id_status
    echo json_encode(['error' => 'Missing user_id or id_status']);
}
?>
