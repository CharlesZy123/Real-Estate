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
          WHERE applicants.system_id = '$id' AND applicants.status = 0";

$result = mysqli_query($conn, $query);
?>

<div class="wrapper">
   <div class="content-wrapper">
      <div class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-6">
                  <h1 class="m-0">Applicant's Page</h1>
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
                        <h5 class="mt-1">Applicant List</h5>
                     </div>
                     <div class="card-body">
                        <table id="table" class="table table-bordered text-center">
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
                                       <a href="#" class="btn btn-info m-1" role="button" data-toggle="modal" data-target="#modal-accept-<?= $row['app_id'] ?>">
                                          Accept
                                       </a>
                                       <a href="#" class="btn btn-danger m-1"  role="button" data-toggle="modal" data-target="#modal-reject-<?= $row['app_id'] ?>">
                                          Reject
                                       </a>
                                    </td>
                                 </tr>

                                 <!-- Modals -->
                                 <div class="modal fade" id="modal-accept-<?= $row['app_id'] ?>">
                                    <div class="modal-dialog modal-md">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <h4 class="modal-title">Application Process</h4>
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                             </button>
                                          </div>
                                          <div class="modal-body text-center">
                                             <p>Do you want to accept <?= $row['firstname'] ?> <?= $row['lastname'] ?>'s application in the <b><?= $row['job'] ?></b> job of the "<?= $row['name'] ?>" category?</p>
                                          </div>
                                          <div class="modal-footer justify-content-between">
                                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                             <form action="manage-application" method="POST">
                                                <input type="hidden" name="type" value="1">
                                                <input type="hidden" name="id" value="<?= $row['app_id'] ?>">
                                                <input type="hidden" name="jobId" value="<?= $row['job_id'] ?>">
                                                <input type="hidden" name="vacancy" value="<?= $row['vacancy'] - 1 ?>">
                                                <button type="submit" class="btn btn-success">Accept</button>
                                             </form>
                                          </div>
                                       </div>
                                    </div>
                                 </div>

                                 <div class="modal fade" id="modal-reject-<?= $row['app_id'] ?>">
                                    <div class="modal-dialog modal-md">
                                       <div class="modal-content">
                                          <div class="modal-header bg-danger">
                                             <h4 class="modal-title">Application Process</h4>
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                             </button>
                                          </div>
                                          <div class="modal-body text-center">
                                             <p>Are you sure to reject the application of <?= $row['firstname'] ?> <?= $row['lastname'] ?> in the <b><?= $row['job'] ?></b> job of the "<?= $row['name'] ?>" category?</p>
                                          </div>
                                          <div class="modal-footer justify-content-between">
                                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                             <form action="manage-application" method="POST">
                                                <input type="hidden" name="type" value="0">
                                                <input type="hidden" name="id" value="<?= $row['app_id'] ?>">
                                                <input type="hidden" name="jobId" value="<?= $row['job_id'] ?>">
                                                <input type="hidden" name="vacancy" value="<?= $row['vacancy'] ?>">
                                                <button type="submit" class="btn btn-danger">Reject</button>
                                             </form>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- End of Modals -->
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