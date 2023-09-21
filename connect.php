<?php 
$conn = mysqli_connect ('localhost', 'root', '', 'ql_ban_hang');


$carts = !empty($_SESSION['cart']) ?$_SESSION['cart'] : [];

function getquantt () {
    global $carts;

    $t = 0;
    foreach($carts as $item){
        $t += $item->quantity;
    }
    return $t;

}
function getprice () {
    global $carts;

    $t = 0;
    foreach($carts as $prc){
        $t += $prc->quantity * $prc->price;
    }
    return $t;

}
?>