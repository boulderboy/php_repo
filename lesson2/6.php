<?php

function power($val, $pow){
    if($pow != 1){
        return $val * power($val, $pow -1);
    }
    else return $val;
}

echo power(51, 100);