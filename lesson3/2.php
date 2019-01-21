<?php
$a = 0;
$text = null;

do {
    if($a == 0){
        $text = ' - это ноль<br>';
    } elseif ($a % 2 == 0){
        $text = ' - это четное число<br>';
    }   else{
        $text = ' - это нечетное число<br>';
    }
    echo $a.$text;
    $a++;
} while($a <= 100);