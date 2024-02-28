<?php 
include("../servers/connect.php");

// ตรวจสอบว่ามีการส่งข้อมูลผ่านแบบฟอร์มหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["start_date"]) && isset($_GET["end_date"])) {
    $startDate = $_GET["start_date"];
    $endDate = $_GET["end_date"];

    // เตรียมคำสั่ง SQL
    $stmt = $db->prepare("SELECT * FROM details_ppetiton WHERE date BETWEEN ? AND ?");

    // แก้ไขการใช้ bindParam ที่นี่
    // สำหรับ PDO, คุณต้องระบุประเภทของแต่ละพารามิเตอร์
    $stmt->bindParam(1, $startDate, PDO::PARAM_STR);
    $stmt->bindParam(2, $endDate, PDO::PARAM_STR);

    // ดำเนินการคำสั่ง
    $stmt->execute();

    // รับผลลัพธ์
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // ถ้าใช้ PDO ให้ใช้ fetchAll

    // แสดงตารางข้อมูล
    echo '<div class="table-responsive mt-4">';
    echo '<table class="table table-bordered">';
    echo '<thead>';
    echo '<tr><th>ID</th><th>Name</th></tr>';
    echo '</thead>';
    echo '<tbody>';

    // ตรวจสอบว่าพบข้อมูลหรือไม่
    if (count($result) > 0) {
        // วนลูปเพื่อแสดงข้อมูลแต่ละแถว
        foreach ($result as $row) {
            echo "<tr><td>" . htmlspecialchars($row["id"]) . "</td><td>" . htmlspecialchars($row["petition_type"]) . "</td><td>";
        }
    } else {
        echo '<tr><td colspan="3">ไม่พบผลลัพธ์</td></tr>';
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>';

    $stmt = null; // ปิด statement
    $db = null; // ปิดการเชื่อมต่อฐานข้อมูล
}
?>
