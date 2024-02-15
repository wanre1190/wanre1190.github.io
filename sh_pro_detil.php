<?php include 'condb.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MYShop</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php include 'menu.php'; ?>
    <div class="container mt-4">

<div class="container">
  <div class="row">
  <?php
  $ids=$_GET['id'];
  $sql="SELECT * FROM product ,type WHERE product.type_id =type.type_id and product.pro_id='$ids'";
        $result = mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result);
        $price = $row['price'];
        ?>  
    <div class="col-md-4">
      <br>
    <img src="image/<?=$row['image']?>" width="340px" height="400" class="mt-3 p-2 my-2 border" />   
    </div>
    
    <div class="col-md-6">
      <br><br><br> <br> <br>
      <h5 class="text-dark"><?=$row['pro_name']?> </h5>
    ID: <?=$row['pro_id']?> <br> 
    ประเภทสินค้า: <?=$row['type_name']?> <br>
    รายละเอียด: <?=$row['detail']?> <br>
    ราคา <b class="text-danger"><?=number_format($price,2)?> </b> บาท <br>

    <a class="btn btn-outline-success mt-3" href="order.php?id=<?=$row['pro_id']?>" > Add Cart </a>
    </div>
    
  </div>
</div>
</div>

<?php
mysqli_close($conn);
?>

</body>
</html>
