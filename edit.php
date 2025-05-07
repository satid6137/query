<?php
require_once 'config.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id']; 
$sql = "SELECT * FROM query WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	    <title>Edit Query</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
<center>
    <h2>Edit Query</h2></center>
<div class="container">
<div class="row">
<div class="col-md-4 mx-auto">
	
    <form action="update.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        <input type="hidden" name="id" value="<?= $row['id'] ?>" class="form-control">
        <p>QueryName: <input type="text" name="queryname" value="<?= $row['queryname'] ?>" class="form-control"></p>
        <p>Query: <textarea name="query" class="form-control" rows="5"><?= $row['query'] ?>  </textarea></p>
        <p>Name: <input type="text" name="name" value="<?= $row['name'] ?>" class="form-control"></p>
		<p>Tel: <input type="text" name="tel" value="<?= $row['tel'] ?>" class="form-control"></p>
		<p>E-Mail: <input type="text" name="email" value="<?= $row['email'] ?>" class="form-control"></p>
    <!-- ปุ่มบันทึก -->
    <button type="submit" class="btn btn-success">บันทึกการแก้ไข</button>

    <!-- ปุ่มล้างค่า -->
    <button type="reset" class="btn btn-warning">ล้างข้อมูล</button>

	<!-- ปุ่มยกเลิก -->
    <a href="index.php" class="btn btn-secondary">ยกเลิก</a>

    </form>

<script>
function validateForm() {
    var queryname = document.getElementById("queryname").value.trim();
    var query = document.getElementById("query").value.trim();
    var name = document.getElementById("name").value.trim();
    var tel = document.getElementById("tel").value.trim();
    var email = document.getElementById("email").value.trim();

    if (!queryname || !query || !name || !tel || !email) {
        alert("กรุณากรอกข้อมูลให้ครบทุกช่อง!");
        return false; // **ป้องกันการส่งฟอร์ม**
    }
    return true;
}
</script>

	</div>
	</div>
	</div>
</body>
</html>