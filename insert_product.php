<?php
include 'condb.php';
$typeID = $_POST['typeID'];
$pro_name = $_POST['pro_name'];
$price= $_POST['price'];
$detail = $_POST['detail'];


//อัพโหลดรูปภาพ
if (is_uploaded_file($_FILES['file1']['tmp_name'])) {
    $new_image_name = 'pro_'.uniqid().".".pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "./image/".$new_image_name;
    move_uploaded_file($_FILES['file1']['tmp_name'],$image_upload_path);
    } else {
    $new_image_name = "";
    }

$sql="INSERT INTO product(type_id,price,pro_name,detail,image) VALUES ('$typeID','$price','$pro_name','$detail','$new_image_name')" ;
$result=mysqli_query($conn,$sql);
if($result){
    echo "<script> alert('บันทึกข้อมูลเรียบร้อย'); </script>";
    echo "<script> window.location='fro_product.php'; </script>";
}else{
    echo "Error : " . $sql . "<br>" . mysqli_error($conn);
    echo "<script> alert('ไม่สามารถบันทึกข้อมูลได้'); </script>";
}
mysqli_close($conn);
?>