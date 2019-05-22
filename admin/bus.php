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
						<a class="active" href="bus.php">
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
                  <form action="addbus.php" method="POST" enctype="multipart/form-data" role="form" date-toggle="validator">
                <table width="100%" border="0">
  <tr>
    <td align="left">&nbsp;</td>
    <td align="right"><strong style="color: #FF0000">Add Bus</strong></td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    </tr>
  <tr>
    <td width="2%">&nbsp;</td>
    <td width="48%"> Bus Name:</td>
    <td width="32%"><input name="b_name" type="text" class="ed" id="b_name"></td>
    <td width="18%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Bus Type</td>
    <td><select name="b_type" id="b_type">
    <option selected="true" style="display:none;">Select</option>
    <?php
	$sql="select * from fare";
	$result=mysql_query($sql);
	while($row=mysql_fetch_array($result))
	{
	?>
    
      <option value="<?php echo $row['f_id']; ?>"><?php echo $row['b_type']; ?></option>
    <?php
	}
	?>
      </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Bus Max .Seat:</td>
    <td><input name="b_max_seat" type="text" class="ed" id="b_max_seat" value="34" readonly></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td> 
    <td>Bus No:</td>
    <td align="left"><input name="b_no" type="text" class="ed" id="b_no"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Bus Owner:</td>
    <td align="left"><input name="b_owner" type="text" class="ed" id="b_owner"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Contact No.</td>
    <td align="left"><input name="b_contact_no" type="tel" class="ed" id="b_contact_no"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Email:</td>
    <td align="left"><input type="email" name="b_email" id="b_email"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Bus Photo:</td>
    <td align="left"><input name="fileField" type="file" id="fileField"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right"><input type="submit" name="submit" id="submit" value="Submit"></td>
    <td>&nbsp;</td>
  </tr>
  </table>
</form>
</div>
<div class="subroute">
<form action="assignprocess.php" method="POST" enctype="multipart/form-data" role="form" date-toggle="validator">
                <table width="100%" border="0">
  <tr>
    <td align="left">&nbsp;</td>
    <td align="right"><strong style="color: #FF0000">Assign Route</strong></td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    </tr>
  <tr>
    <td width="2%">&nbsp;</td>
    <td width="48%"> Select Bus:</td>
      <td><select name="b_name" id="b_name">
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
    <td>Select Route:</td>
    <td><select name="r_name" id="r_name">
    <option style="display:none;">Select</option>
    <?php
	$sql2="select * from route";
	$result2=mysql_query($sql2);
	while($row2=mysql_fetch_array($result2))
	{
	?>
    
      <option value="<?php echo $row2['r_id']; ?>" selected="selected"><?php echo $row2['r_name']; ?></option>
    <?php
	}
	?>
      </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Start Time:</td>
    <td><input name="start_time" type="time" class="ed" id="start_time"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right"><input name="submit" type="submit" id="submit" formaction="assignprocess.php" value="Submit"></td>
    <td>&nbsp;</td>
  </tr>
  </table>
</form>
</div>
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
     <?php
$query1="select * from bus";
if($result1=mysql_query($query1))
{
?>
    <table id="resultTable">
						<thead>
							<tr>
								<th  style="solid #C1DAD7">Name</th>
								<th>Type</th>
								<th>Max Seat</th>
								<th>Bus No.</th>
								<th>Routes & Time</th>
								<th>Owner</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Action</th>
                                <th>Status</th>
							</tr>
						</thead>
						<?php    
while($row1=mysql_fetch_array($result1))
{ 
$b_id=$row1['b_id'];
?>
  <tbody>
    <tr>
      <td><?php echo $row1['b_name']; ?></td>
      <td><?php echo $row1['b_type']; ?></td>
        <td><?php echo $row1['b_max_seat']; ?></td>
        <td><?php echo $row1['b_no']; ?></td>
        <td><?php
        $query2="select * from bus_route where b_id='$b_id'";
		$result2=mysql_query($query2);
		while($row2=mysql_fetch_array($result2))
		{
			$r_id=$row2['r_id'];
			$start_time=$row2['start_time'];
			$query3="select * from route where r_id='$r_id'";
			$result3=mysql_query($query3);
			while($row3=mysql_fetch_array($result3))
			{
				$r_name=$row3['r_name'];
		?>
        <?php echo $r_name; ?>
        <?php
			}
		  echo '&nbsp;&nbsp;'.$start_time.'<br>';
		}
		?>
        </td>
        <td><?php echo $row1['b_owner']; ?></td>
        <td><?php echo $row1['b_contact_no']; ?></td>
        <td><?php echo $row1['b_email']; ?></td>
        <td><?php echo '<a href=updatebus.php?id='.$row1['b_id'].'>UPDATE</a>'; ?>
       |
 <?php 
		if($row1['b_status']==1)
		{
			echo '<a href=busstatus.php?id='.$row1['b_id'].'>Not Available</a>';
		}
		else
		{
			echo '<a href=busstatus.php?r_id='.$row1['b_id'].'>Available</a>';
		}
		?></td>
        <td>
		<?php 
		if($row1['b_status']==1)
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
   url: "deleteinventory.php",
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