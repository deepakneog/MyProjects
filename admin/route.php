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
						<a class="active" href="route.php">
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
				<div class="addroutemain">
                <div class="route">
                <form method="post" action="addroute.php">
                <table width="100%" border="0">
  <tr>
    <td align="left">&nbsp;</td>
    <td align="right"><strong style="color: #FF0000">Add Route</strong></td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    </tr>
  <tr>
    <td width="2%">&nbsp;</td>
    <td width="48%"> Route No.:</td>
    <td width="32%"><input name="r_no" type="text" class="ed" id="r_no"></td>
    <td width="18%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Route Name:</td>
    <td><input name="r_name" type="text" class="ed" id="r_name"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Route Trip No.:</td>
    <td><input name="r_trip_no" type="text" class="ed" id="r_trip_no"></td>
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
<div class="subroute">
<form method="post" action="addsubroute.php">
<table width="100%" border="0">
  <tr>
    <td align="left" style="color: #FF3333">|</td>
    <td align="right">&nbsp;</td>
    <td align="right"><strong style="color: #FF0000">Add Sub Route</strong></td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    </tr>
  <tr>
    <td width="2%" style="color: #FF3333">|</td>
    <td width="11%">&nbsp;</td>
    <td width="47%">Select Route:</td>
    <td width="32%">
    <select name="r_id" id="r_id">
    <option selected="true" style="display:none;">Select</option>
    <?php
	$sql="select * from route";
	$result=mysql_query($sql);
	while($row=mysql_fetch_array($result))
	{
	?>
    
      <option value="<?php echo $row['r_id']; ?>"><?php echo $row['r_name']; ?></option>
    <?php
	}
	?>
      </select>
      </td>
    <td width="8%">&nbsp;</td>
  </tr>
  <tr>
    <td style="color: #FF3333">|</td>
    <td>&nbsp;</td>
    <td>Source:</td>
    <td><input name="source" type="text" class="ed" id="source"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="color: #FF3333">|</td>
    <td>&nbsp;</td>
    <td>Destination:</td>
    <td><input name="destination" type="text" class="ed" id="destination"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="30" style="color: #FF3333">|</td>
    <td>&nbsp;</td>
    <td>Distance:</td>
    <td><input name="distance" type="text" class="ed" id="distance"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="color: #FF3333">|</td>
    <td>&nbsp;</td>
    <td>Time:</td>
    <td><input type="time" name="arrive_time" id="arrive_time"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  <tr>
    <td style="color: #FF3333">|</td>
    <td>&nbsp;</td>
    <td>Bus Stop No:</td>
    <td><input name="busstop" type="text" class="ed" id="busstop"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="color: #FF3333">|</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right"><input type="submit" name="submit2" id="submit2" value="Submit"></td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</div>

				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
    <div id="display">
    <div id="content" class="clearfix">
    <div class="bus">
    <div class="subroute">
     <?php
$query1="select * from sub_route_details";
if($result1=mysql_query($query1))
{
?>
    <table id="resultTable">
						<thead>
							<tr>
								<th  style="solid #C1DAD7">Route</th>
                                <th>source</th>
								<th>destination</th>
								<th>distance</th>
								<th>Time</th>
                                <th>Bus Stop</th>
                                <th>Action</th>
							</tr>
						</thead>
						<?php    
 while($row1=mysql_fetch_array($result1))
{ ?>
  <tbody>
    <tr>
      <td>
       <?php
	  /* $r_id=$row1['r_id'];*/
	$sql="select * from route where r_id=".$row1['r_id']."";
	$result=mysql_query($sql);
	while($row=mysql_fetch_array($result))
	{
	?>
    
     <?php $row['r_id']; ?>
	  <?php echo $row['r_name']; ?>
    <?php
	}
	?></td>
      <td><?php echo $row1['source']; ?></td>
      <td><?php echo $row1['destination']; ?></td>
        <td><?php echo $row1['distance']; ?></td> 
        <td><?php echo $row1['arrive_time']; ?></td> 
        <td><?php echo $row1['bus_stop']; ?></td>
        <td><?php echo '<a href=updatesubroute.php?id='.$row1['rd_id'].'>UPDATE</a>'; ?>
    </tr>
  </tbody>
<?php } ?>
					</table>
                    <?php
}
 ?>
       <p>&nbsp;</p>
    <br>              
    </div>
    <div id="leftdisplay">
    <?php
$query="select * from route";
if($result=mysql_query($query))
{
?>
    <table width="74%" id="resultTable" >
						<thead>
							<tr>
								<th  style="solid #C1DAD7" width="13%">R No.</th>
								<th width="21%">R name</th>
								<th width="16%">r trip no.</th>
                                <th width="50%">Action</th>
                                <th width="50%">Status</th>
							</tr>
						</thead>
						<?php  
 while($row=mysql_fetch_array($result))
{ ?>
  <tbody>
    <tr>
      <td><?php echo $row['r_no']; ?></td>
      <td><?php echo $row['r_name']; ?></td>
        <td><?php echo $row['r_trip_no']; ?></td>
        <td><?php echo '<a href=updateroute.php?id='.$row['r_id'].'>UPDATE</a>'; ?> |
        <?php 
		if($row['status']==1)
		{
			echo '<a href=routestatus.php?id='.$row['r_id'].'>Not Available</a>';
		}
		else
		{
			echo '<a href=routestatus.php?r_id='.$row['r_id'].'>Available</a>';
		}
		?></td>
        <td>
		<?php 
		if($row['status']==1)
		{
			echo '<img src="img/green.png" width="20" height="20"  alt=""/>';
		}
		else
		{
			echo '<img src="img/red.png" width="17" height="17"  alt=""/>';
		}
		?>
 		</td>
        
    </tr>
  </tbody>
<?php } ?>
					</table>
                    <?php
}
 ?>
 	</div>
    </div>
    <p>&nbsp;</p>
    <br>
    </div>
    
    </div>
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
   url: "deleteroute.php",
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