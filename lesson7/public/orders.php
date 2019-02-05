<?php
session_start();
include_once ("../main/config.php");
if(key_exists("admin", $_SESSION) && $_SESSION["admin"] == 1){
    if(array_key_exists("id", $_GET)){
        switch ($_GET["action"]){
            case "accept":
              $sql = "UPDATE orders SET accepted = '1', declined = '0' WHERE (id = $_GET[id])";
              break;
            case "decline":
                $sql = "UPDATE orders SET declined = '1', accepted = '0' WHERE (id = $_GET[id])";
                break;
        }
        $result = mysqli_query($link, $sql);
        header('Location: orders.php');
    }
    $adminSql = 'SELECT * FROM orders;';
    $allOrders = mysqli_query($link, $adminSql);
    while ($row = mysqli_fetch_assoc($allOrders)){
        $orders[] = $row;
    }
    echo "<table>";
    foreach ($orders as $order) {
        echo "<tr>";
        foreach ($order as $element){
            echo "<td>".$element."</td>";
        }
        echo "<td class='accept'><a href=?action=accept&id=".$order["id"].">accept</a></td>
                <td class='decline'><a href=?action=decline&id=".$order["id"].">decline</a></td></tr>";
    }
    echo "</table><br><a href='index.php'>HOME</a>";

}
?>