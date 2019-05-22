<?php
	require_once('auth.php');
?>
<!DOCTYPE html>
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
				<a id="logo" href="route.php">Admin Panel</a>
				<div id="details">
					<a class="avatar" href="javascript: void(0)">
					<img width="36" height="36" alt="avatar" src="img/avatar.jpg">
					</a>
					<div class="tcenter">
					Hi
					<strong>Admin</strong>
					!
					<br>
					<a class="alightred" href="../index.php">Logout</a>
					</div>
				</div>
			</div>
		</div>
<?php
    if(isset($_GET['id']))
    {
	$id=$_GET['id'];
    include '../db.php';
?>
<div id="content" class="clearfix">
				<div class="addroutemain">
                <div class="route">
                <form method="post" action="updatesubroute.php">
                <table width="100%" border="0">
  <tr>
    <td align="left">&nbsp;</td>
    <td align="right"><strong style="color: #FF0000">Update Sub Route</strong></td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    </tr>

    <?php
	$query="select * from sub_route_details where rd_id='$id'";
        if($result=mysql_query($query)){
		while ($row=mysql_fetch_array($result)) {
	?>
        <?php
	$query1="select * from route where r_id='".$row['r_id']."'";
	if($result1=mysql_query($query1)){
		while ($row1=mysql_fetch_array($result1)) {
	?>
   <tr>
    <td width="2%">&nbsp;</td>
    <input type="hidden" name="id" size="20" placeholder="Id" value="<?php echo $row1['r_id'] ;?>" >
    <td width="48%">Route Name:</td>
    <td width="32%"><input name="route" type="text" class="ed" id="route" value="<?php echo $row1['r_name'] ;?>" readonly></td>
    <td width="18%">&nbsp;</td>
  </tr>
  <?php
   }
}
  ?>
  <tr>
    <td width="2%">&nbsp;</td>
    <input type="hidden" name="id" size="20" placeholder="Id" value="<?php echo $row['rd_id'] ;?>" >
    <td width="48%">Update Source:</td>
    <td width="32%"><input name="source" type="text" class="ed" id="source" value="<?php echo $row['source'] ;?>"></td>
    <td width="18%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Update Destination:</td>
    <td><input name="destination" type="text" class="ed" id="destination" value="<?php echo $row['destination'] ;?>"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Update Distance:</td>
    <td><input name="distance" type="text" class="ed" id="distance" value="<?php echo $row['distance'] ;?>"></td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>Time</td>
    <td><input type="time" name="arrive_time" id="arrive_time" value="<?php echo $row['arrive_time'] ;?>"></td>
    <td>&nbsp;</td>
  </tr>

  <?php
   }
}
  ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right"><input type="submit" name="submit" id="submit" value="Update"></td>
    <td>&nbsp;</td>
  </tr>
</table>
</form></div>
</div>
<P>&nbsp;</P>
<br>
<P>&nbsp;</P>
<br>
<P>&nbsp;</P>
<br>
</div>
<?php                                               
}
?>
<?php 
include '../db.php';       

	if(isset($_POST['submit']))
    {
		$id=$_POST['id'];
		$source=$_POST['source'];
		$destination=$_POST['destination'];
		$distance=$_POST['distance'];
		$arrive_time=$_POST['arrive_time'];

	$ins="UPDATE sub_route_details  SET source='$source',destination='$destination',distance='$distance',arrive_time='$arrive_time' 
	WHERE  rd_id='$id'";
	if(mysql_query($ins))
    {
		echo '<script> alert("Updated Successfully"); window.location.href="route.php"; </script>';
	}
        else
        {
           echo '<script> alert("Update Unsuccessfully"); </script>';
        }
    }
 ?>
</body>
</html>