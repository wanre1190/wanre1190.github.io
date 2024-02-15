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

<div class="alert alert-dark h4 text-center mb-4 mt-4"  role="alert"> แสดงข้อมูลสินค้า </div>  
<a class="btn btn-outline-success mb-4" href="fro_product.php" role="button">Add+</a>

<table class="table table-striped ">

        <tr>
            <th>รหัสสินค้า</th>
            <th>ชื่อสินค้า</th>
            <th>ประเภทสินค้า</th>
            <th>ราคา</th>
            <th>รายละเอียด</th>
            <th>รูปภาพ</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <div class="row">
        <?php
        $sql="SELECT * FROM product ,type WHERE product.type_id =type.type_id ";
        $result = mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($result)){ 
        ?>
            <tr>
                <td><?=$row["pro_id"]?> </td>
                <td><?=$row["pro_name"]?> </td>
                <td><?=$row["type_name"]?> </td>
                <td><?=$row["price"]?> </td>
                <td><?=$row["detail"]?> </td>
                <td><img src="image/<?=$row["image"]?>" width="100px" height="130px" > </td> 
                <td><a href="edit_product.php?id=<?=$row["pro_id"]?>" class="btn btn-warning"> Edit</a></td>
                <td><a href="delete_product.php?id=<?=$row["pro_id"]?>" class="btn btn-danger" onclick="Del(this.href);return false;"> Delete</a></td>
                
            </tr>
            
        <?php
        }
        mysqli_close($conn); 
        ?>
    </table>
</div>
</div>
</body>
</html>