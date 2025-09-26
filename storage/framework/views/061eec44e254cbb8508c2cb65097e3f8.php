<?php
$sitedetails = \App\Models\SiteSetting::find(1);
?>
   <!-- Top Header Area -->
   <header class="top-header-area d-flex align-items-center justify-content-between">
       <div class="left-side-content-area d-flex align-items-center">
           <!-- Mobile Logo -->
           <div class="mobile-logo mr-3 mr-sm-4"  style="background-color: #20c997 ;">
               <a href="<?php echo e(route('admin.dashboard')); ?>"><img src="<?php echo e(asset('admin/siteImage/logo/' . $sitedetails->logo)); ?>" alt="Mobile Logo"></a>
           </div>

           <!-- Triggers -->
           <div class="ecaps-triggers mr-1 mr-sm-3">
               <div class="menu-collasped" id="menuCollasped">
                   <i class="zmdi zmdi-menu"></i>
               </div>
               <div class="mobile-menu-open" id="mobileMenuOpen">
                   <i class="zmdi zmdi-menu"></i>
               </div>
           </div>
       </div>

       <div class="right-side-navbar d-flex align-items-center justify-content-end">
           <!-- Mobile Trigger -->
           <div class="right-side-trigger" id="rightSideTrigger">
               <i class="fa fa-reorder"></i>
           </div>

           <!-- Top Bar Nav -->
           <ul class="right-side-content d-flex align-items-center">
               <!-- Left Side Nav -->
               

               

               

               
                           
                           
                       
           </ul>
       </div>
   </header>

   <!-- Main Content Area -->
   <div class="main-content">
       <div class="container-fluid">
        <div class="row justify-content-center">
           
            
            
            <?php /**PATH /var/www/demo82_color_usr/data/www/demo82.colormoon.in/rockdale/resources/views/admin/layout/navbar.blade.php ENDPATH**/ ?>