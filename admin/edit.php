<?php include_once 'header.php';?>
<?php 
$id = $_GET['id'];
$sql1 = "SELECT * FROM category WHERE id = $id"; // trả về 1 record nếu có
$query = mysqli_query($conn, $sql1);
$cat = mysqli_fetch_assoc($query);

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $sql = "UPDATE category SET name = '$name' WHERE id = $id";

    $check = mysqli_query($conn, $sql);
    if ($check) {
        header('location: category.php'); // chuyển hướng
    } else {
        echo mysqli_error($conn);
    }
}
?>
  <?php include_once 'aside.php';?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
              edit
              <small>it all starts here</small>
          </h1>
        </section>

        
        <div class="container">
    <h2>Form cập nhật</h2>
    <hr>
    <form action="" method="POST" class="form-inline" role="form">
        
            <div class="form-group">
                <input class="form-control" name="name" value="<?php echo $cat['name'];?>" placeholder="Input name">
            </div>
        
        
            <button type="submit" class="btn btn-primary">sửa</button>
        </form>
        
</div>

  <?php include_once 'footer.php'; ?>
