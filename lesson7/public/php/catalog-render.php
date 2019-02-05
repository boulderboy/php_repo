<?php
$link = mysqli_connect("host-2", "root", "", "brand");
$query = "select * from goods";

$result = mysqli_query($link, $query);

while ($info = mysqli_fetch_assoc($result)){
    echo '<div class="product-hover">
                <a href="single-page.html" class="products__card">
                <img src="../' .$info["path-to-img"]. '" alt="">
                 <div class="products__text">
               <p>' .$info["name"]. '</p>
               <span>$' .$info["price"]. '</span>
                </div>
                </a>
               
              
                <div class="add-flex">
                <a href="#" class="add-to-cart" data-id="' .$info["id"]. '" data-rating="'.$info["rating"].'"
                 data-price="'.$info["price"].'" data-name="'.$info["name"].'">add to cart</a>
                </div>
          </div>';
}



