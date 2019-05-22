<?php
	require_once('auth.php');
?>
<?php
	include('../db.php');
?>
<html>
<head>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="febe/style.css" type="text/css" media="screen" charset="utf-8">
<script src="argiepolicarpio.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>	
<!--sa poip up-->
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
   <script src="lib/jquery.js" type="text/javascript"></script>
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script>
</head>
<body>
	<div id="container">
		<div id="adminbar-outer" class="radius-bottom">
			<div id="adminbar" class="radius-bottom">
				<a id="logo" href="dashboard.php">Admin Panel</a>
				<div id="details">
					<a class="avatar" href="javascript: void(0)">
					<img width="36" height="36" alt="avatar" src="img/avatar.jpg">
					</a>
					<div class="tcenter">
					Hi
					<strong>Admin</strong>
					!
					<br>
					<a class="alightred" href="../processlogout.php">Logout</a>
					</div>
			  </div>
		  </div>
		</div>
		<div id="panel-outer" class="radius" style="opacity: 1;">
			<div id="panel" class="radius">
				<ul class="radius-top clearfix" id="main-menu">
					<li>
						<a href="dashboard.php">
							<img alt="Dashboard" src="img/m-dashboard.png">
							<span>Dashboard</span>
						</a>
					</li>
					
					<li>
						<a href="route.php">
							<img alt="Statistics" src="img/m-route.png"> 
							<span>Route</span>
						</a>
					</li>
					<li>
						<a href="bus.php">
							<img alt="Statistics" src="img/m-statistics.png">
							<span>Bus</span>
						</a>
					</li>
                    <li>
						<a href="fare.php">
							<img alt="Seatinventory" src="img/Bill.png">
							<span>Fare </span>
						</a>
					</li>
                    <li>
						<a class="active" href="gocash.php">
							<img alt="Seatinventory" src="../image/5a29aa27c26c44.8724350315126799757964.png">
							<span>GoCash </span>
						</a>
					</li>
                    <li>
						<a href="collections.php">
							<img src="../image/indusind-bank-cards-paytm-wallet-rs-50-cashback-on-deposit-of-rs-750-1454416289.png" alt="Seatinventory" width="61" height="50">
							<span>Collection </span>
						</a>
					</li>
					<div class="clearfix"></div>
				</ul>
                  <?php
$query1="select * from user";
if($result1=mysql_query($query1))
{
?>
    <table width="100%" border="1" align="center" id="resultTable">
						<thead>
							<tr>
								<th  style="solid #C1DAD7">Username</th>
                                <th>Name</th>
								<th>GoCash</th>
								<th>Add</th>
						</thead>
						<?php    
 while($row1=mysql_fetch_array($result1))
{ ?>
  <tbody>
    <tr>
      <td>
       <?php
	  /* $r_id=$row1['r_id'];*/
	$sql="select * from user where u_id=".$row1['u_id']."";
	$result=mysql_query($sql);
	while($row=mysql_fetch_array($result))
	{
	?>
    
     <?php $row['u_id']; ?>
	  <?php echo $row['u_name']; ?>
    <?php
	}
	?></td>
      <td><?php echo $row1['name']; ?></td>
        <td><?php echo $row1['gocash']; ?></td> 
        <td><?php echo '<a href=updategocash.php?id='.$row1['u_id'].'>ADD</a>'; ?>
    </tr>
  </tbody>
<?php } ?>
					</table>
                    <?php
}
 ?>
       <p>&nbsp;</p>
    <br>              