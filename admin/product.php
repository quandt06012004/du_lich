  <?php include_once 'header.php';?>
  <?php 
    $dl = mysqli_query($conn,"SELECT * from product order by id asc");
  ?>
  <?php include_once 'aside.php';?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
              product <small>it all starts here</small>
          </h1>
        </section>
          
        <a href="add_product.php" class="btn btn-primary"><i class="fa fa-plus"></i>thêm mới</a>
        <div class="container">
            
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>id </th>
                  <th>name</th>
                  <th>image</th>
                  <th></th>
                 
                </tr>
              </thead>
              <tbody>
                <?php foreach($dl as $vl){ ?>
                <tr>
                  <td><?= $vl['id']?></td>
                  <td><?= $vl['name']?></td>
                  <td>
                    <img src="../upload/<?= $vl['image'];?>" alt="" width="60px">
                  </td>
                  <td>
                    <a class="btn btn-primary" href="edit_product.php?id=<?= $vl['id']?>">sửa</a>
                    <a class="btn btn-danger" href="delete_product.php?id=<?= $vl['id']?>">xóa</a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
            
        </div>
        
  </div>

  <!-- /.content-wrapper -->

  <?php include_once 'footer.php'; ?>
