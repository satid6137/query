<?php
require_once 'config.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id']; 
$sql = "DELETE FROM query WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "ลบข้อมูลเรียบร้อย!";
    header("Location: index.php");
} else {
    echo "เกิดข้อผิดพลาด!";
}

$stmt->close();
$conn->close();
?>