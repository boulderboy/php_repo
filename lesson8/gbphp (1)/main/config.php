<?php
const SOL = "b07152d234b79075b9640";

function connect() {
    static $link;
    if (empty($link)) {
        $link = mysqli_connect('host-2', 'root', '', 'gbphp2');
    }
    return $link;
}

function clearStr($str) {
    return mysqli_real_escape_string(connect(), strip_tags(trim($str)));
}

function isAdmin(){
    return (array_key_exists('isAdmin', $_SESSION));
}

function getMsg(){
    $msg = '';
    if (! empty($_SESSION['msg'])){
        $msg = $_SESSION['msg'];
        $_SESSION['msg'] = '';
    }
    return  $msg;
}

function template($param = '') {
    static $tmpl;
    if (empty($tmpl)){
        $tmpl = 'public.html';
    }
    if (! empty($param)) {
        $tmpl = $param;
    }
    return $tmpl;
}