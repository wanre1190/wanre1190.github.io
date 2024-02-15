<?php include 'condb.php'; ?>
<?php include 'menu.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Product</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
    <br><br>
<div class="row">
    
        <?php
        $sql="SELECT * FROM product ORDER BY pro_id ";
        $result = mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($result)){ 
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
<br>
        </div>
     
    <?php
    }
    mysqli_close($conn); 
    ?>

</div>
</div>

</body>
</html>