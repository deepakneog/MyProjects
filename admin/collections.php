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
							<img src="img/m-statistics.png" alt="Statistics">
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
						<a href="gocash.php">
							<img alt="Seatinventory" src="../image/5a29aa27c26c44.8724350315126799757964.png">
							<span>GoCash </span>
						</a>
					</li>
                    <li>
						<a class="active" href="collections.php">
							<img src="../image/indusind-bank-cards-paytm-wallet-rs-50-cashback-on-deposit-of-rs-750-1454416289.png" alt="Seatinventory" width="61" height="50">
							<span>Collection </span>
						</a>
					</li>
					<div class="clearfix"></div>
				</ul>
				<div id="content" class="clearfix">
				<div class="addroutemain">
                <div class="route">
<form action="collections.php" method="POST" enctype="multipart/form-data" role="form" date-toggle="validator">
                <table width="100%" border="0">
  <tr>
    <td align="left">&nbsp;</td>
    <td align="right"><strong>Check</strong></td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    </tr>
  <tr>
    <td width="2%">&nbsp;</td>
    <td width="48%"> Bus.:</td>
    <td width="32%">
    <select name="b_name" id="b_name">
    <option selected="true" style="display:none;">Select</option>
    <?php
	$sql1="select * from bus";
	$result1=mysql_query($sql1);
	while($row1=mysql_fetch_array($result1))
	{
	?>
    
      <option value="<?php echo $row1['b_id']; ?>"><?php echo $row1['b_name']; ?></option>
    <?php
	}
	?>
      </select></td>
    <td width="18%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>From:</td>
    <td><input type="date" name="date" id="date"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>To:</td>
    <td><input type="date" name="date2" id="date2"> </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right"><input type="submit" name="submit" id="submit" value="Submit"></td>
    <td>&nbsp;</td>
  </tr>
                </table>
</form></div>
<?php
if(isset($_POST['submit']) && isset($_POST['b_name']) && isset($_POST['date']) && isset($_POST['date2']))
{
	$total_inc=0;
	$b_id=$_POST['b_name'];
	$date=$_POST['date'];
	$date2=$_POST['date2'];
	$sql="select * from transaction_credit where b_id='$b_id' && status='1'";
	$result=mysql_query($sql);
	while($row=mysql_fetch_array($result))
	{
		$t_date=$row['date'];
		$c_p_s=$row['c_p_s'];
		if($t_date<=$date2 && $t_date>=$date)
		{
			$total_inc=$total_inc+$c_p_s;
		}
	}
?>
<div class="subroute">
<form method="post" action="#.php">
<table width="100%" border="0">
  <tr>
    <td align="left" style="color: #FF3333">|</td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    </tr>
  <tr>
    <td width="2%" style="color: #FF3333">|</td>
    <td width="11%">&nbsp;</td>
    <td width="47%">Total Collection :</td>
    <td width="32%"><?php echo  '<input name="source" type="text" class="ed" id="source" value="'.$total_inc.'" readonly="readonly">';  ?></td>
    <td width="8%">&nbsp;</td>
  </tr>
  <tr>
    <td style="color: #FF3333">|</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="color: #FF3333">|</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="30" style="color: #FF3333">|</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="color: #FF3333">|</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  <tr>
    <td style="color: #FF3333">|</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="color: #FF3333">|</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</div>
<?php
}
?>

				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
    