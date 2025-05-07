<?php
require_once 'config.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ดึงข้อมูลทั้งหมด
$sql = "SELECT * FROM query";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Query For NodJS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Query List</h2>
		
		 <!-- ปุ่มเพิ่มข้อมูล -->
    <a href="insert.php" class="btn btn-success mb-3">เพิ่มข้อมูล</a>

		
        <table class="table">
            <tr>
                <th>ID</th><th>QueryName</th><th>Query</th><th>Name</th><th>Tel</th><th>E-Mail</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['queryname'] ?></td>
                <td><?= $row['query'] ?></td>
                <td><?= $row['name'] ?></td>
				<td><?= $row['tel'] ?></td>
				<td><?= $row['email'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning">แก้ไข</a>
                    <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('ยืนยันการลบข้อมูล?');">ลบ</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>