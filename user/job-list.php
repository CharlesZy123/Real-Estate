<?php
include('partials/_header.php');
include('partials/_navbar.php');

if (isset($_GET['id'])) {
   $id = $_GET['id'];
   $sysId = $_SESSION['dept'];
   $query2 = "SELECT * FROM vacancies WHERE category_id = $id AND system_id = $sysId";
   $results = mysqli_query($conn, $query2);

   $data = "SELECT * FROM categories WHERE id = $id AND system_id = $sysId";
   $value = mysqli_query($conn, $data);
   $row = mysqli_fetch_assoc($value);
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
                              <?php foreach ($results as $key => $row) : ?>
                                 <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td class="pl-4 pr-4"><?= $row['job'] ?></td>
                                    <td><?= $row['description'] ?></td>
                                    <td class="pl-4 pr-4 text-sm"><?= $row['vacancy'] ?></td>
                                    <td class="text-sm">
                                       <a href="#" class="btn btn-info">
                                          Apply
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
         </div>
      </section>
      <!-- /.content -->
   </main>
</div>

<?php include('partials/_footer.php') ?>