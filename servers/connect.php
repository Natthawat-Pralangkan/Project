<?php  
$conn = mysqli_connect("localhost","root","") or die("ไม่สามารถเชื่อมต่อฐานเข้ามูลได้");
mysqli_select_db($conn,"db_project") or die("ไม่พบฐานข้อมูล");
mysqli_query($conn,"SET NAMES UTF8");
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'nuntaburee_sis';

$dsn = "mysql:host=$host;dbname=$dbname";

try {
    $db = new PDO($dsn, $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die('Unable to connect with the database: ' . $e->getMessage());
}
