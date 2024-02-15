<?php include 'condb.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show product</title>
</head>
<body>
<?php include 'menu.php'; ?>
<br><br>
    <div class="container mt-4">
    <form method="POST" action="sh_pro_type.php">
    <div class="col-md-3">
<select class="form-select" name="key_type" aria-label="Default select example">
</select>
    </div>
    
    <div class="col-4">
    <button type="submit" name="btt1" class="btn btn-success">Search</button>
    <button type="submit" name="btt2" class="btn btn-success">All</button>
    </div>
    </div>
</form>

    <div class="row">
    <?php
    $perpage = 8;
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }
    $start = ($page -1) * $perpage;

    $key_word = @$_POST['keyword'];
    if($key_word !=""){
      $sql ="SELECT * FROM product WHERE pro_id='$key_word' OR pro_name like '%$key_word%' OR price <='$key_word' ORDER BY pro_id limit {$start}, {$perpage} ";
    }else{
      $sql ="SELECT * FROM product ORDER BY pro_id limit {$start}, {$perpage} ";
    }

    $hand = mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($hand)){
        $price = $row['price'];
    ?>
    <?php
    }
    ?>
    </div>
</body>
</html>