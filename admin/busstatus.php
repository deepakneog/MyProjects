<?php
include "../db.php";
if(isset($_GET['id']))
    {
		$id=$_GET['id'];
// sql to delete a record
	$sql="UPDATE `bus` SET `b_status`='0' WHERE `b_id`='$id'";
	if (mysql_query($sql)) 
	{
    	echo '<script> alert("Bus is no more available"); window.location.href="bus.php"; </script>';
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
	$sql="UPDATE `bus` SET `b_status`='1' WHERE `b_id`='$r_id'";
	if (mysql_query($sql)) 
	{
    	echo '<script> alert("Bus is now available"); window.location.href="bus.php"; </script>';
	} 
	else 
	{
		mysql_error();
    echo '<script> alert("Entered Unsuccessfully"); </script>'. mysql_error();
	}
}

?> 