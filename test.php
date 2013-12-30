<?php
require( "config.php" );
getPercentiles("global",9);
function getPercentiles($community,$score){
	$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); //database connection is established uisng credentials in config.php
	$sql = "SELECT Attribute,Average, Deviation FROM $community"; //sql query that returns the string of the question in the table
	$st = $conn->prepare( $sql );// prevents user browser from seeing queries. Useful for security
	$st->execute();//executes query above
	$stats=$st->fetchAll(); //$question source is set to result of query
	print_r($stats);
	$result=Array();
	$positive=true;
	foreach($stats as $stat){
		if($stat[2]>0){
			$avg=$stat[1];
			$dev=$stat[2];
			$temp=($score-$avg)/$dev;
			$positive=$temp>0;
			$percentile=cdf_2tail($temp);
			if($positive){
				$percentile=1-$percentile/2;
			}
			else{
				$percentile=$percentile/2;
			}
			$result[$stat['Attribute']]=$percentile>0.3 ? (int)($percentile*100)."%" :"N/A";
		}
		else{
			$result[$stat['Attribute']]="N/A";
		}

	}
	print_r($result);	
  	$conn = null;
  	return $result;
}
function erf($x)
{
    $pi = 3.1415927;
    $a = (8*($pi - 3))/(3*$pi*(4 - $pi));
    $x2 = $x * $x;

    $ax2 = $a * $x2;
    $num = (4/$pi) + $ax2;
    $denom = 1 + $ax2;

    $inner = (-$x2)*$num/$denom;
    $erf2 = 1 - exp($inner);

    return sqrt($erf2);
}

function cdf($n)
{
         return (1 - erf($n / sqrt(2)))/2;
         //I removed the $n < 0 test which inverses the +1/-1
}

function cdf_2tail($n)
{
        return 2*cdf($n);
            //After a little more digging around, the two tail test is simply 2 x the cdf.
}
?>