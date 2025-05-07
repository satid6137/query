<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname = "";

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ตั้งค่าการเชื่อมต่อให้ใช้ UTF-8
$conn->set_charset("utf8");

?>
