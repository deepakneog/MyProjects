<?php
session_start();
include('db.php');
/*if(isset($_SESSION['u_name']))
{*/
?>
<?php
if (isset($_POST["submit"])) 
{
		$r_id=$_POST["r_id"];
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

<div class="container-fluid mt-3">
    <div class="row">
  <div class="col-md-6">
    <th><table width="100%" border="0" align="center">
      <tr>
        <td colspan="3" style="text-align: left; color: #FF0000; font-weight: bolder;">Route Information</td>
      </tr>
    </table>      <strong></strong> </div>
  </div>
  <div class="row">
  <div class="col-md-6">
  <table id="resultTable">
						<thead>
							<tr>
								<th  style="solid #C1DAD7">Route</th>
                                <th>source</th>
								<th>destination</th>
								<th>distance</th>
								<th>Time(hh:mm:ss)</th>
								<th>Bus Stop</th>
							</tr>
						</thead>
  <tbody>
  <?php
$query="select * from sub_route_details where r_id='$r_id' ORDER BY bus_stop ASC";
$result=mysql_query($query);  
 while($row=mysql_fetch_array($result))
{ 
?>

    <tr>
      <td>
       <?php
	  /* $r_id=$row1['r_id'];*/
	$sql1="select * from route where r_id='$r_id'";
	$result1=mysql_query($sql1);
	while($row1=mysql_fetch_array($result1))
	{
	?>
    
     <?php $row1['r_id']; ?>
	  <?php echo $row1['r_name']; ?>
    <?php
	}
	?></td>
      <td><?php echo $row['source']; ?></td>
      <td><?php echo $row['destination']; ?></td>
        <td><?php echo $row['distance']; ?></td> 
        <td><?php echo $row['arrive_time']; ?></td>
        <td><?php echo $row['bus_stop']; ?></td>
    </tr>
 
<?php
}
?>
 </tbody>
 </table>
</div>
  <div class="col-md-6"> <form method="post" action="bookbus.php"><table width="100%" border="0" align="center">
  <tr>
    <td colspan="3" style="text-align: left; color: #FF0000; font-weight: bolder;">Select Preference</td>
    </tr>
  <tr>
    <td>Source</td>
    <td colspan="2">
    <input name="r_id" type="hidden" id="r_id" value="<?php echo $r_id; ?>">
    <select name="source" required id="source">
    <option selected="true" style="display:none;">Select Source</option>
    <?php
	$query2="select * from sub_route_details where r_id='$r_id' ORDER BY bus_stop ASC";
	$result2=mysql_query($query2);  
 	while($row2=mysql_fetch_array($result2))
	{ 
		$source_id=$row2['rd_id'];
		$source=$row2['source'];
		echo '<option value="'.$source_id.'">'.$source.'</option>';
	}
	?>
    </select>
    </td>
    </tr>
  <tr>
    <td>Destination</td>
    <td colspan="2">
    <select name="destination" required id="destination">
    <option selected="true" style="display:none;">Select Destination</option>
    <?php
	$query3="select * from sub_route_details where r_id='$r_id' ORDER BY bus_stop ASC";
	$result3=mysql_query($query3);  
 	while($row3=mysql_fetch_array($result3))
	{ 
		$destination_id=$row3['rd_id'];
		$destination=$row3['destination'];
		echo '<option value="'.$destination_id.'">'.$destination.'</option>';
	}
	?>
    </select>
    </td>
    </tr>
    <td>Reservation Date</td>
    <td colspan="2"><input name="date" type="date" required id="date" ></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><input name="search" type="submit" id="search" formaction="bookbus.php" value="Search"></td>
    <td align="center">&nbsp;</td>
  </tr>
</table>
</form>
</div>
<div class="container-fluid mt-3">

<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Designed and developed by</p>
  <p>Mriganka and Deepak</p>
  <p><strong>GoBus</strong><strong>™</strong></p>
</div>
</div>

    		<script src="js/jquery-1.5.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
        </div>
    </div>
</body>
</html>
<?php
/*}
else
{
	echo 'Donnot try to be oversmart';
}*/
}
?>
