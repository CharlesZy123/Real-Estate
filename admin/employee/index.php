<?php include('../sub_partials/_header.php');
require('../../db/dbconn.php');
include('../sub_partials/_navbar.php');
include('../sub_partials/_sidebar.php');

$id = $_SESSION['dept'];
$query = "SELECT applicants.id AS app_id, jobs.*, jobs.id AS job_id, users.*, categories.*
          FROM applicants
          JOIN jobs ON jobs.id = applicants.job_id
          JOIN users ON users.id = applicants.user_id
          JOIN categories ON jobs.category_id = categories.id
          WHERE applicants.system_id = '$id' AND applicants.status = 1";

$result = mysqli_query($conn, $query);
?>

<div class="wrapper">
   <div class="content-wrapper">
      <div class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-6">
                  <h1 class="m-0">Employee's Page</h1>
               </div>
            </div>
         </div>
      </div>

      <!-- Main content -->
      <section class="content">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-1"></div>
               <div class="col-sm-10">
                  <div class="card">
                     <div class="card-header">
                        <h5 class="mt-1">Employee List</h5>
                     </div>
                     <div class="card-body">
                        <table id="table" class="table table-bordered table-striped text-center">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th>Name</th>
                                 <th>Job</th>
                                 <th>Category</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php foreach ($result as $key => $row) : ?>
                                 <tr>
                                    <td class="p-4"><?= $key + 1 ?></td>
                                    <td class="p-4"><?= $row['lastname'] ?>, <?= $row['firstname'] ?></td>
                                    <td class="p-4"><?= $row['job'] ?></td>
                                    <td class="p-4"><?= $row['name'] ?></td>
                                    <td>
                                       <a href="#" class="btn btn-danger m-1">
                                          Remove
                                       </a>
                                    </td>
                                 </tr>
                              <?php endforeach; ?>
                           </tbody>
                        </table>
                     </div>
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