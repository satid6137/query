<!DOCTYPE html>
<html lang="en">
<head>
    <title>Insert Query</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <center><h2>เพิ่มข้อมูลใหม่</h2></center>
	<div class="row">
	<div class="col-md-4 mx-auto">
		
<form action="insert_process.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
    <p><label>QueryName</label><input type="text" name="queryname" id="queryname" class="form-control"></p>
    <p><label>Query</label><textarea name="query" id="query" class="form-control" rows="10"></textarea></p>
    <p><label>Name</label><input type="text" name="name" id="name" class="form-control"></p>
    <p><label>Tel</label><input type="text" name="tel" id="tel" class="form-control"></p>
    <p><label>Email</label><input type="text" name="email" id="email" class="form-control"></p>

    <!-- ปุ่มบันทึก -->
    <button type="submit" class="btn btn-success">บันทึก</button>

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
        return false; // ป้องกันการส่งฟอร์ม
    }
    return true;
}
</script>
	</div>
	</div>
	</div>
</body>
</html>