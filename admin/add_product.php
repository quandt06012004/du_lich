<?php include_once 'header.php';?>
 <?php
 $cats = mysqli_query ($conn, "SELECT * FROM category Order By id DESC");
  $error = [];
  $types = ['image/jpeg'];
  



  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $name_img = $_FILES['image']['name'];

    if(empty($name)){
      $error['name'] = 'bạn chưa nhập tên';
    }
    else if(strlen($name) < 5){
      $error['name'] = 'tên không dưới 5 ký tự';
    }else if(strlen($name) > 100){
      $error['name'] = 'tên không quá 20 ký tự';
    }


    if(empty($price)){
      $error['price'] = 'giá chưa được nhập';
    }else if(!is_numeric($price)){
      $error['price'] = 'giá phải là số';
    }

    if(empty($name_img)){
      $error['image'] = 'vui lòng chọn ảnh';
    }



  
  if(!empty($_FILES['image']['name'])){
    $file = $_FILES['image'];
    $tmp_name = $file['tmp_name'];
    $type = $file['type'];

    if(!in_array($type, $types)){
      $error['image'] = 'file không đúng định dạng';
    }else if($error){
        $error['image']= 'chưa thêm ảnh được vui lòng nhập đúng và đầy đủ thông tin';
    }else{
      $name_image = time().'-'.$file['name'];
      move_uploaded_file($tmp_name, '../upload/'.$name_image);
    }

    if(!$error){
      $sql = "insert into product set name = '$name', price = '$price', image = '$name_image', category_id = '$category_id'";
      if(mysqli_query($conn, $sql)){
        header('location:product.php');
      }else{
        echo mysqli_error($conn);
      }
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
              thêm mới sản phẩm
              <small>it all starts here</small>
          </h1>
        </section>
<?php if ($error) : ?>
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php foreach($error as $er) :?>
        <li><?php echo $er;?></li>
    <?php endforeach;?>
</div>
<?php endif;?>

<!-- thêm sản phẩm -->
       <div class="container" style="width:400px">
          <form action="" method="POST" role="form" enctype="multipart/form-data">
              <legend>add</legend>
              <div class="form-group">
                <label for="">name</label>
                <input type="text" class="form-control" id="" name="name" placeholder="Input name">
              </div>
              <div class="form-group">
                <label for="">price</label>
                <input type="text" class="form-control" id="" name="price" placeholder="Input price">
              </div>
              
              <div class="form-group">
              <label for="">sản phẩm của danh mục:</label>
                <select name="category_id" id="input" class="form-control" require="required">
                  <option value="">chọn danh mục</option>
                  <?php while($cat = mysqli_fetch_object($cats)) : ?>
                    <option value="<?php echo $cat->id;?>"><?php echo $cat->name;?></option>
                  <?php endwhile;?>
                </select>
              </div>
              <div class="form-group">
                <label for="">chọn ảnh</label>
                <input type="file" name="image" id="">
              </div>
              <button type="submit" class="btn btn-primary">thêm mới sản phẩm</button>
              <?php print_r($_POST); ?>
          </form>
       </div>


  <?php include_once 'footer.php'; ?>


  
