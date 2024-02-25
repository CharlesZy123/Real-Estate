<?php include('../sub_partials/_header.php');
require('../../db/dbconn.php');
include('../sub_partials/_navbar.php');
include('../sub_partials/_sidebar.php');

$id = $_SESSION['sys_id'];

$query = "SELECT * FROM categories WHERE system_id=$id";
$result = mysqli_query($conn, $query);
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
                              </tr>
                           </thead>
                           <tbody>
                              <?php foreach ($result as $key => $row) : ?>
                                 <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td>
                                       <a href="edit?id=<?= $row['id'] ?>" class="btn btn-info m-1">
                                          <i class="fas fa-edit"></i>
                                       </a>
                                       <a href="#" class="btn btn-danger m-1">
                                          <i class="fas fa-trash"></i>
                                       </a>
                                    </td>
                                    <td><?= $row['name'] ?></td>
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