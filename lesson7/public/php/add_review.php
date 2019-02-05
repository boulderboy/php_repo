<?php
$link = mysqli_connect("host-2", "root", "", "brand");
$userName = $_POST['userName'];
$reviewText = $_POST["reviewText"];

echo $_POST['userName'];

$query = 'insert into `company-reviews` (`user-name`, `review-text`) values ("'.$userName.'","'.$reviewText.'")';

if($userName && $reviewText && mysqli_query($link, $query)){
    echo "запись сделана";
}   else {
    echo "что-то не так";
}