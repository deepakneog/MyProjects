<?php
	//require_once('Admin/auth.php');
	include('db.php');
?>
<?php
if (isset($_POST["reg"])) 
{
		$name=$_POST["name"];
		$u_name=$_POST["u_name"];
		$u_pass=$_POST["u_pass"];
		$email=$_POST["email"];
		$phno=$_POST["phno"];
		$reenterpassword=$_POST["reenterpassword"];
		$gocash=$_POST["gocash"];
		
		if($u_pass==$reenterpassword)
		{
			$duplicate="select * from user where u_name='$u_name'";
			$result=mysql_query($duplicate);
			if(mysql_num_rows($result)<1)
			{
				$duplicate_phn="select * from user where phone_no='$phno'";
				$result1=mysql_query($duplicate_phn);
				if(mysql_num_rows($result1)<1)
				{
					if(strpos($email,'.') !==false)
					{
						list($first, $second) = explode("@", "$email", 2);
						if(!empty($second))
						{
							list($third, $fourth) = explode(".", "$second", 2);
							if(!empty($fourth))
							{
								if($fourth=='com')
								{
									$sql="insert into user (name,u_name,u_pass,u_email,phone_no,gocash) values('$name','$u_name','$u_pass','$email','$phno','$gocash')";
									if (mysql_query($sql)) 
									{
										echo '<script> alert("Record insert Successfully"); window.location.href="index.php"; </script>';
									}
									else
									{
										echo mysql_error();
										/*echo '<script> alert("Record insert Unsuccessfully"); window.location.href="index.php"; </script>';*/
									}
								}
								else
								{
									echo '<script> alert("Check The Email Formate."); window.location.href="index.php"; </script>';
								}
							}
							else
							{
								echo '<script> alert("Check The Email Formate."); window.location.href="index.php"; </script>';
							}
						}
						else
						{
							echo '<script> alert("Check The Email Formate."); window.location.href="index.php"; </script>';
						}
					}
					else
					{
						echo '<script> alert("Check The Email Formate."); window.location.href="index.php"; </script>';
					}
				}
				else
				{
					echo '<script> alert("Phone number already exists"); window.location.href="index.php"; </script>';
				}
			}
			else
			{
				echo '<script> alert("User Name Already Exist."); window.location.href="index.php"; </script>';
			}
		}
		else
		{
			echo '<script> alert("Password did not match"); window.location.href="index.php"; </script>';
		}
}
	?>
	