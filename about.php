<?php
include('partials/_header.php');
include('partials/_navbar.php');
if (isset($_SESSION['user_id'])) {
   header("Location: ../users/dashboard.php");
}
?>
<div class="content-wrapper" style="background-image: url('assets/img/background.jpg');background-repeat: no-repeat; background-position: left center;">
   <main id="main">
      <section class="content section-t8">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-2"></div>
               <div class="col-sm-8 mt-3 text-center">
                  <h2 class="mt-2 mb-5 text-white" style="text-shadow: 2px 2px black;">About Page</h2>
                  <label style="text-shadow: 1px 1px white;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed sed risus pretium quam vulputate dignissim. Non blandit massa enim nec dui nunc. Sagittis id consectetur purus ut faucibus pulvinar elementum integer. Volutpat maecenas volutpat blandit aliquam etiam. Non blandit massa enim nec dui nunc. Facilisis gravida neque convallis a cras semper auctor.</label>
               </div>
               <div class="col-sm-2"></div>
            </div>
         </div>
      </section>
      <!-- /.content -->
   </main>
</div>

<?php include('partials/_footer.php') ?>