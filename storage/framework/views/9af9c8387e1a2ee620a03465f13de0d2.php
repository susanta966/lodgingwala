<?php $__env->startSection('title'); ?>
Add Platform
<?php $__env->stopSection(); ?>

<?php $__env->startSection('maincontent'); ?>
<div class="col-12">
    <div class="card-group box-margin">
        <div class="card">
            <!-- Page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 mt-3">
                                <h5 style="margin-left: 19px;">Add Platform</h5>
                            </div>
                            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/dashboard')); ?>">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="<?php echo e(route('platform.index')); ?>">Platforms</a></li>
                                        <li class="breadcrumb-item active">Add Platform</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End page title -->

            <?php if(session('success')): ?>
            <span class="alert alert-success"><?php echo e(session('success')); ?></span>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('platform.store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
               

                <div class="card-body">
                    <div class="row p-4">
                       <div class="col-md-6">
    <div class="form-group">
        <label for="link">Select Booknow</label>
        <select name="booknow" id="booknow" class="form-control">
            <option value="">Select</option>
            <?php $__currentLoopData = $booknow; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($data->id); ?>"><?php echo e($data->title); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php $__errorArgs = ['booknow'];
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

                        <!-- Platform Link -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="link">Platform Link</label>
                                <input type="text" class="form-control" id="link" name="link"
                                       value="<?php echo e(old('link')); ?>" placeholder="Enter platform link">
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

                        <!-- Image -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Platform Image</label>
                                <input type="file" name="image" class="form-control" id="image" accept="image/*">
                                 <span class="text-danger">*Recommended image size: 40 × 40px</span>
                                <?php $__errorArgs = ['image'];
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
                </div>

                <div class="d-flex justify-content-end mb-4 mr-4">
                    <button type="submit" class="btn btn-primary rounded text-capitalize">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/demo82_color_usr/data/www/demo82.colormoon.in/rockdale/resources/views/admin/platform/create.blade.php ENDPATH**/ ?>