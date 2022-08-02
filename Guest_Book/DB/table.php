<?php 
include ('connect.php'); 

//Guest table 
$Guest_tbl = "create table Guest_tbl (
                id int not null AUTO_INCREMENT PRIMARY KEY,
                Guest_name VARCHAR(200) not null,
                Gender VARCHAR(7) not null,
                Address VARCHAR(200) not null,
                phone VARCHAR(15) not null,
                Res_Num VARCHAR(10) not null,
                pwd VARCHAR(15) NOT NULL,
                Guest_ID VARCHAR(6) NOT NULL,
                datess TIMESTAMP
                )";
if (mysqli_query($conn, $Guest_tbl)) {
    echo "Guest Table created successfully"."<br/>";
} else {
    echo "Error creating Guest Table: "."<br/>" . mysqli_error($conn);
}
//Reservation Table
$Reservation_Tbl = "create table Reservation_Tbl (
            Res_id int not null AUTO_INCREMENT PRIMARY KEY,
            Res_Num VARCHAR(10) not null,
            datess TIMESTAMP
            )";
    
if (mysqli_query($conn, $Reservation_Tbl)) {
    echo "Reservation Table created successfully"."<br/>";
} else {
    echo "Error creating Reservation Table: "."<br/>" . mysqli_error($conn);
}
//Admin table
$Admin_tbl = "create table Admin_tbl (
    Admin_id int not null AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    pwd VARCHAR(50) NOT NULL,
    datess TIMESTAMP
    )";
$sqltr="SELECT * FROM Admin_tbl WHERE username='Admin' and pwd='Password'";
$resultr=mysqli_query($conn,$sqltr);
$row_num = mysqli_num_rows($resultr);
if ($row_num>0){
echo 'Already exist';
}else {
$insert="INSERT INTO Admin_tbl (username,pwd)VALUES('Admin','Password')";
$check=mysqli_query($conn, $insert);
if (mysqli_query($conn, $Admin_tbl)) {
    echo "Admin Table created successfully"."<br/>";
} else {
    echo "Error creating Admin Table: "."<br/>" . mysqli_error($conn);
}
}
 
mysqli_close($conn);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Table Creation</title>
</head>

<body>
</body>
</html>