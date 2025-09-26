<?php $__env->startSection('title'); ?>
Banquet Add
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
                                <h5 style="margin-left: 19px;">Banquet Add</h5>
                            </div>
                            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/dashboard')); ?>">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="<?php echo e(route('banquets.index')); ?>">Banquets</a></li>
                                        <li class="breadcrumb-item active">Banquet Add</li>
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

            <form method="POST" action="<?php echo e(route('banquets.store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="card-body">
                    <div class="row p-4">
                        <!-- Title -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old('name')); ?>" placeholder="Enter Name">
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

                        <!-- Person -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="person">Person</label>
                                <input type="text" class="form-control" id="person" name="person" value="<?php echo e(old('person')); ?>" placeholder="Enter Person">
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

                        <!-- Short Description -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="short_description">Short Description</label>
                                <textarea class="form-control ckeditor" id="short_description" name="short_description" placeholder="Enter Short Description"><?php echo e(old('short_description')); ?></textarea>
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

                        <!-- Main Image -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Main Image</label>
                                <input type="file" name="image" class="form-control" id="image" accept="image/*">
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
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label for="images" class="col-form-label">Select Banquets Images</label>
                                <input type="file" name="images[]" class="form-control" id="images"
                                    accept="image/*" multiple>
                                <span class="text-danger">*Recommended image size: 750 × 450px</span>
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
                                <?php $__currentLoopData = $errors->get('images.*'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $messages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <!-- Slider Images -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="image_priorities">Image Priorities</label>
                                <div id="image_priorities">
                                    <div class="row" id="image_priority_inputs"></div>
                                </div>
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
                                                   class="form-check-input" id="amenity_<?php echo e($amenity->id); ?>">
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
                                <?php $__currentLoopData = $errors->get('amenities.*'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $messages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" <?php echo e(old('status') == 1 ? 'selected' : ''); ?>>Active</option>
                                    <option value="0" <?php echo e(old('status') == 0 ? 'selected' : ''); ?>>Inactive</option>
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
                                <input type="text" name="priority" class="form-control" id="priority" value="<?php echo e(old('priority')); ?>" placeholder="Enter Priority">
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

                    </div>

                    <div class="d-flex align-items-right gap-5 flex-wrap ml-4 mb-5">
                        <button type="submit" class="btn btn-primary rounded text-capitalize">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    // Handling multiple image uploads with priority fields dynamically
    document.getElementById("images").addEventListener("change", function() {
        var input = this;
        var container = document.getElementById("image_priority_inputs");
        container.innerHTML = ''; // Clear any existing inputs

        Array.from(input.files).forEach((file, index) => {
            var div = document.createElement('div');
            div.classList.add('col-md-3');
            div.classList.add('mb-3');

            var inputElement = document.createElement('input');
            inputElement.type = 'number';
            inputElement.name = `image_priorities[${index}]`;
            inputElement.classList.add('form-control');
            inputElement.placeholder = `Priority for ${file.name}`;
            div.appendChild(inputElement);

            container.appendChild(div);
        });
    });
</script>
<?php $__env->stopSection(); ?> 

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/demo82_color_usr/data/www/demo82.colormoon.in/rockdale/resources/views/admin/banquet/add.blade.php ENDPATH**/ ?>