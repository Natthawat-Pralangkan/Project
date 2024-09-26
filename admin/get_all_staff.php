<?php
include("../servers/connect.php");

try {
    // Query ที่ใช้ในการดึงข้อมูล
    $sql = "SELECT * FROM `teacher_personnel_information` 
        JOIN type ON teacher_personnel_information.position = type.id_type
        WHERE teacher_personnel_information.position IN (1,2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18)";

    // เตรียมและรัน SQL statement
    $stmt = $db->prepare($sql);
    $stmt->execute();

    // ตรวจสอบว่ามีข้อมูลที่ถูกดึงมาหรือไม่
    if ($stmt->rowCount() > 0) {
        $number = 1;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $number++ . "</td>"; // แสดงลำดับที่
            echo "<td>" . $row['user_name'] . ' ' . $row['last_name'] . "</td>"; // แสดงชื่อและนามสกุล
            echo "<td>" . $row['name_type'] . "</td>"; // แสดงประเภทตำแหน่ง
            echo "</tr>";
        }
    } else {
        // ถ้าไม่มีข้อมูล
        echo "<tr><td colspan='3'>ไม่พบข้อมูล</td></tr>";
    }
} catch (PDOException $e) {
    // แสดงข้อความ error เมื่อเกิดข้อผิดพลาด
    echo "Database error: " . $e->getMessage();
}
?>
