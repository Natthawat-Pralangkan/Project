<?php
include("../servers/connect.php");

$checkInTime = $_POST['checkInTime'];
$checkOutTime = $_POST['checkOutTime'];

// ตรวจสอบว่ามีการบันทึกเวลาไว้แล้วหรือไม่
$query = "SELECT id FROM time_logs LIMIT 1"; // เลือก record แรก
$stmt = $db->prepare($query);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    // มีข้อมูลอยู่แล้วให้ทำการอัปเดต
    $query = "UPDATE time_logs SET check_in_time = ?, check_out_time = ? WHERE id = (SELECT id FROM time_logs LIMIT 1)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $checkInTime);
    $stmt->bindParam(2, $checkOutTime);
    $success = $stmt->execute();
    
    if ($success) {
        echo json_encode(['status' => 200, 'msg' => 'เวลาได้รับการอัปเดตเรียบร้อยแล้ว']);
    } else {
        echo json_encode(['status' => 400, 'msg' => 'ไม่สามารถอัปเดตข้อมูลได้']);
    }
} else {
    // ไม่มีข้อมูลให้ทำการบันทึกใหม่
    $query = "INSERT INTO time_logs (check_in_time, check_out_time) VALUES (?, ?)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $checkInTime);
    $stmt->bindParam(2, $checkOutTime);
    $success = $stmt->execute();
    
    if ($success) {
        echo json_encode(['status' => 200, 'msg' => 'เวลาถูกบันทึกเรียบร้อยแล้ว']);
    } else {
        echo json_encode(['status' => 400, 'msg' => 'ไม่สามารถบันทึกข้อมูลได้']);
    }
}
?>
