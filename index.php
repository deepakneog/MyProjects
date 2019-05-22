<?php
session_start();
include('db.php');
/*if(isset($_SESSION['u_name']))
{*/
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
  <script src="Mousetrape/jquery.min.js"></script>
  <script src="Mousetrape/mousetrap.min.js"></script>
  <script src="Mousetrape/mousetrap.min1.js"></script>
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
      <a class="nav-link" href="cancelation.php">CANCELLATION</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="tickets.php">TICKET</a>
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
    <div class='description'>  
        <!-- description content -->  
        <p class='description_content'>
          <h2>Choose Route</h2>
          <form class="form-horizontal" action="source.php" method="POST" enctype="multipart/form-data" role="form" date-toggle="validator">
          <table width="100%" border="0">
  <tr>
    <td width="40%">Select Route</td>
    <?php
	if(isset($_SESSION['u_name']))
	{
	?>
    <td width="32%">
    <select name="r_id" id="r_id">
    <option selected="true" style="display:none;">Select Route</option>
    <?php
	$sql="select * from route where status='1'";
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
    <?php
}
	else
	{
	?>
    <td width="31%"><input name="route" type="text" disabled="disabled" id="route" placeholder="Please Login To Continue" readonly></td>
    <?php
	}
	?>
</tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
     <?php
	if(isset($_SESSION['u_name']))
	{
	?>
    <td><input type="submit" name="submit" id="submit" value="Search"></td>
    <?php
	}
	?>
  </tr>
          </table>
</form>
        <!-- end description content -->  
    </div>
    </div>
    </div>
<div class="container-fluid mt-3">

<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Designed and developed by</p>
  <p>Mriganka and Deepak</p>
  <p><strong>GoBus</strong><strong>™</strong></p>
</div>
</div>
<!-- Modal -->
<div class="modal fade bs-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <br>
        <div class="bs-example bs-example-tabs">
            <ul id="myTab" class="nav nav-tabs">
              <li class="active"><a href="#signin" data-toggle="tab">Sign In</a></li>  &nbsp;&nbsp;&nbsp;
			  <li class=""><a href="#signup" data-toggle="tab">Register</a></li>&nbsp;&nbsp;&nbsp;
              <li class=""><a href="#why" data-toggle="tab">Contact Us</a></li> &nbsp;&nbsp;&nbsp;
            </ul>
        </div>
      <div class="modal-body">
        <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade in" id="why">
        <p>Give us a call at 7399900889. Calling is best for urgent issues that need immediate attention—our phone lines are open from 6 am to 4 pm PT (9 am to 7 pm ET) on business days, and from 7 am to 2 pm PT (10 am to 5 pm ET) on Saturdays. Our phone lines are closed on holidays and Sundays.</p>
        <p></p><br> Please contact <a mailto:href="barooahmriganka!gmail.com"></a>barooahmriganka@gmail.com</a> for any other inquiries.</p>
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
                <a href="forgotpassword.php">Forgot password?</a>
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
                <input id="userid" name="phno" class="form-control" type="tel" pattern="[1-9]{1}[0-9]{9}" placeholder="Contact No." class="input-large" required="">
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
    <script>
Mousetrap.bind('a d m i n', function() { window.open("http://localhost/GoBus/adminlogin.php"); });;
</script>
</body>
</html>
<?php
/*}
else
{
	echo 'Donnot try to be oversmart';
}*/
?>


