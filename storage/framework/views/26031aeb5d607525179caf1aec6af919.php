<?php $__env->startSection('content'); ?>
    
<!-- Sub banner start -->
<div class="sub-banner" style="background : url('<?php echo e(asset('admin/siteImage/'.$sitesettings->review_breadcome_image)); ?>'); background-size :cover; background-position:center">
    <div class="container">
        <div class="breadcrumb-area">
            <h3>Review Us</h3>
        </div>
        <nav class="breadcrumbs">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('frontend.home')); ?>">Home</a></li>
                <li class="breadcrumb-item active">Review Us</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Sub Banner end -->
<style>
    .review-section .col-md-4:nth-child(2) .happy-review .gif-icon img{
        padding:30px;
    
    }
</style>

<section class="review-section">
    <div class="container">
       <div class="reivw-inner-div">
       <div class="row justify-content-center">
        <?php $__currentLoopData = $review; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4">
            <div class="happy-review">
               <a href="<?php echo e($data->link); ?>">
               <div class="gif-icon">
                <img width="180" src="<?php echo e(asset('admin/reviewImages/'.$data->image)); ?>" alt="">
                </div>
                <h6><?php echo e($data->heading); ?></h6>
               </a>
                <a class="btn-lg btn-4 btn-6" href="<?php echo e($data->link); ?> "target="_blank"><?php echo e($data->title); ?></a>
            </div><!--review-img-->
        </div><!--col-md-10-->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
        </div><!--row-->
       </div><!--review-inner-div-->
    </div><!--container-->
</section><!--review-section-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app',['meta_title' => $meta_title ?? "",'meta_keywords' => $meta_keywords ?? "",'meta_description' => $meta_description ?? ""], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/demo82_color_usr/data/www/demo82.colormoon.in/rockdale/resources/views/frontend/review.blade.php ENDPATH**/ ?>