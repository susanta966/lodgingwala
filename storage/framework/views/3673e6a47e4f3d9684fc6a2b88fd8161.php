

<?php $__env->startSection('maincontent'); ?>

<div class="col-12">
    <div class="card-group box-margin">
        <div class="card">
            <!-- Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 mt-3">
                                <h5 style="margin-left: 19px;">Testimonials</h5>
                            </div>
                            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item">
                                            <a href="<?php echo e(url('/admin/dashboard')); ?>">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="<?php echo e(route('testimonials.index')); ?>">Testimonials</a>
                                        </li>
                                        <li class="breadcrumb-item active">Edit</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <?php $__env->startSection('title'); ?>
                        Testimonials Edit
                        <?php $__env->stopSection(); ?>
                    </div>
                </div>
            </div>
            <!-- End Page Title -->

            <?php if(session('success')): ?>
                <span class="alert alert-success"><?php echo e(session('success')); ?></span>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('testimonials.update', $testimonial->id)); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="card-body">
                    <div class="row p-4">
                        <!-- Title -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="link" class="col-form-label">Link</label>
                                <input type="text" class="form-control" id="link" name="link" 
                                       value="<?php echo e($testimonial->link); ?>" placeholder="Enter Link">
                                <?php $__errorArgs = ['link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

  

                    </div>

                    <div class="d-flex align-items-right gap-5 flex-wrap ml-4 mb-5">
                        <button type="submit" class="btn btn-primary rounded text-capitalize">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/demo82_color_usr/data/www/demo82.colormoon.in/rockdale/resources/views/admin/testimonial/edit.blade.php ENDPATH**/ ?>