<?php include('../sub_partials/_header.php');
require('../../db/dbconn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $id = $_POST['id'];
   $job = $_POST['job'];
   $vacancy = $_POST['vacant'];
   $desc = $_POST['desc'];
   $category = $_POST['category'];

   if (empty($category) || empty($desc)) {
      $message = base64_encode('danger~All fields are required.');
      header("Location: edit?id=" . $id . "&m=" . $message);
      exit();
   }

   $updateQuery = "UPDATE jobs SET job = '$job', description = '$desc', vacancy = '$vacancy', category_id = '$category' WHERE id = '$id'";

   if (mysqli_query($conn, $updateQuery)) {
      $message = base64_encode('success~Successfully updated!');
      header("Location: ../vacancy/?m=" . $message);
   } else {
      $message = base64_encode('danger~Something went wrong!');
      header("Location: ../vacancy/?m=" . $message);
   }

   mysqli_close($conn);
}

if (isset($_GET['id'])) {
   $id = $_GET['id'];
   $query = "SELECT * FROM jobs WHERE id = '$id'";
   $result = mysqli_query($conn, $query);
   $row = $result->fetch_assoc();

   $query2 = "SELECT * FROM categories";
   $result2 = mysqli_query($conn, $query2);
} else {
   $message = base64_encode('danger~Something went wrong!');
   header("Location: ../vacancy/?m=" . $message);
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
                        <h5 class="mt-1">Edit Job</h5>
                     </div>
                     <form action="" method="post">
                        <div class="card-body">
                           <div class="row ml-2 mr-2">
                              <div class="col-sm-6">
                                 <div class="input-group ml-2 mb-4">
                                    <label class="mt-2 mr-3">Job:</label>
                                    <input type="text" class="form-control mr-3" name="job" value="<?= $row['job'] ?>" required>
                                    <input type="hidden" class="form-control mr-3" name="id" value="<?= $row['id'] ?> required">
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <select class="form-control" name="category" required>
                                    <option selected disabled>Select Category</option>
                                    <?php foreach ($result2 as $value) : ?>
                                       <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-sm-6">
                                 <div class="input-group ml-2 mb-4">
                                    <label class="mt-2 mr-3">Vacancy:</label>
                                    <input type="number" class="form-control mr-3" name="vacant" value="<?= $row['vacancy'] ?>" required>
                                 </div>
                              </div>
                              <div class="col-sm-12">
                                 <label for="description">Description:</label>
                                 <textarea class="form-control" name="desc" cols="30" rows="6" required><?= $row['description'] ?></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="card-footer">
                           <a href="../vacancy/" class="btn btn-secondary">Cancel</a>
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