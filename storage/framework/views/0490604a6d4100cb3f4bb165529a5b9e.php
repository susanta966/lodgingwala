<?php $__env->startSection('content'); ?>
<!-- Sub banner start -->
<div class="sub-banner"
     style="background : url('<?php echo e(asset('admin/siteImage/' . $sitesettings->room_breadcome_image)); ?>'); background-size :cover; background-position:center">
    <div class="container">
        <div class="breadcrumb-area">
            <h3>Rooms</h3>
        </div>
        <nav class="breadcrumbs">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('frontend.home')); ?>">Home</a></li>
                <li class="breadcrumb-item active">Rooms</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Sub Banner end -->

<section class="rooms-section">
    <div class="container">
        <div class="row">

            <?php $__currentLoopData = $room; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="hotel-box" data-aos="fade-up" data-aos-duration="1500">
                    <!-- Photo thumbnail -->
                    <div class="photo-thumbnail">
                        <div class="photo">

                            <?php
                            $images = json_decode($data->images, true); // Decode as associative array
                            ?>
                            <?php if(is_array($images) && !empty($images) && isset($images[0])): ?>
                            <img src="<?php echo e(asset('admin/roomImages/' . $images[0]['path'])); ?>" alt="photo"
                                 class="img-fluid w-100">
                            <a href="<?php echo e(route('frontend.room-details', $data->slug)); ?>">
                                <span class="blog-one__plus"></span>
                            </a>
                            <?php else: ?>
                            <p>No image available</p>
                            <?php endif; ?>


                        </div>
                        <div class="pr">
                            <div class="rating">
                                <?php for($i = 0; $i < $data->star; $i++): ?>
                                <i class="fa fa-star"></i>
                                <?php endfor; ?>

                                
                                        </div>
                                        <?php echo e($data->price); ?>

                                    </div>
                                </div>
                                <!-- Detail -->
                                <div class="detail clearfix">
                                    <h3>
                                        <a href="<?php echo e(route('frontend.room-details', $data->slug)); ?>"><?php echo e($data->name); ?></a>
                                    </h3>
                                    <span class="location">
                                <a href="<?php echo e(route('frontend.room-details', $data->slug)); ?>">
                                    <?php if(!empty((string) $data->area)): ?>
                                    <i class="flaticon-bed"></i> <?php echo e($data->area); ?>

                                    <?php endif; ?>
                                </a>
                            </span>
                            <p><?php echo e($data->short_description); ?></p>
                            <a class="btn btn-default" href="<?php echo e(route('frontend.room-details', $data->slug)); ?>">Read
                                More</a>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </div>
    </div><!--container-->
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', ['meta_title' => $meta_title ?? '', 'meta_keywords' => $meta_keywords ?? '', 'meta_description' => $meta_description ?? ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/demo82_color_usr/data/www/demo82.colormoon.in/rockdale/resources/views/frontend/room.blade.php ENDPATH**/ ?>