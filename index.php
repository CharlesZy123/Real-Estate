<?php
include('partials/_header.php');
include('partials/_navbar.php');
if (isset($_SESSION['user_id'])) {
   if (isset($_GET['m'])) {
      $message = $_GET['m'];
      header("Location: user/dashboard?m=".$message);
      exit();
   }
   header("Location: user/dashboard");
   exit();
} elseif(isset($_SESSION['admin_id'])) {
   if (isset($_GET['m'])) {
      $message = $_GET['m'];
      header("Location: admin/dashboard?m=".$message);
      exit();
   }
   header("Location: admin/dashboard");
}
?>
<div class="content-wrapper" style="background-image: url('assets/img/background.jpg');background-repeat: no-repeat; background-position: center; background-size: cover;">
   <main id="main">
      <section class="content section-t8">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12 mt-5 text-center">
                  <h1 class="mt-4 mb-4 text-white" style="text-shadow: 3px 2px black;">Welcome to Real Estate</h1>
                  <h5 class="mb-2 text-white" style="text-shadow: 1px 1px black;">The destination where you can blossom your talent as a realtor,</h5>
                  <h5 class="mb-4 text-white" style="text-shadow: 2px 2px black;">with the desire to help other's find their dream home!</h5>
                  <a href="login" class="mt-5 mb-2 btn btn-secondary">Start Application</a>
               </div>
            </div>
         </div>
      </section>
      <!-- /.content -->
   </main>
</div>

<?php include('partials/_footer.php') ?>