<?php
session_start();
include('db.php');
if(isset($_GET['b']) && isset($_GET['r']) && isset($_GET['rd']))
{
	date_default_timezone_set('Asia/Kolkata');
	$date=date('Y-m-d');
	$time=date('H:i');
	$b_id=$_GET['b'];
	$r_id=$_GET['r'];
	$r_date=$_GET['rd'];
	$date1=date_create("$date");
	$date2=date_create("$r_date");
	$diff=date_diff($date1,$date2);
	$date_difference=$diff->format("%R%a days");
	if($date_difference<0)
	{
		echo 'You Cannot Book Back Dated Bus.';
	}
	else
	{
		include('booking.php');
	}
}
?>