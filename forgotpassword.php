<?php
session_start();
include('db.php');
if(isset($_POST['update']) && isset($_POST['pass']) && isset($_POST['cpass']) && isset($_POST['u_id']))
{	
		$u_id=$_POST["u_id"];
		$pass=$_POST["pass"];
		$cpass=$_POST["cpass"];
		if($pass==$cpass)
		{
			$sql="UPDATE user  SET u_pass='$pass' WHERE  u_id='$u_id'";
			if (mysql_query($sql)) 
			{
				echo '<script> alert("Record insert Successfully"); window.location.href="index.php"; </script>';
			}
			else
			{
				//echo mysql_error();
				echo '<script> alert("Record insert Unsuccessfully"); window.location.href="index.php"; </script>';
			}
		}
		else
		{
			echo '<script> alert("Password did not match"); window.location.href="index.php"; </script>';
		}
}
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
      <a class="nav-link" href="#">CANCELLATION</a>
    </li>
     <li class="nav-item">
      <a class="nav-link" href="#contact" data-toggle="modal">CONTACT US</a>
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
  <div id="myCarousel" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="image/2017_CC_HD_Design_02.jpg" alt="Los Angeles" width="1300" height="500">
    </div>
    <div class="carousel-item">
      <img src="image/2016_CC_HD_Design_01.jpg" alt="Chicago" width="1300" height="500">
    </div>
    <div class="carousel-item">
      <img src="image/nastol.com.ua-24220.jpg" alt="New York" width="1300" height="500">
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
<?php
if(!isset($_POST['submit']))
{
?>
    <div class='description'>  
        <!-- description content -->  
<form action="forgotpassword.php" method="Post"><table width="200" border="0">
  <tr>
    <h2>Enter Details</h2>
  </tr>
  <tr>
    <td>Name:</td>
    <td><label for="textfield"></label>
      <input type="text" name="name" id="name"></td>
  </tr>
  <tr>
    <td>Username:</td>
   <td> <input type="text" name="u_name" id="u_name"></td>
  </tr>
  <tr>
    <td>Email:</td>
    <td> <input type="email" name="email" id="email"></td></td>
  </tr>
  <tr>
    <td>Phone no:</td>
    <td> <input type="tel" name="phone" id="phone"></td></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="submit" type="submit" id="submit"></td>
  </tr>
</table>
</form>
        <!-- end description content -->  
    </div>
<?php
}
else if(isset($_POST['submit']))
{
	if(isset($_POST['name']) && isset($_POST['u_name']) && isset($_POST['email']) && isset($_POST['phone']))
	{
		$name=$_POST['name'];
		$u_name=$_POST['u_name'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		
		$sql="select * from user where name='$name' && u_name='$u_name' && u_email='$email' && phone_no='$phone'";
		$result=mysql_query($sql);
		$count=mysql_num_rows($result);
		if($count==1)
		{
			while($row=mysql_fetch_array($result))
			{
				$u_id=$row['u_id'];
			}
?>
     <div class='description'>  
        <!-- description content -->  
<form action="forgotpassword.php" method="post">
<table width="200" border="0">
  <tr>
    <h2>Change Password</h2>
  </tr>
  <tr>
    <td>New Password<input name="u_id" type="hidden" id="u_id" value="<?php echo $u_id; ?>"></td>
    <td><input name="pass" type="password" id="pass"></td>
  </tr>
  <tr>
    <td>Confirm Password</td>
   <td><input name="cpass" type="password" id="cpass"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="update" type="submit" id="update"></td>
  </tr>
</table>
</form>
        <!-- end description content -->  
    </div>
<?php
		}
		else
		{
			echo 'Provided Data Did Not Matched';
		}
	}
}
?>
    </div>
    </div>

<div class="container-fluid mt-3">

<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Designed and developed by</p>
  <p>Mriganka and Deepak</p>
  <p><strong>GoBus</strong><strong>™</strong></p>
</div>
</div>
  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <div class="modal fade" id="contact" role="dialog">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<form class="form-horizontal" role="form">
    				<div class="modal-header">
    					<h4>Contact</h4>
	    			</div>
	    			<div class="modal-body">
    					<div class="form-group">
    						<label for="contact-name" class="col-sm-2 control-label">Name</label>
    						<div class="col-sm-10">
    							<input type="text" class="form-control" id="contact-name" placeholder="First & Last Name">
    						</div>
    					</div>
    					<div class="form-group">
    						<label for="contact-email" class="col-sm-2 control-label">Email</label>
    						<div class="col-sm-10">
    							<input type="email" class="form-control" id="contact-email" placeholder="example@domain.com">
    						</div>
    					</div>
    					<div class="form-group">
    						<label for="contact-message" class="col-sm-2 control-label">Message</label>
    						<div class="col-sm-10">
    							<textarea class="form-control" rows="4"></textarea>
    						</div>
    					</div>
	    			</div>
	    			<div class="modal-footer">
    					<a class="btn btn-default" data-dismiss="modal">Close</a>
    					<button type="submit" class="btn btn-primary">Send</button>
    				</div>
    			</form>
    		</div>
    	</div>
    </div>
&nbsp;

<!-- Modal -->
<div class="modal fade bs-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <br>
        <div class="bs-example bs-example-tabs">
            <ul id="myTab" class="nav nav-tabs">
              <li class="active"><a href="#signin" data-toggle="tab">Sign In</a></li>  &nbsp;&nbsp;&nbsp;
			  <li class=""><a href="#signup" data-toggle="tab">Register</a></li>&nbsp;&nbsp;&nbsp;
              <li class=""><a href="#why" data-toggle="tab">Why?</a></li> &nbsp;&nbsp;&nbsp;
            </ul>
        </div>
      <div class="modal-body">
        <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade in" id="why">
        <p>We need this information so that you can receive access to the site and its content. Rest assured your information will not be sold, traded, or given to anyone.</p>
        <p></p><br> Please contact <a mailto:href="JoeSixPack@Sixpacksrus.com"></a>JoeSixPack@Sixpacksrus.com</a> for any other inquiries.</p>
        </div>

        
        <div class="tab-pane fade active in" id="signin">
            <form class="form-horizontal" action="processlogin.php" method="post">
            <fieldset>
            <!-- Sign In Form -->
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="userid">Username:</label>
              <div class="controls">
                <input required id="userid" name="u_name" type="text" class="form-control" placeholder="username" class="input-medium" required="">
              </div>
            </div>

            <!-- Password input-->
            <div class="control-group">
              <label class="control-label" for="passwordinput">Password:</label>
              <div class="controls">
                <input required id="passwordinput" name="u_pass" class="form-control" type="password" placeholder="********" class="input-medium">
              </div>
            </div>

            <!-- Multiple Checkboxes (inline) -->
            <div class="control-group">
              <label class="control-label" for="rememberme"></label>
              <div class="controls">
                <a href="#">Forgot password?</a>
              </div>
            </div>

            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="signin"></label>
              <div class="controls">
                <input name="reg1" type="submit" class="btn btn-success" value="Submit">
              </div>
            </div>
            </fieldset>
            </form>
        </div>
        <div class="tab-pane fade" id="signup">
            <form action="insert.php" method="post" class="form-horizontal" id="frm2">
            <fieldset>
            <!-- Sign Up Form -->
             <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="userid">Name:</label>
              <div class="controls">
                <input id="userid" name="name" class="form-control" type="text" placeholder="Enter Full Name" class="input-large" required="">
              </div>
            </div>
             <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="userid">Username:</label>
              <div class="controls">
                <input id="userid" name="u_name" class="form-control" type="text" placeholder="Enter Username" class="input-large" required="">
              </div>
            </div>
             <!-- Password input-->
            <div class="control-group">
              <label class="control-label" for="password">Password:</label>
              <div class="controls">
                <input id="password" name="u_pass" class="form-control" type="password" placeholder="********" class="input-large" required="">
                <em>1-8 Characters</em>
              </div>
            </div>
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="Email">Email:</label>
              <div class="controls">
                <input id="Email" name="email" class="form-control" type="text" placeholder="user@mail.com" class="input-large" required="">
              </div>
            </div>
            
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="userid">Phone No.:</label>
              <div class="controls">
                <input id="userid" name="phno" class="form-control" type="tel" placeholder="Contact No." class="input-large" required="">
                <input name="gocash" type="hidden" class="ed" id="gocash" value="300" readonly>
              </div>
            </div>
            
            
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="reenterpassword">Re-Enter Password:</label>
              <div class="controls">
                <input id="reenterpassword" class="form-control" name="reenterpassword" type="password" placeholder="********" class="input-large" required="">
              </div>
            </div>
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="userid"> <select>
  <option value="volvo">What is your favourite color?</option>
  <option value="saab">What is your father's middle name?</option>
  <option value="mercedes">What is your birth year?</option>
  <option value="audi">Where is your birth place?</option>
</select> </label>
              <div class="controls">
                <input id="squestion" name="squestion" class="form-control" type="text" placeholder="Security Question" class="input-large" required="">
              </div>
            </div>
            
            <!-- Multiple Radios (inline) -->
           <!-- <br>-->
           <!-- <div class="control-group">
              <label class="control-label" for="humancheck">Humanity Check:</label>
              <div class="controls">
                <label class="radio inline" for="humancheck-0">
                  <input type="radio" name="humancheck" id="humancheck-0" value="robot" checked="checked">I'm a Robot</label>
                <label class="radio inline" for="humancheck-1">
                  <input type="radio" name="humancheck" id="humancheck-1" value="human">I'm Human</label>
              </div>
            </div>-->
            
            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="confirmsignup"></label>
              <div class="controls">
              <input name="reg" type="submit" class="btn btn-success" value="Submit">
              </div>
            </div>
            </fieldset>
      </div>
    </div>
    </form>
      </div>
      <div class="modal-footer">
      <center>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </center>
      </div>
    </div>
  </div>    
    <script src="js/jquery-1.5.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
/*}
else
{
	echo 'Donnot try to be oversmart';
}*/
?>


