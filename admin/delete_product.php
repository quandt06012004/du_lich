<?php
    include '../connect.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "delete from product where id = $id";
        $check = mysqli_query($conn,$sql);
        if($check){
            header('location:product.php');
        }else{
            echo mysqli_error($conn);
        } 
    }else {
        echo "bạn chưa xóa";
    }
   
?>