<?php
    $sitedetails = \App\Models\SiteSetting::find(1);
    
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Title -->
    <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e($sitedetails->site_title); ?> </title>
    <!-- Favicon -->
    <link rel="icon" href="<?php echo e(asset('admin/siteImage/favicon/' . $sitedetails->favicon)); ?>">
    <!-- Master Stylesheet [If you remove this CSS file, your file will be broken undoubtedly.] -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/breadcum.css')); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
      
    
    


</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="preloader-load"></div>
    </div>
    <!-- Preloader -->

    <!-- ======================================
    ******* Page Wrapper Area Start **********
    ======================================= -->
    <div class="ecaps-page-wrapper">
<?php /**PATH /var/www/demo82_color_usr/data/www/demo82.colormoon.in/rockdale/resources/views/admin/layout/header.blade.php ENDPATH**/ ?>