<?php
session_start();
include('db.php');
if(isset($_GET['res']) && isset($_SESSION['s_name']) && isset($_SESSION['d_name']))
{
	$res_id=$_GET['res'];
	$s_name=$_SESSION['s_name'];
	$d_name=$_SESSION['d_name'];
	$r_time=0;
	$c_p_s=0;
	$total=0;
	$sql="select * from reservation where res_id='$res_id'";
	$result=mysql_query($sql);
	while($row=mysql_fetch_array($result))
	{
		$b_id=$row['b_id'];
		$r_id=$row['r_id'];
		$source=$row['source'];
		$destination=$row['destination'];
		$sql1="select * from bus where b_id='$b_id'";
		$result1=mysql_query($sql1);
		while($row1=mysql_fetch_array($result1))
		{
			$b_name=$row1['b_name'];
			$query10="select * from bus_route where r_id='$r_id'";
			$result10=mysql_query($query10);
			while($row10=mysql_fetch_array($result10))
			{
				$start_time=$row10['start_time'];
			}
			$f_id=$row1['b_type'];
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
		}
		$u_id=$row['u_id'];
		$sql9="select * from user where u_id='$u_id'";
		$result9=mysql_query($sql9);
		while($row9=mysql_fetch_array($result9))
		{
			$name=$row9['name'];
		}
		/*$s_id=$row['s_id'];
		$sql="select * from reservation where res_id='$res_id'";
		$result=mysql_query($sql);
		while($row=mysql_fetch_array($result))
		{
			
		}*/
		$booking_date=$row['booking_date'];
		$reservation_date=$row['reservation_date'];
		
	}
	/*$a_time=54000;
	echo $secs= strtotime($a_time)-strtotime("00:00:00");
	$r_time = date("H:i:s",strtotime($start_time)-$secs);*/
	$r_time='Please Arrive Before 20min.';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
.ticket
{
	width:55%;
	height:auto;
	margin:0 auto;
	border:solid;
	}

</style>

<style type="text/css" media="print">
.dontprint
{ display: none; }
</style>
</head>

<body>
<div class="ticket">
<table width="90%" border="0" align="center">
  <tr>
    <td align="right"><p><h1>GoBus Ticket</h1></p></td>
    <td align="right">&nbsp;</td>
    <td align="right"><p>Travel Related Queries</p>
    <p>7399900889</p></td>
  </tr>
  <tr>
    <td colspan="3"><hr /></td>
  </tr>
  <tr>
    <td><?php echo $s_name.' to  '.$d_name; ?></td>
    <td>Reservation Date : <?php echo $reservation_date; ?></td>
    <td>Bus Name : <br><?php echo $b_name; ?></td>
  </tr>
  <tr>
    <td colspan="3"> <hr /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><hr /></td>
  </tr>
  <tr>
    <td>Passenger Name :<br /><?php echo $name; ?></td>
    <td><p>Reservation Ticket</p>
      <p><?php echo $res_id; ?></p></td>
    <td>Seat Numbers : 
    <?php
	$sql11="select * from reservation where res_id='$res_id'";
	$result11=mysql_query($sql11);
	while($row11=mysql_fetch_array($result11))
	{
		$re_id=$row11['re_id'];
		$s_id=$row11['s_id'];
		$sql12="select * from seat where s_id='$s_id' && b_id='$b_id' ORDER BY s_no";
		$result12=mysql_query($sql12);
		while($row12=mysql_fetch_array($result12))
		{
			echo  '<br>'.$s_no=$row12['s_no'];
		}
		/*$sql13="select * from transaction_credit where re_id='$re_id' ";*/
		$sql13="SELECT * FROM `transaction_credit` WHERE ` re_id`='$re_id'";
		$result13=mysql_query($sql13);
		while($row13=mysql_fetch_array($result13))
		{
			$c_p_s=$row13['c_p_s'];
			$total=$total+$c_p_s;
		}
		
	}
	?>
    </td>
  </tr>
  <tr>
    <td colspan="3"><hr /><hr /></td>
  </tr>
  <tr>
    <td>Bus Type : <?php echo $b_type; ?></td>
    <td>Reporting Time : <?php echo $r_time; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Total Fare : <?php echo $total; ?></td>
    <td>Departure Time : <?php echo $start_time; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</div>
<br />
<div class="dontprint" align="center">
<button onclick="window.print()">Print Ticket</button> <button>
<a href="index.php">Home</a>
</button>
</div>
</body>
</html>
<?php
}
?>