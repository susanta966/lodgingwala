

<?php $__env->startSection('maincontent'); ?>
<div class="col-12">
    <div class="card-group box-margin">
        <div class="card">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 mt-3">
                                <h5 style="margin-left: 19px;">Pop up</h5>
                            </div>
                            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/dashboard')); ?>">Dashboard</a></li>
                                        <li class="breadcrumb-item active"><a href="<?php echo e(route('admin.popup.index')); ?>">Home</a></li>
                                        <li class="breadcrumb-item active">Pop up Edit</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <?php $__env->startSection('title'); ?>
                        Pop up Edit
                        <?php $__env->stopSection(); ?>
                    </div>
                </div>
            </div>

            <?php if(session('success')): ?>
                <span class="alert alert-success"><?php echo e(session('success')); ?></span>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('admin.popup.update', $popup->id)); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="card-body">
                    <div class="row p-4">
                        <!-- Modal Fields -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="modal_heading">Pop up Heading</label>
                                <input type="text" name="modal_heading" value="<?php echo e($popup->modal_heading); ?>" class="form-control" placeholder="Enter Modal Heading">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="modal_heading_word">Pop up Heading Word</label>
                                <input type="text" name="modal_heading_word" value="<?php echo e($popup->modal_heading_word); ?>" class="form-control" placeholder="Enter Modal Heading Word">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="modal_heading_word_2">Pop up Heading Word 2</label>
                                <input type="text" name="modal_heading_word_2" value="<?php echo e($popup->modal_heading_word_2); ?>" class="form-control" placeholder="Enter Modal Heading Word 2">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="modal_description">Pop up Description</label>
                                <textarea name="modal_description" class="form-control ckeditor" placeholder="Enter Modal Description"><?php echo e($popup->modal_description); ?></textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="modal_image">Pop up Image</label>
                                <input type="file" name="modal_image" class="form-control">
                                <img src="<?php echo e(asset('admin/homeImage/' . $popup->modal_image)); ?>" alt="" style="width:60px;height:60px;"></a>
                                 <span class="text-danger">*Recommended image size: 180 × 50px</span>
                            </div>
                        </div>
 <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" <?php echo e(old('status', $popup->popup) == 1 ? 'selected' : ''); ?>>Active</option>
                                        <option value="0" <?php echo e(old('status', $popup->popup) == 0 ? 'selected' : ''); ?>>Inactive</option>
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
                        <button type="submit" class="btn btn-primary rounded text-capitalize">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/demo82_color_usr/data/www/demo82.colormoon.in/rockdale/resources/views/admin/popup/edit.blade.php ENDPATH**/ ?>