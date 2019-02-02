<?php
if($_POST){
    $firstNumber = (int)$_POST["firstNum"];
    $secondNumber = (int)$_POST["secondNum"];
    $operation = $_POST["operation"];

    switch ($operation) {
        case "*":
            $result = $firstNumber * $secondNumber;
            break;
        case "/":
            $result = $firstNumber / $secondNumber;
            break;
        case "-":
            $result = $firstNumber - $secondNumber;
            break;
        case "+":
            $result = $firstNumber + $secondNumber;
            break;
    }
}

echo "Результат вычислений: ".$result;