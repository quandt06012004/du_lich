<?php
    session_start();
    include 'connect.php';

    $id = !empty($_GET['id']) ? $_GET['id'] : 0;
    $quantity = !empty($_GET['quantity']) ? $_GET['quantity'] : 1;
    $acction = !empty($_GET['acction']) ? $_GET['acction'] : 'add';
    
    $carts = !empty($_SESSION['cart']) ? $_SESSION['cart'] : [];


    if(!empty($carts)){
        if($acction == 'add'){
            if(isset($carts[$id])){
                $carts[$id]->quantity += $quantity;
            }else{
                $sql = "select * from product where id = $id";
                $query = mysqli_query($conn, $sql);
                $pro = mysqli_fetch_object($query);
    
                $item = (object)[
                    'id' => $pro->id,
                    'name' => $pro->name,
                    'price' => $pro->price,
                    'image' => $pro->image,
                    'quantity' => $quantity,
                ];
    
                $carts[$pro->id] = $item;
            }
    
            $_SESSION['cart'] = $carts;
    
            echo "<pre>"; print_r( $carts);
        }
        if($acction == 'delete'){
            if(isset($carts)){
                unset($carts[$id]);
                $_SESSION['cart'] = $carts;
            }
        }
        if($acction == 'update'){
            if(isset($carts)){
                $carts[$id]->quantity = $quantity;
                $_SESSION['cart'] = $carts;
            }
        }
        if($acction == 'clear'){
            if(isset($carts)){
                unset($_SESSION['cart']);
            }
        }
    }




    header('location: cart.php')
?>

