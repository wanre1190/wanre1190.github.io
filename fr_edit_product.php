<?php
include 'condb.php';
$idpro = $_GET['id'];
$sql1 = "SELECT * FROM product WHERE pro_id='$idpro'";
$result = mysqli_query($conn,$sql1);
$rs = mysqli_fetch_array($result);
$p_typeID = $rs['type_id'];
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
    แก้ไขข้อมูลสินค้า 
</div>  
<form name="form1" method="post" action="update_prouct.php" enctype="multipart/form-data">

<table>Product Code</table>
<input type="text" name="pro_id" class="form-control" readonly value=<?=$rs['pro_id']?> > 
<table>Product Name</table>
<input type="text" name="pro_name" class="form-control" value=<?=$rs['pro_name']?> > 

<label>Product type: </label>
    <select class="form-select" name="typeID" >
    <?php
        $sql="SELECT * FROM type ORDER BY type_name";
        $hand=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($hand)){
            $ttypeID = $row['type_id'];
        ?>
        <option value="<?=$row['type_id']?>" <?php if($p_typeID==$ttypeID){echo "selected=selected";}?> >  
        <?=$row['type_name']?></option>
        <?php
        }
        mysqli_close($conn);
        ?>
</select>
<label >Price: </label>
<input type="number" name="price" class="form-control" value=<?=$rs['price']?> > <br>
<label >Detail: </label>
<input type="text" name="Detail" class="form-control" placeholder="รายละเอียด..." required > <br>
<table>Image: </table>
<img src="image/<?=$rs['image']?>" width="120"> <br> <br>
<input type="file" name="file1" > <br> <br>
<input type="hidden" name="txtimg" class="form-control" value=<?=$rs['image']?> >

<button type="submit" class="btn btn-primary">Update</button>  
<a class="btn btn-danger" href="show_product.php" role="button">Cancal</a>
</form>
            </div>
        </div>
    </div>
    
</body>
</html>