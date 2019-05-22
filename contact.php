<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Welcome to James Buchanan Pub and Restaurant</title>
<link rel="stylesheet" type="text/css" href="xres/css/style.css" />
<link rel="icon" type="image/png" href="xres/images/favicon.png" />
<link type="text/css" href="css/styles.css" rel="stylesheet" media="all" />
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
 <style>
  .fakeimg {
      height: 200px;
      background: #aaa;
  }
  </style>
</head>

<body>
<div class="jumbotron text-center" style="margin-bottom:0">
 <!-- <h1>My First Bootstrap 4 Page</h1>
  <p>Resize this responsive page to see the effect!</p> -->
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">
   <img src="image/bus_PNG8629.png" width="50" height="55" alt="">&nbsp;GoBus
   </a>
	<!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">HOME</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">CANCELLATION</a>
    </li>
     <li class="nav-item">
      <a class="nav-link" href="#">CONTACT US</a>
    </li>

    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        USER
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Login</a>
        <a class="dropdown-item" href="#">Registration</a>
      </div>
    </li>
  </ul>
</nav>
<div id="wrapper">
	<div id="header">
    <h1><a href="index.php"></a></h1>
        <ul id="mainnav">
			<li><a href="index.php"><strong>Home</strong></a></li>
            <li class="current"><a href="contact.php"><strong>Contact Us</strong></a></li>
    	</ul>
	</div>
    <div id="content">
    	<div id="gallerycontainer">
			<div class="portfolio-area" style="margin:0 auto; padding:140px 20px 20px 20px; width:820px;">	
            
				<div id="contactleft">
					<p>Contact us
We have offices in more than 180 countries around the globe.
Find your local Ericsson office.

Headquarters
Torshamnsgatan 21
Stockholm, Sweden
+46 10 719 00 00

Sales inquiry
If you are considering Ericsson, please fill out this Sales Inquiry form in order to get in touch with Ericsson sales representatives or contact your local office.

Comments and feedback
Please post your comments via this web form. Ericsson values your feedback, and we will do our best to provide you with an answer promptly and please use a valid email address in order to receive and reply.

More contacts
</p>
                   
					</p>
				</div><br>
				<div id="contactright">
					<h3>Message Form</h3>
					<form class="validate" action="messageexec.php" method="POST">
                        <p>
                            <label for="name" class="required label">Name:</label><br>
                            <input id="name" class="contactform" type="text" name="name" />
                        </p>
                        <p>
                            <label for="email" class="required label">Email:</label><br>
                            <input id="email" class="contactform" placeholder="Example: john@doe.com" type="text" name="email" />
                        </p>
                        <p>
                            <label for="subject" class="required label">Subject:</label><br>
                            <input id="subject" class="contactform" type="text" name="subject" />
                        </p>
                        <p>
                            <label id="message-label" for="message" class="required label">Message:</label><br>
                            <textarea id="message" class="contactform" name="message" cols="28" rows="5"></textarea>
                        </p>
                        <p>
                            <label></label>
                            <input class="contactform" id="submit-button" type="submit" name="Submit" value="Submit" style="height: 35px;" />
                        </p>
                    </form>
				</div>
               	<div class="column-clear"></div>
            </div>
			<div class="clearfix"></div>
        </div>
    </div>
    



<div id="footer">
	<h4>+919988776655 &bull;Jorhat, Assam </a></h4>
    <p>PIN: 785001</p>
    <p>&nbsp;</p>
	<a href="index.php"><strong style="font-size: x-large; color: #FFFFFF;">GoBus</strong></a>
</div>

</div>
</body>
</html>
