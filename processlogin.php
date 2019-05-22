 <?php
	require('db.php');
	session_start();
    if (isset($_POST['reg1']))
	{
        
        $u_name = $_POST['u_name'];
		$u_name = stripslashes($u_name); // removes backslashes
		$u_name = mysql_real_escape_string($u_name); //escapes special characters in a string
        $u_pass = $_POST['u_pass'];
		$u_pass = stripslashes($u_pass);
		$u_pass = mysql_real_escape_string($u_pass);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `user` WHERE u_name='$u_name' and u_pass='$u_pass'";
		$result = mysql_query($query);
		$rows = mysql_num_rows($result);
        if($rows==1)
		{
			$_SESSION['u_name'] = $u_name;
			header("Location:index.php"); // Redirect user to index.php
         }
		 else
			{
				echo '<script> alert("Password/Username Incorrect"); window.location.href="index.php"; </script>';
			}
	}
	?>