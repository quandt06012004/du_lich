<?php include 'header.php';?>

<?php
   $carts = !empty($_SESSION['cart']) ? $_SESSION['cart'] : [];
?>


<br>
<div class="container" style=" margin-top : 100px">
<h3>tổng tiền: <?= number_format(getprice());?></h3>
<table class="table">
    <thead>
        <tr>
            <th>stt</th>
            <th>name</th>
            <th>image</th>
            <th>price</th>
            <th>quantity</th>
            <th>into money</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php $n = 1; foreach ($carts as $pro) :?>
            <tr>
                <td><?= $n;?></td>
                <td><?= $pro->name;?></td>
                <td><img src="upload/<?= $pro -> image;?>" alt="" width="60"></td>
                <td><?= $pro->price;?></td>
                <td>
                    <form action="xu_ly_gio_hang.php" method="get" role="form">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="acction" value="update" id="">
                            <input type="hidden" class="form-control" name="id" value="<?= $pro->id;?>" id="">
                            <input type="number" style="width: 80px;text-align:center" class="form-control" name="quantity" value="<?= $pro->quantity;?>" id="">
                        </div>
                    </form>
                    
                </td>
                <td><?= $pro->price * $pro->quantity;?></td>
                <td><a class="btn btn-danger" onclick='return confirm("bạn có muốn xóa sp <?= $pro->name;?> ko?")' href="xu_ly_gio_hang.php?id=<?= $pro->id;?>&acction=delete">x</a></td>
            </tr>
        <?php $n++; endforeach; ?>

        <div class="container">
            <div class="row">
                <a href="index.php#home-product" class="btn btn-primary">tiếp tục mua hàng</a>
                <a onclick="return confirm('bạn có muốn xóa tất cả không')" href="xu_ly_gio_hang.php?acction=clear" class="btn btn-danger">xóa tất cả</a>
                <a href="index.php" class="btn btn-primary">đặt hàng</a>
            </div>
        </div>
    </tbody>
</table>
</div>
<?php include 'footer.php';?>