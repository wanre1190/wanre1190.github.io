<?php
include 'condb.php';
$name = $_POST['firstname'];
$surname = $_POST['surname'];
$phone = $_POST['phone'];
$username = $_POST['username'];
$password = $_POST['password'];

$password=hash('sha512',$password);

$sql ="INSERT INTO member(name,surname,telephone,username,password,status)
VALUES('$name','$surname','$phone','$username','$password','0')";
$result=mysqli_query($conn,$sql);
if($result){
    echo "<script> alert('บันทึกข้อมูลเรียบร้อย'); </script> ";
    echo "<script> window.location='register.php'; </script> ";
}else{
    echo "Error : " . $sql . "<br>" . mysqli_error($conn);
    echo "<script> alert('ไม่สามารถบันทึกข้อมูลได้'); </script>";
}
mysqli_close($conn);
?>