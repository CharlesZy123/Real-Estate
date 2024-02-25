<?php include('../sub_partials/_header.php');
require('../../db/dbconn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $id = $_POST['id'];
   $job = $_POST['job'];
   $vacant = $_POST['vacant'];
   $desc = $_POST['desc'];
   $category = $_POST['category'];
   
   if (empty($id)|| empty($job) || empty($category) || empty($desc)) {
      $message = base64_encode('danger~All fields are required.');
      header("Location: create?m=");
      exit();
   }

   $insertUserQuery = "INSERT INTO jobs (system_id, job, description, vacancy, category_id) VALUES ('$id', '$job', '$desc', '$vacant','$category')";

   if (mysqli_query($conn, $insertUserQuery)) {
      $message = base64_encode('success~Job vacancy ' . $job . ' successfully added!');
      header("Location: ../vacancy/?m=" . $message);
   } else {
      $message = base64_encode('danger~Something went wrong!');
      header("Location: ../vacancy/?m=" . $message);
   }

   mysqli_close($conn);
}


$query = "SELECT * FROM categories";
$result = mysqli_query($conn, $query);

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
                        <h5 class="mt-1">Add Jobs</h5>
                     </div>
                     <form action="" method="post">
                        <div class="card-body">
                           <div class="row ml-2 mr-2">
                              <div class="col-sm-6">
                                 <div class="input-group ml-2 mb-4">
                                    <label class="mt-2 mr-3">Job:</label>
                                    <input type="text" class="form-control mr-3" placeholder="Write category here..." name="job" required>
                                    <input type="hidden" class="form-control mr-3" name="id" value="<?= $_SESSION['dept']?>">
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <select class="form-control" name="category" required>
                                    <option selected disabled>Select Category</option>
                                    <?php foreach($result as $row):?>
                                       <option value="<?= $row['id']?>"><?= $row['name']?></option>
                                    <?php endforeach;?>
                                 </select>
                              </div>
                              <div class="col-sm-6">
                                 <div class="input-group ml-2 mb-4">
                                    <label class="mt-2 mr-3">Vacancy:</label>
                                    <input type="number" class="form-control mr-3" name="vacant" required>
                                 </div>
                              </div>
                              <div class="col-sm-12">
                                 <label for="description">Description:</label>
                                 <textarea class="form-control" name="desc" cols="30" rows="6" required></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="card-footer">
                           <a href="../vacancy/" class="btn btn-secondary">Cancel</a>
                           <button type="submit" class="btn btn-info float-right">Submit</button>
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