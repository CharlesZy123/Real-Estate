<?php include('partials/_header.php');
include('partials/_navbar.php');

require('db/dbconn.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

   $usernameOrEmail = $_POST['email'];
   $password = $_POST['password'];
   $sysId = $_POST['registered'];

   if (empty($usernameOrEmail) || empty($password)) {
      $message = base64_encode('danger~Please enter both username/email and password.');
      header("Location: login?m=" . $message);
      exit();
   }

   $query = "SELECT * FROM users WHERE username = '$usernameOrEmail' OR email = '$usernameOrEmail'";
   $result = $conn->query($query);

   if ($result->num_rows > 0) {
      $row = mysqli_fetch_assoc($result);

      if (password_verify($password, $row['password'])) {
         if ($row['role'] == 2) {
            session_start();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_role'] = $row['role'];
            $_SESSION['dept'] = $sysId;
            $_SESSION['sys_true'] = true;

            $message = base64_encode('success~Login successful!');
            header("Location: user/dashboard?m=" . $message);
            exit();
         } else {
            $message = base64_encode('danger~Access denied. You do not have the required role.');
            header("Location: login?m=" . $message);
            exit();
         }
      } else {
         $message = base64_encode('danger~Incorrect password.');
         header("Location: login?m=" . $message);
         exit();
      }
   } else {
      $message = base64_encode('danger~User not found.');
      header("Location: login?m=" . $message);
      exit();
   }

   $conn->close();
}

$query = "SELECT * FROM systems WHERE name = 'Real Estate' LIMIT 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if (isset($_SESSION['user_id']) && isset($_SESSION['sys_true'])) {
   header("Location: user/dashboard");
}
?>

<div class="content-wrapper" style="background-image: url('assets/img/background2.jpg');background-repeat: no-repeat;background-position: center;background-size: cover;">
   <main id="main">
      <section class="content section-t8">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-4"></div>
               <div class="col-sm-4 mt-4 mb-3">
                  <div class="text-center mb-3">
                     <a class="h1 text-white" href="index" style="text-shadow: 3px 2px black;">Real Estate</a>
                  </div>
                  <div class="card card-outline card-primary bg-dark">
                     <div class="card-body">
                        <p class="login-box-msg">Sign in to start your application!</p>
                        <form action="" method="post">
                           <input type="hidden" name="registered" value="<?= $row['id']?>">
                           <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Email or username" name="email">
                              <div class="input-group-append">
                                 <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="input-group mb-3">
                              <input type="password" class="form-control" placeholder="Password" name="password">
                              <div class="input-group-append">
                                 <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-8">
                                 <div class="icheck-primary text-black">
                                    <input type="checkbox" id="remember">
                                    <label for="remember" class="text-white">
                                       Remember Me
                                    </label>
                                 </div>
                              </div>
                              <div class="col-4">
                                 <button type="submit" class="btn btn-warning btn-block">Sign In</button>
                              </div>
                              <div class="col-12">
                                 <a href="admin/login" class="text-white">Sign in as Admin</a>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
               <div class="col-sm-4"></div>
            </div>
         </div>
      </section>
   </main>
</div>

<?php include('partials/_footer.php') ?>