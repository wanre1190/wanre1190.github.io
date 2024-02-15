<?php
session_start();
include 'condb.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php include 'menu.php'; ?>
ิ<br>
<div class="container"> 
    <form id="form1" method="POST" action="insert_cart.php">
    <div class="row">
    <div class="col-md-10" >
    <div class="alert alert-secondary h4 text-center"  role="alert"> 
    สั่งซื้อสินค้า
</div>

            <table  class = "table table-hover">
                <tr>
                    <th>ลำดับที่</th>
                    <th>ขื่อสินค้า</th>
                    <th>ราคา</th>
                    <th>จำนวน</th>
                    <th>ราคารวม</th>
                    <th>เพิ่ม - ลบ</th>
                    <th>ลบ</th>
                </tr>
    <?php
    //echo "Nongyao";
    $Total = 0;
    $sumPrice = 0;
    $m = 1;
    for($i=0; $i <= (int)$_SESSION["intLine"]; $i++){
        if(($_SESSION["strProductID"][$i]) != ""){
            $sql1="select * from product where pro_id ='". $_SESSION["strProductID"][$i] ."' " ;
            $result1 = mysqli_query($conn,$sql1);
            $row_pro = mysqli_fetch_array($result1);

            $_SESSION['price'] = $row_pro["price"];
            $Total = $_SESSION["strQty"][$i];
            $sum = $Total * $row_pro["price"];
            $sumPrice = $sumPrice + $sum;
            $_SESSION["sum_price"]= $sumPrice;
            //$sumPrice = number_format($sumPrice,2);


    ?>
                <tr>
                    <td><?=$m?></td>
                    <td>
                        <image src="image/<?=$row_pro['image']?>" width="80" height="100" class="border">
                    <?=$row_pro['pro_name']?>
                    </td>
                    <td><?=$row_pro['price']?></td>
                    <td><?=$_SESSION["strQty"][$i]?></td>
                    <td><?=$sum?></td>
                    <td>
                        <a href="order.php?id=<?=$row_pro['pro_id']?>" class="btn btn-outline-primary">+</a>
                        <?php if($_SESSION["strQty"][$i] > 1){ ?>
                        <a href="order_del.php?id=<?=$row_pro['pro_id']?>" class="btn btn-outline-primary">-</a>
                        <?php } ?>

                    </td>


                    <td><a href="pro_delete.php?Line=<?=$i?>"><image src="image/delete.png" width="30" ></a></td>
                </tr>
 <?php
$m=$m+1;
}
}
mysqli_close($conn);
 ?>  
 <tr>
    <td class="text-end" colspan="4">รวมเป็นเงิน</td>
    <td class="text-center"><?=$sumPrice?></td>
    <td>บาท</td>
 </tr>   
 

</table>
<div style="text-align:right">
<a href ="show_pro.php"> <button type="button" class="btn btn-outline-secondary"> เลือกสินค้า </button> </a>
<button type="submit" class="btn btn-outline-primary">ยืนยันคำสั่งซื้อ</button>
</div>
</div>
<br><br><br>
<div class="row">
    <div class="col-md-6">
    <div class="alert alert-success" h3 role="alert"> ข้อมูลสำหรับจัดส่งสินค้า </div>
    
    <div class="row g-2 mb-2">
                  <div class="col-sm-8">
                     <table class="form-table">Name Surname</table>
                     <input type="text" name="cus_name" class="form-control" required placeholder="ชื่อ...">
                  </div>

                  <div class="col-sm-12">
                     <table class="form-table">Shipping address</table>
                     <textarea name="cus_add" class="form-control" required placeholder="ที่อยู่..." rows="3"></textarea>
                  </div>

                  <div class="col-sm-8">
                     <table class="form-table">Telephone</table>
                     <input type="number" name="telephone" class="form-control" required placeholder="เบอร์โทร...">
                     <br><br>
                  </div>
               </div>

    </div>
    </div>
</form>
</div>
</body>
</html>