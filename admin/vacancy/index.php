<?php include('../sub_partials/_header.php');
require('../../db/dbconn.php');
include('../sub_partials/_navbar.php');
include('../sub_partials/_sidebar.php');

$id = $_SESSION['dept'];
$query = "SELECT jobs.*, jobs.id AS job_id, categories.* FROM jobs JOIN categories ON categories.id=jobs.category_id";
$result = mysqli_query($conn, $query);
?>

<div class="wrapper">
   <div class="content-wrapper">
      <div class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-6">
                  <h1 class="m-0">Job Vacancies</h1>
               </div>
            </div>
         </div>
      </div>

      <!-- Main content -->
      <section class="content">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12">
                  <div class="card">
                     <div class="card-header">
                        <a href="create" class="btn btn-primary float-right"><i class="fas fa-plus mr-1"></i> New Vacancies</a>
                        <h5 class="mt-1">Job Vacancy List</h5>
                     </div>
                     <div class="card-body">
                        <table id="table" class="table table-bordered table-striped text-center">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th>Job</th>
                                 <th>Description</th>
                                 <th>Category</th>
                                 <th>Vacancy</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php foreach ($result as $key => $row) : ?>
                                 <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td class="pl-5 pr-5"><?= $row['job'] ?></td>
                                    <td><?= $row['description'] ?></td>
                                    <td class="text-sm"><?= $row['name'] ?></td>
                                    <td class="text-sm"><?= $row['vacancy'] ?></td>
                                    <td class="text-sm">
                                       <a href="edit?id=<?= $row['job_id'] ?>" class="btn btn-info m-1">
                                          <i class="fas fa-edit"></i>
                                       </a>
                                       <a href="#" class="btn btn-danger m-1">
                                          <i class="fas fa-trash"></i>
                                       </a>
                                    </td>
                                 </tr>
                              <?php endforeach; ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /.row -->
         </div>
      </section>
      <!-- /.content -->
   </div>
</div>

<?php include('../sub_partials/_footer.php') ?>