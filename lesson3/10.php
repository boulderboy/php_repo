<?php
function multiplyTableRender() {
    echo "<table>";
    for($i = 0; $i <= 10; $i++){
        echo "<tr><td>".$i."</td>";

        for ($j = 1; $j <= 10; $j++){
            if($i == 0){
                echo "<td>".$j."</td>";
            } else{
            echo "<td>".$j*$i."</td>";}
        }
        echo "</tr>";
    }
    echo "</table>";
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        table {
            border: 1px solid #000;
            border-collapse: collapse;
        }
        td {
            border: 1px solid #000;
            width: 20px;
            text-align: center;
        }
        
    </style>
</head>
<body>
<? multiplyTableRender();?>
</body>
</html>
