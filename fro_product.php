<?php
include 'condb.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-sm-6">
            <div class="alert alert-secondary h4 text-center mb-4 mt-4"  role="alert"> 
    เพิ่มข้อมูลสินค้า 
</div>  
<form name="form1" method="post" action="insert_product.php" enctype="multipart/form-data">

    <label>Product type:</label>
    <select class="form-select" name="typeID" >
        <?php
        $sql="SELECT * FROM type ORDER BY type_name";
        $hand=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($hand)){
        ?>
        <option value="<?=$row['type_id']?>"><?=$row['type_name']?></option>
        <?php
        }
        mysqli_close($conn);
        ?>
  
</select>
<div class="row g-2 mb-2">
    <div class="col-sm-6">
<table>Product Name:</table>
<input type="text" name="pro_name" class="form-control"  placeholder="ชื่อ..." required> 
</div>
<div class="col-sm-6">
<label >Price: </label>
<input type="number" name="price" class="form-control" placeholder="ราคา..." required > 
</div>
<div class="col-sm-12">
<label >Detail: </label>
<input type="text"  name="detail" class="form-control"  placeholder="รายละเอียด..." required >
</div> 
</div>
<div class="col-sm-6">
    <table>Image:</table>
    <input type="file" name="file1" class="form-control"  required> <br>
    </div>
   
<button type="submit" class="btn btn-primary"></i>submit</button>  
<a role="button" class="btn btn-danger" href="show_product.php"></i>Cancal</a>

<hr class="my-4">
</form>



            </div>
        </div>
    </div>
    
</body>
</html>