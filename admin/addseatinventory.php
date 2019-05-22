<?php
include('../db.php');
if(isset($_POST['b_id']) && isset($_POST['s_no']))
{
	$b_id=$_POST['b_id'];
	$s_no=$_POST['s_no'];
	$update=mysql_query("INSERT INTO seat (b_id, s_no, status) VALUES ('$b_id','$s_no','1')");
	if($update)
	{
		echo '<script> alert("Entered Successfully"); window.location.href="seatinventory.php"; </script>';
	}
	else
	{
		/*echo '<script> alert("Entered Unsuccessfully"); </script>';*/
		echo mysql_error();
	}
}
else
{
	echo '<script> alert("Please Enter Required Data First"); window.location.href="seatinventory.php"; </script>';
}
?>