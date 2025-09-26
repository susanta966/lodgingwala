

<?php $__env->startSection('title', 'Change Password'); ?>

<?php $__env->startSection('maincontent'); ?>
    <div class="col-12">
        <div class="card-group box-margin">
            <div class="card">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 mt-3">
                                    <h5 style="margin-left: 19px;"><?php echo $__env->yieldContent('title'); ?></h5>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a
                                                    href="<?php echo e(url('/admin/dashboard')); ?>">Dashboard</a></li>
                                            <li class="breadcrumb-item active"><?php echo $__env->yieldContent('title'); ?></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <?php if(session('success')): ?>
                    <span class="alert alert-success"><?php echo e(session('success')); ?></span>
                <?php endif; ?>
                <?php if(session('error')): ?>
                    <div class="alert bg-danger text-white">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        <?php echo e(session('error')); ?>

                    </div>
                <?php endif; ?>

                <!-- Change Password Form -->
                <form method="POST" action="<?php echo e(route('password.update')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="row p-4">
                            <div class="col-3"></div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="current_password" class="col-form-label">Current Password</label>
                                            <input type="password" name="current_password" id="current_password"
                                                class="form-control">
                                            <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"> <?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="new_password" class="col-form-label">New Password</label>
                                            <input type="password" name="new_password" id="new_password"
                                                class="form-control">
                                            <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"> <?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="confirm_password" class="col-form-label">Confirm New
                                                Password</label>
                                            <input type="password" name="confirm_password" id="confirm_password"
                                                class="form-control">
                                            <?php $__errorArgs = ['confirm_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"> <?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-right gap-5 flex-wrap ml-4 mb-5">
                                        <button type="submit" class="btn btn-primary rounded text-capitalize">Change
                                            Password</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3"></div>

                        </div>

                    </div>
                </form>
                <!-- End Change Password Form -->
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/demo82_color_usr/data/www/demo82.colormoon.in/rockdale/resources/views/admin/change-password.blade.php ENDPATH**/ ?>