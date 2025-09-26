<?php $__env->startSection('content'); ?>
<style>
    /* Slider Container */
    .slick-gallery {
        position: relative;
        overflow: hidden;
        border-radius: 15px;
        box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.15);
    }

    /* Slider Item */
    .slick-slide-item img {
        object-fit: cover;
        max-height: 450px;
        border-radius: 12px;
        transition: transform 0.3s ease-in-out;
    }

    .slick-slide-item:hover img {
        transform: scale(1.05);
    }

    /* Navigation Buttons */
    .slider-nav {
        position: absolute;
        top: 50%;
        width: 100%;
        z-index: 20;
        display: flex;
        justify-content: space-between;
        transform: translateY(-50%);
    }

    .slick-prev,
    .slick-next {
        background-color: rgba(0, 0, 0, 0.6);
        border: none;
        color: white;
        padding: 12px;
        font-size: 20px;
        border-radius: 50%;
        transition: background-color 0.3s ease;
    }

    .slick-prev:hover,
    .slick-next:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    /* Dots Styling */
    .slick-dots {
        bottom: 15px;
    }

    .slick-dots li button:before {
        font-size: 12px;
        color: #ddd;
    }

    .slick-dots li.slick-active button:before {
        color: #fff;
    }

    .slider-nav {
        display: flex;
        justify-content: space-between;
        margin-top: 15px;
    }

    .slick-prev,
    .slick-next {
        background-color: #333;
        color: #fff;
        border: none;
        padding: 10px 15px;
        border-radius: 50%;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .slick-prev:hover,
    .slick-next:hover {
        background-color: #555;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .slick-slide-item img {
            max-height: 250px;
        }
    }

    .carousel-item img {
        width: 100%;
        height: 500px;
        object-fit: contain;
        background-color: #000;
        /* Optional: Background color if images don't fill space */
    }
</style>



<!-- Sub banner start -->
<div class="sub-banner"
     style="background : url('<?php echo e(asset('admin/siteImage/' .$sitesettings->roomdeatis_breadcome_imahe)); ?>'); background-size :cover; background-position:center">
    <div class="container">
        <div class="breadcrumb-area">
            <h3><?php echo e($room->name); ?>

            </h3>
        </div>
        <nav class="breadcrumbs">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('frontend.home')); ?>">Home</a></li>
                <li class="breadcrumb-item active"><?php echo e($room->name); ?>

                </li>
            </ol>
        </nav>
    </div>
</div>
<!-- Sub Banner end -->



<!-- Rooms detail section start -->
<div class="content-area-15 rooms-detail-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-xs-12">
                <div class="rooms-detail-info">
                    <!-- Heading courses start -->
                    <div class="heading-rooms  clearfix">
                        <div class="pull-left">
                            <h3><?php echo e($room->name); ?></h3>
                            <!--                       <p>
                                                                                                                    <i class="fa fa-map-marker"></i><?php echo e($room->title); ?>

                                                                                                                </p>-->
                        </div>
                        <div class="view-full">
                            
                            <button type="button" id="full-view">
                                View In Full Screen
                            </button>
                        </div>
                    </div>
                    <!-- Heading courses end -->

                    <!-- sidebar start -->
                    <div class="rooms-detail-slider">
                        <!--  Rooms detail slider start -->
                        <div class="rooms-detail-sliders mb-40">
                            <!-- Main Slider -->
                            <!-- Main Slider with Popup Images -->
                            <!-- Main Slider (Large images) -->
                            <div class="main-slider">

                                <?php $__currentLoopData = json_decode($room->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div>
                                    <a href="<?php echo e(asset('admin/roomImages/' . $image->path)); ?>" class="popup-image">
                                        <img src="<?php echo e(asset('admin/roomImages/' . $image->path)); ?>"
                                             class="w-100 img-fluid" alt="photo">
                                    </a>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                            <!-- Thumbnail Slider (Thumbnails) -->
                            <div class="thumbnail-slider">
                                <?php $__currentLoopData = json_decode($room->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div><img src="<?php echo e(asset('admin/roomImages/' . $image->path)); ?>"
                                          class="w-100 img-fluid" alt="thumbnail"></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>


                        </div>


                        <!-- Rooms detail slider end -->
                        <!-- Rooms description start -->
                        <div class="tabbing tabbing-box rooms-description">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                            data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                            aria-selected="true">Description</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                                            aria-selected="false">Amenities</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                            data-bs-target="#contact" type="button" role="tab" aria-controls="contact"
                                            aria-selected="false">House Rules</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contact-tab-6" data-bs-toggle="tab"
                                            data-bs-target="#contact-6" type="button" role="tab"
                                            aria-controls="contact-6" aria-selected="false">Cancellation</button>
                                </li>

                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active mb-50" id="home" role="tabpanel"
                                     aria-labelledby="home-tab">
                                    <div class="accordion accordion-flush" id="accordionFlushExample7">
                                        <div class="accordion-item">
                                            <div class="rooms-description mb-50">
                                                <!-- Title -->
                                                <h3><?php echo e($room->room_description_heading); ?></h3>
                                                <!-- paragraph -->
                                                <p><?php echo $room->room_description; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade mb-30" id="profile" role="tabpanel"
                                     aria-labelledby="profile-tab">
                                    <div class="accordion accordion-flush" id="accordionFlushExample2">
                                        <div class="accordion-item">
                                            <!-- Amenities start -->
                                            <div class="amenities">
                                                <h3>Amenities</h3>
                                                <?php
                                                    $amenities = json_decode($room->amenites_id);
                                                    $amenities = App\Models\Amenitie::whereIn('id', $amenities)->get();
                                                    $chunkedAmenities = $amenities->chunk(3);
                                                ?>
                                                <div class="row">
                                                    <?php $__currentLoopData = $chunkedAmenities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="row mb-3">
                                                            <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amenity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="col-md-4 col-sm-3 col-xs-12">
                                                                    <ul class="condition">
                                                                        <li>
                                                                            <img src="<?php echo e(asset('admin/amenityImage/' . $amenity->icon)); ?>" alt="<?php echo e($amenity->name); ?>">
                                                                            <?php echo e($amenity->name); ?>

                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                            
                                            <!-- Amenities end -->
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade mb-50" id="contact" role="tabpanel"
                                     aria-labelledby="contact-tab">
                                    <div class="accordion accordion-flush" id="accordionFlushExample3">
                                        <div class="accordion-item">
                                            <!-- House reles start -->
                                            <div class="house-rules">
                                                <h3>House Rules</h3>
                                                <!-- <?php echo $room->house_rule; ?> -->
                                                <div class="house-points">
                                                    <?php echo $room->house_rule; ?>

                                                </div>
                                            </div>
                                            <!-- House reles end -->
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade mb-50" id="contact-6" role="tabpanel"
                                     aria-labelledby="contact-tab-6">
                                    <div class="accordion accordion-flush" id="accordionFlushExample6">
                                        <div class="accordion-item">
                                            <!-- Cancellation start  -->
                                            <div class="cancellation">
                                                <h3>Cancellation</h3>
                                                <p>
                                                    <?php echo $room->cancellation_rule; ?>

                                                </p>
                                            </div>
                                            <!-- Cancellation end -->
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Rooms description end -->
                    </div>
                    <!-- sidebar end -->

                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-xs-12">
                <div class="sidebar">

                    <!-- Recent News start -->
                    <div class="sidebar-widget recent-news">
                        <div class="main-title-2">
                            <h1>Related Room</h1>
                        </div>
                        
                                                            <?php $__currentLoopData = $latest->where('id', '!=', $currentRoom->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="recent-news-item mb-3">
                                                                <div class="thumb">
                                                                    <?php
                                                                    $images = json_decode($data->images, true);
                                                                    ?>
                                                                    <?php if(is_array($images) && !empty($images) && isset($images[0])): ?>
                                                                    <a href="<?php echo e(route('frontend.room-details', $data->slug)); ?>">
                                                                        <img src="<?php echo e(asset('admin/roomImages/' . $images[0]['path'])); ?>"
                                                                             alt="small-img">
                                                                    </a>
                                                                    <?php else: ?>
                                                                    <p>No image available</p>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <div class="content">
                                                                    <h3 class="media-heading">
                                                                        <a href="<?php echo e(route('frontend.room-details', $data->slug)); ?>"><?php echo e($data->name); ?></a>
                                                                    </h3>
                                                                    <div class="listing-post-meta">
                                                                        <p><?php echo e($data->short_description); ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                                    </div>
                                                    <!-- Category posts start -->
                                                    <div class="enquiry-now sidebar-widget recent-news">
                                                        <div class="main-title-2">
                                                            <h1>Enquire Now</h1>
                                                        </div>
                                                        <div class="enquiry-form">
                                                            <form action="<?php echo e(route('contact.store')); ?>" method="POST">
                                                                <?php if($message = Session::get('success')): ?>
                                                                <div class="alert bg-success text-white">
                                                                    <span class="closebtn"
                                                                          onclick="this.parentElement.style.display = 'none';">&times;</span>
                                                                    <span class="font-weight-bold h5"><?php echo e($message); ?></span>
                                                                </div>
                                                                <?php endif; ?>
                                                                <?php echo csrf_field(); ?>

                                                                <div class="mb-3">
                                                                    <label for="name" class="form-label">Name</label>
                                                                    <input type="text" name="name" id="name" class="form-control"
                                                                           placeholder="Enter Name" value="<?php echo e(old('name')); ?>" required>
                                                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div class="text-danger"><?php echo e($message); ?></div>
                                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="phone" class="form-label">Phone Number</label>
                                                                    <input type="text" name="phone" id="phone" class="form-control"
                                                                           placeholder="Enter Number" value="<?php echo e(old('phone')); ?>" required>
                                                                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div class="text-danger"><?php echo e($message); ?></div>
                                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="email" class="form-label">Email</label>
                                                                    <input type="email" name="email" id="email" class="form-control"
                                                                           placeholder="Enter Email" value="<?php echo e(old('email')); ?>" required>
                                                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div class="text-danger"><?php echo e($message); ?></div>
                                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="check_in" class="form-label">Check In</label>
                                                                    <input type="text" name="check_in" placeholder="Check In" id="check_in"
                                                                           class="btn-default datepicker" value="<?php echo e(old('check_in')); ?>" required>
                                                                    <?php $__errorArgs = ['check_in'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div class="text-danger"><?php echo e($message); ?></div>
                                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="check_out" class="form-label">Check Out</label>
                                                                    <input type="text" name="check_out" placeholder="Check Out" id="check_out"
                                                                           class="btn-default datepicker" min="<?php echo e(date('Y-m-d')); ?>"
                                                                           value="<?php echo e(old('check_out')); ?>" required>
                                                                    <?php $__errorArgs = ['check_out'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div class="text-danger"><?php echo e($message); ?></div>
                                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="message" class="form-label">Comments</label>
                                                                    <textarea name="message" id="message" class="form-control" placeholder="Comments" rows="2" required><?php echo e(old('message')); ?></textarea>
                                                                    <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div class="text-danger"><?php echo e($message); ?></div>
                                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                </div>

                                                                <button type="submit" class="btn btn-default submit-btn">Submit</button>
                                                            </form>
                                                        </div>

                                                        <!--enquiry-fomr-->
                                                    </div>

                                                </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        




                        <div class="modal fade" id="fullScreenModal" tabindex="-1" aria-labelledby="fullScreenModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="fullScreenModalLabel"><?php echo e($room->name); ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Bootstrap Carousel -->
                                        <div id="carouselGallery" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <?php $__currentLoopData = json_decode($room->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="carousel-item <?php echo e($index == 0 ? 'active' : ''); ?>">
                                                    <img src="<?php echo e(asset('admin/roomImages/' . $image->path)); ?>"
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



                        <!-- Rooms detail section end -->
                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                var checkInInput = $('#check_in');
                                var checkOutInput = $('#check_out');
                                var today = new Date();

                                // Initialize datepickers with minimum date as today
                                checkInInput.datepicker({
                                    autoclose: true,
                                    format: 'yyyy-mm-dd',
                                    startDate: today // Set minimum date to today
                                });

                                checkOutInput.datepicker({
                                    autoclose: true,
                                    format: 'yyyy-mm-dd',
                                    startDate: today // Set minimum date to today
                                });

                                // Update checkout date based on check-in date
                                checkInInput.on('change', function () {
                                    var checkInDate = checkInInput.datepicker('getDate');
                                    if (checkInDate) {
                                        checkOutInput.datepicker('setStartDate', checkInDate);
                                        checkOutInput.val('');
                                    }
                                });

                                // Validate checkout date
                                checkOutInput.on('change', function () {
                                    var checkInDate = checkInInput.datepicker('getDate');
                                    var checkOutDate = checkOutInput.datepicker('getDate');
                                    if (checkInDate && checkOutDate && checkOutDate < checkInDate) {
                                        alert('Check-out date cannot be earlier than check-in date.');
                                        checkOutInput.val('');
                                    }
                                });
                            });
                        </script>

                        
    
                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                let today = new Date().toISOString().split('T')[0];
                                let checkInInput = document.getElementById('check_in');
                                checkInInput.setAttribute('min', today);
                            });
                            </script>
                            <?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', ['meta_title' => $meta_title ?? '', 'meta_keywords' => $meta_keywords ?? '', 'meta_description' => $meta_description ?? ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/demo82_color_usr/data/www/demo82.colormoon.in/rockdale/resources/views/frontend/room-details.blade.php ENDPATH**/ ?>