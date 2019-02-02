<?php

$result = "Пока пусто";
//var_dump($_POST);
if($_POST) {
    $firstNumber = $_POST["firstNumber"];
    $secondNumber = $_POST["secondNumber"];
    $operation = $_POST["operation"];

    switch ($operation) {
        case "multiply":
            $result = $firstNumber * $secondNumber;
            $operation = '*';
            break;
        case "devide":
            $result = $firstNumber / $secondNumber;
            $operation = '/';
            break;
        case "minus":
            $result = $firstNumber - $secondNumber;
            $operation = '-';
            break;
        case "plus":
            $result = $firstNumber + $secondNumber;
            $operation = '+';
            break;
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>calc</title>
</head>
<body>
<form action="" method="post">
    <input type="number" name="firstNumber">
    <input type="number" name="secondNumber">
    <select name="operation" id="">
        <option value="multiply">multiply</option>
        <option value="devide">devide</option>
        <option value="minus">minus</option>
        <option value="plus">plus</option>
    </select>
    <input type="submit">
</form>

<span>Результат: <?php
    echo $firstNumber.$operation.$secondNumber."=".$result;
    ?></span>
</body>
</html>
