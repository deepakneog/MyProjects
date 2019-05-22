<?php
include('../db.php');
$r_id=$_POST['r_id'];
$source=$_POST['source'];
$destination=$_POST['destination'];
$distance=$_POST['distance'];
$arrive_time=$_POST['arrive_time'];
$busstop=$_POST['busstop'];
$update=mysql_query("INSERT INTO sub_route_details (r_id,source,destination,distance,arrive_time,bus_stop)
VALUES
('$r_id','$source','$destination','$distance','$arrive_time','$busstop')");
if($update)
{
	echo '<script> alert("Entered Successfully"); window.location.href="route.php"; </script>';
}
else
{
	echo '<script> alert("Entered Unsuccessfully"); </script>';
	/*echo mysql_error();*/
}
?>
