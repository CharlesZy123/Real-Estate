<?php
include('partials/_header.php');
include('partials/_navbar.php');
if (!isset($_SESSION['user_id'])) {
   header("Location: ../login");
}
?>
<div class="content-wrapper" style="background-image: url('assets/img/background.jpg');background-repeat: no-repeat; background-position: center;">
   <main id="main">
      <section class="content section-t8">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12 mt-5 text-center">
                  <h1 class="mt-4 mb-4" style="text-shadow: 3px 1px white;">Dashboard Kini</h1>
               </div>
            </div>
         </div>
      </section>
      <!-- /.content -->
   </main>
</div>

<?php include('partials/_footer.php') ?>