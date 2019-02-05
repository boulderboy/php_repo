<?php

setcookie('id',   12,     time()+$sessionTime, '/');
setcookie('hash',54,            time()+$sessionTime, '/');
header('Location:  ../catolog.php');