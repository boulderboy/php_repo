<?php

$link  = mysqli_connect('host-2', 'root', "", 'gallery')

or die("Ошибка ".mysqli_error($link));

$clicks = $_GET['click'] + 1;
$id = $_GET['id'];


$query = 'UPDATE path SET `clicks` = '.$clicks. ' WHERE (`id` = '.$id.');';

$res = mysqli_query($link, $query);

echo "<img src='img/$_GET[name]'>";