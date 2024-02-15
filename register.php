<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
    <br><br>
    <div class="row">
       <div class="col-md-6 bg-light text-dark">
      <br>
  
    <div class="alert alert-primary h5" role="alert">
        สมัครสมาชิก
        </div>
        
        <form method="POST" action="insert_register.php">
<div class="row g-3 mb-3">
    <div class="col-sm-6">    
        <label >Firstname: </label>
         <input type="text" name="firstname" class="form-control" placeholder="ชื่อ..." require> 
    </div>
    <div class="col-sm-6">
         <label >Surname: </label>
         <input type="text" name="surname" class="form-control" placeholder="นามสกุล..." require> 
    </div>
</div>
         <label >Telephone: </label>
         <input type="number" name="phone" class="form-control mb-2" placeholder="เบอร์โทรศัพท์..." require> 

         <label >Username: </label>
         <input type="text" name="username" maxlength="10" class="form-control mb-2" placeholder="ชื่อผู้ใช้..." require> 
  
  
         <label >Password: </label>
         <input type="password" name="password" maxlength="10" class="form-control mb-2" placeholder="รหัสผ่าน..." require> <br>

        <input type="submit" name="submit" value="Submit" class="btn btn-primary">  
        <input type="reset" name="cancel" value="Cancel" class="btn btn-danger"> <br>
      

        <a href="login.php">Login</a>
        </form>
        <hr class="my-4">
    </div>
    </div>
   
  </div>
</body>
</html>