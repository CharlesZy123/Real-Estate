<?php include('../sub_partials/_header.php');
require('../../db/dbconn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $id = $_POST['id'];
   $name = $_POST['name'];
   // $emp = $_POST['employer'];

   if (empty($name)) {
      $message = base64_encode('danger~All fields are required.');
      header("Location: edit?id=" . $id . "&m=" . $message);
      exit();
   }

   $updateQuery = "UPDATE categories SET name = '$name' WHERE id = '$id'";

   if (mysqli_query($conn, $updateQuery)) {
      $message = base64_encode('success~Successfully updated!');
      header("Location: ../category/?m=" . $message);
   } else {
      $message = base64_encode('danger~Something went wrong!');
      header("Location: ../category/?m=" . $message);
   }

   mysqli_close($conn);
}

if (isset($_GET['id'])) {
   $id = $_GET['id'];
   $query = "SELECT * FROM categories WHERE id = '$id'";
   $result = mysqli_query($conn, $query);
   $row = $result->fetch_assoc();
} else {
   $message = base64_encode('danger~Something went wrong!');
   header("Location: manage-admin?m=" . $message);
}

include('../partials/_navbar.php');
include('../sub_partials/_sidebar.php');
?>

<div class="wrapper">
   <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-1"></div>
               <div class="col-sm-10">
                  <div class="card mt-5">
                     <div class="card-header">
                        <h5 class="mt-1">Edit Category</h5>
                     </div>
                     <form action="" method="post">
                        <div class="card-body">
                           <div class="row" style="display:flex;justify-content:center;">
                              <input type="hidden" class="form-control mr-3" name="id" value="<?= $row['id'] ?>" autofocus required>
                              <div class="col-sm-6">
                                 <div class="input-group ml-2 mb-4">
                                    <label class="mt-2 mr-3">Name:</label>
                                    <input type="text" class="form-control mr-3" name="name" value="<?= $row['name'] ?>" autofocus required>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="card-footer">
                           <a href="../category/" class="btn btn-secondary">Cancel</a>
                           <button type="submit" class="btn btn-success float-right">Update</button>
                        </div>
                     </form>
                  </div>
               </div>
               <div class="col-sm-1"></div>
            </div>
            <!-- /.row -->
         </div>
      </section>
      <!-- /.content -->
   </div>
</div>

<?php include('../sub_partials/_footer.php') ?>