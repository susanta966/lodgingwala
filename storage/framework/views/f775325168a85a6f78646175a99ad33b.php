

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
                                <h5 style="margin-left: 19px;">About</h5>
                            </div>
                            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item">
                                            <a href="<?php echo e(url('/admin/dashboard')); ?>">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="<?php echo e(route('abouts.index')); ?>">About</a>
                                        </li>
                                        <li class="breadcrumb-item active">Edit</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <?php $__env->startSection('title'); ?>
                            About Edit
                        <?php $__env->stopSection(); ?>
                    </div>
                </div>
            </div>
            <!-- End Page Title -->

            <?php if(session('success')): ?>
                <span class="alert alert-success"><?php echo e(session('success')); ?></span>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('abouts.update', $about->id)); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="card-body">
                    <div class="row p-4">
                        <!-- Title -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title" class="col-form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" 
                                       value="<?php echo e($about->title); ?>" placeholder="Enter Title">
                                <?php $__errorArgs = ['title'];
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

                        <!-- Heading -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="heading" class="col-form-label">Heading</label>
                                <input type="text" name="heading" value="<?php echo e($about->heading); ?>" 
                                       class="form-control" placeholder="Enter Heading">
                                <?php $__errorArgs = ['heading'];
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
                                <label for="one_word" class="col-form-label">One Word</label>
                                <input type="text" name="one_word" value="<?php echo e($about->one_word); ?>" 
                                       class="form-control" placeholder="Enter One Word">
                                <?php $__errorArgs = ['one_word'];
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

                        <!-- Description -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description" class="col-form-label">Description</label>
                                <textarea class="form-control ckeditor" id="description" name="description" 
                                          rows="4" placeholder="Enter Description"><?php echo e($about->description); ?></textarea>
                                <?php $__errorArgs = ['description'];
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
                                <label for="image" class="col-form-label">Image</label>
                                <input type="file" name="image" class="form-control">
                              <span class="text-danger">*Recommended image size: 676 × 500px</span>
                                <?php if($about->image): ?>
                                    <a href="<?php echo e(asset('admin/aboutImages/' . $about->image)); ?>" target="_blank" rel="noopener noreferrer">
                                        <img src="<?php echo e(asset('admin/aboutImages/' . $about->image)); ?>" 
                                             alt="Image" style="width: 60px; height: 60px;">
                                    </a>
                                <?php endif; ?>
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

                        <!-- Year of Experience -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="year_of_exprience" class="col-form-label">Year of Experience</label>
                                <input type="text" name="year_of_exprience" 
                                       value="<?php echo e($about->year_of_exprience); ?>" 
                                       class="form-control" placeholder="Enter Year of Experience">
                                <?php $__errorArgs = ['year_of_exprience'];
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

                        <!-- Year of Experience Title -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="year_of_exprience_title" class="col-form-label">Experience Title</label>
                                <input type="text" name="year_of_exprience_title" 
                                       value="<?php echo e($about->year_of_exprience_title); ?>" 
                                       class="form-control" placeholder="Enter Experience Title">
                                <?php $__errorArgs = ['year_of_exprience_title'];
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

                        <!-- Testimonials Section -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="testimonials_word" class="col-form-label">Testimonials Word</label>
                                <input type="text" name="testimonials_word" 
                                       value="<?php echo e($about->testimonials_word); ?>" 
                                       class="form-control" placeholder="Enter Testimonials Word">
                                <?php $__errorArgs = ['testimonials_word'];
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
                                <label for="testimonials_heading" class="col-form-label">Testimonials Heading</label>
                                <input type="text" name="testimonials_heading" 
                                       value="<?php echo e($about->testimonials_heading); ?>" 
                                       class="form-control" placeholder="Enter Testimonials Heading">
                                <?php $__errorArgs = ['testimonials_heading'];
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
                                <label for="testimonials_short_description" class="col-form-label">Testimonials Short Description</label>
                                <input type="text" name="testimonials_short_description" 
                                       value="<?php echo e($about->testimonials_short_description); ?>" 
                                       class="form-control" placeholder="Enter Short Description">
                                <?php $__errorArgs = ['testimonials_short_description'];
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

                        <!-- Facilities Section -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="facilties_word" class="col-form-label">Facilities Word</label>
                                <input type="text" name="facilties_word" 
                                       value="<?php echo e($about->facilties_word); ?>" 
                                       class="form-control" placeholder="Enter Facilities Word">
                                <?php $__errorArgs = ['facilties_word'];
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
                                <label for="facilties_heading" class="col-form-label">Facilities Heading</label>
                                <input type="text" name="facilties_heading" 
                                       value="<?php echo e($about->facilties_heading); ?>" 
                                       class="form-control" placeholder="Enter Facilities Heading">
                                <?php $__errorArgs = ['facilties_heading'];
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
                                <label for="facilties_short_description" class="col-form-label">Facilities Short Description</label>
                                <input type="text" name="facilties_short_description" 
                                       value="<?php echo e($about->facilties_short_description); ?>" 
                                       class="form-control" placeholder="Enter Short Description">
                                <?php $__errorArgs = ['facilties_short_description'];
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

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/demo82_color_usr/data/www/demo82.colormoon.in/rockdale/resources/views/admin/about/edit.blade.php ENDPATH**/ ?>