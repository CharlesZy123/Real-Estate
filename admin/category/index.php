<?php include('../sub_partials/_header.php');
require('../../db/dbconn.php');
include('../sub_partials/_session.php');
include('../sub_partials/_navbar.php');
include('../sub_partials/_sidebar.php');
?>

<div class="wrapper">
   <div class="content-wrapper">
      <div class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-6">
                  <h1 class="m-0">Category Page</h1>
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
                        <a href="create" class="btn btn-primary float-right">Add Categories</a>
                        <h5 class="mt-1">Category List</h5>
                     </div>
                     <div class="card-body">
                        <table id="table" class="table table-bordered table-striped text-center">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th>Action</th>
                                 <th>Category</th>
                                 <th>Employer</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>1</td>
                                 <td>Category Name</td>
                                 <td>wala lng</td>
                                 <td>wala lng</td>
                              </tr>
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