<?php
$logDir = "logs/";
file_put_contents($logDir."log.txt", date("c")."\r\n\r\n", FILE_APPEND);
