<?php
function endings ($hours, $minutes){
    $hoursEnding = null;
    if(($hours >= 0 && $hours < 25)&&($minutes >= 0 && $minutes < 61)){
        if(($hours > 1 && $hours < 5) || ($hours > 21 && $hours <=24)){
            $hoursEnding = 'а';
        } elseif ($hours > 4 && $hours < 21){
            $hoursEnding = 'ов';
        }

        if($minutes % 10 == 1 && $minutes !== 11){
            $minutesEnding = 'а';
        } elseif ($minutes % 10 == 2){
            $minutesEnding = 'ы';
        }
        echo $hours.' час'.$hoursEnding." ".$minutes.' минут'.$minutesEnding.'<br>';
    } else {
        echo 'Некорректный ввод<br>';
    }
}

endings(24, 2);
endings(25, 100);
endings(1, 21);