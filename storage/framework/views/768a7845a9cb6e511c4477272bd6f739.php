<?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  

<div class="main-content h-100vh" style="background-image: url('<?php echo e(asset('admin/img/bg-img/bgimg.jpeg')); ?>');">

    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center">
            <div class="col-md-8 col-lg-5">
                <!-- Middle Box -->
                <div class="middle-box">
                    <div class="card">
                       
                        <div class="card-body p-4">
                            <h4 class="font-24 mb-30"> Admin Log in.</h4>
                            <?php if($message = Session::get('success')): ?>
                        <div class="alert bg-info text-white">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                           <?php echo e($message); ?>

                        </div>
                        <?php endif; ?>
                        <?php if($message = Session::get('error')): ?>
                        <div class="alert bg-danger text-white">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                           <?php echo e($message); ?>

                        </div>
                        <?php endif; ?>
                            <form action="<?php echo e(route('admin.login')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                             
                                <div class="form-group">
                                    <label for="emailaddress">Email address</label>
                                    <input class="form-control" type="email" id="emailaddress" name="email" value="<?php echo e(old('email')); ?>" placeholder="Enter your email">
                                    <?php $__errorArgs = ['email'];
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

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" id="password" name="password" placeholder="Enter your password">
                                    <?php $__errorArgs = ['password'];
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
                               

                                <div class="form-group mb-0 mt-15">
                                    <button class="btn btn-primary btn-block" type="submit">Log In</button>
                                </div>

                                

                            </form>

                            <!-- end card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php echo $__env->make('admin.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/demo82_color_usr/data/www/demo82.colormoon.in/rockdale/resources/views/admin/login.blade.php ENDPATH**/ ?>