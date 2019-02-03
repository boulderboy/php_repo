<?php
if(!empty($_POST)){
   $userName = $_POST['userName'];
    $link = mysqli_connect("host-2", "root", "", "brand");
    $query = 'select * from users where userName="'.$userName.'"';
    $result = mysqli_query($link, $query);
    $user = mysqli_fetch_assoc($result);

    if(!empty($user)){
        $password = md5($_POST['userPassword']);
        if($user['password'] == $password){
            session_start();
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $user['id'];
            $_SESSION['login'] = $user['userName'];
            $json = json_encode(['auth'=> $_SESSION['auth'],'id' => $_SESSION['id'], 'login' => $_SESSION["login"]]);
            print_r($json);
        }   else {
            echo "Incorrect login or password";
        }
    }   else {
        echo "This login doesn't exist";
    }
//    while ($user = mysqli_fetch_assoc($result)){
//        if($user['userName'] == $userName && $user['password'] == $password){
//            setcookie("name", $userName, time() + 3600*7, '/');
//            setcookie("success", "ok", time() + 3600*7, '/');
//            setcookie("admin", $user['admin'], time() + 3600*7, '/');
//        }   else {
//            setcookie("success", 'notOk');
//        }
//    }
//    if($_COOKIE['success'] == 'ok'){
//        $answer = ["success" => $_COOKIE["success"], "admin"=>$_COOKIE["admin"], "name" => $_COOKIE["name"]];
//    }   else $answer = ["success" => $_COOKIE["success"], "error" => "incorrect"];
//
//    echo json_encode($answer);
}
if($_SERVER["REQUEST_METHOD"] == "GET"){

    session_destroy();
    echo 15;
}
