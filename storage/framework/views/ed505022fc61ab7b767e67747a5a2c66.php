<?php $__env->startSection('title'); ?>
    Add Room
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
                                    <h5 style="margin-left: 19px;">Add Room</h5>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a
                                                    href="<?php echo e(url('/admin/dashboard')); ?>">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="<?php echo e(route('rooms.index')); ?>">Rooms</a></li>
                                            <li class="breadcrumb-item active">Add Room</li>
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

                <form method="POST" action="<?php echo e(route('rooms.store')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="card-body">
                        <div class="row p-4">
                            <!-- Room Name -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Room Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="<?php echo e(old('name')); ?>" placeholder="Enter Room Name">
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

                            <!-- Area -->
                            
                            <!-- Short Description -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="short_description">Short Description</label>
                                    <input type="text" class="form-control" id="short_description"
                                        name="short_description" value="<?php echo e(old('short_description')); ?>"
                                        placeholder="Enter Short Description">
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

                            <!-- Room Description Heading -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="room_description_heading">Room Description Heading</label>
                                    <input type="text" class="form-control" id="room_description_heading"
                                        name="room_description_heading" value="<?php echo e(old('room_description_heading')); ?>"
                                        placeholder="Enter Room Description Heading">
                                    <?php $__errorArgs = ['room_description_heading'];
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

                            <!-- Room Description -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="room_description">Room Description</label>
                                    <textarea class="form-control" id="room_description" name="room_description" rows="3"
                                        placeholder="Enter Room Description"><?php echo e(old('room_description')); ?></textarea>
                                    <?php $__errorArgs = ['room_description'];
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

                            <!-- Amenities Heading -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amenites_heading">Amenities Heading</label>
                                    <input type="text" class="form-control" id="amenites_heading" name="amenites_heading"
                                        value="<?php echo e(old('amenites_heading')); ?>" placeholder="Enter Amenities Heading">
                                    <?php $__errorArgs = ['amenites_heading'];
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
                                </div>
                            </div>

                            <!-- House Rules -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="house_rule">House Rules</label>
                                    <textarea class="form-control ckeditor" id="house_rule" name="house_rule" rows="3"
                                        placeholder="Enter House Rules"><?php echo e(old('house_rule')); ?></textarea>
                                    <?php $__errorArgs = ['house_rule'];
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

                            <!-- Cancellation -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="cancellation_rule">Cancellation Policy</label>
                                    <textarea class="form-control ckeditor" id="cancellation_rule" name="cancellation_rule" rows="3"
                                        placeholder="Enter Cancellation Policy"><?php echo e(old('cancellation_rule')); ?></textarea>
                                    <?php $__errorArgs = ['cancellation_rule'];
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
                                        <option value="1" <?php echo e(old('status') == 1 ? 'selected' : ''); ?>>Active</option>
                                        <option value="0" <?php echo e(old('status') == 0 ? 'selected' : ''); ?>>Inactive
                                        </option>
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
                                        value="<?php echo e(old('priority')); ?>" placeholder="Enter Priority">
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

                            <!-- Best Room -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="best_room">Best Room</label>
                                    <select name="best_room" id="best_room" class="form-control">
                                        <option value="1" <?php echo e(old('best_room') == 1 ? 'selected' : ''); ?>>Yes</option>
                                        <option value="0" <?php echo e(old('best_room') == 0 ? 'selected' : ''); ?>>No</option>
                                    </select>
                                    <?php $__errorArgs = ['best_room'];
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

                            <!-- Room Images -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="images" class="col-form-label">Select Room Images</label>
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

                            <!-- Image Priority Section -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image_priorities">Image Priorities</label>
                                    <div id="image_priorities">
                                        <div class="row" id="image_priority_inputs"></div>
                                    </div>
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

    <!-- JavaScript to dynamically add priority inputs -->
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

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/demo82_color_usr/data/www/demo82.colormoon.in/rockdale/resources/views/admin/room/add.blade.php ENDPATH**/ ?>