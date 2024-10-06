<?php
// เชื่อมต่อกับฐานข้อมูล
include("../servers/connect.php");

// ตรวจสอบว่ามีการส่งค่า user_id มาหรือไม่
if (isset($_POST['user_id'])) {
    // รับค่า user_id จาก POST request
    $user_id = $_POST['user_id'];

    try {
        // ทำการ query ข้อมูลผู้ใช้จากฐานข้อมูล
        $sql = "SELECT user.user_id, user_name, last_name FROM user JOIN teacher_personnel_information ON user.user_id = teacher_personnel_information.user_id WHERE user.user_id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$user_id]);
        
        // นำข้อมูลที่ได้มาเก็บไว้ใน associative array
        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

        // ส่งข้อมูลกลับในรูปแบบ JSON
        echo json_encode($user_data);
    } catch (PDOException $e) {
        // หากเกิดข้อผิดพลาดในการดึงข้อมูล
        echo json_encode(array("error" => "Database error: " . $e->getMessage()));
    }
}
?>
