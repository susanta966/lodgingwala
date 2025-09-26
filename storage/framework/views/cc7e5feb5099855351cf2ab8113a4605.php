

<?php $__env->startSection('maincontent'); ?>
<div class="col-12">
    <div class="card-group box-margin">
        <div class="card">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 mt-3">
                                <h5 style="margin-left: 19px;">Home</h5>
                            </div>
                            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/dashboard')); ?>">Dashboard</a></li>
                                        <li class="breadcrumb-item active"><a href="<?php echo e(route('home.index')); ?>">Home</a></li>
                                        <li class="breadcrumb-item active">Home Edit</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <?php $__env->startSection('title'); ?>
                            Home Edit
                        <?php $__env->stopSection(); ?>
                    </div>
                </div>
            </div>

            <?php if(session('success')): ?>
                <span class="alert alert-success"><?php echo e(session('success')); ?></span>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('home.update', $home->id)); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="card-body">
                    <div class="row p-4">
                        <!-- Modal Fields -->
                      
                        <!-- Best Room Fields -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="best_room_one_word">Best Room One Word</label>
                                <input type="text" name="best_room_one_word" value="<?php echo e($home->best_room_one_word); ?>" class="form-control" placeholder="Enter Best Room One Word">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="best_room_heading">Best Room Heading</label>
                                <input type="text" name="best_room_heading" value="<?php echo e($home->best_room_heading); ?>" class="form-control" placeholder="Enter Best Room Heading">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="best_room_title">Best Room Title</label>
                                <input type="text" name="best_room_title" value="<?php echo e($home->best_room_title); ?>" class="form-control" placeholder="Enter Best Room Title">
                            </div>
                        </div>

                        <!-- Banquet Fields -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="banquet_one_word">Banquet One Word</label>
                                <input type="text" name="banquet_one_word" value="<?php echo e($home->banquet_one_word); ?>" class="form-control" placeholder="Enter Banquet One Word">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="banquet_heading">Banquet Heading</label>
                                <input type="text" name="banquet_heading" value="<?php echo e($home->banquet_heading); ?>" class="form-control" placeholder="Enter Banquet Heading">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="banquet_title">Banquet Title</label>
                                <input type="text" name="banquet_title" value="<?php echo e($home->banquet_title); ?>" class="form-control" placeholder="Enter Banquet Title">
                            </div>
                        </div>

                        <!-- Facility Fields -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="faciltie_one_word">Facility One Word</label>
                                <input type="text" name="faciltie_one_word" value="<?php echo e($home->faciltie_one_word); ?>" class="form-control" placeholder="Enter Facility One Word">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="faciltie_heading">Facility Heading</label>
                                <input type="text" name="faciltie_heading" value="<?php echo e($home->faciltie_heading); ?>" class="form-control" placeholder="Enter Facility Heading">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="faciltie_title">Facility Title</label>
                                <input type="text" name="faciltie_title" value="<?php echo e($home->faciltie_title); ?>" class="form-control" placeholder="Enter Facility Title">
                            </div>
                        </div>

                        <!-- Testimonial Fields -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="testimonial_one_word">Testimonial One Word</label>
                                <input type="text" name="testimonial_one_word" value="<?php echo e($home->testimonial_one_word); ?>" class="form-control" placeholder="Enter Testimonial One Word">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="testimonial_heading">Testimonial Heading</label>
                                <input type="text" name="testimonial_heading" value="<?php echo e($home->testimonial_heading); ?>" class="form-control" placeholder="Enter Testimonial Heading">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="testimonial_title">Testimonial Title</label>
                                <input type="text" name="testimonial_title" value="<?php echo e($home->testimonial_title); ?>" class="form-control" placeholder="Enter Testimonial Title">
                            </div>
                        </div>

                        <!-- Location Fields -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="location_one_word">Location One Word</label>
                                <input type="text" name="location_one_word" value="<?php echo e($home->location_one_word); ?>" class="form-control" placeholder="Enter Location One Word">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="location_heading">Location Heading</label>
                                <input type="text" name="location_heading" value="<?php echo e($home->location_heading); ?>" class="form-control" placeholder="Enter Location Heading">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="location_title">Location Title</label>
                                <input type="text" name="location_title" value="<?php echo e($home->location_title); ?>" class="form-control" placeholder="Enter Location Title">
                            </div>
                        </div>

                        <!-- Blog Fields -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="blog_one_word">Blog One Word</label>
                                <input type="text" name="blog_one_word" value="<?php echo e($home->blog_one_word); ?>" class="form-control" placeholder="Enter Blog One Word">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="blog_heading">Blog Heading</label>
                                <input type="text" name="blog_heading" value="<?php echo e($home->blog_heading); ?>" class="form-control" placeholder="Enter Blog Heading">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="blog_title">Blog Title</label>
                                <input type="text" name="blog_title" value="<?php echo e($home->blog_title); ?>" class="form-control" placeholder="Enter Blog Title">
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

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/demo82_color_usr/data/www/demo82.colormoon.in/rockdale/resources/views/admin/home/edit.blade.php ENDPATH**/ ?>