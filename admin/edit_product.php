<?php include_once 'header.php'; ?>
<?php
$id = $_GET['id'];
$sql = "select * from product where id = $id";
$query = mysqli_query($conn, $sql);
$pro = mysqli_fetch_object($query);
$sqlcat = "select * from category where id = $id";
$cats = mysqli_query($conn, $sqlcat);


$error = [];
$types = ['image/png', 'image/jpeg', 'image/gif'];
$name_image = $pro->image;

if (!empty($_FILES['image']['name'])) {
  $file = $_FILES['image'];
  $tmp_name = $file['tmp_name'];
  $type = $file['type'];

  if (!in_array($type, $types)) {
    $error['image'] = 'file không đúng định dạng';
  } else if ($error) {
    $error['image'] = 'chưa thêm ảnh được vui lòng nhập đúng và đầy đủ thông tin';
  } else {
    $name_image = time() . '-' . $file['name'];
    move_uploaded_file($tmp_name, '../upload/' . $name_image);
  }

 
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $category_id = $_POST['category_id'];

  if (empty($name)) {
    $error['name'] = 'bạn chưa nhập tên';
  } else if (strlen($name) < 5) {
    $error['name'] = 'tên không dưới 5 ký tự';
  } else if (strlen($name) > 100) {
    $error['name'] = 'tên không quá 20 ký tự';
  }

  if (empty($price)) {
    $error['price'] = 'giá chưa được nhập';
  } else if (!is_numeric($price)) {
    $error['price'] = 'giá phải là số';
  }



  if (!$errors) {
    $sql2 = "UPDATE product SET name = '$name', price= '$price', image = '$name_image', category_id = '$category_id' WHERE id = $id";
    if (mysqli_query($conn, $sql2)) {
      header('location: product.php');
    }
  }
 
}

?>
<?php
include_once 'aside.php';
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      sửa lại sản phẩm
      <small>it all starts here</small>
    </h1>
  </section>

  <?php if ($error) : ?>
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <?php foreach ($error as $er) : ?>
        <li><?php echo $er; ?></li>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <!-- thêm sản phẩm -->
  <div class="container" style="width:400px">
    <form action="" method="POST" role="form" enctype="multipart/form-data">
      <legend>update</legend>
      <div class="form-group">
        <label for="">name</label>
        <input type="text" class="form-control" id="" value="<?php echo $pro->name; ?>" name="name" placeholder="Input name">
      </div>
      <div class="form-group">
        <label for="">price</label>
        <input type="text" class="form-control" id="" value="<?php echo $pro->price; ?>" name="price" placeholder="Input price">
      </div>

      <div class="form-group">
        <label for="">sản phẩm của danh mục:</label>
        <select name="category_id" id="input" class="form-control" require="required">
          <option value="">chọn danh mục</option>
          <?php while ($cat = mysqli_fetch_object($cats)) : ?>
            <option value="<?php echo $cat->id; ?>" <?php echo $pro->category_id == $cat->id ? 'selected' : ''; ?>><?php echo $cat->name; ?></option>
          <?php endwhile; ?>
        </select>
      </div>
      <div class="form-group">
        <label for="">chọn ảnh</label>
        <input type="file" name="image" id="">
        <img src="../upload/<?php echo $pro->image ?>" alt="" width="300px">
      </div>
      <button type="submit" class="btn btn-primary">sửa sản phẩm</button>
      <?php print_r($_POST); ?>
    </form>
  </div>


  <?php include_once 'footer.php'; ?>