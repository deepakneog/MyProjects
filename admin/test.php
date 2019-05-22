<?php
/*$time = "06:58:00";
$time2 = "01:40:00";

echo $secs = strtotime($time2)-strtotime("00:00:00");*/
//echo $result = date("H:i:s",strtotime($time)+$secs);
list($one, $two) = explode("@", "shubhamghosh.nrg@gmail.com", 2);
echo $one;
echo '<br>';
echo $two;
echo '<br>';
list($one, $two) = explode(".", "$two", 2);
echo $one;
echo '<br>';
echo $two;
if($two=='com')
{
	echo 'Valid Email';
}
else
{
	echo 'Invalid Email';
}
?>