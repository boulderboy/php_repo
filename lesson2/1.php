<?php

$a = rand(-100, 100);
$b = rand(-100, 100);

echo ('a = '.$a.'; b = '.$b.'<br>');
if($a >= 0 && $b >= 0 ){
    $c = $a - $b;
    echo 'a – b = '.$c;
}   elseif ($a < 0 && $b < 0){
    $c = $a*$b;
    echo 'a * b = '.$c;
}   else {
    $c = $a+$b;
    echo 'a + b = '.$c;
}