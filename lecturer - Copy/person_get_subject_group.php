<?php
include("../servers/connect.php");
// fetch_subject_group.php
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    // ตัวอย่างการดึงข้อมูล, ตรวจสอบและป้องกัน SQL Injection อย่างเหมาะสม
    $sql = "SELECT * FROM `subject_group` WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute(['id' => $id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row) {
        echo json_encode($row); // คืนข้อมูลในรูปแบบ JSON
    } else {
        echo json_encode(['error' => 'ไม่พบข้อมูล']);
    }
}

?>