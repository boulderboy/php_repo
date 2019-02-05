<? session_start();
var_dump($_SESSION);

include_once ("../main/config.php");

if(array_key_exists("checkout", $_GET) && $_GET["checkout"] == "true"){
    $cart = [];
    foreach ($_SESSION["goods"] as $good){
        $cart[$good["id"]] = ["quantity" => $good["quantity"], "price" => $good["price"]];
    }
    $jsonString = json_encode($cart);
    $date = date('d.m.y');

    $link = mysqli_connect("host-2", "root", "", "brand");
    $sql = "INSERT INTO orders (user, cart, date) VALUES ('$_SESSION[login]', '$jsonString', '$date')";

    $result = mysqli_query($link, $sql);

    $_SESSION["goods"] = null;

    header('Location: index.php');
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Brand</title>
</head>

<body>
<header class="header">
    <div class="container header-container">
        <div class="header__left">
            <a href="index.html" class="link-logo"><img src="img/logo.png" alt="logo"><span class="logo">bran</span><span class="d-letter">d</span></a>
            <form action="#" class="search-form">
                <details class="browse">
                    <summary class="browse-sum"><span>browse</span></summary>
                    <div class="drop-down">
                        <div class="mega-pointer"></div>
                        <h3>women</h3>
                        <ul>
                            <li><a href="#">Dresses</a></li>
                            <li><a href="#">Tops</a></li>
                            <li><a href="#">Sweaters/Knits</a></li>
                            <li><a href="#">Jackets/Coats</a></li>
                            <li><a href="#">Blazers</a></li>
                            <li><a href="#">Denim</a></li>
                            <li><a href="#">Leggings/Pants</a></li>
                            <li><a href="#">Skirts/Shorts</a></li>
                            <li><a href="#">Accessories</a></li>
                        </ul>
                        <h3>men</h3>
                        <ul>
                            <li><a href="#">Tees/Tank tops</a></li>
                            <li><a href="#">Shirts/Polos</a></li>
                            <li><a href="#">Sweaters</a></li>
                            <li><a href="#">Sweatshirts/Hoodies</a></li>
                            <li><a href="#">Blazers</a></li>
                            <li><a href="#">Jackets/vests</a></li>
                        </ul>

                    </div>
                </details>
                <input type="text" placeholder="MANGO T-SHIRT">
                <button type="submit"><i class="fas fa-search"></i>

                </button>
            </form>
        </div>

        <div class="header__right">
            <div class="cart-hover">
                <a href="#" class="cart-icon"><img src="img/cart.svg" alt="cart"></a>
                <!--<div class="hidden-cart" id="cart-block">-->
                <!--<span>Your cart is empty</span>-->
                <!--</div>-->
                <div class="hidden-cart" id="cart-block">

                    <!--<div class="mega-pointer"></div>-->
                    <!--<div class="hidden-prod">-->
                    <!--<img src="img/hidden-prod=1.jpg" alt="men shirt">-->
                    <!--<div class="hidden-prod-rating">-->
                    <!--<h5>rebox zane</h5>-->
                    <!--<img src="img/stars.png" alt="stars">-->
                    <!--<span class="hidden-cart-price">1 x $250</span>-->
                    <!--</div>-->
                    <!--<i class="fas fa-times-circle"></i>-->
                    <!--</div>-->
                    <!--<div class="hidden-prod">-->
                    <!--<img src="img/hidden-prod-2.jpg" alt="women shirt">-->
                    <!--<div class="hidden-prod-rating">-->
                    <!--<h5>rebox zane</h5>-->
                    <!--<img src="img/stars.png" alt="stars">-->
                    <!--<span class="hidden-cart-price">1 x $250</span>-->
                    <!--</div>-->
                    <!--<i class="fas fa-times-circle"></i>-->
                    <!--</div>-->
                    <!--<div class="hidden-total">-->
                    <!--<h4>total</h4>-->
                    <!--<h4>$500</h4>-->
                    <!--</div>-->
                    <!--<a href="checkout.html" class="hidden-checkout">checkout</a>-->
                    <!--<a href="cart.html" class="hidden-goto">go to cart</a>-->
                </div>
            </div>
            <div class="account">
                <a href="#" class="my-account"><span>my&nbsp;account</span>&#8227;</a>
                <div class="login-block">
                    <?
                    if(array_key_exists('auth',$_SESSION) && $_SESSION['auth'] == true){
                        echo "Hello,".$_SESSION["login"]."<br><button id='logout-btn'>logout</button>";
                        if (key_exists("admin", $_SESSION) && $_SESSION["admin"] == 1){
                            echo "<a href='orders.php'>Orders</a>";
                        }
                    }   else {
                        echo "<form>
                        <p>Login</p>
                        <input type=\"text\" placeholder=\"Ivan\" class=\"login-input\" id=\"user-login\">
                        <p>Password</p>
                        <input type=\"password\" placeholder=\"password\" class=\"login-input\" id=\"user-password\">
                        <button id=\"login-btn\">LOG IN</button>
                    </form>";
                    }
                    ?>

                </div>
            </div>

        </div>
    </div>
</header>
<nav class="menu container">
    <ul class="horizontal">
        <li><div class="mega-hover">
                <a href="#" class="horizontal__link active-page">Home </a>
                <div class="mega mega-home">
                    <div class="mega-pointer">
                    </div>
                    <div class="mega__block">
                        <h3>women</h3>
                        <ul class="mega__list">
                            <li><a href="#">Dresses</a></li>
                            <li><a href="#">Tops</a></li>
                            <li><a href="#">Sweaters/Knits</a></li>
                            <li><a href="#">Jackets/Coats</a></li>
                            <li><a href="#">Blazers</a></li>
                            <li><a href="#">Denim</a></li>
                            <li><a href="#">Leggings/Pants</a></li>
                            <li><a href="#">Skirts/Shorts</a></li>
                            <li><a href="#">Accessories</a></li>
                        </ul>
                    </div>
                    <div class="mega__block">
                        <h3>women</h3>
                        <ul class="mega__list">
                            <li><a href="#">Dresses</a></li>
                            <li><a href="#">Tops</a></li>
                            <li><a href="#">Sweaters/Knits</a></li>
                            <li><a href="#">Jackets/Coats</a></li>
                        </ul>
                        <h3>women</h3>
                        <ul class="mega__list">
                            <li><a href="#">Dresses</a></li>
                            <li><a href="#">Tops</a></li>
                            <li><a href="#">Sweaters/Knits</a></li>
                        </ul>
                    </div>
                    <div class="mega__block">
                        <h3>women</h3>
                        <ul class="mega__list">
                            <li><a href="#">Dresses</a></li>
                            <li><a href="#">Tops</a></li>
                            <li><a href="#">Sweaters/Knits</a></li>
                            <li><a href="#">Jackets/Coats</a></li>
                        </ul>
                        <a href="#" class="mega__offer"> <div class="mega__offer-text">super sale!</div></a>
                    </div>
                </div>
            </div></li>
        <li><div class="mega-hover">
                <a class="horizontal__link" href="catolog.html">Man </a>
                <div class="mega mega-man">
                    <div class="mega-pointer">
                    </div>
                    <div class="mega__block">
                        <h3>women</h3>
                        <ul class="mega__list">
                            <li><a href="#">Dresses</a></li>
                            <li><a href="#">Tops</a></li>
                            <li><a href="#">Sweaters/Knits</a></li>
                            <li><a href="#">Jackets/Coats</a></li>
                            <li><a href="#">Blazers</a></li>
                            <li><a href="#">Denim</a></li>
                            <li><a href="#">Leggings/Pants</a></li>
                            <li><a href="#">Skirts/Shorts</a></li>
                            <li><a href="#">Accessories</a></li>
                        </ul>
                    </div>
                    <div class="mega__block">
                        <h3>women</h3>
                        <ul class="mega__list">
                            <li><a href="#">Dresses</a></li>
                            <li><a href="#">Tops</a></li>
                            <li><a href="#">Sweaters/Knits</a></li>
                            <li><a href="#">Jackets/Coats</a></li>
                        </ul>
                        <h3>women</h3>
                        <ul class="mega__list">
                            <li><a href="#">Dresses</a></li>
                            <li><a href="#">Tops</a></li>
                            <li><a href="#">Sweaters/Knits</a></li>
                        </ul>
                    </div>
                    <div class="mega__block">
                        <h3>women</h3>
                        <ul class="mega__list">
                            <li><a href="#">Dresses</a></li>
                            <li><a href="#">Tops</a></li>
                            <li><a href="#">Sweaters/Knits</a></li>
                            <li><a href="#">Jackets/Coats</a></li>
                        </ul>
                        <a href="#" class="mega__offer"> <div class="mega__offer-text">super sale!</div></a>
                    </div>
                </div>
            </div></li>
        <li><div class="mega-hover">
                <a href="catolog.html" class="horizontal__link">Women </a>
                <div class="mega mega-women">
                    <div class="mega-pointer">
                    </div>
                    <div class="mega__block">
                        <h3>women</h3>
                        <ul class="mega__list">
                            <li><a href="#">Dresses</a></li>
                            <li><a href="#">Tops</a></li>
                            <li><a href="#">Sweaters/Knits</a></li>
                            <li><a href="#">Jackets/Coats</a></li>
                            <li><a href="#">Blazers</a></li>
                            <li><a href="#">Denim</a></li>
                            <li><a href="#">Leggings/Pants</a></li>
                            <li><a href="#">Skirts/Shorts</a></li>
                            <li><a href="#">Accessories</a></li>
                        </ul>
                    </div>
                    <div class="mega__block">
                        <h3>women</h3>
                        <ul class="mega__list">
                            <li><a href="#">Dresses</a></li>
                            <li><a href="#">Tops</a></li>
                            <li><a href="#">Sweaters/Knits</a></li>
                            <li><a href="#">Jackets/Coats</a></li>
                        </ul>
                        <h3>women</h3>
                        <ul class="mega__list">
                            <li><a href="#">Dresses</a></li>
                            <li><a href="#">Tops</a></li>
                            <li><a href="#">Sweaters/Knits</a></li>
                        </ul>
                    </div>
                    <div class="mega__block">
                        <h3>women</h3>
                        <ul class="mega__list">
                            <li><a href="#">Dresses</a></li>
                            <li><a href="#">Tops</a></li>
                            <li><a href="#">Sweaters/Knits</a></li>
                            <li><a href="#">Jackets/Coats</a></li>
                        </ul>
                        <a href="#" class="mega__offer"> <div class="mega__offer-text">super sale!</div></a>
                    </div>
                </div>
            </div></li>
        <li>
            <div class="mega-hover">
                <a href="catolog.html" class="horizontal__link">Kids </a>
                <div class="mega mega-kids">
                    <div class="mega-pointer">
                    </div>
                    <div class="mega__block">
                        <h3>women</h3>
                        <ul class="mega__list">
                            <li><a href="#">Dresses</a></li>
                            <li><a href="#">Tops</a></li>
                            <li><a href="#">Sweaters/Knits</a></li>
                            <li><a href="#">Jackets/Coats</a></li>
                            <li><a href="#">Blazers</a></li>
                            <li><a href="#">Denim</a></li>
                            <li><a href="#">Leggings/Pants</a></li>
                            <li><a href="#">Skirts/Shorts</a></li>
                            <li><a href="#">Accessories</a></li>
                        </ul>
                    </div>
                    <div class="mega__block">
                        <h3>women</h3>
                        <ul class="mega__list">
                            <li><a href="#">Dresses</a></li>
                            <li><a href="#">Tops</a></li>
                            <li><a href="#">Sweaters/Knits</a></li>
                            <li><a href="#">Jackets/Coats</a></li>
                        </ul>
                        <h3>women</h3>
                        <ul class="mega__list">
                            <li><a href="#">Dresses</a></li>
                            <li><a href="#">Tops</a></li>
                            <li><a href="#">Sweaters/Knits</a></li>
                        </ul>
                    </div>
                    <div class="mega__block">
                        <h3>women</h3>
                        <ul class="mega__list">
                            <li><a href="#">Dresses</a></li>
                            <li><a href="#">Tops</a></li>
                            <li><a href="#">Sweaters/Knits</a></li>
                            <li><a href="#">Jackets/Coats</a></li>
                        </ul>
                        <a href="#" class="mega__offer"> <div class="mega__offer-text">super sale!</div></a>
                    </div>
                </div>
            </div>
        </li>
        <li><div class="mega-hover">
                <a href="catolog.html" class="horizontal__link">Accesories</a>
                <div class="mega mega-accesories">
                    <div class="mega-pointer">
                    </div>
                    <div class="mega__block">
                        <h3>women</h3>
                        <ul class="mega__list">
                            <li><a href="#">Dresses</a></li>
                            <li><a href="#">Tops</a></li>
                            <li><a href="#">Sweaters/Knits</a></li>
                            <li><a href="#">Jackets/Coats</a></li>
                            <li><a href="#">Blazers</a></li>
                            <li><a href="#">Denim</a></li>
                            <li><a href="#">Leggings/Pants</a></li>
                            <li><a href="#">Skirts/Shorts</a></li>
                            <li><a href="#">Accessories</a></li>
                        </ul>
                    </div>
                    <div class="mega__block">
                        <h3>women</h3>
                        <ul class="mega__list">
                            <li><a href="#">Dresses</a></li>
                            <li><a href="#">Tops</a></li>
                            <li><a href="#">Sweaters/Knits</a></li>
                            <li><a href="#">Jackets/Coats</a></li>
                        </ul>
                        <h3>women</h3>
                        <ul class="mega__list">
                            <li><a href="#">Dresses</a></li>
                            <li><a href="#">Tops</a></li>
                            <li><a href="#">Sweaters/Knits</a></li>
                        </ul>
                    </div>
                    <div class="mega__block">
                        <h3>women</h3>
                        <ul class="mega__list">
                            <li><a href="#">Dresses</a></li>
                            <li><a href="#">Tops</a></li>
                            <li><a href="#">Sweaters/Knits</a></li>
                            <li><a href="#">Jackets/Coats</a></li>
                        </ul>
                        <a href="#" class="mega__offer"> <div class="mega__offer-text">super sale!</div></a>
                    </div>
                </div>
            </div></li>
        <li>
            <div class="mega-hover">
                <a href="catolog.html" class="horizontal__link">Featured </a>
                <div class="mega mega-kids">
                    <div class="mega-pointer">
                    </div>
                    <div class="mega__block">
                        <h3>women</h3>
                        <ul class="mega__list">
                            <li><a href="#">Dresses</a></li>
                            <li><a href="#">Tops</a></li>
                            <li><a href="#">Sweaters/Knits</a></li>
                            <li><a href="#">Jackets/Coats</a></li>
                            <li><a href="#">Blazers</a></li>
                            <li><a href="#">Denim</a></li>
                            <li><a href="#">Leggings/Pants</a></li>
                            <li><a href="#">Skirts/Shorts</a></li>
                            <li><a href="#">Accessories</a></li>
                        </ul>
                    </div>
                    <div class="mega__block">
                        <h3>women</h3>
                        <ul class="mega__list">
                            <li><a href="#">Dresses</a></li>
                            <li><a href="#">Tops</a></li>
                            <li><a href="#">Sweaters/Knits</a></li>
                            <li><a href="#">Jackets/Coats</a></li>
                        </ul>
                        <h3>women</h3>
                        <ul class="mega__list">
                            <li><a href="#">Dresses</a></li>
                            <li><a href="#">Tops</a></li>
                            <li><a href="#">Sweaters/Knits</a></li>
                        </ul>
                    </div>
                    <div class="mega__block">
                        <h3>women</h3>
                        <ul class="mega__list">
                            <li><a href="#">Dresses</a></li>
                            <li><a href="#">Tops</a></li>
                            <li><a href="#">Sweaters/Knits</a></li>
                            <li><a href="#">Jackets/Coats</a></li>
                        </ul>
                        <a href="#" class="mega__offer"> <div class="mega__offer-text">super sale!</div></a>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="mega-hover">
                <a href="catolog.html" class="horizontal__link">Hot Deals</a>
                <div class="mega mega-kids">
                    <div class="mega-pointer">
                    </div>
                    <div class="mega__block">
                        <h3>women</h3>
                        <ul class="mega__list">
                            <li><a href="#">Dresses</a></li>
                            <li><a href="#">Tops</a></li>
                            <li><a href="#">Sweaters/Knits</a></li>
                            <li><a href="#">Jackets/Coats</a></li>
                            <li><a href="#">Blazers</a></li>
                            <li><a href="#">Denim</a></li>
                            <li><a href="#">Leggings/Pants</a></li>
                            <li><a href="#">Skirts/Shorts</a></li>
                            <li><a href="#">Accessories</a></li>
                        </ul>
                    </div>
                    <div class="mega__block">
                        <h3>women</h3>
                        <ul class="mega__list">
                            <li><a href="#">Dresses</a></li>
                            <li><a href="#">Tops</a></li>
                            <li><a href="#">Sweaters/Knits</a></li>
                            <li><a href="#">Jackets/Coats</a></li>
                        </ul>
                        <h3>women</h3>
                        <ul class="mega__list">
                            <li><a href="#">Dresses</a></li>
                            <li><a href="#">Tops</a></li>
                            <li><a href="#">Sweaters/Knits</a></li>
                        </ul>
                    </div>
                    <div class="mega__block">
                        <h3>women</h3>
                        <ul class="mega__list">
                            <li><a href="#">Dresses</a></li>
                            <li><a href="#">Tops</a></li>
                            <li><a href="#">Sweaters/Knits</a></li>
                            <li><a href="#">Jackets/Coats</a></li>
                        </ul>
                        <a href="#" class="mega__offer"> <div class="mega__offer-text">super sale!</div></a>
                    </div>
                </div>
            </div>
        </li>
    </ul>

</nav>


<section class="about-product">
    <div class="about-product-content container">
        <div class="product-category">
            new arrivals
        </div>
        <nav class="breadcrumbs">
            <ul class="breadcrumbs-list">
                <li><a href="index.html">Home</a></li>
                <li><a href="#">Men</a></li>
                <li><a href="#">New Arrivals</a></li>
            </ul>
        </nav>
    </div>
</section>
<div class="catalog-content container">
    <div class="filters-side">
        <details class="filter-details mareker-on">
            <summary class="active-filter filter-summary">category</summary>
            <ul>
                <li><a href="#">Accessories</a></li>
                <li><a href="#">Bags</a></li>
                <li><a href="#">Denim</a></li>
                <li><a href="#">Hoodies & Sweatshirts</a></li>
                <li><a href="#">Jackets & Coats</a></li>
                <li><a href="#">Pants</a></li>
                <li><a href="#">Polos</a></li>
                <li><a href="#">Shirts</a></li>
                <li><a href="#">Shoes</a></li>
                <li><a href="#">Shorts</a></li>
                <li><a href="#">Sweaters & Knits</a></li>
                <li><a href="#">T-Shirts</a></li>
                <li><a href="#">Tanks</a></li>
            </ul>
        </details>
        <details class="filter-details mareker-on">
            <summary class="filter-summary">brand</summary>
            <ul>
                <li><a href="#">Accessories</a></li>
                <li><a href="#">Bags</a></li>
                <li><a href="#">Denim</a></li>
                <li><a href="#">Hoodies & Sweatshirts</a></li>
                <li><a href="#">Jackets & Coats</a></li>
                <li><a href="#">Pants</a></li>
            </ul>
        </details>
        <details class="filter-details mareker-on">
            <summary class="filter-summary">designer</summary>
            <ul>
                <li><a href="#">Accessories</a></li>
                <li><a href="#">Bags</a></li>
                <li><a href="#">Denim</a></li>
                <li><a href="#">Hoodies & Sweatshirts</a></li>
                <li><a href="#">Jackets & Coats</a></li>
                <li><a href="#">Pants</a></li>
            </ul>
        </details>
    </div>
    <div class="product-block">
        <div class="filters-top">
            <div class="trending">
                <h3>trending now</h3>
                <div class="trending-now-block">
                    <span class="trending-item">Bohemian</span>
                    <span class="trending-item">Floral</span>
                    <span class="trending-item">Lace</span>
                    <span class="trending-item">Floral</span>
                    <span class="trending-item">Lace</span>
                    <span class="trending-item">Bohemian</span>
                </div>
            </div>
            <div class="size-checkbo">
                <h3>size</h3>
                <div class="size-checkbox-block">
                    <label><input type="checkbox"><span class="size-checkbox-text">XXS</span>
                    </label>
                    <label><input type="checkbox"><span class="size-checkbox-text">XS</span>
                    </label>
                    <label><input type="checkbox"><span class="size-checkbox-text">S</span>
                    </label>
                    <label><input type="checkbox"><span class="size-checkbox-text">M</span></label>
                    <label><input type="checkbox"><span class="size-checkbox-text">L</span></label>
                    <label><input type="checkbox"><span class="size-checkbox-text">XL</span></label>
                    <label><input type="checkbox"><span class="size-checkbox-text">XXL</span></label>
                </div>
            </div>
            <div class="price-sort">
                <h3>price</h3>
            </div>
        </div>
        <div class="sorting">
            <span class="sort-by">sort by</span>
            <details>
                <summary class="sort-summary summary-name">name</summary>
            </details>
            <span class="sort-show">show</span>
            <details>
                <summary class="sort-summary summary-year">09</summary>
            </details>
        </div>
        <div class="catalog-product-block">

        </div>
        <div class="select-page">
            <div>
                <ul class="pagination">
                    <li><a href="#" class="active">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                </ul>
            </div>
            <div class="view-all">
                <a href="#">view all</a>
            </div>
        </div>
    </div>
</div>
<div class="catalog-about">
    <div class="container catalog-about-content">
        <div class="about">
            <div class="about-img">
                <img src="img/offer-truck.svg" alt="delivery">
            </div>
            <div class="about-text">
                <h3>Free Delivery</h3>
                <p>Worldwide delivery on&nbsp;all. Authorit tively morph next-generation innov tion with extensive models.</p>
            </div>
        </div>
        <div class="about">
            <div class="about-img">
                <img src="img/offer-percent.svg" alt="discounts">
            </div>
            <div class="about-text">
                <h3>Sales &amp;&nbsp;discounts</h3>
                <p>Worldwide delivery on&nbsp;all. Authorit tively morph next-generation innov tion with extensive models.</p>
            </div>
        </div>
        <div class="about">
            <div class="about-img">
                <img src="img/offer-crown.svg" alt="assurance">
            </div>
            <div class="about-text">
                <h3>Quality assurance</h3>
                <p>Worldwide delivery on&nbsp;all. Authorit tively morph next-generation innov tion with extensive models.</p>
            </div>
        </div>
    </div>
</div>
<section class="subscribe">
    <div class="container subscribe-container">
        <div class="response">
            <div class="avatar">
                <img src="img/avatar.png" alt="avatar">
            </div>
            <div class="response-text">
                <p>&laquo;Vestibulum quis porttitor dui! Quisque viverra nunc&nbsp;mi, a&nbsp;pulvinar purus condimentum&nbsp;a. Aliquam condimentum mattis neque sed pretium&raquo;</p>
                <h4>Bin Burhan</h4>
                <h5>Dhaka, Bd</h5>
            </div>
            <div class="items-carousel">
                <a href="#" class="response-item"></a>
                <a href="#" class="response-item active-response-item"></a>
                <a href="#" class="response-item"></a>
            </div>

        </div>
        <div class="subscribe-form">
            <h2>Subscribe</h2>
            <h3>FOR OUR NEWLETTER AND PROMOTION</h3>

            <div class="subscribe-input">
                <input type="email" placeholder="input your email">
                <input type="submit" value="subscribe">
            </div>
        </div>
    </div>
</section>
<footer class="footer">
    <div class="container footer__top">
        <div class="description">
            <div class="link-logo">
                <img src="img/logo.png" alt="logo"><span class="logo">bran</span><span class="d-letter">d</span>
            </div>
            <p>Objectively transition extensive data rather than cross functional solutions. Monotonectally syndicate multidisciplinary materials before go&nbsp;forward benefits. Intrinsicly syndicate an&nbsp;expanded array of&nbsp;processes and cross-unit partnerships. </p>
            <p>Efficiently plagiarize 24/365 action items and focused infomediaries. Distinctively seize superior initiatives for wireless technologies. Dynamically optimize.</p>
        </div>
        <div class="company">
            <h3>company</h3>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="#">Shop</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">How It Works</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
        <div class="information">
            <h3>information</h3>
            <ul>
                <li><a href="#">Tearms &amp;&nbsp;Condition</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">How to&nbsp;Buy</a></li>
                <li><a href="#">How to&nbsp;Sell</a></li>
                <li><a href="#">Promotion</a></li>
            </ul>
        </div>
        <div class="shop-category">
            <h3>shop category</h3>
            <ul>
                <li><a href="catolog.html">Men</a></li>
                <li><a href="catolog.html">Women</a></li>
                <li><a href="catolog.html">Child</a></li>
                <li><a href="catolog.html">Apparel</a></li>
                <li><a href="catolog.html">Brows</a></li>
                <li><a href="catolog.html">All</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="footer-bottom-content container">
            <div class="rights">
                <span>&copy;&nbsp;2017 Brand All Rights Reserved.</span>
            </div>
            <div class="socials">
                <a href="#"><i class="fab fa-facebook-square fa-2x"></i></a>
                <a href="#"><i class="fab fa-twitter-square fa-2x"></i></a>
                <a href="#"><i class="fab fa-linkedin-square fa-2x"></i></a>
                <a href="#"><i class="fab fa-pinterest-square fa-2x"></i></a>
                <a href="#"><i class="fab fa-google-plus-square fa-2x"></i></a>
            </div>
        </div>
    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="cat_render.js"></script>
<script src="js/addToCart.js"></script>
<script src="js/login.js"></script>
<script>
    jQuery.ajax({
        url:"php/getSessionContent.php",
        type: "GET",
        success: function (session) {
            cartRender(JSON.parse(session).goods);
        }
    })
</script>
</body>
</html>

