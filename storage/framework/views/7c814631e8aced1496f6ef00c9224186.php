

<?php $__env->startSection('title'); ?>
Amenities Edit
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
                                    <h5 style="margin-left: 19px;">Amenities Edit</h5>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/dashboard')); ?>">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="<?php echo e(route('amenities.index')); ?>">Amenities</a></li>
                                            <li class="breadcrumb-item active">Amenities Edit</li>
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

                <form method="POST" action="<?php echo e(route('amenities.update', ['amenity'=>$amenitie->id])); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div class="card-body">
                        <div class="row p-4">
                            <!-- Name -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old('name', $amenitie->name)); ?>" placeholder="Enter Name">
                                    <?php $__errorArgs = ['name'];
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

                            <!-- Short Description -->
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label for="icon">Icon</label>
                                    <input type="file" name="icon" class="form-control" id="icon" accept="image/*">
                                    <p>Current Image: <img src="<?php echo e(asset('admin/amenityImage/' . $amenitie->icon)); ?>" width="100" alt="Aminity Image"></p>
                                     <span class="text-danger">*Recommended image size: 30 × 30px</span>
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

                          
                            <!-- Status -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" <?php echo e(old('status', $amenitie->status) == 1 ? 'selected' : ''); ?>>Active</option>
                                        <option value="0" <?php echo e(old('status', $amenitie->status) == 0 ? 'selected' : ''); ?>>Inactive</option>
                                    </select>
                                    <?php $__errorArgs = ['status'];
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
                            <button type="submit" class="btn btn-primary rounded text-capitalize">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/demo82_color_usr/data/www/demo82.colormoon.in/rockdale/resources/views/admin/amenities/edit.blade.php ENDPATH**/ ?>