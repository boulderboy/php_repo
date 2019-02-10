<?php

function index()
{
    $content = <<<php
    <h2 id='pageCheck' data-page='goodsAdministration'>Изменение товаров</h2>
    <form action="?page=goodsAdministration&func=getGood" method="POST">
    <label for="goodId">Введите id товара</label> <br>
    <input type="text" placeholder="id" id="goodId" name="goodId">
    <input type="submit" id="submitGoodSearch" value="Найти"><br><br>
    <a href="?page=goodsAdministration&func=createGood" style="color: red">Создать новый товар</a>
</form>
php;
    return $content;
}

function getGood()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $id = $_POST["goodId"];
        $sql = "SELECT * FROM goods WHERE id = $id;";
        $res = mysqli_query(connect(), $sql);
        $row = mysqli_fetch_assoc($res);
        if(! empty($row)) {
            $content = <<<php
    <h2 id="pageCheck" data-page="goodInfo">Информация о товаре</h2>
    <h3>Index: <span style="color: red" id="goodId">{$row["id"]}</span></h3>
    <label for="goodName">Название</label>
    <input type="text" value="{$row["name"]}" id="goodName"><br>
    <label for="goodInfo">Информация о товаре</label><br>
    <textarea id="goodInfo" cols="50" rows="10" style="margin-top: 10px; margin-bottom: 10px">{$row['info']}</textarea><br>
    <label for="goodPrice">Цена</label>
    <input type="text" id="goodPrice" value="{$row['price']}"><br>
    <div id="actions">
    <button type="submit" disabled id="submitChanges">Сохранить изменения</button>
   
php;
        } else{
            $content = "<p>Такого id не существует</p>";
        }
        $content .= " <a style=\"color: red\" href=\"?page=goodsAdministration\">Новый поиск</a></div>";
        return $content;
    }
    exit;
}

function createGood () {
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $name = clearStr($_POST['name']);
        $info = clearStr($_POST['info']);
        $price = (int)$_POST['price'];
        $sql = "INSERT INTO goods (name, info, price) VALUES ('$name', '$info', $price)";
        mysqli_query(connect(), $sql);
        $content = <<<php
        <h4>Товар был создан</h4>
        <a href="?page=goodsAdministration&func=createGood">Создать новый товар</a>
php;
        return $content;


    }   else {
        $content = <<<php
    <h2 id="pageCheck" data-page="createGood">Создание товара</h2>
    
    <form action="?page=goodsAdministration&func=createGood" method="post">
        <label for="goodName">Название</label>
        <input type="text"  id="goodName" placeholder="Введите название" name="name"><br><br>
        <label for="goodInfo">Информация о товаре</label><br>
        <textarea id="goodInfo" cols="50" rows="10" 
        style="margin-top: 10px; margin-bottom: 10px" placeholder="Введите информацию о товаре" name="info">
</textarea><br>
        <label for="goodPrice">Цена</label>
        <input type="number" id="goodPrice" placeholder="Введите цену" name="price"><br>
        <button type="submit" id="submitChanges">Сохранить товар</button>
</form>
   
php;
        return $content;
    }


}

function editGood () {
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = (int)$_POST['id'];
        $name = clearStr($_POST['name']);
        $info = clearStr($_POST['info']);
        $price = (int)$_POST['price'];
        $sql = "UPDATE goods SET name = '$name', info = '$info', price = $price WHERE (id = $id);";
        mysqli_query(connect(), $sql);
        echo "Данные обновлены";
        exit;
    }
}