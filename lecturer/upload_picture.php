<?php
include("../servers/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ตรวจสอบว่าได้รับ user_id จาก POST หรือไม่
    if (!isset($_POST["user_id"])) {
        echo json_encode(['status' => 400, 'msg' => 'User ID not provided']);
        exit;
    }

    try {
        $user_id = $_POST["user_id"];
        
        // ดึงข้อมูลรูปภาพเก่าจากฐานข้อมูล
        $sql = "SELECT picture FROM `teacher_personnel_information` WHERE user_id = :user_id";
        $stmt_picture = $db->prepare($sql);
        $stmt_picture->bindParam(':user_id', $user_id);
        $stmt_picture->execute();
        $row = $stmt_picture->fetch(PDO::FETCH_ASSOC);

        // ตรวจสอบการอัปโหลดรูปภาพใหม่
        if (isset($_FILES['picture_1']) && $_FILES['picture_1']['error'] === UPLOAD_ERR_OK) {
            $tmp = $_FILES['picture_1']['tmp_name'];
            $imgname = uniqid() . "_" . $_FILES['picture_1']['name']; // ใช้ชื่อใหม่ป้องกันการซ้ำ
            $path = "../images/" . $imgname;

            // ลบรูปภาพเก่าถ้ามีอยู่ในระบบ
            if (!empty($row['picture']) && file_exists("../images/" . $row['picture'])) {
                unlink("../images/" . $row['picture']);
            }

            // ย้ายไฟล์ที่อัปโหลดไปยังโฟลเดอร์ที่ต้องการ
            move_uploaded_file($tmp, $path);
        } else {
            // หากไม่มีไฟล์ใหม่อัปโหลด ให้ใช้รูปภาพเดิม
            $imgname = $row['picture'];
        }

        // อัปเดตชื่อไฟล์รูปภาพในฐานข้อมูล
        $query = "UPDATE teacher_personnel_information SET picture = :picture WHERE user_id = :user_id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':picture', $imgname);
        $stmt->execute();

        // ตรวจสอบว่าการอัปเดตสำเร็จหรือไม่
        if ($stmt->rowCount() > 0) {
            echo json_encode(['status' => 200, 'msg' => 'Picture updated successfully']);
        } else {
            echo json_encode(['status' => 400, 'msg' => 'Failed to update picture']);
        }
    } catch (Exception $e) {
        echo json_encode(['status' => 400, 'msg' => $e->getMessage()]);
    }
}
