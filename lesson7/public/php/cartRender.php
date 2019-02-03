<?php
session_start();
$goodId = $_POST['id'];
$exist = 0;
$arrayId = 0;

if($_POST['action'] == 'add'){
    if(!array_key_exists('goods',$_SESSION)){
        $_SESSION['goods'] = [];
    }

    if(array_key_exists($goodId, $_SESSION['goods'])){
        $_SESSION['goods'][$goodId]['quantity'] += 1;
    }

    else {
        $link = mysqli_connect("host-2", "root", "", "brand");
        $query = "select * from goods where id = $goodId";
        $data = mysqli_query($link, $query);
        $good = [];

        while ($data1 = mysqli_fetch_assoc($data)) {
            $good['name'] = $data1['name'];
            $good['price'] = $data1['price'];
            $good['rating'] = $data1['rating'];
            $good['quantity'] = 1;
            $good['id'] = $goodId;
        };
        $_SESSION['goods'][$goodId] = $good;
    }

    echo json_encode($_SESSION['goods']);
}
if($_POST['action'] == 'delete'){
    unset($_SESSION['goods'][$goodId]);
    echo  json_encode($_SESSION['goods']);
}
//}
//
//print_r( $_SESSION[$goodId]);//json_encode($_SESSION);

//echo '<div class="hidden-prod">
//        <img src="img/minis-for-cart/cat-'.$goodId.'.jpeg" alt="">
//        <div class="hidden-prod-rating">
//            <h5>'.$_SESSION[$goodId]["name"].'</h5>
//            <img src="img/stars.png">
//            <span class="hidden-cart-price">'.$_SESSION[$goodId]["price"].'</span>
//        </div>
//        <i class="fas fa-times-circle remove" data-id="'.$goodId.'" data-quantity="'.$_SESSION[$goodId]["quantity"].'"></i>
//        </div>';

//
//function cartRender(){
//    if(!isset($_SESSION["goods"])){
//        echo "<span>Your cart is empty</span>";
//    } else  {
//        foreach ($_SESSION[goods] as $prodInfo){
//            foreach ($prodInfo as $a => $info){
//                print_r($info);
//            }
//        }
//    }
//}
