<?php
include('../db.php');
$b_name=$_POST['b_name'];
$r_name=$_POST['r_name'];
$start_time=$_POST['start_time'];
$update=mysql_query("INSERT INTO bus_route (b_id, r_id, start_time)
VALUES
('$b_name','$r_name','$start_time')");
if($update)
{
	echo '<script> alert("Entered Successfully"); window.location.href="bus.php"; </script>';
}
else
{
	//echo mysql_error();
	echo '<script> alert("Entered Unsuccessfully"); </script>';
}
?>