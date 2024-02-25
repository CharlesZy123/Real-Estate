<?php
session_start();
require '../../db/dbconn.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $id = $_POST['id'];
   $type = $_POST['type'];
   $jobId = $_POST['jobId'];
   $vacancy = $_POST['vacancy'];

   if (empty($id) || empty($jobId) || empty($vacancy)) {
      $message = base64_encode('danger~All fields are required.');
      header("Location: ../applicants/?m=" . $message);
      exit();
   }

   if ($type == 1) {
      $query = "UPDATE applicants SET status = 1 WHERE id = '$id'";
      $message = base64_encode('success~Successfully accepted the application!');
   } else {
      $query = "UPDATE applicants SET status = 2 WHERE id = '$id'";
      $message = base64_encode('success~Rejected the application successfully!');
   }
   if (mysqli_query($conn, $query)) {
      $updateQuery = "UPDATE jobs SET vacancy = '$vacancy' WHERE id = '$jobId'";
      if (mysqli_query($conn, $updateQuery)) {
         header("Location: ../applicants/?m=" . $message);
         exit();
      } else {
         $message = base64_encode('danger~Something went wrong!');
         header("Location: ../applicants/?m=" . $message);
         exit();
      }
   } else {
      $message = base64_encode('danger~Something went wrong!');
      header("Location: ../applicants/?m=" . $message);
      exit();
   }
   
   mysqli_close($conn);
} else {
   $message = base64_encode('danger~Something went wrong!');
   header("Location: job-vacancy?m=" . $message);
   exit();
}
