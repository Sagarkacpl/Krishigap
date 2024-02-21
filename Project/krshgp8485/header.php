<?php
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
?>
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
   <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo mr-5" href="dashboard.php"><img style="height: 60px;"
            src="images/krishi-gap-logo.jpg" class="mr-2" alt="logo" /></a>
      <a class="navbar-brand brand-logo-mini" href="dashboard.php"><img style="height: 34px;"
            src="images/krishi-gap-logo.jpg" alt="logo" /></a>
   </div>
   <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
         <span class="icon-menu"></span>
      </button>
      <ul class="navbar-nav mr-lg-2">
         <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
               <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                  <span class="input-group-text" id="search">
                     <i class="icon-search"></i>
                  </span>
               </div>
               <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now"
                  aria-label="search" aria-describedby="search">
            </div>
         </li>
      </ul>
      <ul class="navbar-nav navbar-nav-right">
         <!-- <li class="nav-item dropdown show">
            <a href="module_training_dashboard.php" class="btn btn-success btn-rounded btn-fw">Training Module</a>
         </li> -->
         <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
               <img src="images/faces/face28.jpg" alt="profile" />
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
               <a href="logout-logic.php" class="dropdown-item">
                  <i class="ti-power-off text-primary"></i>
                  Logout
               </a>
            </div>
         </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
         data-toggle="offcanvas">
         <span class="icon-menu"></span>
      </button>
   </div>
</nav>