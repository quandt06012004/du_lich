<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/app.css">
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <title>Form login unitop.vn</title>
    <style>
        body{
    background: url('../images/bg.jpeg');
    background-size: cover;
    background-position-y: -80px;
    font-size: 16px;
}
#wrapper{
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}
#form-login{
    max-width: 400px;
    background: rgba(0, 0, 0 , 0.8);
    flex-grow: 1;
    padding: 30px 30px 40px;
    box-shadow: 0px 0px 17px 2px rgba(255, 255, 255, 0.8);
}
.form-heading{
    font-size: 25px;
    color: #f5f5f5;
    text-align: center;
    margin-bottom: 30px;
}
.form-group{
    border-bottom: 1px solid #fff;
    margin-top: 15px;
    margin-bottom: 20px;
    display: flex;
}
.form-group i{
    color: #fff;
    font-size: 14px;
    padding-top: 5px;
    padding-right: 10px;
}
.form-input{
    background: transparent;
    border: 0;
    outline: 0;
    color: #f5f5f5;
    flex-grow: 1;
}
.form-input::placeholder{
    color: #f5f5f5;
}
#eye i{
    padding-right: 0;
    cursor: pointer;
}
 
.form-submit{
    background: transparent;
    border: 1px solid #f5f5f5;
    color: #fff;
    width: 100%;
    text-transform: uppercase;
    padding: 6px 10px;
    transition: 0.25s ease-in-out;
    margin-top: 30px;
}
.form-submit:hover{
    border: 1px solid #54a0ff;
}
    </style>
</head>
<?php
include'header.php';
$error = [];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if(!$error){
        $sql ="select * from customer where email='$email' and password='$password'";
        $query = mysqli_query( $conn,$sql);
        
        if(mysqli_num_rows($query) == 1){
            $cus = mysqli_fetch_object($query);
            $_SESSION['my_login'] = $cus;
            header("Location: index.php");
        }
        else{
            echo mysqli_error($conn);
        }
        
    }
}

?>
<body>
<?php if($error): ?>
<div class="alert alert-danger" style="margin-top: 100px">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php foreach($error as $er) : ?>
        <li><?php echo $er ?></li>
    <?php endforeach; ?>
</div>
<?php endif;?>
</div>
    <div id="wrapper">
        <form action="" id="form-login" method="post">
            <h1 class="form-heading">đăng nhập</h1>
            <div class="form-group">
                <i class="far fa-email"></i>
                <input type="text" class="form-input" name="email" placeholder="email">
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i>
                <input type="password" class="form-input" name="password" placeholder="Mật khẩu">
                <div id="eye">
                    <i class="far fa-eye"></i>
                </div>
            </div>
            <input type="submit" value="Đăng nhập" class="form-submit">
        </form>
    </div>
     
</body>
<?php include_once 'footer.php';?>

