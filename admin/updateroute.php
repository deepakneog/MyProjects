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
    $query="select * from route where r_id='$id'";
        if($result=mysql_query($query)){
		while ($row=mysql_fetch_array($result)) {
?>
<div id="content" class="clearfix">
				<div class="addroutemain">
                <div class="route">
                <form method="post" action="updateroute.php">
                <table width="100%" border="0">
  <tr>
    <td align="left">&nbsp;</td>
    <td align="right"><strong style="color: #FF0000">Update Route</strong></td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    </tr>
  <tr>
    <td width="2%">&nbsp;</td>
    <input type="hidden" name="id" size="20" placeholder="Id" value="<?php echo $row['r_id'] ;?>" >
    <td width="48%">Update Route No.:</td>
    <td width="32%"><input name="r_no" type="text" class="ed" id="r_no" value="<?php echo $row['r_no'] ;?>"></td>
    <td width="18%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Update Route Name:</td>
    <td><input name="r_name" type="text" class="ed" id="r_name" value="<?php echo $row['r_name'] ;?>"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Update Route Trip No.:</td>
    <td><input name="r_trip_no" type="text" class="ed" id="r_trip_no" value="<?php echo $row['r_trip_no'] ;?>"></td>
    <td>&nbsp;</td>
  </tr>
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
}
}
?>
<?php 
include '../db.php';       

	if(isset($_POST['submit']))
    {
		$id=$_POST['id'];
		$r_no=$_POST['r_no'];
		$r_name=$_POST['r_name'];
		$r_trip_no=$_POST['r_trip_no'];

	$ins="UPDATE route  SET r_no='$r_no',r_name='$r_name',r_trip_no='$r_trip_no' WHERE  r_id='$id'";
	echo "deepak";
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