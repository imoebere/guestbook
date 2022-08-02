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
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="Add_Guest.php">Add Guest</a>
        </li>
        
      </ul>
  </div>
</nav>
</header>

   <!--### The Main container ###-->
<div class="container-fluid px-4 py-5">
    <div class="row  g-lg-5 py-5">
        <!--### Nav Bar ###-->
      <div class="col-md-10 col-lg-6">
            
       
                <?php 
                include 'DB/connect.php';
                        $id = $_GET['new'];
                        $select = "SELECT * FROM Guest_tbl WHERE id='$id'";
                        $query=mysqli_query($conn,$select);
                        $row_num = mysqli_num_rows($query);
                        while ($row=mysqli_fetch_assoc($query)){
                                $Guest_name = $row ['Guest_name'];
                                $Address = $row ['Address'];
                                $phone = $row ['phone'];
                                $pwd = $row ['pwd'];
                        }?>
                   
            
             

            <form method="post" enctype="multipart/form-data" class="p-4  border rounded-3 bg-light">
            <h3>Update Guest Details</h3>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default"><strong>GUEST NAME:</strong></span>
                    <input type="text" class="form-control" value="<?php echo $Guest_name; ?>" name="name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default"><strong>ADDRESS:</strong></span>
                    <input type="text" class="form-control" value="<?php echo $Address; ?>"  name="add" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default"><strong>MOBILE NUMBER:</strong></span>
                    <input type="text" class="form-control" value="<?php echo $phone; ?>" name="number" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default"><strong>PASSWORD:</strong></span>
                    <input type="text" class="form-control" value="<?php echo $pwd; ?>"  name="password" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                
                <div class="input-group mb-3">
                    <button type="submit" class="w-100 btn btn-lg btn-primary" name="Update">Submit</button>
                </div>
            </form>   
           
            <?php  
                if(isset($_POST['Update'])){
                $name = trim($_POST['name']);
                $add = trim($_POST['add']);
                $number = trim($_POST['number']);
                $password = trim($_POST['password']);
                $update = "UPDATE Guest_tbl SET Guest_name='$name' Address='$add' phone='$number' pwd='$password'  WHERE id='$id'";
                $result=mysqli_query($conn,$update);
                if($result){
                    echo '<script type="text/javascript">alert("Updated Successfully!")</script>'.'<br>';
                    header('location: Add_Guest.php');
                    //echo"<META http-equiv='refresh' content='0;URL=Add_Guest.php'>";
                }

                }
            
            ?>
      </div>
    </div>
</div>
<!-- End The Main container-->








 <!-- ### Bootstrap JS ###-->
<script src="JS/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>