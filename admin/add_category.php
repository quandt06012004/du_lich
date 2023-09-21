

  <?php include_once 'header.php';?>
 <?php
     if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $sql = "insert into category (name) values('$name')";
        $check = mysqli_query($conn, $sql);
     
        if($check){
          header("Location:category.php");
          // print_r( $check);
        }else {
          echo mysqli_error($conn);
        }
     }
 ?>

  <?php include_once 'aside.php';?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
       
        <section class="content-header">
          <h1>
              thêm mới danh mục
              <small>it all starts here</small>
          </h1>
        </section>

              <!-- thêm mới -->
      <div class="container">
        <form action="" method="POST" role="form">
            <legend>add</legend>
            <div class="form-group">
              <label for="">name</label>
              <input type="text" class="form-control" id="" name="name" placeholder="Input name">
              <button type="submit" class="btn btn-primary">thêm mới danh mục</button>
            </div>
          </form>
      </div>
  </div>

  <?php include_once 'footer.php'; ?>

