  <?php include_once 'header.php';?>
  <?php 
    $sql = "SELECT * FROM category ";
    if (!empty($_GET['shname'])) {
      $shname = $_GET['shname'];
      $sql .= " WHERE name LIKE '%$shname%'";
}

  $sql .= " Order By id DESC";
  $dl = mysqli_query($conn, $sql);
  ?>

  <?php include_once 'aside.php';?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
              category
              <small>it all starts here</small>
          </h1>
        </section>
        
        <div class="chung">
        <div class="container">
          <form action="" method="get">
           <div class="row">
           <input type="text" name="shname" id="">
            <button type="submit"><i class="fa fa-search"></i></button>
           </div>
          </form>
        </div>
        
        <div class="add">
          <a class="btn btn-primary" href="add_category.php"><i class="fa fa-plus"></i>  thêm mới</a>
        </div>
        </div>
        
        <div class="container">
            
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>id </th>
                  <th>name</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($dl as $vl){ ?>
                <tr>
                  <td><?= $vl['id']?></td>
                  <td><?= $vl['name']?></td>
                  <td>
                    <a class="btn btn-primary" href="edit.php?id=<?= $vl['id']?>">sửa</a>
                    <a class="btn btn-danger" href="delete.php?id=<?= $vl['id']?>">xóa</a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
            
        </div>
        <div class="container">
    </div>
        
  </div>
 


  <!-- /.content-wrapper -->

  <?php include_once 'footer.php'; ?>
