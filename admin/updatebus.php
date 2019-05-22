<?php
	require_once('auth.php');
	include '../db.php';
	?>
    <?php
	
	if(isset($_POST['asupdate']))
    {
		$id=$_POST['id'];
		 $r_id=$_POST['r_name'];
		 $start_time=$_POST['start_time'];
		

			$ins="UPDATE `bus_route` SET `start_time`='$start_time' WHERE b_id=$id && r_id='$r_id'";
				if(mysql_query($ins))
 			 {
			echo '<script> alert("Updated Successfully"); window.location.href="bus.php"; </script>';
			}
        else
        {
          echo '<script> alert("Update Unsuccessfully"); </script>';
       echo mysql_error();
     }
    }
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
				<a id="logo" href="bus.php">Admin Panel</a>
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
    $query="select * from bus where b_id='$id'";
        if($result=mysql_query($query))
		{
		while ($row=mysql_fetch_array($result)) 
		{
?>
<div id="content" class="clearfix">
  <div class="addroutemain">
    <div class="route">
                <form method="post" action="updatebus.php">
                <table width="100%" border="0">
  <tr>
    <td align="left">&nbsp;</td>
    <td align="right"><strong style="color: #FF0000; font-size: 18px;">Update Bus</strong></td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    </tr>
  <tr>
    <td width="2%">&nbsp;</td>
    <input type="hidden" name="id" size="20" placeholder="Id" value="<?php echo $row['b_id'] ;?>" >
    <td width="48%">Update Bus Name:</td>
    <td width="32%"><input name="b_name" type="text" class="ed" id="b_name" value="<?php echo $row['b_name'] ;?>"></td>
    <td width="18%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Update Bus Type:</td>
    <td><input name="b_type" type="text" class="ed" id="b_type" value="<?php echo $row['b_type'] ;?>"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Update Bus No.:</td>
    <td><input name="b_no" type="text" class="ed" id="b_no" value="<?php echo $row['b_no'] ;?>"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Update Bus Owner:</td>
    <td><input name="b_owner" type="text" class="ed" id="b_owner" value="<?php echo $row['b_owner'] ;?>"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Update Contact No.:</td>
    <td><input name="b_contact_no" type="text" class="ed" id="b_contact_no" value="<?php echo $row['b_contact_no'] ;?>"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Update Email:</td>
    <td><input name="b_email" type="text" class="ed" id="b_email" value="<?php echo $row['b_email'] ;?>"></td>
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
<div class="subroute"><form action="updatebus.php" method="POST" enctype="multipart/form-data" role="form" date-toggle="validator">
<table width="100%" border="0">
  <tbody>
    <tr>
      <td width="37%" style="color: #F10004; font-weight: bold;">Select Route:</td>
      <td><select name="r_name" id="r_name">
    <option style="display:none;">Select</option>
    <?php
	$sql3="select * from bus_route where b_id=$id";
	$result3=mysql_query($sql3);
	while($row3=mysql_fetch_array($result3))
	{
	$r_id=$row3['r_id'];
	$sql4="select * from route where r_id=$r_id";
	$result4=mysql_query($sql4);
	while($row4=mysql_fetch_array($result4))
	{
		$r_name=$row4['r_name'];
		echo '<option value="'.$r_id.'">'.$r_name.'</option>';
	}
	}
	?>
      </select>
      </td>
      <td width="32%"><input type="submit" name="submit2" id="submit2" value="Search"></td>
      </tr>
    <tr>
      <td colspan="3"><input name="b_id" type="hidden" id="b_id" value="<?php echo $id; ?>"></td>
      </tr>
  </tbody>
</table>

</form></div>
<P>&nbsp;</P>
<br>
<P>&nbsp;</P>
</div>
<?php
                                                  
 }
}
}
?>
<br>
<?php
if(isset($_POST['submit2']) && isset($_POST['b_id']) && isset($_POST['r_name']))
{
		$b_id=$_POST['b_id'];
		$r_id=$_POST['r_name'];
		$sql="select * from bus where b_id='$b_id' ";
		$result=mysql_query($sql);
		while($row=mysql_fetch_array($result))
		{
			$b_name=$row['b_name'];
		}
?>
<div id="content" class="clearfix" style="height:250px;">
  <div class="addroutemain">
    <div class="route">
<form method="post" action="updatebus.php">
<table width="100%" border="0">
  <tr>
    <td align="left">&nbsp;</td>
    <td align="right"><strong style="color: #FF0000; font-size: 18px;">Update Assigned Route</strong></td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
</tr>
  <tr>
    <td width="2%">&nbsp;</td>
    <input type="hidden" name="id" size="20" placeholder="Id" value="<?php echo $b_id ;?>" >
    <td width="48%">Bus Name:</td>
    <td width="32%"><input name="b_name" type="text" class="ed" id="b_name" value="<?php echo $b_name ;?>" readonly></td>
    <td width="18%">&nbsp;</td>
  </tr>
<tr>
    <td>&nbsp;</td>
    <td>Select Route:</td>
    <td><select name="r_name" id="r_name">
    <?php
	$sql2="select * from route where r_id='$r_id'";
	$result2=mysql_query($sql2);
	while($row2=mysql_fetch_array($result2))
	{
		/*$r_id=$row2['r_id'];*/
    	$r_name=$row2['r_name'];
      echo '<option value="'.$r_id.'">'.$r_name.'</option>';
	}
	?>
      </select>
     </tr>
     <tr>
    <td width="2%">&nbsp;</td>
    <td width="48%">Start Time:</td>
	<td width="32%"><input name="start_time" type="time" class="ed" id="start_time" value="2:00:00"></td>
    <td width="18%">&nbsp;</td>
</tr>
      <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right"><input type="submit" name="asupdate" id="submit" value="Submit"></td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</div>
</div>
</div>
<p>&nbsp;</p>
<br>
<?php
}
?>
 

<?php   

	if(isset($_POST['submit']))
    {
		$id=$_POST['id'];
		$b_name=$_POST['b_name'];
		$b_type=$_POST['b_type'];
		$b_no=$_POST['b_no'];
		$b_owner=$_POST['b_owner'];
		$b_contact_no=$_POST['b_contact_no'];
		$b_email=$_POST['b_email'];

	$ins="UPDATE bus  SET b_name='$b_name',b_type='$b_type',b_no='$b_no',b_owner='$b_owner',b_contact_no='$b_contact_no',b_email='$b_email' WHERE  b_id='$id'";
	if(mysql_query($ins))
    {
		echo '<script> alert("Updated Successfully"); window.location.href="bus.php"; </script>';
	}
        else
        {
           echo '<script> alert("Update Unsuccessfully"); </script>';
        }
    }
 ?>
</body>
</html>