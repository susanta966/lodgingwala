

<?php $__env->startSection('maincontent'); ?>
    <style>
        .card {
            border-radius: 0.5rem;
            height: 100%;
        }

        .card-body {
            padding: 1rem;
        }

        .card-body h5 {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }

        .card-body p {
            font-size: 1rem;
        }

        .text-decoration-none {
            text-decoration: none !important;
        }
    </style>
<?php $__env->startSection('title'); ?>
    Dashboard
<?php $__env->stopSection(); ?>
<div class="col-md-12">
    <div class="row">
    <div class="col-md-3 mb-3">
            <div class="card bg-gradient-primary px-3 py-3 border-0">
                <a href="<?php echo e(route('rooms.index')); ?>" class="text-decoration-none">
                    <div class="card-body text-center">
                        <h5 class="h5 text-white">Rooms</h5>
                        <p class="mt-2 mb-0 text-white">
                            <?php echo e($room); ?>

                        </p>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card bg-gradient-dark px-3 py-3 border-0">
                <a href="<?php echo e(route('admin.enquiry.index')); ?>" class="text-decoration-none">
                    <div class="card-body text-center">
                        <h5 class="h5 text-white">Enquiries</h5>
                        <p class="mt-2 mb-0 text-white">
                            <?php echo e($enquiry); ?>

                        </p>
                    </div>
                </a>
            </div>
        </div>
       
        <div class="col-md-3 mb-3">
            <div class="card bg-gradient-primary px-3 py-3 border-0">
                <a href="<?php echo e(route('blogs.index')); ?>" class="text-decoration-none">
                    <div class="card-body text-center">
                        <h5 class="h5 text-white"> Blogs</h5>
                        <p class="mt-2 mb-0 text-white">
                            <?php echo e($blog); ?>

                        </p>
                    </div>
                </a>
            </div>
        </div> 

 

        <div class="col-3 mb-3">
            <div class="card bg-gradient-dark px-3 py-3 border-0">
                <a href="<?php echo e(route('booknow.index')); ?>" class="text-decoration-none">
                    <div class="card-body text-center">
                        <h5 class="h5 text-white">Book-Now</h5>
                        <p class="mt-2 mb-0 text-white">
                            <?php echo e($booknow); ?>

                        </p>
                    </div>
                </a>
            </div>
        </div>   
      

    
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/demo82_color_usr/data/www/demo82.colormoon.in/rockdale/resources/views/admin/home.blade.php ENDPATH**/ ?>