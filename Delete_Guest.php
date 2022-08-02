<?php
include 'DB/connect.php';
$id = $_GET['new'];
$delete = "DELETE FROM Guest_tbl WHERE id='$id'";
$query = mysqli_query($conn, $delete);
if($query){
echo '<script type="text/javascript">alert("Guest Deleted!")</script>'.'<br>';
echo"<META http-equiv='refresh' content='0;URL=Add_Guest.php'>";
//header('location: View_Grade.php');
}
?>