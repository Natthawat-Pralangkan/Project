<?php
$host = 'localhost'; // หรือ Hostname ของ MySQL Server
$user = 'root'; // ชื่อผู้ใช้ MySQL
$pass = ''; // รหัสผ่าน MySQL
$dbname = 'nuntaburee-tis'; // ชื่อฐานข้อมูลที่ต้องการใช้งาน

$dsn = "mysql:host=$host;dbname=$dbname";

try {
    $db = new PDO($dsn, $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Unable to connect with the database: ' . $e->getMessage());
}
?>
