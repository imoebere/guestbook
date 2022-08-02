
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ### Bootstrap CSS ###-->
    <link href="CSS/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="CSS/bootstrap.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
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
        <div class="container-fluid"> 
            <div class="row  shadow bg-white mt-3 py-5">
                <div class="col-lg-4 col-md-4 col-sm-12  m-auto shadow bg-white mt-1 py-3">
                    <?php 
                    include 'DB/connect.php';
                        $select = "SELECT * FROM Admin_tbl";
                        $query=mysqli_query($conn,$select);
                        $row_num_Admin = mysqli_num_rows($query);     
                    ?>
                    Total Number of Admin
                    <div class="box">
                        <?php echo "<strong>{$row_num_Admin}</strong>"; ?>
                    </div>   
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12  m-auto shadow bg-white mt-1 py-3">
                    <?php 
                        $select = "SELECT * FROM Guest_tbl";
                        $query=mysqli_query($conn,$select);
                        $row_num_guest = mysqli_num_rows($query);
                    ?>
                    Total Number of Guest
                    <div class="box">
                        <?php echo "<strong>{$row_num_guest}</strong>"; ?>
                    </div>      
                </div>
               
                <div class="col-lg-4 col-md-4 col-sm-12  m-auto shadow bg-white mt-1 py-3">
                    <?php 
                        $select = "SELECT * FROM Reservation_Tbl";
                        $query=mysqli_query($conn,$select);
                        $row_num_res = mysqli_num_rows($query);
                    ?>
                    Total Number of Student
                    <div class="box">
                        <?php echo "<strong>{$row_num_res}</strong>"; ?>
                    </div>      
                </div>

               
                
            </div>
        </div>



        <!-- ========== BOOTSTRAP JS FILES ========== -->
       
        <script src="../JS/bootstrap.min.js"></script>
        <script src="../JS/bootstrap.bundle.js"></script>
        <script src="../JS/bootstrap.bundle.min.js"></script>
        <script src="../JS/bootstrap.min.js.map"></script>

 
    </body>
</html>
