

<nav class="sidebar" data-trigger="scrollbar">
    <!-- Sidebar Header -->
    <div class="sidebar-header d-none d-lg-block">
       <!-- Sidebar Toggle Pin Button -->
       <div class="sidebar-toogle-pin">
          <i class="icofont-tack-pin"></i>
       </div>
       <!-- End Sidebar Toggle Pin Button -->
    </div>
    <!-- End Sidebar Header -->

    <!-- Sidebar Body -->
    <div class="sidebar-body">
       <!-- Nav -->
       <ul class="nav">
          <li class="active">
             <a href="admin_dashboard.php">
                <i class="icofont-pie-chart"></i>
                <span class="link-title">Dashboard</span>
             </a>
          </li>
          <li>
             <a href="#">
                <i class="icofont-shopping-cart"></i>
                <span class="link-title">Manage User</span>
             </a>

             <!-- Sub Menu -->
             <ul class="nav sub-menu">
                <li><a href="all_user.php">All User</a></li>
             </ul>
             <!-- End Sub Menu -->
          </li>
          <li>
             <a href="#">
                <i class="icofont-shopping-cart"></i>
                <span class="link-title">Manage Banner</span>
             </a>

             <!-- Sub Menu -->
             <ul class="nav sub-menu">
                <li><a href="all_banner.php">All Banner</a></li>
             </ul>
             <!-- End Sub Menu -->
          </li>
          <li>
             <a href="#">
                <i class="icofont-shopping-cart"></i>
                <span class="link-title">Manage Counter</span>
             </a>

             <!-- Sub Menu -->
             <ul class="nav sub-menu">
                <li><a href="all_counter.php">All Counter</a></li>
             </ul>
             <!-- End Sub Menu -->
          </li>

          <li>
             <a href="#">
                <i class="icofont-shopping-cart"></i>
                <span class="link-title">Manage About</span>
             </a>

             <!-- Sub Menu -->
             <ul class="nav sub-menu">
                <li><a href="all_about.php">All About</a></li>
             </ul>
             <!-- End Sub Menu -->
          </li>
       </ul>
       <!-- End Nav -->
    </div>
    <!-- End Sidebar Body -->
 </nav>


 $pase_imageCustomeName='about_pase'.time().'_'.rand(10000,1000000).'.'.pathinfo($about_pase_image['name'],PATHINFO_EXTENSION);

                  // pase image update query here 
                  $update="UPDATE `about` SET `about_title`='$about_title',`about_text`='$about_text',`button_link`='$button_link',`button_text`=' $button_text', `about_home_image` = '$home_imageCustomeName', `about_pase_image` = '$pase_imageCustomeName' WHERE id ='$id'";


                  move_uploaded_file($about_pase_image['tmp_name'],'uploads/'.$pase_imageCustomeName);