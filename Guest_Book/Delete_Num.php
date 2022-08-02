<?php
include 'DB/connect.php';
$id2 = $_GET['num'];
$delete2 = "DELETE FROM Reservation_Tbl WHERE id='$id2'";
$query2 = mysqli_query($conn, $delete2);
if($query2){
//echo '<script type="text/javascript">alert("Number Deleted!")</script>'.'<br>';
echo"<META http-equiv='refresh' content='0;URL=Add_Guest.php'>";
//header('location: View_Grade.php');
}
?>