<?php
// แสดงข้อผิดพลาดทั้งหมด
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'config.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ตรวจสอบค่าที่ส่งมาจากฟอร์ม
//var_dump($_POST); 
//exit(); // ป้องกันไม่ให้โค้ดทำงานต่อ (ใช้สำหรับตรวจสอบเท่านั้น)

// รับค่าจากฟอร์ม
$queryname = trim($_POST['queryname']);
$query = json_encode(trim($_POST['query']));
$name = trim($_POST['name']);
$tel = trim($_POST['tel']);
$email = trim($_POST['email']);

// ตรวจสอบว่าข้อมูลครบ
if (empty($queryname) || empty($query) || empty($name) || empty($tel) || empty($email)) {
    die("เกิดข้อผิดพลาด: กรุณากรอกข้อมูลให้ครบทุกช่อง!");
}

// ป้องกัน SQL Injection
$queryname = mysqli_real_escape_string($conn, $_POST['queryname']);
$query = mysqli_real_escape_string($conn, $_POST['query']);
$name = mysqli_real_escape_string($conn, $_POST['name']);
$tel = mysqli_real_escape_string($conn, $_POST['tel']);
$email = mysqli_real_escape_string($conn, $_POST['email']);

// บันทึกลงฐานข้อมูล
// ใช้ `prepared statements` เพื่อป้องกัน SQL Injection
$sql = "INSERT INTO query (queryname, query, name, tel, email) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $queryname, $query, $name, $tel, $email);

if ($stmt->execute()) {
    header("Location: index.php");
    exit();
} else {
    echo "เกิดข้อผิดพลาด! " . $stmt->error;
}

$stmt->close();
$conn->close();
?>