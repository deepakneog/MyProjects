<?php
session_start();
include('db.php');
if(isset($_POST['submit']) && isset($_POST['r_id']) && isset($_POST['b_id']) && isset($_POST['r_date']) && isset($_POST['checkbox']) && isset($_POST['c_p_s']) && isset($_SESSION['source']) && isset($_SESSION['destination']))
{
	$u_name=$_SESSION['u_name'];
	$sql3= "SELECT * FROM `user` WHERE u_name='$u_name'";
	$result3= mysql_query($sql3);
	while($row3=mysql_fetch_array($result3))
	{
		$u_id=$row3['u_id'];
	}
	date_default_timezone_set('Asia/Kolkata');
	$date=date('Y-m-d');
	$time=date('H:i');
	$r_id=$_POST['r_id'];
	$b_id=$_POST['b_id'];
	$r_date=$_POST['r_date'];
	$c_p_s=$_POST['c_p_s'];
	$checkbox=$_POST["checkbox"];
	$source=$_SESSION["source"];
	$destination=$_SESSION["destination"];
	$i_count=count($checkbox);
	$i_counting=0;
	$year=date("y");
	$month=date("m");
	$day=date("d");
	$number = 1;
	$res_id=$year.$month.$day.'-'.$num_str = sprintf("%02d", mt_rand(1, 999999));
	$query5="select * from user where u_id='$u_id'";
	$result5=mysql_query($query5);
	while($row5=mysql_fetch_array($result5))
	{
		$gocash=$row5['gocash'];
	}
	$total_c=$c_p_s*$i_count;
	if($gocash<$total_c)
	{
		echo 'You Donnot Have Sufficient Balance In GoBus A/C.....';
	}
	else
	{
		for($i=0;$i<count($checkbox);$i++)
		{
			$s_id=$checkbox[$i];
			/*$query = mysql_query("select * from seat where s_id='$s_id' && b_id='$b_id' && status='1' ");
			if (mysql_num_rows($query)<1)
			{
				echo '<script>alert("Selected Seats Are Booked. Please Select Different Seats."); window.location.href="seats.php?b='.$b_id.'&r='.$r_id.'&rd='.$r_date.'";</script>';
			}
			else
			{
				$sql1="UPDATE `seat` SET `status`='0' WHERE `s_id`='$s_id'";
				$result1=mysql_query($sql1);
				if($result1)
				{*/
					$sql2="INSERT INTO reservation(b_id,u_id,r_id,s_id,res_id,status,booking_date,booking_time,reservation_date,source,destination) VALUES ('$b_id','$u_id','$r_id','$s_id','$res_id','1','$date','$time','$r_date','$source','$destination')";
					$result2=mysql_query($sql2);
					if($result2)
					{
						$sql3="SELECT * from reservation where u_id='$u_id' && booking_date='$date' && reservation_date='$r_date' && status='1' ORDER BY re_id DESC LIMIT 1";
						$result3=mysql_query($sql3);
						while($row3=mysql_fetch_array($result3))
						{
							echo $re_id=$row3['re_id'];
						}
						//$sql4="INSERT INTO transaction_credit(u_id,re_id,c_p_s,date,time,status) VALUES ('$u_id','$re_id','$c_p_s','$date','$time','1')";
						$sql4="INSERT INTO `transaction_credit`(`u_id`,` re_id`, `b_id`,`c_p_s`,`date`,`time`,`status`) VALUES ('$u_id','$re_id','$b_id','$c_p_s','$date','$time','1')";
						$result4=mysql_query($sql4);
						if($result4)
						{
							$sql6="UPDATE `user` SET `gocash`=gocash-$c_p_s WHERE `u_id`='$u_id'";
							$result6=mysql_query($sql6);
							if($result6)
							{
								$sql7="UPDATE `admin` SET `gocash`=gocash+$c_p_s WHERE `id`='1'";
								$result7=mysql_query($sql7);
								if($result7)
								{
									$i_counting=$i_counting+1;
									if($i_count==$i_counting)
									{
										header("location: ticket.php?res=".$res_id."");
									}
									/*else
									{
										echo 'Some Seats Cannot Be Booked.';
									}*/
									/*echo '<script>alert("Selected Seats Booked Succesfuly."); window.location.href="index.php";</script>';*/
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
						/*echo '<script>alert("Seats Cannot Be Booked."); window.location.href="seats.php?b='.$b_id.'&r='.$r_id.'&rd='.$r_date.'";</script>';*/
						echo mysql_error();
					}
				/*}
				else
				{
					echo '<script>alert("Seat Status Cannot Be Updated."); window.location.href="seats.php?b='.$b_id.'&r='.$r_id.'&rd='.$r_date.'";</script>';
				}
			}*/
		}
	}
}
else
{
	/*echo '<script>alert("Enter Required Data First."); window.location.href="index.php";</script>';*/
	/*echo '<script>alert("Enter Required Data First."); window.location.href="seats.php?b='.$b_id.'&r='.$r_id.'&rd='.$r_date.'";</script>';*/
	echo mysql_error();
}
?>