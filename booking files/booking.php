<?php 
include ('../db.php');
if(isset($_POST['seatId']))
{
	echo 'sh';
}
?>
<!DOCTYPE html>
<html>
<head>
<title>GoBus Ticket Reservation</title>
<!-- for-mobile-apps -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Bus Ticket Reservation Widget Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- //for-mobile-apps -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/jquery.seat-charts.css">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<style>
input[type=checkbox] {
display:none;
}
 
input[type=checkbox] + label
{
background: #999;
height: 16px;
width: 16px;
display:inline-block;
padding: 0 0 0 0px;
}
input[type=checkbox]:checked + label
{
background: #0080FF;
height: 16px;
width: 16px;
display:inline-block;
padding: 0 0 0 0px;
}
input[type=checkbox]:disabled + label
{
background:#C00;
height: 16px;
width: 16px;
display:inline-block;
padding: 0 0 0 0px;
}
</style>
</head>
<body>
<div class="content">
	<h1>GoBus Ticket Reservation</h1>
	<div class="main">
		<h2>Book Your Seat Now?</h2>
		<div class="wrapper">
			<div id="seat-map">
				<div class="front-indicator"><h3>Front</h3></div>
			</div>
			<div class="booking-details">
            <form action="booking.php" method="post">
						<div id="legend">
                        <table width="100%" border="1">
  <tbody>
    <tr>
      <td width="10%">&nbsp;</td>
      <td width="10%">&nbsp;</td>
      <td width="10%">&nbsp;</td>
      <td width="10%">&nbsp;</td>
      <td width="10%">&nbsp;</td>
      <td width="10%">&nbsp;</td>
      <td width="10%">&nbsp;</td>
      <td width="10%">&nbsp;</td>
    </tr>
    <tr>
      <td> 1</td>
      <td><input type='checkbox' name='thing1' value='valuable' id="thing1"/><label for="thing1"></label> </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td> 2</td>
      <td><input type='checkbox' name='thing2' value='valuable' id="thing2"/><label for="thing2"></label></td>
      <td> 3</td>
      <td><input type='checkbox' name='thing2' value='valuable' id="thing2"/><label for="thing2"></label></td>
    </tr>
    <tr>
      <td> 4</td>
      <td><input name='thing3' type='checkbox' disabled="disabled" id="thing3" value='valuable'/><label for="thing3"></label></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td> 5</td>
      <td><input type='checkbox' name='thing4' value='valuable' id="thing4"/><label for="thing4"></label></td>
      <td> 6</td>
      <td><input type='checkbox' name='thing4' value='valuable' id="thing4"/><label for="thing4"></label></td>
    </tr>
    <tr>
      <td> 7</td>
      <td><input type='checkbox' name='thing5' value='valuable' id="thing5"/><label for="thing5"></label></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td> 8</td>
      <td><input type='checkbox' name='thing6' value='valuable' id="thing6"/><label for="thing6"></label></td>
      <td> 9</td>
      <td><input type='checkbox' name='thing6' value='valuable' id="thing6"/><label for="thing6"></label></td>
    </tr>
    <tr>
      <td> 10</td>
      <td><input type='checkbox' name='thing5' value='valuable' id="thing5"/><label for="thing5"></label></td>
      <td> 11</td>
      <td><input type='checkbox' name='thing5' value='valuable' id="thing5"/><label for="thing5"></label></td>
      <td> 12</td>
      <td><input type='checkbox' name='thing6' value='valuable' id="thing6"/><label for="thing6"></label></td>
      <td> 13</td>
      <td><input type='checkbox' name='thing6' value='valuable' id="thing6"/><label for="thing6"></label></td>
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
    </tr>
  </tbody>
</table>
                        </div>
						<h3> Selected Seats (<span id="counter">0</span>):</h3>
						<ul id="selected-seats" class="scrollbar scrollbar1"></ul>
						
						Total: <b>₹<span id="total">0</span></b>
                        <input name="total" type="hidden" id="total" value="g">
						<input name="submit" type="submit" class="checkout-button" id="submit">
						<!--<button class="checkout-button">Pay Now</button>-->
            </form>
			</div>
			<div class="clear"></div>
		</div>
		
	</div>
	<p class="copy_rights">&copy; 2018 GoBus Ticket Reservation. All Rights Reserved</p>
</div>
</body>
</html>
