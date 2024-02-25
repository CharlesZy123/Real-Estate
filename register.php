<?php
include('partials/_header.php');
include('partials/_navbar.php');

require('db/dbconn.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $email = $_POST['email'];
   $contact = $_POST['contact'];
   $username = $_POST['username'];
   $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
   $registered = $_POST['register']; 

   if (empty($fname) || empty($lname) || empty($email) || empty($contact) || empty($username) || empty($password) || empty($registered)) {
      $message = base64_encode('danger~All fields are required.');
      header("Location: register?m=" . $message);
      exit();
   }

   $checkUsernameQuery = "SELECT COUNT(*) as count FROM users WHERE username = '$username'";
   $result = mysqli_query($conn, $checkUsernameQuery);
   $row = mysqli_fetch_assoc($result);

   if ($row['count'] > 0) {
      $message = base64_encode('danger~Username is already taken. Please choose another.');
      header("Location: register?m=" . $message);
      exit();
   }

   $insertUserQuery = "INSERT INTO users (firstname, lastname, email, contact, username, password, role) VALUES ('$fname', '$lname', '$email', '$contact', '$username', '$password', 2)";
   if (mysqli_query($conn, $insertUserQuery)) {
      $userId = mysqli_insert_id($conn);

      $insertRegisteredSql = "INSERT INTO registered (user_id, system_id) VALUES ('$userId', '$registered')";
      if (mysqli_query($conn, $insertRegisteredSql)) {
         $message = base64_encode('success~Account successfully registered!');
         header("Location: login?m=" . $message);
      } else {
         $message = base64_encode('danger~Something went wrong!');
         header("Location: register?m=" . $message);
      }
   } else {
      $message = base64_encode('danger~Something went wrong!');
      header("Location: register?m=" . $message);
   }

   mysqli_close($conn);
}

$query = "SELECT * FROM systems WHERE name = 'Real Estate' LIMIT 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if (isset($_SESSION['user_id'])) {
   header("Location: user/dashboard.php");
}
?>
<div class="content-wrapper" style="background-image: url('assets/img/background3.jpg');background-repeat: no-repeat; background-position: top;background-size: cover;">
   <main id="main">
      <section class="content section-t8">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-4"></div>
               <div class="col-sm-4 mt-2 mb-3">
                  <div class="card card-outline card-primary bg-dark">
                     <div class="card-body mb-2">
                        <h3 class="login-box-msg">Register Form</h3>
                        <form action="" method="post">
                           <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Firstname" name="fname" required>
                              <div class="input-group-append">
                                 <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Lastname" name="lname" required>
                              <div class="input-group-append">
                                 <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="input-group mb-3">
                              <input type="email" class="form-control" placeholder="Email Address" name="email" required>
                              <div class="input-group-append">
                                 <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Phone Number" name="contact" pattern="[0-9\+]+" title="Please enter only numbers and the '+' symbol" required>
                              <div class="input-group-append">
                                 <div class="input-group-text">
                                    <span class="fas fa-phone"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Username" name="username" required>
                              <div class="input-group-append">
                                 <div class="input-group-text">
                                    <span class="fas fa-user-secret"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="input-group mb-3">
                              <input type="password" class="form-control" placeholder="Password" name="password" required>
                              <div class="input-group-append">
                                 <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <input type="hidden" name="register" value="<?= $row['id']?>" required>
                              <div class="col-2"></div>
                              <div class="col-8 mt-2">
                                 <button type="submit" class="btn btn-secondary btn-block">Register</button>
                              </div>
                              <div class="col-2"></div>
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