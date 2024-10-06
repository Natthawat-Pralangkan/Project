<?php
include("../servers/connect.php");

include("../servers/connect.php");

if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];
    // ตรวจสอบว่ารับค่า user_id ได้หรือไม่
    // echo "Received user_id: " . $user_id;

    $sql = "SELECT * FROM `teacher_personnel_information` JOIN type ON teacher_personnel_information.position = type.id_type WHERE user_id = ?";;
    //  JOIN user on details_ppetiton.id_subject_group = user.id_subject_group
    $result = $db->prepare($sql);
    // $result->bindParam(1, $user_id);
    $result->bindParam(1, $user_id);
    $result->execute();
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $keeall = []; // สร้าง array เพื่อเก็บข้อมูลทั้งหมดก่อนส่ง JSON กลับ

   
        $keeall[] = array(
            "user_id" => $row['user_id'],
            "user_name" => $row['user_name'],
            "last_name" => $row['last_name'],
            "telephone_number" => $row['telephone_number'],
            "name_type" => $row['name_type'],
           
        
        );

    echo json_encode($keeall); // ส่ง JSON กลับหลังจากวนลูปเสร็จสิ้นทั้งหมด
}
