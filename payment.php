<?php
session_start();
include('db.php');
if(isset($_POST['submit']) && isset($_POST['r_id']) && isset($_POST['b_id']) && isset($_POST['r_date']) && isset($_POST['checkbox']) && isset($_SESSION['t_distance']) && isset($_SESSION['s_name']) && isset($_SESSION['d_name']))
{
	$u_name=$_SESSION['u_name'];
	$sql3= "SELECT * FROM `user` WHERE u_name='$u_name'";
	$result3= mysql_query($sql3);
	while($row3=mysql_fetch_array($result3))
	{
		$u_id=$row3['u_id'];
	}
	date_default_timezone_set('Asia/Kolkata');
	$date=date('Y-m-d');
	$time=date('H:i');
	$r_id=$_POST['r_id'];
	$b_id=$_POST['b_id'];
	$r_date=$_POST['r_date'];
	$total_per_seat=0;
	$total=0;
	$t_distance=$_SESSION['t_distance'];
	$s_name=$_SESSION['s_name'];
	$d_name=$_SESSION['d_name'];
	$checkbox=$_POST["checkbox"];
	$i_count=count($checkbox);
	$i_counting=0;
	$query="select * from bus where b_id='$b_id'";
	$result=mysql_query($query);
	while($row=mysql_fetch_array($result))
	{
			/*$s_id=$row['s_id'];*/
		$b_type=$row['b_type'];
		$query1="select * from fare where f_id='$b_type'";
		$result1=mysql_query($query1);
		while($row1=mysql_fetch_array($result1))
		{
			$cost_per_km=$row1['fare'];
		}
	}
	$total_per_seat=$t_distance*$cost_per_km;
	$total=$i_count*$total_per_seat;
	/*for($i=0;$i<count($checkbox);$i++)
	{
		$s_id=$checkbox[$i];*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>GoBus:Index</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/index.css">
  <script src="js/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="js/jquery.js"></script>
  <script src="js/jquery-1.5.min.js"></script>
  <script>
function goBack() {
    window.history.back();
}
</script>
  <style>
  .fakeimg {
      height: 200px;
      background: #aaa;
  }
  </style>
</head>
<body>
<!--<div class="jumbotron text-center" style="margin-bottom:0">
 <!-- <h1>My First Bootstrap 4 Page</h1>
  <p>Resize this responsive page to see the effect!</p>
</div>-->
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
   <br>
   <div class="container">
   <div class="jumbotron">
   <form class="form-horizontal" action="book.php" method="POST" enctype="multipart/form-data" role="form" date-toggle="validator">
   <table width="100%" border="0">
  <tbody>
    <tr>
      <td width="20%">Selected Bus :</td>
      <td><input type="hidden" name="r_date" value="<?php echo $r_date; ;?>" >
      <input type="hidden" name="b_id" value="<?php echo $b_id ;?>" >
      <input type="hidden" name="r_id" value="<?php echo $r_id ;?>" >
      <?php
	  $query="select * from bus where b_id='$b_id'";
	$result=mysql_query($query);
	while($row=mysql_fetch_array($result))
	{
		$b_type=$row['b_name'];
		echo $row['b_name'];
	}
	  
	  ?>
      </td>
      <td>Source: <?php echo $s_name; ?></td>
     
      
      <td>Destination: <?php echo $d_name; ?></td>
      </tr>
    <tr>
      <td>Selected Seats :</td>
      <td colspan="3">
<?php
	for($i=0;$i<count($checkbox);$i++)
	{
		$s_id=$checkbox[$i];
		$query2="select * from seat where s_id='$s_id'";
		$result2=mysql_query($query2);
		while($row2=mysql_fetch_array($result2))
		{
			echo '<input type="checkbox" name="checkbox[]" value="'.$s_id.'" id="'.$s_id.'" checked="checked" onclick="return false;"/>';
			echo $s_no=$row2['s_no'].' &nbsp;&nbsp;';
		}
	}
?>
<?php
		$query3="select * from user where u_id='$u_id'";
		$result3=mysql_query($query3);
		while($row3=mysql_fetch_array($result3))
		{
			/*$s_id=$row['s_id'];*/
			$gocash=$row3['gocash'].'<br>';
		}
	?>
</td>
      </tr>
    <tr>
      <td>Cost Per Seat :&nbsp;</td>
      <td width="20%">&nbsp;<input name="c_p_s" type="hidden" id="c_p_s" value="<?php echo $total_per_seat; ?>"><?php echo $total_per_seat; ?></td>
      <td width="20%">Total Amount : &nbsp;</td>
      <td width="20%">&nbsp;<?php echo $total; ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>Available GoCash</td>
      <td>&nbsp;<?php echo $gocash; ?></td>
    </tr>
  </tbody>
</table>
<?php
	if($gocash>$total)
	{
	?>
<h1 class="display-4">Choose Payment</h1>
  <div class="input-group">
  <div class="input-group-prepend">
    <div class="input-group-text">
    <input name="radio" type="radio" id="radio" checked="checked" aria-label="Radio button for following text input">
    </div>
  </div>
  <input type="text" class="form-control" value="GoCash" readonly aria-label="Text input with radio button">
  </div>
  <br>
   <?php echo 'Your GoCash Amount is : '.$gocash; ?>
	<br><br>
    <input name="submit" type="submit" class="btn btn-primary btn-lg active" id="submit" value="Buy Tickets">
    </form>
<!--<a href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" >Buy Tickets</a>-->
<?php
	}
	/*if($gocash<$total)*/
	else
	{
		echo '</form>';
		echo '<br>';
		echo 'You Donot Have Sufficient Amount In Your GoBus A/C.';
		echo '<br>';
		echo 'Your GoCash Amount is : '.$gocash;
		echo '<button onclick="goBack()" class="btn btn-primary btn-lg active">Go Back</button>';
		/*echo '<a class="btn btn-primary btn-lg active" role="button" aria-pressed="true" onclick="goBack()>Home</a>';*/
	}
	?>
</div>
</div>
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
	echo '<script>alert("Enter Required Data First."); window.location.href="index.php";</script>';
	/*echo '<script>alert("Enter Required Data First."); window.location.href="seats.php?b='.$b_id.'&r='.$r_id.'&rd='.$r_date.'";</script>';*/
	echo mysql_error();
}
?>