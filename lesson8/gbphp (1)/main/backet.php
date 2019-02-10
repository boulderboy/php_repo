<?php
function index()

{
    if (empty($_SESSION['goods'])) {
        return 'Пуста';
    }

    $content = '';
    foreach ($_SESSION['goods'] as $id => $good) {
        $content .= <<<php
<h2>{$good['name']}</h2>
<p>{$good['price']}р.</p>
<p>
    <a href="?page=backet&func=del&id={$id}">-</a>    
        {$good['count']}
    <a href="?page=backet&func=add&id={$id}">+</a>
</p>
php;
    }

    $userName = '';
    $userPhone = '';
    $userAddr = '';

    if(array_key_exists('user', $_SESSION)){
        $userName = $_SESSION['user'];
        $userPhone = $_SESSION['phone'];
        $userAddr = $_SESSION['addr'];
    }
    $content .= <<<php
    <h2>Заказать</h2>
<form method="post" action="?page=backet&func=zakaz">
    <input name="fio" placeholder="fio" value="$userName">
    <input name="tel" placeholder="tel" value="$userPhone">
    <input name="adress" placeholder="adress" value="$userAddr">
    <input type="submit">
</form>  
php;

    return $content;
}

function add()
{
    $id = (int)$_GET['id'];
    $msg = 'Что-то пошло не так...';
    if (!empty($id)) {
        $sql = "SELECT id, name, info, price FROM goods WHERE id = $id";
        $res = mysqli_query(connect(), $sql);
        $row = mysqli_fetch_assoc($res);
        if (!empty($row)) {
            $item = [
                'price' => $row['price'],
                'name' => $row['name'],
            ];
            if (empty($_SESSION['goods'][$id])) {
                $item['count'] = 1;
                $_SESSION['goods'][$id] = $item;
            } else {
                $_SESSION['goods'][$id]['count'] += 1;
            }
            $msg = 'Товар добавлен';
        }
    }
    if ($_SERVER['HTTP_REFERER'] == 'http://public/?page=backet') {
        $msg = '';
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        echo count ($_SESSION['goods']);
        exit;
    }

    $_SESSION['msg'] = $msg;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

function del()
{
    $id = (int)$_GET['id'];
    $msg = 'Что-то пошло не так...';
    if (!empty($id)) {
        if (!empty($_SESSION['goods'][$id])) {
            if ($_SESSION['goods'][$id]['count'] != 1) {
                $_SESSION['goods'][$id]['count'] -= 1;
            } else {
                unset($_SESSION['goods'][$id]);
            }
        }
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

function addajax(){
    add();
}

function zakaz() {
    $msg = 'Что-то пошло не так...';
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $fio = clearStr($_POST['fio']);
        $tel = clearStr($_POST['tel']);
        $adress = clearStr($_POST['adress']);
        $date = date('d.m.y');
        $info = json_encode(array_values($_SESSION['goods']), JSON_UNESCAPED_UNICODE );

        $sql = "INSERT INTO zakaz(fio, tel, adress, info, date) 
                  VALUES ('$fio', '$tel', '$adress', '$info', '$date')";
        mysqli_query(connect(), $sql);
        unset($_SESSION['goods']);
        $msg = 'Ваш заказ принят';
    }

    $_SESSION['msg'] = $msg;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}