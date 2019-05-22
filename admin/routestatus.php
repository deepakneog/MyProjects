<?php
include "../db.php";
if(isset($_GET['id']))
    {
		$id=$_GET['id'];
// sql to delete a record
	$sql="UPDATE `route` SET `status`='0' WHERE `r_id`='$id'";
	if (mysql_query($sql)) 
	{
    	echo '<script> alert("Route is no more available"); window.location.href="route.php"; </script>';
	} 
	else 
	{
		mysql_error();
    echo '<script> alert("Entered Unsuccessfully"); </script>'. mysql_error();
	}
}
if(isset($_GET['r_id']))
    {
		$r_id=$_GET['r_id'];
// sql to delete a record
	$sql="UPDATE `route` SET `status`='1' WHERE `r_id`='$r_id'";
	if (mysql_query($sql)) 
	{
    	echo '<script> alert("Route is now available"); window.location.href="route.php"; </script>';
	} 
	else 
	{
		mysql_error();
    echo '<script> alert("Entered Unsuccessfully"); </script>'. mysql_error();
	}
}

?> 