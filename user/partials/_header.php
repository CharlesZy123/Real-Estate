<?php
session_start();
require('../db/dbconn.php');
if (!isset($_SESSION['user_id']) || !isset($_SESSION['sys_true'])) {
   header("Location: ../login");
} else {
   $id = $_SESSION['user_id'];
   $path = ucfirst(basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
   $title = ($path == "Index" || $path == "Real-estate") ? 'Welcome' : $path;

   $query = "SELECT * FROM users WHERE id = $id";
   $result = mysqli_query($conn, $query);
   $row = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">

   <title>Real Estate | <?php echo $title; ?></title>
   <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
   <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="../assets/adminlte/plugins/fontawesome-free/css/all.min.css">
   <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
   <!-- SweetAlert2 -->
   <link rel="stylesheet" href="../assets/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
   <!-- Toastr -->
   <link rel="stylesheet" href="../assets/adminlte/plugins/toastr/toastr.min.css">
   <!-- DataTables -->
   <link rel="stylesheet" href="../assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" href="../assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
   <link rel="stylesheet" href="../assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
   <!-- Vendor CSS Files -->
   <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
   <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
   <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
   <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
   <!-- Template Main CSS File -->
   <link href="../assets/css/style.css" rel="stylesheet">
   <link href="../assets/adminlte/dist/css/adminlte.min.css" rel="stylesheet">
</head>

<body class="hold-transition layout-top-nav">
   <div class="wrapper">