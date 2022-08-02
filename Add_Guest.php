
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
    <body class="bg-default">
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </symbol>
        </svg>
        <div class="container-fluid"> 
            <div class="row m-auto shadow bg-white mt-1 py-3">
                <div class="col-lg-3 col-md-3 col-sm-12 justify-content-center m-auto shadow bg-white mt-1 py-3 col-md-6">
                    <form action="" method="POST" class="p-4 p-md-5 border rounded-3 bg-light">
                    <?php 
                         include 'DB/connect.php';
                         if (isset($_POST['add-guest'])){
                            $Reserve = rand(1, 20);
                            $guest_id = rand(12345, 20000);
                            $select = "SELECT * FROM Guest_tbl where Res_Num ='$Reserve'";
                            $result=mysqli_query($conn,$select);
                            $row_num = mysqli_num_rows($result);
                              if ($row_num>0){?>
                                <div class="alert alert-danger d-flex align-items-center" role="alert">
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                    <div>
                                      Reservation Have Been Taken
                                    </div>
                                </div>
                                <?php }else{
                                    $name = trim($_POST['name']);
                                    $gender = trim($_POST['gender']);
                                    $Address = trim($_POST['Address']);
                                    $phone = trim($_POST['phone']);
                                    $password = trim($_POST['password']);
                        
                                    
                              $insert = "INSERT INTO Guest_tbl (Guest_name,Gender,Address,phone,Res_Num,pwd,Guest_ID)
                              VALUES('$name','$gender','$Address','$phone','$Reserve','$password','$guest_id')";
                              $result=mysqli_query($conn,$insert);
                              
                              $insert2 = "INSERT INTO Reservation_Tbl (Res_Num)
                              VALUES('$Reserve')";
                              $result2=mysqli_query($conn,$insert2);
                              if($insert && $insert2){
                                echo '<script type="text/javascript">alert("Guest Added Successfully!")</script>'.'<br>';
                                echo "<script type='text/javascript'>alert('Your Reservation Number {$Reserve}!')</script>".'<br>';
                                echo "<script type='text/javascript'>alert('Your ID {$guest_id}!')</script>".'<br>';
                                echo"<META http-equiv='refresh' content='0;URL=Add_Guest.php'>";
                              }} }
                    ?>
                        <h3 class="font-monospace"> Add Guest </h3>
                        <div class="form-floating mb-3">
                            <input type="text" required autocomplete="off" name="name" placeholder="FULL NAME" class="form-control"/>
                            <label for="floatingInput">FULL NAME</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select form-floating" name="gender" required id="inputGroupSelect01">
                                <option selected>Choose...</option>
                                <option value="Female">Female</option>
                                <option value="Male">Male</option>
                            </select>
                            <label for="floatingInput">GENDER</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" required autocomplete="off" name="Address" placeholder="ADDRESS" class="form-control"/>
                            <label for="floatingInput">ADDRESS</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" required autocomplete="off" name="phone" placeholder="MOBILE NUMBER" class="form-control"/>
                            <label for="floatingInput">MOBILE NUMBER</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" required autocomplete="off" name="password" placeholder="PASSWORD" class="form-control"/>
                            <label for="floatingInput">PASSWORD</label>
                        </div>
                        
                        <div class="form-floating mb-3">
                            <button type="submit" name="add-guest" class="w-100 btn btn-primary font-monospace">ADD GUEST</button>
                        </div>
                    </form>
                </div>
                <?php
                $select = "SELECT * FROM Guest_tbl";
                $query = mysqli_query($conn, $select);
            ?>
            <div class="col-lg-6 col-md-6 m-auto shadow bg-light mt-1 py-5">
                <h1 class="text-center bg-sucess font-monospace">BOOKED GUEST</h1>
                <table class="table" style="width:80%">
                    <thead>
                        <tr>
                        <th>Guest Name</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Mobile Number</th>
                        <th>Reservation Number</th>
                        <th>Password</th>
                        <th>Guest ID</th>
                        <th>Date/Time Register</th>
                        <th>Delete</th>
                        <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while($row = mysqli_fetch_assoc($query)){ ?>

                        <tr>
                        <td><?php echo $row['Guest_name']; ?></td>
                        <td><?php echo $row['Gender']; ?></td>
                        <td><?php echo $row['Address']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['Res_Num']; ?></td>
                        <td><?php echo $row['pwd']; ?></td>
                        <td><?php echo $row['Guest_ID']; ?></td>
                        <td><?php echo $row['datess']; ?></td>
                        <td><a href="Delete_Guest.php? new= <?php echo $row['id']; ?>" class="btn btn-danger btn-sm"><i class="uil uil-trash-alt login-icon"></i></a></td>
                        <td><a href="Edit_Guest.php? new= <?php echo $row['id']; ?>" class="btn btn-success bt-sm"><i class="uil uil-edit login-icon"></i></a></td>
                        </tr>
                        <?php }   ?>
                    </tbody>
                </table>
            </div>
            <?php
                $sel = "SELECT * FROM Reservation_Tbl";
                $query1 = mysqli_query($conn, $sel);
            ?>
            <div class="col-lg-3 col-md-3 m-auto shadow bg-light mt-1 py-5">
                <h1 class="text-center bg-sucess font-monospace">BOOKED NUMBER</h1>
                <table class="table" style="width:60%">
                    <thead>
                        <tr>
                        <th>Booked Number</th>
                        <th>Date/Time Register</th>
                        <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while($row1 = mysqli_fetch_assoc($query1)){ ?>

                        <tr>
                        <td><?php echo $row1['Res_Num']; ?></td>
                        <td><?php echo $row1['datess']; ?></td>
                        <td><a href="Delete_Num.php? num= <?php echo $row1['Res_id']; ?>" class="btn btn-danger btn-sm"><i class="uil uil-trash-alt login-icon"></i></a></td>
                        </tr>
                        <?php }  ?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
       


       <!-- ### Bootstrap JS ###-->
<script src="JS/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

 
    </body>
</html>
