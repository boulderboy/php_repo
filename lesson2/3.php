<?php
function sum($a, $b){
    return $a + $b;
}
function divide($a, $b){
    return $a / $b;
}
function multiply($a, $b){
    return $a * $b;
}
function subtraction($a, $b){
    return $a - $b;
}

$a = (int)htmlspecialchars($_POST['first']);
$b = (int)htmlspecialchars($_POST['second']);
$operation = htmlspecialchars($_POST['operation']);

switch ($operation){
    case '+':
        echo  sum($a, $b);
        break;
    case '-':
        echo  subtraction($a, $b);
        break;
    case '*':
        echo multiply($a, $b);
        break;
    case ':':
        echo divide($a, $b);
        break;
    default:
        echo 'Не корректный ввод';
}




