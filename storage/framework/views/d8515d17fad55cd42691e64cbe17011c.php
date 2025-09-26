<?php $__env->startSection('content'); ?>
    <!-- Sub banner start -->
    <div class="sub-banner"
        style="background : url('<?php echo e(asset('admin/siteImage/' . $sitesettings->ourblogs_breadcome_image)); ?>'); background-size :cover; background-position:center">
        <div class="container">
            <div class="breadcrumb-area">
                <!--<h3><?php echo e($blog->title); ?></h3>-->
            </div>
            <nav class="breadcrumbs">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('frontend.home')); ?>">Home</a></li>
                    <li class="breadcrumb-item active"><?php echo e($blog->title); ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Blog body start -->
    <div class="blog-body content-area-15 wow fadeInUp delay-04s">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="blog-1 blog-big mb-50">
                        <div class="heading-rooms  clearfix">
                            <div class="pull-left">
                                <h3><?php echo e($blog->title); ?></h3>
                    
                            </div>
                            <div class="view-full">
                                <button type="button" id="full-view">
                                    View In Full Screen
                                </button>
                            </div>
                        </div>
                        <div class="rooms-detail-sliders">
                            <!-- Main Slider -->
                            <!-- Main Slider with Popup Images -->
                            <!-- Main Slider (Large images) -->
                            <div class="main-slider">
                                <?php $__currentLoopData = json_decode($blog->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="property-inners">
                                        <a href="<?php echo e(asset('admin/blogImage/' . $image->path)); ?>" class="popup-image">
                                            <img src="<?php echo e(asset('admin/blogImage/' . $image->path)); ?>" class="w-100 img-fluid"
                                                alt="photo">
                                        </a>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>

                            <!-- Thumbnail Slider (Thumbnails) -->
                            <div class="thumbnail-slider">
                                <?php $__currentLoopData = json_decode($blog->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div>
                                        
                                        <img src="<?php echo e(asset('admin/blogImage/' . $image->path)); ?>" class="w-100 img-fluid"
                                            alt="photo">
                                        
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                        </div>
                        <div class="detail">

                            <h3>
                                <?php echo e($blog->title); ?>

                            </h3>
                            <p><?php echo $blog->description; ?>

                            </p>
                        </div>
                    </div>


                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="sidebar">

                        <!-- Recent News start -->
                        <div class="sidebar-widget recent-news">
                            <div class="main-title-2">
                                <h1>Recent Posts</h1>
                            </div>
                            <?php $__currentLoopData = $latest ->where('id', '!=', $currentblog->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="recent-news-item mb-3">
                                    <div class="thumb">

                                        <?php
                                            $images = json_decode($data->images, true); // Decode as associative array
                                        ?>
                                        <?php if(is_array($images) && !empty($images) && isset($images[0])): ?>
                                            <a href="<?php echo e(route('frontend.blog-details', $data->slug)); ?>">
                                                <img src="<?php echo e(asset('admin/blogImage/' . $images[0]['path'])); ?>"
                                                    alt="small-img">
                                            </a>
                                        <?php else: ?>
                                            <p>No image available</p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="content">
                                        <h3 class="media-heading">
                                            <a
                                                href="<?php echo e(route('frontend.blog-details', $data->slug)); ?>"><?php echo e($data->title); ?></a>
                                        </h3>
                                        <div class="listing-post-meta">
                                            <p><?php echo e($data->short_description); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="enquiry-now sidebar-widget recent-news d-none">
                            <div class="main-title-2">
                                <h1>Enquiry Now</h1>
                            </div>
                            <div class="enqiry-form">
                                <form>

                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="Enter Name">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="Enter Contact">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="Enter Mail">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="Enter Subject">
                                    </div>
                                    <div class="mb-3">
                                        <textarea class="form-control" placeholder="Enter Message" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-default submit-btn">Submit</button>
                                </form>
                            </div><!--enquiry-fomr-->
                        </div>
                        <!--enquiry-now-->

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="fullScreenModal" tabindex="-1" aria-labelledby="fullScreenModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fullScreenModalLabel"><?php echo e($blog->title); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Bootstrap Carousel -->
                    <div id="carouselGallery" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            

                        <?php $__currentLoopData = json_decode($blog->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="carousel-item <?php echo e($index == 0 ? 'active' : ''); ?>">
                                    <img src="<?php echo e(asset('admin/blogImage/' . $image->path)); ?>"
                                        class="d-block w-100 img-fluid" alt="photo">
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselGallery"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselGallery"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', ['meta_title' => $meta_title ?? '', 'meta_keywords' => $meta_keywords ?? '', 'meta_description' => $meta_description ?? ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/demo82_color_usr/data/www/demo82.colormoon.in/rockdale/resources/views/frontend/blog-details.blade.php ENDPATH**/ ?>