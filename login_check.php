<?php
include 'condb.php';
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

$password=hash('sha512',$password);

$sql="SELECT * FROM member WHERE username ='$username' and password ='$password'";

$result =mysqli_query($conn,$sql);
$row =mysqli_fetch_array($result);
$status=$row['status'];

if($row > 0){
    $_SESSION["username"]=$row['username'];
    $_SESSION["pw"]=$row['password'];
    $_SESSION["userid"]=$row['id'];
    $_SESSION["firstname"]=$row['name'];
    $_SESSION["surname"]=$row['surname'];



    if($status == "0"){
        $show=header("location:index.php");
    }else($status == "1" ){
        $show=header("location:admin.php");
    }
   
}else{
    $_SESSION["Error"] = "<p> Your username or password is invalid </p>";
    $show=header("location:login.php");
}
echo $show;
?>