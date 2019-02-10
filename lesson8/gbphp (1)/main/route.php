<?php
session_start();

include ('config.php');


$page = ! empty($_GET['page']) ? $_GET['page'] : 'index';
$func = ! empty($_GET['func']) ? $_GET['func'] : 'index';

$dir = __DIR__ . '/';

if (! file_exists($dir . $page . '.php')){
    $page = 'index';
}

include ($dir . $page . '.php');

if (! function_exists($func)){
    $func = 'index';
}
$content = $func();
//var_dump($_SESSION);

if(!array_key_exists('isAdmin', $_SESSION) || !$_SESSION['isAdmin'] == 1){
    $template = file_get_contents($dir . 'tmpl/' . template() );
} else {
    $template = file_get_contents($dir . 'tmpl/' . template('admin.html') );
}

	$newDate = [
        '{CONTENT}' => $content,
        '{___MSG_}' => getMsg(),
        '{__COUNT}' => (array_key_exists('goods', $_SESSION)) ? count($_SESSION['goods']) : 0,
	    '{__USER}' => (array_key_exists('user', $_SESSION)) ? 'Привет, '.$_SESSION['user'] : 'Авторизоваться',
    ];

   echo strtr($template, $newDate);




