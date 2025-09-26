<?php $__env->startSection('title'); ?>
    Edit Banquet
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
                                    <h5 style="margin-left: 19px;">Edit Banquet</h5>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a
                                                    href="<?php echo e(url('/admin/dashboard')); ?>">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="<?php echo e(route('banquets.index')); ?>">Banquets</a>
                                            </li>
                                            <li class="breadcrumb-item active">Edit Banquet</li>
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

                <form method="POST" action="<?php echo e(route('banquets.update', $banquet->id)); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div class="card-body">
                        <div class="row p-4">
                            <!-- Name -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="<?php echo e(old('name', $banquet->name)); ?>" placeholder="Enter Name">
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="short_description">Short Description</label>
                                    <textarea class="form-control ckeditor" id="short_description" name="short_description" placeholder="Enter Short Description"><?php echo e(old('short_description', $banquet->short_description)); ?></textarea>
                                    <?php $__errorArgs = ['short_description'];
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
                            

                            <!-- Person -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="person">Person</label>
                                    <input type="text" class="form-control" id="person" name="person"
                                        value="<?php echo e(old('person', $banquet->person)); ?>" placeholder="Enter Person">
                                    <?php $__errorArgs = ['person'];
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

                            <!-- Image (Main Image) -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" class="form-control" id="image"
                                        accept="image/*">
                                    <p>Current Image: <img src="<?php echo e(asset('admin/banquetImages/' . $banquet->image)); ?>"
                                            width="100" alt="Banquet Image"></p>
                                    <span class="text-danger">*Recommended image size: 410 × 450px</span>
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
                            <!-- Amenities (Checkboxes) -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="amenities">Amenities</label>
                                    <div>
                                        <?php $__currentLoopData = $amenities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amenity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="form-check form-check-inline">
                                                <input type="checkbox" name="amenities[]" value="<?php echo e($amenity->id); ?>"
                                                    class="form-check-input" id="amenity_<?php echo e($amenity->id); ?>"
                                                    <?php echo e(in_array($amenity->id, $roomAmenities) ? 'checked' : ''); ?>>
                                                <label class="form-check-label"
                                                    for="amenity_<?php echo e($amenity->id); ?>"><?php echo e($amenity->name); ?></label>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <?php $__errorArgs = ['amenities'];
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
                                        <option value="1"
                                            <?php echo e(old('status', $banquet->status) == 1 ? 'selected' : ''); ?>>Active</option>
                                        <option value="0"
                                            <?php echo e(old('status', $banquet->status) == 0 ? 'selected' : ''); ?>>Inactive</option>
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
                            <!-- Priority -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="priority">Priority</label>
                                    <input type="text" name="priority" class="form-control" id="priority"
                                        value="<?php echo e(old('priority', $banquet->priority)); ?>" placeholder="Enter Priority">
                                    <?php $__errorArgs = ['priority'];
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
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="images">Select Banquet Images</label>
                                    <input type="file" name="images[]" class="form-control" id="images"
                                        accept="image/*" multiple>
                                    <small class="form-text text-muted">Recommended image size: 750 × 450px</small>

                               <?php if(!empty($banquet->images) && is_array(json_decode($banquet->images, true))): ?>
                                        <div class="image-gallery">
                                            <?php $__currentLoopData = json_decode($banquet->images, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="image-card" data-image-index="<?php echo e($index); ?>">
                                                    <div class="image-wrapper">
                                                        <a href="<?php echo e(asset('admin/banquetImages/' . $image['path'])); ?>"
                                                            target="_blank" class="image-link">
                                                            <img src="<?php echo e(asset('admin/banquetImages/' . $image['path'])); ?>"
                                                                alt="Room Image" class="image-thumbnail">
                                                        </a>
                                                    </div>

                                                    <div class="image-actions">
                                                        <div class="priority-wrapper">
                                                            <label for="priority-<?php echo e($index); ?>"
                                                                class="priority-label">Priority:</label>
                                                            <input type="number" id="priority-<?php echo e($index); ?>"
                                                                name="image_priorities[<?php echo e($index); ?>]"
                                                                value="<?php echo e($image['priority']); ?>" min="0"
                                                                class="priority-input">
                                                        </div>

                                                        <!-- Delete Image Button -->
                                                        
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php $__errorArgs = ['images'];
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

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/demo82_color_usr/data/www/demo82.colormoon.in/rockdale/resources/views/admin/banquet/edit.blade.php ENDPATH**/ ?>