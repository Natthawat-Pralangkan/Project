<?php
include("../../servers/connect.php");
// ตัวอย่างโค้ด PHP สำหรับการอัปเดตสถานะในฐานข้อมูล
if (isset($_POST['id'])) {

    $id = $_POST['id'];
    // $status = $_POST['status'];
    try {
        // สมมติว่าคุณมีการเชื่อมต่อฐานข้อมูลแล้ว
        $query = "UPDATE teacher_personnel_information SET status = 1 WHERE id = ?";
        $stmt = $db->prepare($query);
        // $stmt->execute();
        if ($stmt->execute([$id])) {
            echo json_encode(['status' => 200]);
        } else {
            echo json_encode(['status' => 400]);
        }
    } catch (Exception $e) {
        echo json_encode(['status' => 400, "mgs" => $e->getMessage()]);
    }
}
