<?php
function echoActiveClass($requestUri)
{
   $current_page = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

   if ($current_page == $requestUri) {
      echo 'active';
   }
}
?>

<nav class="navbar navbar-default navbar-trans navbar-expand-sm fixed-top bg-dark">
   <div class="container mt-2 mb-1">
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
         <span></span>
         <span></span>
         <span></span>
      </button>
      <a class="h3" href="../index">Real Estate</a>

      <div class="navbar-collapse collapse" style="justify-content: right;" id="navbarDefault">
         <ul class="navbar-nav ml-auto">
            <li class="nav-item pl-2 <?php echoActiveClass('dashboard')?>">
               <a class="nav-link text-white" href="dashboard">Dashboard</a>
            </li>
            <li class="nav-item <?php echoActiveClass('job-vacancy') || echoActiveClass('job-list')?>">
               <a class="nav-link pl-2 text-white" href="job-vacancy">Job Vacancy</a>
            </li>
            <li class="nav-item <?php echoActiveClass(''); ?>">
               <a class="nav-link pl-2 text-white" href="#">Profile</a>
            </li>
            <?php if(isset($_SESSION['jobhub'])):?>
               <li class="nav-item">
                  <a class="nav-link pl-2 text-white" href="../../user/dashboard">
                     <i class="fas fa-sign-out-alt"></i>&nbsp;MainPage</a>
                  </a>
               </li>
            <?php else:?>
               <li class="nav-item">
                  <a class="nav-link pl-2 text-white" href="#" role="button" data-toggle="modal" data-target="#modal-logout">
                     <i class="fas fa-sign-out-alt"></i>&nbsp;Log Out</a>
                  </a>
               </li>
            <?php endif;?>
         </ul>
      </div>

      <ul class="navbar-nav float-right">
         <li class="nav-item pl-2"><?= $row['username']?></li>
      </ul>
   </div>
</nav>