<?php
// เชื่อมต่อกับฐานข้อมูล
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "mydatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

// เช็คการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// คำสั่ง SQL เพื่อดึงข้อมูล
$sql = "SELECT * FROM mytable";
$result = $conn->query($sql);

// แสดงข้อมูลในตาราง
echo "<table class='table'>";
echo "<thead><tr><th>วันที่ยื่น</th><th>ชื่อ</th><th>นามสกุล</th><th>สถานะ</th></tr></thead>";
echo "<tbody>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["date_submitted"] . "</td><td>" . $row["firstname"] . "</td><td>" . $row["lastname"] . "</td><td>" . $row["status"] . "</td></tr>";
    }
} else {
    echo "<tr><td colspan='4'>ไม่พบข้อมูล</td></tr>";
}

echo "</tbody>";
echo "</table>";

// ปิดการเชื่อมต่อ
$conn->close();
?>
