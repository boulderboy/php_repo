<?php


$link = mysqli_connect('host-2', 'root', "", 'gallery')

or die("Ошибка ".mysqli_error($link));

$query ="SELECT * FROM path order by clicks desc ";

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

$imgInfo = [];

while ($row = mysqli_fetch_assoc($result)){
    $imgInfo[] = $row;
}


echo "<div style= 'width: 700px; margin: 0 auto; display: flex; flex-wrap: wrap'>";

if($imgInfo) {
    foreach ($imgInfo as $value => $a) {
        echo '<div style="display: flex; flex-direction: column; align-items: center"><a href="new_image.php?name='
            . $a["name"] . '.' . $a["format"] .'&id='.$a['id'].'&click='.$a['clicks']. '" target="_blank">
            <img src="img_mini/' . $a["name"] . '.' . $a["format"] . '"></a>
            <span style="display: block">' . $a["clicks"] . '</span>
           </div>';
    }

    mysqli_free_result($result);
}

echo "</div>";

mysqli_close($link);
