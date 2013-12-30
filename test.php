<?php  
 $datetime1 = new DateTime(date("Y-m-d H:i:s", time()));
 $datetime2 = new DateTime('2013-12-30 ');
$interval = $datetime1->diff($datetime2);
echo $interval->format('%a days');
?>