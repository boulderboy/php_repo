<?php


function reviewRender(){
    $link = mysqli_connect("host-2", "root", "", "brand");
    $query = "SELECT * FROM `company-reviews`";
    $result = mysqli_query($link, $query);
    if($result) {
        foreach ($result as $value => $a) {
            echo ("<div class='review-container'><div class='user-time'>".$a["user-name"].
                "</div><div class='review-text'>".$a["review-text"]."</div></div>");
        }

        mysqli_free_result($result);
    }
}