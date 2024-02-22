<?php
function echoActiveClass($requestUri)
{
   $current_page = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

   if ($current_page == $requestUri) {
      echo 'active';
   }
}
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="dashboard" class="brand-link">
      <i class="fas fa-solid fa-search brand-image mt-2 mr-2 elevation-3"></i>
      <span class="brand-text font-weight-light">PISO</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
         <!-- <div class="image">
            <img src="" class="img-circle elevation-2" alt="Admin Image">
         </div> -->
         <div class="info">
            <a href="#" class="d-block">Administrator</a>
         </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
               <a href="../dashboard" class="nav-link <?= echoActiveClass('dashboard')?>">
                  <i class="nav-icon fas fa-columns mr-2"></i>
                  <p>
                     Dashboard
                  </p>
               </a>
            </li>
            <li class="nav-item">
               <a href="../vacancy/" class="nav-link <?= echoActiveClass('vacancy')?>">
                  <i class="nav-icon fa fa-id-card mr-2" aria-hidden="true"></i>
                  <p>
                     Vacancy
                     <!-- <span class="right badge badge-success">1</span> -->
                  </p>
               </a>
            </li>
            <li class="nav-item">
               <a href="employee/" class="nav-link <?= echoActiveClass('employee')?>">
                  <i class="nav-icon fa fa-users mr-2" aria-hidden="true"></i>
                  <p>
                     Employee
                  </p>
               </a>
            </li>
            <li class="nav-item">
               <a href="#" class="nav-link <?= echoActiveClass('applicants')?>">
                  <i class="nav-icon fa fa-users mr-2" aria-hidden="true"></i>
                  <p>
                     Applicants
                  </p>
               </a>
            </li>
            <li class="nav-item">
               <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-cogs mr-2"></i>
                  <p>
                     Settings
                     <i class="fas fa-angle-left right"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview pl-1">
                  <li class="nav-item">
                     <a href="#" class="nav-link">
                        <p>Category</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="#" class="nav-link">
                        <p>Manage Users</p>
                     </a>
                  </li>
               </ul>
            </li>
         </ul>
      </nav>
   </div>
</aside>