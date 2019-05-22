<?php
include('../db.php');
$r_no=$_POST['r_no'];
$r_name=$_POST['r_name'];
$r_trip_no=$_POST['r_trip_no'];
$r_name=$_POST['r_name'];
$r_trip_no=$_POST['r_trip_no'];
$update=mysql_query("INSERT INTO route (r_no, r_name, r_trip_no,status)
VALUES
('$r_no','$r_name','$r_trip_no','1')");
if($update)
{
	echo '<script> alert("Entered Successfully"); window.location.href="route.php"; </script>';
}
else
{
	echo '<script> alert("Entered Unsuccessfully"); </script>';
}
/*header("location: route.php");*/
?>
