<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show product</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php include 'menu.php'; ?>
    <div class="container mt-4">
      
    <div class="row">
    <?php
    include 'condb.php';

    $perpage = 8;
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }
    $start = ($page -1) * $perpage;

    $key_word = @$_POST['keyword'];
    if($key_word !=""){
      $sql = "SELECT * FROM product WHERE pro_id='$key_word' or pro_name like '%$key_word%' or price <= '$key_word' 
      ORDER BY pro_id limit {$start}, {$perpage} ";
    }else{
      $sql = "SELECT * FROM product ORDER BY pro_id limit {$start}, {$perpage} ";
    }

    $hand = mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($hand)){
        $price = $row['price'];
    ?>

<div class="col-sm-3">
        <div class="text-center">
        <img src="image/<?=$row['image']?>" width="150" height="200" class="mt-5 p-2 my-2 border">  <br>
        ID: <?=$row['pro_id']?> <br>
       <h6 class="text-success"><?=$row['pro_name']?> </h6> 
       ราคา <b class="text-danger"> <?=number_format($price,2)?> </b> บาท <br>
      <a class="btn btn-outline-success mt-3" href="sh_pro_detil.php?id=<?=$row['pro_id']?>" > รายละเอียด </a>
    </div>
   <?php
    }
    //mysqli_close($conn);
   ?>

  </div> <!-- end row -->
  <?php
  $sql1 ="SELECT * FROM product";
  $query1 = mysqli_query($conn,$sql1);
  $total_record = mysqli_num_rows($query1);
  $total_page = ceil($total_record / $perpage);
  ?> 
  <br> <br> <br>
<nav aria-label="Page navigation example ">
  <ul class="pagination justify-content-center">
    <li class="page-item"><a class="page-link" href="h_product.php?page=1">Previous</a></li>
    <?php for($i=1;$i<=$total_page;$i++) {?>
    <li class="page-item"><a class="page-link" href="sh_product.php?page=<?=$i?>"><?=$i?></a></li>
    <?php }  ?>
    <li class="page-item"><a class="page-link" href="sh_product.php?page=<?=$total_page?>">Next</a></li>
  </ul>
</nav>

<?php mysqli_close($conn);?>

    </div> <!-- end container -->

</body>
</html>