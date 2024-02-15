<?php 
session_start();
include 'condb.php'; 
$sql = "selsct * from tb_order where orderID = '". $_SESSION["order_id"] ."' ";
$result1 = mysqli_query($conn,$sql);
$rs = mysqli_fetch_array($result1);
$total_price=$rs["total_price"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-10">
    <div class="alert alert-primary h5 text-center mt-4"  role="alert">
  ใบคำสั่งซื้อสินค้า
</div>
เลขที่ใบสั่งซื้อ : <?=$rs['orderID']; ?> <br>
ชื่อ-นามสกุล (ลูกค้า): <?=$rs['cus_name'];?> <br>
ที่อยู่การจัดส่ง : <?=$rs['address']; ?><br>
เบอร์โทรศัพท์ : <?=$rs['telephone']; ?><br>
<br>
<table class="table">
  <thead>
    <tr>
      <th>รหัสสินค้า</th>
      <th>ชื่อสินค้า</th>
      <th>ราคา</th>
      <th>รายละเอียดสินค้า</th>
      <th>จำนวนที่สั่งซื้อ</th>
      <th>ราคารวม</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $sql1 = "selsct * from order_detail d,prouct p where d.pro_id=p.pro_id and d.orderID = '".$_SESSION["order_id"]."' ";
  $result1 = mysqli_query($conn,$sql1);
  while($row=mysqli_fetch_array($result1)){

  ?>
    <tr>
      <td><?=$row['pro_id']?></td>
      <td><?=$row['pro_name']?></td>
      <td><?=$row['orderPrice']?></td>
      <td><?=$row['order_detail']?></td>
      <td><?=$row['orderQty']?></td>
      <td><?=$row['Total']?></td>
    </tr>
  </tbody>
  <?php
}
  ?>
</table>
<h6>รวมเป็นเงิน <? echo number_format($total_price,2)?>บาท</h6>
    </div>
  </div>
</div>
</body>
</html>