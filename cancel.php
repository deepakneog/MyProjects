<?php
session_start();
include('db.php');
if(isset($_SESSION['u_name']))
{
	$u_name=$_SESSION['u_name'];
	$sql="select * from user where u_name='$u_name'";
	$result=mysql_query($sql);
	while($row=mysql_fetch_array($result))
	{
		$u_id=$row['u_id'];
	}
	if(isset($_GET['r']))
	{
		$re_id=$_GET['r'];
		date_default_timezone_set('Asia/Kolkata');
		$date=date('Y-m-d');
		$time=date('H:i');
		$sql1="UPDATE `reservation` SET `status`=0 WHERE `re_id`='$re_id'";
		$result1=mysql_query($sql1);
		if($result1)
		{
			$sql2="INSERT INTO `cancellation`(`re_id`, `date`, `time`) VALUES ('$re_id','$date','$time')";
			$result2=mysql_query($sql2);
			if($result2)
			{
				$sql3="SELECT * FROM `transaction_credit` WHERE ` re_id`='$re_id' && status=1";
				$result3=mysql_query($sql3);
				while($row3=mysql_fetch_array($result3))
				{
					$tc_id=$row3['tc_id'];
					$c_p_s=$row3['c_p_s'];
				}
				$sql4="UPDATE `transaction_credit` SET `status`=0 WHERE `tc_id`='$tc_id'";
				$result4=mysql_query($sql4);
				if($result4)
				{
					$sql5="INSERT INTO `transaction_debit`(`tc_id`, `u_id`, ` re_id`, `c_p_s`, `date`, `time`, `status`) VALUES ('$tc_id','$u_id','$re_id','$c_p_s','$date','$time',1)";
					$result5=mysql_query($sql5);
					if($result5)
					{
						$sql6="UPDATE `user` SET `gocash`=gocash+$c_p_s WHERE `u_id`='$u_id'";
						$result6=mysql_query($sql6);
						if($result6)
						{
							$sql7="UPDATE `admin` SET `gocash`=gocash-$c_p_s WHERE `id`='1'";
							$result7=mysql_query($sql7);
							if($result7)
							{
								echo '<script> alert("Successful"); window.location.href="cancelation.php"; </script>';
							}
							else
							{
								echo mysql_error();
							}
						}
						else
						{
							echo mysql_error();
						}
					}
					else
					{
						echo mysql_error();
					}
				}
				else
				{
					echo mysql_error();
				}
				
			}
			else
			{
				echo mysql_error();
				/*echo 'Canceled Ticket Cannot Be Updated.';*/
			}
		}
		else
		{
				echo '<script> alert("Cannot Be Canceled"); window.location.href="cancelation.php"; </script>';
		}
	}
}
else
{
	
	echo '<script> alert("Login For Cancelation"); window.location.href="index.php"; </script>';
}
?>