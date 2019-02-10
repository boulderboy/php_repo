<?php
$link = mysqli_connect('host-2', 'root', '', 'gbphp2');
$sql = "select * from users";

$res = mysqli_query($link, $sql)  or die(mysqli_error($link));
var_dump($res);
var_dump(mysqli_fetch_assoc($res));