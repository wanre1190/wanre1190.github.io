<?php
include 'condb.php';
$proid = $_POST['pro_id'];
$proname = $_POST['pro_name'];
$typeID = $_POST['typeID'];
$price = $_POST['price'];
$detail = $_POST['detail'];
$image = $_POST['txtimg'];

//อัพโหลดรูปภาพ
if (is_uploaded_file($_FILES['file1']['tmp_name'])) {
    $new_image_name = 'pro_'.uniqid().".".pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "./image/".$new_image_name;
    move_uploaded_file($_FILES['file1']['tmp_name'],$image_upload_path);
    } else {
    $new_image_name = "$image";
    }

    $sql = "UPDATE product SET
    pro_name = '$proname',
    type_id = '$typeID',
    price = '$price',
    detail = '$detail',
    image = '$new_image_name' 
    WHERE pro_id='$proid' ";

$result=mysqli_query($conn,$sql);
if($result){
    echo "<script> alert('แก้ไขข้อมูลเรียบร้อย'); </script>";
    echo "<script> window.location='show_product.php'; </script>";
}else{
    echo "Error : " . $sql . "<br>" . mysqli_error($conn);
    echo "<script> alert('ไม่สามารถแก้ไขข้อมูลได้'); </script>";
}
mysqli_close($conn);
?>