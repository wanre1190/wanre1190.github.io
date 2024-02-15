<?php
session_start();
if(!isset($_SESSION["username"]))
header("location:login.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <br> <br>
    <div class="col-md-6 alert alert-dark"> 
Welcome to Admin
    </div> 

    <br><br>
    <h3>Admin</h3>
    <?php
if(isset($_SESSION["firstname"]))
{
    echo "<div class='text-success'>";
    echo $_SESSION["firstname"] ." ". $_SESSION["surname"] ;
    echo "</div>";
}
?>
<br>
    <a href="insert_product.php">Product</a> 
    </div>
</body>
</html>