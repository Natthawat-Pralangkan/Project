<?php
include "../../servers/connect.php";
// print_r($_POST);
// exit;
if (isset($_POST['user_id'])) {

    $user_id = $_POST['user_id'];

    // คำสั่ง SQL เพื่อดึงข้อมูลไฟล์ PDF
    $sql = "SELECT * FROM user WHERE user_id = :user_id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $keeall = array();
    $keeall[] = array(
        "id_subject_group" => $row['id_subject_group'],
    );
    echo json_encode ($keeall);
}
