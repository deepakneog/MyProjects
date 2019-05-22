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
				<a id="logo" href="fare.php">Admin Panel</a>
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
    $query="select * from user where u_id='$id'";
        if($result=mysql_query($query)){
		while ($row=mysql_fetch_array($result)) {
?>
<div id="content" class="clearfix">
				<div class="addroutemain">
                <div class="route">
                <form method="post" action="updategocash.php">
                <table width="100%" border="0">
  <tr>
    <td align="left">&nbsp;</td>
    <td align="right"><strong style="color: #FF0000">Add GoCash</strong></td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    </tr>
  <tr>
    <td width="2%">&nbsp;</td>
    <input type="hidden" name="id" size="20" placeholder="Id" value="<?php echo $row['u_id'] ;?>" >
  </tr>
    <td>&nbsp;</td>
    <td>Previous GoCash:</td>
    <td><input name="gocash" type="text" class="ed" id="gocash" value="<?php echo $row['gocash'] ;?>" readonly></td>
    <td>&nbsp;</td>
  </tr>
   </tr>
    <td>&nbsp;</td>
    <td>New Amount:</td>
    <td><input name="ngocash" type="text" class="ed" id="ngocash" placeholder="Enter New Amount"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>For</td>
    <td><input name="id" size="20" placeholder="Id" disabled value="<?php echo $row['name'] ;?>"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right"><input type="submit" name="submit" id="submit" value="Add"></td>
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
		$gocash=$_POST['gocash'];
		$ngocash=$_POST['ngocash'];
		$gocash=$gocash+$ngocash;

	$ins="UPDATE user  SET gocash='$gocash' WHERE  u_id='$id'";
	if(mysql_query($ins))
    {
		echo '<script> alert("Updated Successfully"); window.location.href="gocash.php"; </script>';
	}
        else
        {
           echo '<script> alert("Update Unsuccessfully"); </script>';
        }
    }
	mysql_error();
 ?>
</body>
</html>