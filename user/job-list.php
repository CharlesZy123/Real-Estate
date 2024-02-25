<?php
include('partials/_header.php');
include('partials/_navbar.php');

if (isset($_GET['id'])) {
   $id = $_GET['id'];
   $sysId = $_SESSION['dept'];
   $query2 = "SELECT * FROM jobs WHERE category_id = $id AND system_id = $sysId";
   $results = mysqli_query($conn, $query2);

   $data = "SELECT * FROM categories WHERE id = $id AND system_id = $sysId";
   $value = mysqli_query($conn, $data);
   $row = mysqli_fetch_assoc($value);

   function checkApplications($conn, $jobId, $sysId)
   {
      $query = "SELECT * FROM applicants WHERE job_id = $jobId AND system_id = $sysId";
      $result = mysqli_query($conn, $query);

      if ($result) {
         // $count = mysqli_num_rows($result);
         $eh = mysqli_fetch_assoc($result);
         mysqli_free_result($result);

         if(!$eh){
            return 0;
         } else {
            return $eh['id'];
         }
      } else {
         return 0;
      }
   }
} else {
   $message = base64_encode('danger~Something went wrong!');
   header("Location: job-vacancy?m=" . $message);
   exit();
}
?>
<div class="content-wrapper" style="background-image: url('assets/img/background.jpg');background-repeat: no-repeat; background-position: center;">
   <main id="main">
      <section class="content section-t8">
         <div class="container-fluid">
            <div class="row" style="display: flex;justify-content: center;">
               <div class="col-sm-12 text-center">
                  <h3 class="mb-5"><?= $row['name'] ?></h3>
               </div>
               <div class="col-md-10 col-sm-12 col-12 ml-2 mr-2">
                  <div class="card">
                     <div class="card-header">
                        <a href="job-vacancy" class="btn btn-danger float-right">
                           <i class="fas fa-arrow-left"></i> Go Back
                        </a>
                        <h4 class="mt-1">Job Offerings</h4>
                     </div>
                     <div class="card-body">
                        <table id="table" class="table table-bordered text-center">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th>Job</th>
                                 <th>Description</th>
                                 <th>Vacancies</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php foreach ($results as $key => $value) : ?>
                                 <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td class="pl-4 pr-4"><?= $value['job'] ?></td>
                                    <td><?= $value['description'] ?></td>
                                    <td class="pl-4 pr-4 text-sm"><?= $value['vacancy'] ?></td>
                                    <td class="text-sm">
                                       <?php if (checkApplications($conn, $value['id'], $sysId) == 0) : ?>
                                          <a href="#" class="btn btn-info" role="button" data-toggle="modal" data-target="#modal-apply-<?= $value['id'] ?>">
                                             Apply
                                          </a>
                                       <?php else : ?>
                                          <a href="#" class="btn btn-danger" role="button" data-toggle="modal" data-target="#modal-cancel-<?= $value['id'] ?>">
                                             Cancel
                                          </a>
                                       <?php endif; ?>
                                    </td>
                                 </tr>
                                 <!-- Modals -->
                                 <div class="modal fade" id="modal-apply-<?= $value['id'] ?>">
                                    <div class="modal-dialog modal-md">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <h4 class="modal-title">Job Application</h4>
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                             </button>
                                          </div>
                                          <div class="modal-body text-center">
                                             <p>Are you sure you want to apply for the <b><?= $value['job'] ?></b> job in the "<?= $row['name'] ?>" category?</p>
                                          </div>
                                          <div class="modal-footer justify-content-between">
                                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                             <form action="manage-application" method="POST">
                                                <input type="hidden" name="type" value="1">
                                                <input type="hidden" name="jobId" value="<?= $value['id'] ?>">
                                                <input type="hidden" name="vacancy" value="<?= $value['vacancy'] - 1 ?>">
                                                <button type="submit" class="btn btn-primary">Apply</button>
                                             </form>
                                          </div>
                                       </div>
                                    </div>
                                 </div>

                                 <div class="modal fade" id="modal-cancel-<?= $value['id'] ?>">
                                    <div class="modal-dialog modal-md">
                                       <div class="modal-content">
                                          <div class="modal-header bg-danger">
                                             <h4 class="modal-title">Cancel Job Application</h4>
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                             </button>
                                          </div>
                                          <div class="modal-body text-center">
                                             <p>Are you sure you want to cancel your application for the <b><?= $value['job'] ?></b> job in the "<?= $row['name'] ?>" category?</p>
                                          </div>
                                          <div class="modal-footer justify-content-between">
                                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                             <form action="manage-application" method="POST">
                                                <input type="hidden" name="type" value="0">
                                                <input type="hidden" name="id" value="<?= checkApplications($conn, $value['id'], $sysId)?>">
                                                <input type="hidden" name="jobId" value="<?= $value['id'] ?>">
                                                <input type="hidden" name="vacancy" value="<?= $value['vacancy'] + 1 ?>">
                                                <button type="submit" class="btn btn-danger">Yes</button>
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
            </div>
         </div>
      </section>
      <!-- /.content -->
   </main>
</div>

<?php include('partials/_footer.php') ?>