<?php
include('partials/_header.php');
include('partials/_navbar.php');

$sysId = $_SESSION['dept'];
$query2 = "SELECT * FROM categories WHERE system_id = $sysId";
$results = mysqli_query($conn, $query2);

function countVacanciesByCategoryId($conn, $id, $sysId)
{
   $query = "SELECT * FROM vacancies WHERE category_id = $id AND system_id = $sysId";
   $result = mysqli_query($conn, $query);

   if ($result) {
      $count = mysqli_num_rows($result);
      mysqli_free_result($result);
      return $count;
   } else {
      return 0;
   }
}
?>
<div class="content-wrapper" style="background-image: url('assets/img/background.jpg');background-repeat: no-repeat; background-position: center;">
   <main id="main">
      <section class="content section-t8">
         <div class="container-fluid">
            <div class="row" style="display: flex;justify-content: center;">
               <div class="col-sm-12 text-center mb-5">
                  <h3>Select Category</h3>
               </div>
               <?php
               $colors = ['primary', 'lightblue', 'info', 'navy', 'olive'];
               $colorIndex = 0;

               foreach ($results as $cat) : ?>
                  <div class="col-md-3 col-sm-6 col-12 ml-2 mr-2">
                     <a href="job-list?id=<?= $cat['id'] ?>">
                        <div class="info-box bg-<?= $colors[$colorIndex++] ?>">
                           <span class="info-box-icon"><i class="far fa-address-book"></i></span>
                           <div class="info-box-content">
                              <h4 class="text-center mt-2 mb-2"><?= $cat['name'] ?></h4>
                              <span class="progress-description text-center">
                                 Available Jobs: <b><?= countVacanciesByCategoryId($conn,  $cat['id'], $sysId) ?></b>
                              </span>
                           </div>
                        </div>
                     </a>
                  </div>
               <?php endforeach; ?>
            </div>
         </div>
      </section>
      <!-- /.content -->
   </main>
</div>

<?php include('partials/_footer.php') ?>