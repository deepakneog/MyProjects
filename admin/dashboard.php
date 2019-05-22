<?php
	require_once('auth.php');
	include('../db.php');
	date_default_timezone_set('Asia/Kolkata');
	$date=date('Y-m-d');
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
						<a class="active" href="dashboard.php">
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
						<a href="collections.php">
							<img src="../image/indusind-bank-cards-paytm-wallet-rs-50-cashback-on-deposit-of-rs-750-1454416289.png" alt="Seatinventory" width="61" height="50">
							<span>Collection </span>
						</a>
					</li>
					<div class="clearfix"></div>
				</ul>
				<div id="content" class="clearfix">
					<table cellpadding="1" cellspacing="1" id="resultTable">
						<thead>
                        <tr>
								<th colspan="3" style="text-align:center">Date : <?php echo $date; ?></th>
							</tr>
							<tr>
								<th  style="border-left: 1px solid #C1DAD7"> Bus Name </th>
                                <th> Routes || Trip || Passengers</th>
							</tr>
                            
                           <?php
							$sql="select * from bus where b_status='1' ";
							$result=mysql_query($sql);
							while($row=mysql_fetch_array($result))
							{
								$b_id=$row['b_id'];
								$b_name=$row['b_name'];
								echo '<tr>
								<th>'.$b_name.'</th>';
								echo '<th>';
								$sql1="select * from bus_route where b_id='$b_id' ";
								$result1=mysql_query($sql1);
								while($row1=mysql_fetch_array($result1))
								{
									$r_id=$row1['r_id'];
									$sql2="select * from route where r_id='$r_id' && status='1'";
									$result2=mysql_query($sql2);
									while($row2=mysql_fetch_array($result2))
									{
										echo $r_name=$row2['r_name'];
										echo '&nbsp;||&nbsp;';
										echo $r_trip_no=$row2['r_trip_no'];
										echo '&nbsp;||&nbsp;';
									}
									$sql3="select * from reservation where b_id='$b_id' && r_id='$r_id' && status='1' && reservation_date='$date'";
									$result3=mysql_query($sql3);
									$pass_cou=mysql_num_rows($result3);	
									echo $pass_cou;
									echo '<br>';						
								}
								echo '</th>';
								echo '</tr>';
							}
						   ?>
                            <!--<tr>
								<th></th>
								<th></th>
                                <th></th>
								<th></th>
							</tr>-->
						</thead>
						<tbody> 
						</tbody>
					</table>
				</div>
				<div id="footer" class="radius-bottom">
					</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
	<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this update? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "deleteres.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
</body>
</html>