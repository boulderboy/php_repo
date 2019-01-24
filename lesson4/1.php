<?php
function renderImages() {
    $imgRoutes = ["1.jpg", "2.jpg", "3.jpg", "4.jpg", "5.jpg", "6.jpg"];
    foreach ($imgRoutes as $img) {
        echo "<a href='img/$img' target='_blank'><img src='img_mini/$img' class='image'></a>";
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
        renderImages();
        ?>
    </div>
</body>
</html>
