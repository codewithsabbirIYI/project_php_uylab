<?php
   require_once('functions/admin_function.php');

   // header part here 
   get_header();
   
   // sidebar part here 
   get_sidebar();
     
   ?>
   <!-- // main content here  -->
   <div class="main-wrapper">
      <div class="main-content">

      <?php
         require_once('includes/mainBody.php');
      ?> 
      </div>
   </div>
   <!-- // main content end here  -->
</div>
<?php
   // footer part here 
   get_footer();
?>

