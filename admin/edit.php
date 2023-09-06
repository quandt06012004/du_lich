


<?php include_once 'header.php';?>
<?php
    $id = $_GET['id'];
    $sql1 = "SELECT * FROM category WHERE id = '$id'";
    $query = mysqli_query($conn,$sql1);
    $cat = mysqli_fetch_array($query);
   

    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $sql2 = "update category set name = '$name' where id = $id";
        $check = mysqli_query($conn, $sql2);
        if($check){
            header('location:category.php');
        }else{
            echo mysqli_error($conn);
        }
    }
    
?>

<?php include_once 'aside.php';?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
              update
              <small>it all starts here</small>
          </h1>
        </section>

    
    <div class="container">
        <form action="" method="POST" role="form">
            <div class="form-group">
                <label for="">name</label>
                <input type="text" class="form-control" name = 'name' value="<?php echo $cat['name'] ?>" placeholder="Input name">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
<?php include "footer.php";?>
