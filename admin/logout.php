<?php
session_start();
if (isset($_SESSION['admin_id'])) {
   if(isset($_SESSION['jobhub'])){
      session_destroy();
      header("Location: ../../admin");
   } else {
      session_destroy();
      header("Location: login");
   }
   exit();
} else {
   header("Location: ../login");
   exit();
}
?>