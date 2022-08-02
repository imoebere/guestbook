<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ### Bootstrap CSS ###-->
    <link href="CSS/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="CSS/bootstrap.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 
    <title>Guest Booking System</title>
</head>
<body>
     <!--### Nav Bar ###-->
<header>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Guest Booking System</a>
  </div>
</nav>
</header>
   <!--### The Main container ###-->
   <div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">

      <!--### Login Container ###-->
      <div class="col-md-10 mx-auto col-lg-5">
        <form method="post" enctype="multipart/form-data" class="p-4 p-md-5 border rounded-3 bg-light">
        <h4>LOGIN </h4>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" autocomplete="off" id="floatingInput" required placeholder="name@example.com" name="username">
            <label for="floatingInput">Username</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" required placeholder="Password" name="pwd">
            <label for="floatingPassword">Password</label>
          </div>
         
          <button class="w-100 btn btn-lg btn-primary" type="submit" name="Login">Login</button>
          <hr class="my-4">
        
         <?php 
          session_start();
          include 'DB/connect.php';
          if(isset($_POST['Login'])){
              $username = trim($_POST['username']);
              $pwd = trim($_POST['pwd']);
              $select = "SELECT * FROM Admin_tbl where username ='$username' and pwd = '$pwd'";
              $query=mysqli_query($conn,$select);
              $row_num = mysqli_num_rows($query);
              while ($row=mysqli_fetch_assoc($query)){
                    $Admin_id = $row ['Admin_id'];
                    $username = $row ['username'];
              }
              if ($row_num>0){
                $_SESSION['go'] = $Admin_id;
                //header error
                header('location: dashboard.php');
              }
              $sel = "SELECT * FROM Guest_tbl where Guest_ID ='$username' and pwd = '$pwd'";
              $query1=mysqli_query($conn,$sel);
              $row_num1 = mysqli_num_rows($query1);
              while ($row1=mysqli_fetch_assoc($query1)){
                    $id = $row1 ['id'];
                    $Guest_name = $row1 ['Guest_name'];
              }
                    if($row_num1>0){
                      $_SESSION['gone'] = $id;
                      // $insert = "INSERT INTO Login_Tbl (Email,pwd)
                      //     VALUES('$username','$pwd')";
                      //     $result=mysqli_query($conn,$insert);
                          echo"<META http-equiv='refresh' content='0;URL=guest.php'>";
                      
                        }else{?>
                          <div class="alert alert-warning">
                              <strong>Invalid Login Detail!</strong><br/>
                          </div>
                        <?php } } ?>
        </form>
      </div>
    </div>
  </div>
<!-- End The Main container-->








 <!-- ### Bootstrap JS ###-->
<script src="JS/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>