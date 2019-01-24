<?php
$directorySmall = "img_mini/";
$directoryOriginal = "img/";
$minis = scandir($directorySmall);

function renderGallery($minis, $directoryOriginal, $directorySmall) {
    foreach ($minis as $mini) {
        if(($mini != ".") && ($mini != "..")){
            echo "<a target='_blank' href='$directoryOriginal$mini'><img src='$directorySmall$mini'></a>";
        }
    }
}

?>

<!doctype html>
<html lang="">
<head>
    <style>
        .container {
            margin: 0 auto;
            width: 1200px;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        a {
            margin: 40px;
        }
    </style>
    <meta charset="UTF-8">
    <title>Gallery</title>
</head>
<body>
<div class="container">
    <?
    renderGallery($minis, $directoryOriginal, $directorySmall);
    ?>
</div>
</body>
</html>

