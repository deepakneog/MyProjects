<?php
session_start();
include('db.php');
if(isset($_POST['search']) && isset($_POST['r_id']) && isset($_POST['source']) && isset($_POST['destination']) && isset($_POST['date']))
{
	date_default_timezone_set('Asia/Kolkata');
	$date=date('Y-m-d');
	$time=date('H:i');
	$r_id=$_POST['r_id'];
	$_SESSION['source']=$source=$_POST['source'];
	$_SESSION['destination']=$destination=$_POST['destination'];
	$r_date=$_POST['date'];
	$date1=date_create("$date");
	$date2=date_create("$r_date");
	$diff=date_diff($date1,$date2);
	$date_difference=$diff->format("%R%a days");
	if($date_difference<0)
	{
		echo '<script> alert("Cannot book back date"); window.location.href="index.php"; </script>';
	}
	else
	{
		$queryS="select * from sub_route_details where rd_id='$source'";
		$resultS=mysql_query($queryS);  
 		while($rowS=mysql_fetch_array($resultS))
		{ 
			$_SESSION['s_name']=$source_name=$rowS['source'];
		}
		$queryD="select * from sub_route_details where rd_id='$destination'";
		$resultD=mysql_query($queryD);  
 		while($rowD=mysql_fetch_array($resultD))
		{ 
			$_SESSION['d_name']=$destination_name=$rowD['destination'];
		}
		if($source_name==$destination_name)
		{
			echo '<script> alert("Source and destination cannot be same"); window.location.href="index.php"; </script>';
		
		}
		else
		{
			$query="select * from bus_route where r_id='$r_id'";
			$result=mysql_query($query);
			if(mysql_num_rows($result)>0)
			{
				include('busandrouteinfo.php');
			}
			else
			{
				echo 'No Bus is available in this Route.';
			}
		}
	}
}
?>