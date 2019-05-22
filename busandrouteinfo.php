<?php
include('db.php');
/*if(isset($_SESSION['u_name']))
{*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>
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
  #customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
.pic{
	width:50px;
	height:50px;
}
.picbig{
	position: absolute;
	width:0px;
	-webkit-transition:width 0.3s linear 0s;
	transition:width 0.3s linear 0s;
	z-index:10;
}
.pic:hover + .picbig{
	width:300px;
	height:300px;
}
  </style>
</head>
<body>

<!--<div class="jumbotron text-center" style="margin-bottom:0">
 <!-- <h1>My First Bootstrap 4 Page</h1>
  <p>Resize this responsive page to see the effect!</p>
</div>-->
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
  <title>GoBus:Index</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<table width="100%" border="1" align="center" id="customers">
  <tr>
    <th>Bus Name</th>
    <th>Type</th>
    <th>Image</th>
    <th>Bus Number.</th>
    <th>Route</th>
    <th>Source</th>
    <th>Destination</th>
    <th>Departure time</th>
    <th>Available Seats</th>
    <th>Price</th>
     <th>Book</th>
  </tr>
<?php

$query="select * from bus_route where r_id='$r_id'";
$result=mysql_query($query);
while($row=mysql_fetch_array($result))
{
	$b_id=$row['b_id'];
	$start_time=$row['start_time'];
	$query1="select * from bus where b_id='$b_id'";
	$result1=mysql_query($query1);
	while($row1=mysql_fetch_array($result1))
	{
		$b_name=$row1['b_name'];
		$f_id=$row1['b_type'];
		$b_max_seat=$row1['b_max_seat'];
		$b_no=$row1['b_no'];
		$b_owner=$row1['b_owner'];
		$b_contact_no=$row1['b_contact_no'];
		$b_photo='Admin/'.$row1['b_photo'];
		
		$query2="select * from fare where f_id='$f_id'";
		$result2=mysql_query($query2);
		while($row2=mysql_fetch_array($result2))
		{
			$b_type=$row2['b_type'];
			$cost_per_km=$row2['fare'];
		}
		$query3="select * from sub_route_details where rd_id='$source' && r_id='$r_id'";
		$result3=mysql_query($query3);
		while($row3=mysql_fetch_array($result3))
		{
			$source_name=$row3['source'];
			/*$start_time=$row3['arrive_time'];*/
			$bus_stop=$row3['bus_stop'];
			$bus_stops=$row3['bus_stop'];
			if($bus_stop==1)
			{
				$depart_time=$start_time;
			}
			else
			{
				for($i=1;$i<$bus_stop;$i++)
				{
					$query6="select * from sub_route_details where r_id='$r_id' && bus_stop='$i;'";
					$result6=mysql_query($query6);
					while($row6=mysql_fetch_array($result6))
					{
						$d_time=$row6['arrive_time'];
						$secs= strtotime($d_time)-strtotime("00:00:00");
						$start_time = date("H:i:s",strtotime($start_time)+$secs);
						//echo $depart_time=$depart_time+$d_time;
					}
				}
			}
		}
		$query7="select * from sub_route_details where rd_id='$destination' && r_id='$r_id'";
		$result7=mysql_query($query7);
		while($row7=mysql_fetch_array($result7))
		{
			$destination_name=$row7['destination'];
			/*$start_time=$row3['arrive_time'];*/
			$bus_stop=$row7['bus_stop'];
			if($bus_stop==1)
			{
				$t_distance=$row7['distance'];
				$depart_time=$start_time;
			}
			else
			{
				$t_distance=0;
				for($i=$bus_stops;$i<=$bus_stop;$i++)
				{
					$query8="select * from sub_route_details where r_id='$r_id' && bus_stop='$i;'";
					$result8=mysql_query($query8);
					while($row8=mysql_fetch_array($result8))
					{
						$d_time=$row8['arrive_time'];
						$distance=$row8['distance'];
						/*$secs= strtotime($d_time)-strtotime("00:00:00");
						$start_time = date("H:i:s",strtotime($start_time)+$secs);*/
						$t_distance=$t_distance+$distance;
						//echo $depart_time=$depart_time+$d_time;
					}
				}
			}
		}
		$query4="select * from sub_route_details where rd_id='$destination' && r_id='$r_id'";
		$result4=mysql_query($query4);
		while($row4=mysql_fetch_array($result4))
		{
			$destination_name=$row4['destination'];
		}
		$query5="select * from route where r_id='$r_id'";
		$result5=mysql_query($query5);
		while($row5=mysql_fetch_array($result5))
		{
			$r_name=$row5['r_name'];
		}
		//Convert time from 24 hrs to 12 hrs
		//$start_time=date('h:i:s', strtotime($start_time));
		/*$date = '19:24:15'; 
		echo date('h:i:s', strtotime($date));*/
		////Convert time from 12 hrs to 24 hrs
		$a_seat=0;
		$query9="select * from seat where b_id='$b_id'";
		$result9=mysql_query($query9);
		while($row9=mysql_fetch_array($result9))
		{
			$seat_id=$row9['s_id'];
			$query10="select * from reservation where b_id='$b_id' && s_id='$seat_id' && r_id='$r_id' && reservation_date='$r_date'";
			$result10=mysql_query($query10);
			if(mysql_num_rows($result10)<=0)
			{
				$a_seat=$a_seat+1;
			}			
		}
		$_SESSION['t_distance']=$t_distance;
		$cost_per_seat=($t_distance*$cost_per_km);
?>
  <tr>
    <td><?php echo $b_name; ?></td>
    <td><?php echo $b_type; ?></td>
   <td><?php echo '<img class="pic" src="'.$b_photo.'" width="25" height="25"  alt=""/>'; ?><?php echo '<img class="picbig" src="'.$b_photo.'" width="25" height="25"  alt=""/>'; ?></td>
    <td><?php echo $b_no; ?></td>
    <td><?php echo $r_name; ?></td>
    <td><?php echo $source_name; ?></td>
    <td><?php echo $destination_name; ?></td>
	<td><?php echo $start_time; ?></td> 
    <td><?php echo $a_seat; ?></td> 
    <td><?php echo $cost_per_seat; ?></td> 
    <!--<td>JRT-DIB</td>
    <td>Jorhat</td>
    <td>SIbsagar</td>
    <td>9:30</td>
    <td>25</td>
    <td>120</td>-->
    <td> 
	<?php
	if($start_time<$time && $r_date<=$date)
	{
		echo '<a href="index.php">Booking Unavailable</a>';
	}
	else
	{
		echo '<a href="seats.php?b='.$b_id.'&r='.$r_id.'&rd='.$r_date.'">Book Now</a>';
	}
	?>
    </td>
  </tr>
<?php
	}
}
?>
  <tr>
  	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>


</body>
</html>
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
            <!--<div class="control-group">
              <label class="control-label" for="rememberme"></label>
              <div class="controls">
                <label class="checkbox inline" for="rememberme-0">
                  <input type="checkbox" name="rememberme" id="rememberme-0" value="Remember me">
                  Remember me
                </label>
              </div>
            </div>-->

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
          <!--  <div class="control-group">
              <label class="control-label" for="userid">Alias:</label>
              <div class="controls">
                <input id="userid" name="userid" class="form-control" type="text" placeholder="JoeSixpack" class="input-large" required="">
              </div>
            </div>-->
            
            
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="reenterpassword">Re-Enter Password:</label>
              <div class="controls">
                <input id="reenterpassword" class="form-control" name="reenterpassword" type="password" placeholder="********" class="input-large" required="">
              </div>
            </div>
            
            <!-- Multiple Radios (inline) -->
            <br>
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
