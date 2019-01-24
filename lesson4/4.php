<?php

$logDir = "logs/";
$numberOfLogs = sizeof(file($logDir."log.txt"));
$numberOfFiles = sizeof(scandir($logDir)) - 3;// у меня macOS дописывает DS_STORE

if($numberOfLogs == 10) { // 11 потому что есть перенос строки
    copy($logDir."log.txt", $logDir."log".$numberOfFiles.".txt");
    file_put_contents($logDir."log.txt", '');
}
file_put_contents($logDir . "log.txt", date("c") . "\r\n", FILE_APPEND);
$visits = ($numberOfFiles - 1) * 10 + $numberOfLogs;
echo "Вы зашли на этот сайт ".$visits." раз";