<?php
session_start();
include 'condb.php';
include 'menu.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add member</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div Class="container">
    <div class="row">
        <div class="col-sm-6">
    <div class="h4 text-center alert alert-dark mb-4 mt-4" role="alert"> เพิ่มข้อมูลสมาชิก </div>
    <form method="POST" action="insert_member.php">
        
    <label>ชื่อ:</label>
    <input type="text" name="fname" class="form-control mb-2" placeholder="...ชื่อ" required > <dr>
    <label>นามสกุล:</label>
    <input type="text" name="lname" class="form-control mb-2" placeholder="...นามสกุล" required ><dr>
    <label>เบอร์โทรศัพท์:</label>
    <input type="number" name="telephone" class="form-control mb-2" placeholder="...เบอร์โทรศักท์" required ><dr>
    <input type="submit" value="submit" class="btn btn-success mt-4" >
    <a href="show_member.php" class="btn btn-danger mt-4">Cancel</a>
</form>

</div>
</div>

</div>
</body>
</html>