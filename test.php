<?php
$test=cdf_2tail(-.57);
echo $test= (int)((1-$test)*100)."%";
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