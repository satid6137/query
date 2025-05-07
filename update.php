<?php
require_once 'config.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับค่าจากฟอร์ม
$id = $_POST['id'];
$queryname = trim($_POST['queryname']);
$query = trim($_POST['query']);
$name = trim($_POST['name']);
$tel = trim($_POST['tel']);
$email = trim($_POST['email']);

// **ตรวจสอบว่าทุกช่องมีค่าหรือไม่**
if (empty($queryname) || empty($query) || empty($name) || empty($tel) || empty($email)) {
    die("เกิดข้อผิดพลาด: กรุณากรอกข้อมูลให้ครบทุกช่อง!"); 
}

$sql = "UPDATE query SET queryname = ?, query = ?, name = ?, tel = ?, email = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssi", $queryname, $query, $name, $tel, $email, $id);

if ($stmt->execute()) {
    header("Location: index.php");
    exit();
} else {
    echo "เกิดข้อผิดพลาด! " . $stmt->error;
}

$stmt->close();
$conn->close();
?>