<?php include('../sub_partials/_header.php');
require('../../db/dbconn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $name = $_POST['name'];
   $id = $_POST['id'];

   if (empty($name) || empty($id)) {
      $message = base64_encode('danger~All fields are required.');
      header("Location: create?m=");
      exit();
   }

   $insertUserQuery = "INSERT INTO categories (system_id, name) VALUES ('$id', '$name')";

   if (mysqli_query($conn, $insertUserQuery)) {
      $message = base64_encode('success~Category '.$name.' successfully added!');
      header("Location: ../category/?m=".$message);
   } else {
      $message = base64_encode('danger~Something went wrong!');
      header("Location: ../category/?m=".$message);
   }

   mysqli_close($conn);
}

include('../sub_partials/_navbar.php');
include('../sub_partials/_sidebar.php');
?>

<div class="wrapper">
   <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-2"></div>
               <div class="col-sm-8">
                  <div class="card mt-5">
                     <div class="card-header">
                        <h5 class="mt-1">Create Category</h5>
                     </div>
                     <form action="" method="post">
                        <div class="card-body">
                           <div class="input-group ml-2 mb-4">
                              <label class="mt-2 mr-3">Name:</label>
                              <input type="text" class="form-control mr-3" placeholder="Write category here..." name="name" required>
                              <input type="hidden" class="form-control mr-3" name="id" value="<?= $_SESSION['dept']?>">
                           </div>
                        </div>
                        <div class="card-footer">
                           <a href="../category/" class="btn btn-secondary">Cancel</a>
                           <button type="submit" class="btn btn-primary float-right">Save</button>
                        </div>
                     </form>
                  </div>
               </div>
               <div class="col-sm-2"></div>
            </div>
            <!-- /.row -->
         </div>
      </section>
      <!-- /.content -->
   </div>
</div>

<?php include('../sub_partials/_footer.php') ?>