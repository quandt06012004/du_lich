<?php
    include '../connect.php';
    $id = $_GET['id'];
    $sql = "delete from category where id = $id";
    $check = mysqli_query($conn,$sql);
    if($check){
        header('location:category.php');
    }else{
        echo mysqli_error($conn);
    }
?>