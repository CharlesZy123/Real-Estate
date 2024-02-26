<footer class="bg-dark">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <nav class="nav-footer">
               <ul class="list-inline">
                  <li class="list-inline-item">
                     <a href="index">Dashboard</a>
                  </li>
                  <li class="list-inline-item">
                     <a href="about">About</a>
                  </li>
               </ul>
            </nav>
            <div class="socials-a">
               <ul class="list-inline">
                  <li class="list-inline-item">
                     <a href="https://www.facebook.com/" target="_blank">
                        <i class="bi bi-facebook" aria-hidden="true"></i>
                     </a>
                  </li>
                  <li class="list-inline-item">
                     <a href="https://www.instagram.com/" target="_blank">
                        <i class="bi bi-instagram" aria-hidden="true"></i>
                     </a>
                  </li>
               </ul>
            </div>
            <div class="copyright-footer">
               <p class="copyright text-white">
                  &copy; Copyright
                  <b class="text-white">Real Estate</b> All Rights Reserved.
               </p>
            </div>
         </div>
      </div>
   </div>
</footer>
</div>

<!-- Modals -->
<div class="modal fade" id="modal-logout">
   <div class="modal-dialog modal-sm">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Logging Out?</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <p>Are you sure you want to Logout?</p>
         </div>
         <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            <form id="logout-form" action="../logout.php" method="POST">
               <button type="submit" class="btn btn-danger">Yes</button>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- End of Modals -->

<!-- jQuery -->
<script src="../assets/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../assets/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Vendor JS Files -->
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/php-email-form/validate.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="../assets/adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../assets/adminlte/plugins/toastr/toastr.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../assets/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../assets/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../assets/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../assets/adminlte/plugins/jszip/jszip.min.js"></script>
<script src="../assets/adminlte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../assets/adminlte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../assets/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../assets/adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../assets/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/adminlte/dist/js/adminlte.min.js"></script>
<script>
   $(function() {
      <?php
      $decodedM = isset($_GET['m']) ? base64_decode(urldecode($_GET['m'])) : null;

      if ($decodedM != null) {
         $message = explode('~', $decodedM)[1];
         $design = explode('~', $decodedM)[0];

         if ($design == 'success') {
            echo 'toastr.success("' . $message . '");';
         } else {
            echo 'toastr.error("' . $message . '");';
         }
      }
      ?>

      $('#table').DataTable({
         "paging": true,
         "lengthChange": false,
         "searching": true,
         "ordering": false,
         "info": true,
         "autoWidth": false,
         "responsive": true,
      });
   });
</script>
</body>

</html>