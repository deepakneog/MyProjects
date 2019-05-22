<?php
include('../db.php');
$b_name=$_POST['b_name'];
$b_type=$_POST['b_type'];
$b_max_seat=$_POST['b_max_seat'];
$b_no=$_POST['b_no'];
$b_owner=$_POST['b_owner'];
$b_contact_no=$_POST['b_contact_no'];
$b_email=$_POST['b_email'];
{
	$duplicate="select * from bus where b_no='$b_no'";
	$result_du=mysql_query($duplicate);
	if(mysql_num_rows($result_du)<1)
	{		
		if ($_FILES['fileField']['size'] != 0)
		{
			$x=1;
			$msg="";
			$fileData = pathinfo(basename($_FILES["fileField"]["name"]));
			$fext=$fileData['extension'];
			//echo $fext;
			if(!(strtoupper($fext)=="JPG" || strtoupper($fext)=="PNG" || strtoupper($fext)=="GIF" ))
			{
				$msg.="<li>Only JPG/PNG/GIF files are allowed";
				//echo $msg;
			}
									
			$fileName = uniqid() . '.' . $fileData['extension'];
			$target_path = "Bus/" . $fileName;
									
			while(file_exists($target_path))
			{
				$fileName = uniqid() . '.' . $fileData['extension'];
				$target_path = "Bus/" . $fileName;
			}
									
			if(!$msg=="")
			{
				header("location:addbus.php?error=".$msg);
			}
			else
			{
										
				if(move_uploaded_file($_FILES["fileField"]["tmp_name"], $target_path))
				{	
					$x=0;
				}
				else
				{
					echo mysql_error();	
				}	
			}
			if($x==0)
			{
				$b_photo="Bus/".$fileName;
				$update=mysql_query("INSERT INTO bus (b_name, b_type, b_max_seat, b_no, b_owner, b_contact_no, b_email, b_photo,b_status)
				VALUES
				('$b_name','$b_type','$b_max_seat','$b_no','$b_owner','$b_contact_no','$b_email','$b_photo','1')");
				if($update)
				{
					$query="SELECT * FROM  bus ORDER BY b_id DESC LIMIT 1";
					if($result=mysql_query($query))
					{
						while($row=mysql_fetch_array($result))
						{
							$status=0;
							$b_id=$row['b_id'];
							for($j=1;$j<=$b_max_seat;$j++)
							{
								$status=1;
								$update2=mysql_query("INSERT INTO seat (b_id, s_no) VALUES ('$b_id','$j')");
								if($update2)
								{
									$status2=1; 
								}
								else
								{
									/*$status=0;*/
									echo mysql_error();
								}
							}
							if($status2==1)
							{
								/*echo mysql_error();*/
								echo '<script> alert("Entered Successfully"); window.location.href="bus.php"; </script>';
							}
							else
							{
								echo '<script> alert("Entered Unsuccessfully"); window.location.href="bus.php"; </script>';
								/*echo mysql_error();*/
							}
						}
					}
				}
				else
				{
					/*mysql_error();*/
					echo '<script> alert("Entered Unsuccessfully"); </script>';
				}
			}
			else
			{
				/*echo '<script> alert("Photo is not Uploaded."); </script>';*/
				echo mysql_error();
			}
		}
		else if ($_FILES['fileField']['size'] == 0)
		{
			echo '<script> alert("Please Select a Photo of the Bus."); </script>';
		}
	}
	else
	{
		echo '<script> alert("Bus number already exists"); window.location.href="bus.php"; </script>';
	}
}
/*header("location: bus.php");*/
?>
