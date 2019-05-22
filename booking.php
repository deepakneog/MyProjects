<?php 
include ('db.php');
if(isset($_POST['seatId']))
{
	echo 'sh';
}
if(isset($_GET['b']))
{
	$b_id=$_GET['b'];
?>
<!DOCTYPE html>
<html>
<head>
<title>GoBus Ticket Reservation</title>
<!-- for-mobile-apps -->
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="booking files/css/jquery.seat-charts.css">
  <link rel="stylesheet" href="booking files/css/style.css">
  <script src="js/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="js/jquery.js"></script>
<style>
input[type=checkbox] {
display:none;
}
 
input[type=checkbox] + label
{
background: #999;
height: 16px;
width: 16px;
display:inline-block;
padding: 0 0 0 0px;
}
input[type=checkbox]:checked + label
{
background: #0080FF;
height: 16px;
width: 16px;
display:inline-block;
padding: 0 0 0 0px;
}
input[type=checkbox]:disabled + label
{
background:#C00;
height: 16px;
width: 16px;
display:inline-block;
padding: 0 0 0 0px;
}
</style>
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
<div class="content">
	<h1>GoBus Ticket Reservation</h1>
    <form class="form-horizontal" action="payment.php" method="POST" enctype="multipart/form-data" role="form" date-toggle="validator">
	<div class="main">
		<h2>Book Your Seat Now?</h2>
		<div class="wrapper">
			<div id="seat-map">
				<div class="front-indicator"><h3>Front</h3></div>
			</div>
			<div class="booking-details">
						<div id="legend">
                        <table width="100%" border="1">
  <tbody>
    <tr>
      <td width="10%">&nbsp;</td>
      <td width="10%">&nbsp;</td>
      <td width="10%">&nbsp;</td>
      <td width="10%">&nbsp;</td>
      <td width="10%">&nbsp;</td>
      <td width="10%">&nbsp;</td>
      <td width="10%">&nbsp;</td>
      <td width="10%">&nbsp;</td>
    </tr>
    <?php
	echo '
    <input name="r_id" type="hidden" id="r_id" value="'.$r_id.'">
    <input name="b_id" type="hidden" id="b_id" value="'.$b_id.'">
    <input name="r_date" type="hidden" id="r_date" value="'.$r_date.'">';
	?>
    <?php
	$sl_no=1;
	$st_no=1;
	$query="select * from seat where b_id='$b_id' ORDER BY s_no ASC";
	$result=mysql_query($query);
	while($row=mysql_fetch_array($result))
	{
		$s_id=$row['s_id'];
		$s_no=$row['s_no'];
		$query10="select * from reservation where b_id='$b_id' && s_id='$s_id'  && r_id='$r_id' && reservation_date='$r_date' && status=1";
		$result10=mysql_query($query10);
		if(mysql_num_rows($result10)<=0)
		{
			$status=1;
		}
		else
		{
			$status=0;
		}
		if(isset($_POST['s_id']))
		{
			echo 'sh';
		}
		if($s_no<=30)
		{
			if($sl_no==1)
			{
				echo '
				<tr>
      			<td> '.$st_no.'</td>';
				if($status==1)
				{
      				echo '<td><input type="checkbox" name="checkbox[]" value="'.$s_id.'" id="'.$s_id.'"/><label for="'.$s_id.'"></label> </td>';
				}
				else if($status==0)
				{
					echo '<td><input type="checkbox" disabled="disabled" name="checkbox[]" value="'.$s_id.'" id="'.$s_id.'"/><label for="'.$s_id.'"></label> </td>';
				}
				$sl_no=$sl_no+1;
			}
			else if($sl_no==2)
			{
				echo '
				<td>&nbsp;</td>
      			<td>&nbsp;</td>
      			<td> '.$st_no.'</td>';
				if($status==1)
				{
      				echo '<td><input type="checkbox" name="checkbox[]" value="'.$s_id.'" id="'.$s_id.'"/><label for="'.$s_id.'"></label> </td>';
				}
				else if($status==0)
				{
					echo '<td><input type="checkbox" disabled="disabled" name="checkbox[]" value="'.$s_id.'" id="'.$s_id.'"/><label for="'.$s_id.'"></label> </td>';
				}
				$sl_no=$sl_no+1;
			}
			else if($sl_no==3)
			{
				echo '
				<td> '.$st_no.'</td>';
				if($status==1)
				{
      				echo '<td><input type="checkbox" name="checkbox[]" value="'.$s_id.'" id="'.$s_id.'"/><label for="'.$s_id.'"></label> </td>';
				}
				else if($status==0)
				{
					echo '<td><input type="checkbox" disabled="disabled" name="checkbox[]" value="'.$s_id.'" id="'.$s_id.'"/><label for="'.$s_id.'"></label> </td>';
				}
    			echo '</tr>';
				$sl_no=1;
			}
		}
		else if($s_no>=31 && $sl_no<=34)
		{
			if($sl_no==1)
			{
				echo '
				<tr>
      			<td> '.$st_no.'</td>';
				if($status==1)
				{
      				echo '<td><input type="checkbox" name="checkbox[]" value="'.$s_id.'" id="'.$s_id.'"/><label for="'.$s_id.'"></label> </td>';
				}
				else if($status==0)
				{
					echo '<td><input type="checkbox" disabled="disabled" name="checkbox[]" value="'.$s_id.'" id="'.$s_id.'"/><label for="'.$s_id.'"></label> </td>';
				}
				$sl_no=$sl_no+1;
			}
			else if($sl_no==2)
			{
				echo '
      			<td> '.$st_no.'</td>';
				if($status==1)
				{
      				echo '<td><input type="checkbox" name="checkbox[]" value="'.$s_id.'" id="'.$s_id.'"/><label for="'.$s_id.'"></label> </td>';
				}
				else if($status==0)
				{
					echo '<td><input type="checkbox" disabled="disabled" name="checkbox[]" value="'.$s_id.'" id="'.$s_id.'"/><label for="'.$s_id.'"></label> </td>';
				}
				$sl_no=$sl_no+1;
			}
			else if($sl_no==3)
			{
				echo '
				<td> '.$st_no.'</td>';
				if($status==1)
				{
      				echo '<td><input type="checkbox" name="checkbox[]" value="'.$s_id.'" id="'.$s_id.'"/><label for="'.$s_id.'"></label> </td>';
				}
				else if($status==0)
				{
					echo '<td><input type="checkbox" disabled="disabled" name="checkbox[]" value="'.$s_id.'" id="'.$s_id.'"/><label for="'.$s_id.'"></label> </td>';
				}
				$sl_no=$sl_no+1;
			}
			else if($sl_no==4)
			{
				echo '
				<td> '.$st_no.'</td>';
				if($status==1)
				{
      				echo '<td><input type="checkbox" name="checkbox[]" value="'.$s_id.'" id="'.$s_id.'"/><label for="'.$s_id.'"></label> </td>';
				}
				else if($status==0)
				{
					echo '<td><input type="checkbox" disabled="disabled" name="checkbox[]" value="'.$s_id.'" id="'.$s_id.'"/><label for="'.$s_id.'"></label> </td>';
				}
    			echo '</tr>';
				$sl_no=1;
			}
			
		}
		$st_no=$st_no+1;
	}
	?>
<!--    <tr>
      <td> 1</td>
      <td><input type='checkbox' name='checkbox[]' value='valuable' id="'.$s_id.'"/><label for="checkbox[]"></label> </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td> 2</td>
      <td><input type='checkbox' name='checkbox[]' value='valuable' id="'.$s_id.'"/><label for="checkbox[]"></label></td>
      <td> 3</td>
      <td><input type="checkbox" name="thing2" value="valuable" id="thing2"/><label for="thing2"></label></td>
    </tr>-->
   <!-- <tr>
      <td> 4</td>
      <td><input name='thing3' type='checkbox' disabled="disabled" id="thing3" value='valuable'/><label for="thing3"></label></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td> 5</td>
      <td><input type='checkbox' name='thing4' value='valuable' id="thing4"/><label for="thing4"></label></td>
      <td> 6</td>
      <td><input type='checkbox' name='thing4' value='valuable' id="thing4"/><label for="thing4"></label></td>
    </tr>
    <tr>
      <td> 7</td>
      <td><input type='checkbox' name='thing5' value='valuable' id="thing5"/><label for="thing5"></label></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td> 8</td>
      <td><input type='checkbox' name='thing6' value='valuable' id="thing6"/><label for="thing6"></label></td>
      <td> 9</td>
      <td><input type='checkbox' name='thing6' value='valuable' id="thing6"/><label for="thing6"></label></td>
    </tr>
    <tr>
      <td> 10</td>
      <td><input type='checkbox' name='thing5' value='valuable' id="thing5"/><label for="thing5"></label></td>
      <td> 11</td>
      <td><input type='checkbox' name='thing5' value='valuable' id="thing5"/><label for="thing5"></label></td>
      <td> 12</td>
      <td><input type='checkbox' name='thing6' value='valuable' id="thing6"/><label for="thing6"></label></td>
      <td> 13</td>
      <td><input type='checkbox' name='thing6' value='valuable' id="thing6"/><label for="thing6"></label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
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
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>-->
  </tbody>
</table>
                        </div>
						<!--<h3> Selected Seats (<span id="counter">0</span>):</h3>
						<ul id="selected-seats" class="scrollbar scrollbar1"></ul>-->
						
						<!--Total: <b>₹<span id="total">0</span></b>
                        <input name="total" type="hidden" id="total" value="g">-->
						<input name="submit" type="submit" class="checkout-button" id="submit">
						<!--<button class="checkout-button">Pay Now</button>-->
			</div>
			<div class="clear"></div>
		</div>
		
	</div>
    </form>
</div>
</body>
</html>
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
	echo 'Donnot Try To Be Over Smart.';
}
?>