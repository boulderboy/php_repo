<?php
function index () {
    $sql = 'SELECT * FROM zakaz WHERE accepted != -1 ORDER BY accepted';
    $res = mysqli_query(connect(), $sql);
    $content = "<h2 id='pageCheck' data-page='orders'>Обзор заказов</h2>";
    while ($row = mysqli_fetch_assoc($res)){
        $acceptionStyle = '';
        switch ($row['accepted']){
            case '0':
                $acceptionStyle .= 'background: blue; background: rgba(0, 255, 0, 0.5);';
                break;
            case '-1':
                $acceptionStyle .= 'background: pink; background: rgba(255, 0, 0, 0.5);';
                break;
        };
        $content .= <<<php
    <a href="?page=orders&func=one&id={$row['id']}" style="{$acceptionStyle}; display: block">{$row['date']}{$row["fio"]}
                <span style="float: right">{$row["accepted"]}</span>
    </a><hr>
php;
        }

    $content .= <<<php
    <a href="?page=orders&func=declinedRender" style="color: blueviolet;">Показать отклоненные заказы</a>
php;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        echo $content;
        exit;
    }
    return $content;

}


function ajaxRefresh() {
    index();
}


function one () {
    $id = (int) $_GET['id'];
    $sql = "SELECT * FROM zakaz WHERE id = $id";
    $res = mysqli_query(connect(), $sql);
    $row = mysqli_fetch_assoc($res);
    $goods = json_decode($row['info'], true);
    $acception = ($row['accepted'] != 1) ? 'Одобрить' : 'Заказ одобрен';
    $declination = ($row['accepted'] == -1) ? 'Заказ отклонен' : 'Отклонить';
    $acceptFunc = ($row['accepted'] != 1) ? "onclick='accept({$id})'": "";
    $declineFunc = ($row['accepted'] !== -1) ? "onclick='decline({$id})'": "";
    $content = "<a href='?page=orders'>Все заказы</a>";
    $content = <<<php
    <h1>{$row['fio']}</h1>
			<p style="color: red; cursor: pointer"  id="acception" {$acceptFunc}>{$acception}</p>
			<p style="color: red; cursor: pointer"  id="decline" {$declineFunc}>{$declination}</p>
			<p>{$row['date']}</p>
            <h3>Товары в заказе</h3><hr>
php;
    $superTotal = 0;
    foreach ($goods as $good) {
        $total = $good["price"] * $good["count"];
        $superTotal += (int)$total;
        $content .= <<<php
    <p>Товар: {$good['name']}</p>
    <p>Количество: {$good['count']}</p>
    <p>Цена за шт: {$good['price']}</p>
    <p>Итоговая цена: {$total}</p><hr>
php;
    }
    $content .= "<h2>Всего за покупку: $superTotal р.</h2>";
    return $content;
}

function declinedRender () {
    $sql = 'SELECT * FROM zakaz WHERE accepted = -1 ORDER BY date';
    $res = mysqli_query(connect(), $sql);
    $content = "<h2 id='pageCheck' data-page='declinedOrders'>Отклоненные товары</h2>
                <a href='?page=orders' style='color : green;'>Все заказы</a><br><br>";

    while ($row = mysqli_fetch_assoc($res)){

        $content .= <<<php
    <a href="?page=orders&func=one&id={$row['id']}" style="display: block">{$row['date']}{$row["fio"]}
                <span style="float: right">{$row["accepted"]}</span>
    </a><hr>
php;
    }


    return $content;
}

function acceptOrder () {
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_POST['id'];
        $sql = "UPDATE zakaz SET accepted = 1 WHERE (id = $id);";
        mysqli_query(connect(), $sql);
        echo 'Заказ одобрен!';
        exit;
    }
}

function declineOrder () {
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_POST['id'];
        $sql = "UPDATE zakaz SET accepted = -1 WHERE (id = $id);";
        mysqli_query(connect(), $sql);
        echo 'Заказ отклонен!';
        exit;
    }
}

function userStory() {
    if(! empty($_SESSION['userID'])){
        $userID = (int)$_SESSION['userID'];
        $sql = "SELECT * FROM zakaz WHERE userID = $userID ORDER BY date DESC";
        $res = mysqli_query(connect(), $sql);
        $content = '';
        if($res) {
            while ($row = mysqli_fetch_assoc($res)) {
                $content .= "<div style='border-bottom: 1px dotted darkblue'><h3>{$row['date']}</h3><hr>";
                switch ($row['accepted']){
                    case 0:
                        $acception = 'на рассмотрении';
                        break;
                    case 1:
                        $acception = 'одобрен';
                        break;
                    case -1:
                        $acception = 'отменен';
                        break;
                }
                $orderInfo = json_decode($row['info'], true);
                foreach ($orderInfo as $oneOreder) {
                    $content .= <<<php
<p>Название: {$oneOreder['name']}</p><br>
<p>Количество: {$oneOreder['count']}</p><br>
<p>Цена: {$oneOreder['price']}</p><br>
php;

                }

                $content .= "<p>Статус заказа: {$acception}</p></div><br><br>";


            };
            return $content;
        }
        $content = 'Нет заказов';
        return $content;
    }
}