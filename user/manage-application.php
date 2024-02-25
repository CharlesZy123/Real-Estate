<?php
session_start();
require '../db/dbconn.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $userId = $_SESSION['user_id'];
   $sysId = $_SESSION['dept'];
   $type = $_POST['type'];
   $jobId = $_POST['jobId'];
   $categoryId = $_POST['categoryId'];

   if (empty($userId) || empty($sysId) || empty($jobId)) {
      $message = base64_encode('danger~All fields are required.');
      header("Location: job-list?id=" . $jobId . "&m=" . $message);
      exit();
   }

   if ($type == 1) {
      $query = "INSERT INTO applicants (user_id, system_id, job_id) VALUES ('$userId', '$sysId', '$jobId')";
      $message = base64_encode('success~Successfully applied for a job position!');
   } else {
      $message = base64_encode('success~Successfully canceled application for the job position!');
      $id = $_POST['id'];
      $query = "DELETE FROM applicants WHERE id='$id'";
   }
   if (mysqli_query($conn, $query)) {
      header("Location: job-list?id=" . $categoryId . "&m=" . $message);
      exit();
   } else {
      $message = base64_encode('danger~Something went wrong!');
      header("Location: job-list?id=" . $categoryId . "&m=" . $message);
      exit();
   }

   mysqli_close($conn);
} else {
   $message = base64_encode('danger~Something went wrong!');
   header("Location: job-vacancy?m=" . $message);
   exit();
}
