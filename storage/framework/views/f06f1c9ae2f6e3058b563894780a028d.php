<?php $__env->startSection('title'); ?>
    Edit Room
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
                                    <h5 style="margin-left: 19px;">Edit Room</h5>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a
                                                    href="<?php echo e(url('/admin/dashboard')); ?>">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="<?php echo e(route('rooms.index')); ?>">Rooms</a></li>
                                            <li class="breadcrumb-item active">Edit Room</li>
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

                <form method="POST" action="<?php echo e(route('rooms.update', $room->id)); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div class="card-body">
                        <div class="row p-4">
                            <!-- Name -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Room Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="<?php echo e(old('name', $room->name)); ?>" placeholder="Enter Room Name">
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
                                        name="short_description"
                                        value="<?php echo e(old('short_description', $room->short_description)); ?>"
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
                                        name="room_description_heading"
                                        value="<?php echo e(old('room_description_heading', $room->room_description_heading)); ?>"
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
                                    <textarea class="form-control" id="room_description" name="room_description" rows="4"><?php echo e(old('room_description', $room->room_description)); ?></textarea>
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
                                        value="<?php echo e(old('amenites_heading', $room->amenites_heading)); ?>"
                                        placeholder="Enter Amenities Heading">
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

                            <!-- House Rule -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="house_rule">House Rule</label>
                                    <textarea class="form-control ckeditor" id="house_rule" name="house_rule" rows="4"><?php echo e(old('house_rule', $room->house_rule)); ?></textarea>
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

                            <!-- Cancellation Rule -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="cancellation_rule">Cancellation Rule</label>
                                    <textarea class="form-control ckeditor" id="cancellation_rule" name="cancellation_rule" rows="4"><?php echo e(old('cancellation_rule', $room->cancellation_rule)); ?></textarea>
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
                                        <option value="1" <?php echo e($room->status == 1 ? 'selected' : ''); ?>>Active</option>
                                        <option value="0" <?php echo e($room->status == 0 ? 'selected' : ''); ?>>Inactive
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="priority">Priority</label>
                                    <input type="text" name="priority" class="form-control" id="priority"
                                        value="<?php echo e(old('priority', $room->priority)); ?>" placeholder="Enter Priority">
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
                                        <option value="1" <?php echo e($room->best_room == 1 ? 'selected' : ''); ?>>Yes</option>
                                        <option value="0" <?php echo e($room->best_room == 0 ? 'selected' : ''); ?>>No</option>
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="images">Select Room Images</label>
                                    <input type="file" name="images[]" class="form-control" id="images" accept="image/*" multiple>
                                    <small class="form-text text-muted">Recommended image size: 750 × 450px</small>
                            
                                    <?php if(!empty($room->images) && is_array(json_decode($room->images, true))): ?>
                                        <div class="image-gallery">
                                            <?php $__currentLoopData = json_decode($room->images, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="image-card" data-image-index="<?php echo e($index); ?>">
                                                    <div class="image-wrapper">
                                                        <a href="<?php echo e(asset('admin/roomImages/' . $image['path'])); ?>" target="_blank" class="image-link">
                                                            <img src="<?php echo e(asset('admin/roomImages/' . $image['path'])); ?>" alt="Room Image" class="image-thumbnail">
                                                        </a>
                                                    </div>
                            
                                                    <div class="image-actions">
                                                        <div class="priority-wrapper">
                                                            <label for="priority-<?php echo e($index); ?>" class="priority-label">Priority:</label>
                                                            <input type="number" id="priority-<?php echo e($index); ?>" name="image_priorities[<?php echo e($index); ?>]"
                                                                   value="<?php echo e(old('image_priorities.' . $index, $image['priority'])); ?>" min="0" class="priority-input">
                                                        </div>
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
                            
                            <style>
                                /* Image Gallery */
                                .image-gallery {
                                    display: grid;
                                    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                                    gap: 15px;
                                    margin-top: 20px;
                                }
                            
                                /* Image Card */
                                .image-card {
                                    background: #fff;
                                    border: 1px solid #e0e0e0;
                                    border-radius: 12px;
                                    overflow: hidden;
                                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                                    display: flex;
                                    flex-direction: column;
                                    align-items: center;
                                    padding: 10px;
                                    width: 150px;
                                    position: relative;
                                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                                    text-align: center;
                                }
                            
                                /* Image Wrapper */
                                .image-wrapper {
                                    width: 100%;
                                    text-align: center;
                                    margin-bottom: 10px;
                                    position: relative;
                                }
                            
                                .image-thumbnail {
                                    width: 20px; /* Fixed image size */
                                    height: 20px; /* Fixed image size */
                                    border-radius: 8px;
                                    transition: transform 0.3s ease, opacity 0.3s ease;
                                }
                            
                                /* Hover effect for image */
                                .image-thumbnail:hover {
                                    transform: scale(1.05);
                                    opacity: 0.85;
                                }
                            
                                /* Image Actions */
                                .image-actions {
                                    display: flex;
                                    justify-content: center;
                                    width: 100%;
                                    margin-top: 10px;
                                    align-items: center;
                                }
                            
                                /* Priority Section */
                                .priority-wrapper {
                                    display: flex;
                                    align-items: center;
                                    justify-content: center; /* Center the priority input */
                                }
                            
                                .priority-label {
                                    margin-right: 10px;
                                    font-size: 14px;
                                    color: #333;
                                }
                            
                                .priority-input {
                                    width: 60px;
                                    padding: 5px;
                                    font-size: 14px;
                                    border: 1px solid #ddd;
                                    border-radius: 5px;
                                    text-align: center;
                                }
                            
                                /* General Styles for Mobile Responsiveness */
                                @media (max-width: 768px) {
                                    .image-card {
                                        width: calc(50% - 1rem); /* Two images per row on medium screens */
                                    }
                                }
                            
                                @media (max-width: 576px) {
                                    .image-card {
                                        width: 100%; /* One image per row on small screens */
                                    }
                                }
                            </style>
                            


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

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/demo82_color_usr/data/www/demo82.colormoon.in/rockdale/resources/views/admin/room/edit.blade.php ENDPATH**/ ?>