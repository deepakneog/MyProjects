<?php
session_start();
include('db.php');
if(isset($_SESSION['u_name']))
{
	$u_name=$_SESSION['u_name'];
	$sql="select * from user where u_name='$u_name'";
	$result=mysql_query($sql);
	while($row=mysql_fetch_array($result))
	{
		$u_id=$row['u_id'];
	}
	date_default_timezone_set('Asia/Kolkata');
	$date=date('Y-m-d');
	$time=date('H:i');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>GoBus:Cancel Tickets</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/index.css">
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">
   <img src="image/bus_PNG8629.png" width="50" height="55" alt="">&nbsp;GoBus
   </a>
	<!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">HOME</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="cancelation.php">CANCELLATION</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="tickets.php">TICKET</a>
    </li>
    <?php
	if(isset($_SESSION['u_name']))

		{
			$u_name=$_SESSION['u_name'];
			$sql="select * from user where u_name='$u_name'";
			$result=mysql_query($sql);
			while($row=mysql_fetch_array($result))
			{
				$go_cash=$row['gocash'];
			}
			
    ?>

    <li class="nav-item">
      <a class="nav-link" href="#myModal" data-toggle="modal">USER</a>
    </li>
   </ul>
   <ul class="navbar-nav ml-auto">
   <li class="nav-item">
       <a class="nav-link" href="#"><img src="image/5a29aa27c26c44.8724350315126799757964.png" width="30" height="25"><?php echo $go_cash; ?></a>
    </li>
   <li class="nav-item">
      <a class="nav-link" href="#">Welcome, <?php echo $u_name; ?></a>
    </li>
    <li class="nav-item">
      <a class="nav-link align" href="processlogout.php">Sign Out</a>
    </li>
    <?php 
		}
		else
		{
			?>
            <li class="nav-item">
      <a class="nav-link" href="#myModal" data-toggle="modal">USER</a>
    </li>
   </ul>
            <?php
		}
	?>
    </ul>
   </nav>
<?php
if(isset($_POST['search']) && isset($_POST['res_id']))
{
?>
<table width="100%" border="0">
  <tr>
    <td width="20%">&nbsp;</td>
    <td width="20%">&nbsp;</td>
    <td width="20%">&nbsp;</td>
    <td width="20%">&nbsp;</td>
  </tr>
<?php
	$res_id=$_POST['res_id'];
?>
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;Reservation ID :</td>
    <td>&nbsp;<?php echo $res_id; ?></td>
    <td>&nbsp;</td>
</tr>
<?php
	$sql1="select * from reservation where res_id='$res_id' && u_id='$u_id'";
	$result1=mysql_query($sql1);
	if(mysql_num_rows($result1)<1)
	{
		echo '<script> alert("Your reservation ID is incorrect"); window.location.href="cancelation.php"; </script>';
	}
	else
	{
		while($row1=mysql_fetch_array($result1))
		{
			$seat=$row1['s_id'];
			$re_id=$row1['re_id'];
			$r_date=$row1['reservation_date'];
			$status=$row1['status'];
			$sql2="select * from seat where s_id='$seat' ORDER BY s_no DESC";
			$result2=mysql_query($sql2);
			while($row2=mysql_fetch_array($result2))
			{
				$seat_no=$row2['s_no'];
?>
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;Seats :</td>
    <td>&nbsp;<?php echo $seat_no; ?></td>
    <?php
	if($date<$r_date)
	{
		if($status==1)
		{
			echo '<td>&nbsp;<a href="cancel.php?r='.$re_id.'">Cancel</a></td>';
		}
		else
		{
			echo '<td>&nbsp;<a href="index.php">Already Canceled</a></td>';
		}
	}
	else
	{
		echo '<td>&nbsp;<a href="index.php">Already Used</a></td>';
	}
	?>
</tr>

<!--<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
</tr>-->
<?php
			}
		}
	}
?>
</table>
</form>
<div class="container-fluid mt-3">

<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Designed and developed by</p>
  <p>Mriganka and Deepak</p>
  <p><strong>GoBus</strong><strong>™</strong></p>
</div>
</div>
<?php
}
else
{
?>
<form class="form-horizontal" action="cancelation.php" method="POST" enctype="multipart/form-data" role="form" date-toggle="validator">
 <table width="100%" border="0">
  <tr>
    <td width="20%">&nbsp;</td>
    <td width="20%">&nbsp;</td>
    <td width="20%">&nbsp;</td>
    <td width="20%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;Enter Reservation ID</td>
    <td>&nbsp;<input name="res_id" type="text" required id="res_id"></td>
    <td><input name="search" type="submit" id="search">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
<div class="container-fluid mt-3">

<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Designed and developed by</p>
  <p>Mriganka and Deepak</p>
  <p><strong>GoBus</strong><strong>™</strong></p>
</div>
</div>
<?php
	}
?>
</body>
</head>
</html>
<?php
}
else
{
	echo '<script> alert("You Need To Login First."); window.location.href="index.php"; </script>';
}
?>


