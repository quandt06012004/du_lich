  <?php include_once 'header.php';?>
  <?php 
  $dl = mysqli_query($conn,"SELECT * from category order by id asc");
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
        
  </div>

  
  <!-- /.content-wrapper -->

  <?php include_once 'footer.php'; ?>
