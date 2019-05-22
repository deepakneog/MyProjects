<?php
include "../db.php";
if(isset($_GET['r_id']))
    {
		$id=$_GET['r_id'];
// sql to delete a record
	$sql = "DELETE FROM route WHERE r_id='$r_id'";

if (mysql_query($con, $sql)) 
	{
    	echo "Record deleted successfully";
    	header("Location: route.php");
	} 
else 
	{
    echo "Error deleting record: " . mysql_error($con);
	}
}

?> 
<?php
include "../db.php";
if(isset($_GET['rd_id']))
    {
		$id=$_GET['rd_id'];
// sql to delete a record
	$sql = "DELETE FROM sub_route_details WHERE rd_id='$rd_id'";

if (mysql_query($con, $sql)) 
	{
    	echo "Record deleted successfully";
    	header("Location: route.php");
	} 
else 
	{
    echo "Error deleting record: " . mysql_error($con);
	}
}

?> 