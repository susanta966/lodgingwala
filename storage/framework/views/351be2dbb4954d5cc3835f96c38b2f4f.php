<?php $__env->startSection('content'); ?>
    <!-- <style>
                .services-box-div {
                    transition: transform 0.9s cubic-bezier(0.24, 0.74, 0.58, 1), border-radius 0.3s ease-in-out;
                    display: inline-block;
                    /* Ensures it behaves properly */
                }

                .services-box-div:hover {
                    border-radius: 100%;
                    transform: rotateY(360deg);
                }

                @media (max-width: 768px) {
                    .about-box-Experience {
                        display: block !important;
                    }
                }

                .carousel-item img {
                    object-fit: cover;
                    width: 100%;
                    height: 300px;
                    /* Adjust height as needed */
                }

                @media (max-width: 768px) {
                    .carousel-item img {
                        height: 200px;
                        /* Smaller height for mobile */
                    }
                }

                .banner-test-info h2 {
                    font-weight: bold;
                    font-size: 2rem;
                    color: #fff;
                    /* Adjust color if needed */
                }

                @media (max-width: 768px) {
                    .banner-test-info h2 {
                        font-size: 1.5rem;
                    }
                }
            </style> -->
<?php if($home->popup === 1): ?>
<div class="modal fade" id="autoMessageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container">
                    <div class="row d-flex justify-content-between align-items-center"
                         style="border-bottom:1px solid #efefef; padding-bottom:10px;">
                        <div class="col-lg-12">
                            <div class="modal-logo text-center">
                                <img src="<?php echo e(asset('admin/homeImage/' . $home->modal_image)); ?>" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="close-model text-end">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="model-hrd">
                            <h4 style="text-align: center;"><?php echo e($home->modal_heading); ?>

                                <span><?php echo e($home->modal_heading_word); ?></span> <?php echo e($home->modal_heading_word_2); ?>

                            </h4>
                            <p><?php echo $home->modal_description; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<!-- Banner start -->
<div class="banner d-none d-lg-block d-md-block" id="banner-2">
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner he-slide">
            <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="carousel-item <?php echo e($index === 0 ? 'active' : ''); ?>">
                <img class="d-block" style="object-fit: cover;"
                     src="<?php echo e(asset('admin/sliderImage/' . $data->image)); ?>" alt="banner">

                
                <div class="carousel-caption banner-slider-inner d-flex h-100">
                    <div class="carousel-content container align-self-center">
                        <div class="row bti-section justify-content-center">
                            <div class="col-lg-7 col-md-12 align-self-center">
                                <div class="banner-test-info wow fadeInLeft delay-04s text-center">
                                    <h2><?php echo e($data->heading); ?></h2>
                                    <p><?php echo e($data->title); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<!-- Banner end -->

        <div class="banner d-lg-none d-md-none" id="banner-2mobile">
            <?php if($mobilesliders->count() > 0): ?>
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <?php $__currentLoopData = $mobilesliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $mobile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button type="button" data-bs-target="#carouselExampleFade" 
                            data-bs-slide-to="<?php echo e($index); ?>" 
                            class="<?php echo e($index == 0 ? 'active' : ''); ?>" 
                            aria-current="<?php echo e($index == 0 ? 'true' : 'false'); ?>" 
                            aria-label="Slide <?php echo e($index + 1); ?>"></button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="carousel-inner he-slide">
                    <?php $__currentLoopData = $mobilesliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $mobile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="carousel-item <?php echo e($index == 0 ? 'active' : ''); ?>">
                        <img class="d-block" style="object-fit: cover;"
                             src="<?php echo e(asset('admin/mobilesilder/'.$mobile->image)); ?>" alt="banner">
                        <div class="carousel-caption banner-slider-inner d-flex h-100">
                            <div class="carousel-content container align-self-center">
                                <div class="row bti-section justify-content-center">
                                    <div class="col-lg-7 col-md-12 align-self-center">
                                        <div class="banner-test-info wow fadeInLeft delay-04s text-center">
                                            <h2><?php echo e($mobile->heading); ?></h2>
                                            <p><?php echo e($mobile->title); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php endif; ?>
        </div>

        <!-- About hotel alpha start -->
        <div class="about-hotel-alpha content-area-6">
            <div class="container">
                <div class="shape-img-div">
                    <img class="shape-img-2" src="<?php echo e(asset('frontend/img/shape-img-2-1.png')); ?>" alt="">
                </div>
                <!--shape-img-div-->
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="about-img-section">
                            <div class="image-box">
                                <div class="image"><img src="<?php echo e(asset('admin/aboutImages/' . $about->image)); ?>"
                                                        class="rounded" alt="photo"></div>

                            </div>
                            <div class="col-12 col-md-6">
                                <div class="about-box-Experience">
                                    <h3 class="text-white"><?php echo e($about->year_of_exprience); ?></h3>
                                    <p class="mb-0 text-white"><?php echo e($about->year_of_exprience_title); ?></p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 ">
                        <div class="about-content-section">
                            <h5><?php echo e($about->title); ?></h5>
                            <h2><?php echo e($about->heading); ?> <span><?php echo e($about->one_word); ?></span></h2>
                            <p><?php echo $about->description; ?> </p>
                            <a class="btn-lg btn-5" href="<?php echo e(route('frontend.about')); ?>"><span>Explore More</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About hotel alpha start -->

        <!-- Hotel section start -->
        <div class="content-area hotel-section bg-grey"
             style="background: linear-gradient(rgba(0, 0,0,0.9),rgb(0, 0,0,0.9)),url('<?php echo e(asset('frontend/img/bg-img-2.png')); ?>'); background-position: center; background-size: cover;">
            <div class="overlay">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <!-- Main title -->
                            <div class="main-title">
                                <h2 class="text-white">
                                    <?php echo e($home->best_room_one_word); ?><span> <?php echo e($home->best_room_heading); ?></span></h2>
                                <p><?php echo e($home->best_room_title); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php $__currentLoopData = $bestroom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="hotel-box" data-aos="fade-up" data-aos-duration="1500">
                                <!-- Photo thumbnail -->
                                <div class="photo-thumbnail">
                                    <div class="photo">
                                        <?php
                                        $images = json_decode($data->images, true); // Decode as associative array
                                        ?>
                                        <?php if(is_array($images) && !empty($images) && isset($images[0])): ?>
                                        <img src="<?php echo e(asset('admin/roomImages/' . $images[0]['path'])); ?>"
                                             alt="photo" class="img-fluid w-100">
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
                                        <a
                                            href="<?php echo e(route('frontend.room-details', $data->slug)); ?>"><?php echo e($data->name); ?></a>
                                    </h3>
                                    <span class="location">
                                           <span class="location">
    <?php if(isset($data->area) && $data->area !== ''): ?>
        <a href="<?php echo e(route('frontend.room-details', $data->slug)); ?>">
            <i class="flaticon-bed"></i> <?php echo e($data->area); ?>

        </a>
    <?php endif; ?>
                                        </span>
                                        <p><?php echo e($data->short_description); ?></p>
                                        <a class="btn btn-default"
                                           href="<?php echo e(route('frontend.room-details', $data->slug)); ?>">Read More</a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- Hotel section end -->

        <!-- Hotel secion start -->
        <div class="hotel-section content-area comon-slick" id="bankid">
            <div class="container">
                <!-- Main title -->
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <!-- Main title -->
                        <div class="main-title">
                            <h2><?php echo e($home->banquet_one_word); ?><span> <?php echo e($home->banquet_heading); ?></span></h2>
                            <p><?php echo e($home->banquet_title); ?></p>
                        </div>
                    </div>
                </div>
                <div class="slick row comon-slick-inner csi2 wow fadeInUp delay-04s"
                     data-slick='{
                     "slidesToShow": 3,
                     "autoplay": true,
                     "dots": true,
                     "autoplaySpeed": 3000,
                     "responsive": [
                     {"breakpoint": 1024, "settings": {"slidesToShow": 2, "dots": true}}, 
                     {"breakpoint": 768, "settings": {"slidesToShow": 1, "arrows": false, "dots": true}}
                     ]
                     }'>
                    <?php $__currentLoopData = $banquet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item slide-box">
                        <div class="hotel-box-3">
                            <div class="hotel-inner">
                                <div class="property-inner custom-propery-div">
                                    <a href="<?php echo e(route('frontend.banquet-details', $data->slug)); ?>">
                                        <img class="img-fluid w-100"
                                             src="<?php echo e(asset('admin/banquetImages/' . $data->image)); ?>" alt="photo">
                                        <div class="ling-section">
                                            <h3><?php echo e($data->name); ?></h3>
                                            <div class="banquets-icons">
                                                <ul class="facilities-list clearfix">
                                                    <li>
                                                        <img src="<?php echo e(asset('frontend/img/group.png')); ?>" alt="icon">
                                                        
                                                        <?php echo e($data->person); ?>

                                                    </li>
                                                    <?php $__currentLoopData = json_decode($data->amenities_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                    $amenity = App\Models\Amenitie::find($id);
                                                    ?>
                                                    <?php if($amenity && $amenity->icon): ?>
                                                    <li>
                                                        <img src="<?php echo e(asset('admin/amenityImage/' . $amenity->icon)); ?>"
                                                             alt="<?php echo e($amenity->name); ?> icon">
                                                        <?php echo e($amenity->name); ?>

                                                    </li>
                                                    <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <!-- Hotel secion end -->
  <style>.serviehome .services-box-2.active .fac-icon { 
    transform: rotateY(360deg);
    transition: transform 0.5s ease;
}
</style>
        <!-- Our facilties section start -->
        <div class="our-facilties-section content-area-5">
            <div class="overlay">
                <div class="container">
                    <!-- Main title -->
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="main-title" data-aos="fade-up" data-aos-duration="1500">
                                <h2><?php echo e($home->faciltie_one_word); ?> <span><?php echo e($home->faciltie_heading); ?></span></h2>
                                <p><?php echo e($home->faciltie_title); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div >
                            
                                 <?php if(($index + 1) % 3 == 0): ?>
                                    </div><div class="row">
                                <?php endif; ?> 
                             
                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                                <?php $__currentLoopData = $facility; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col">
                                        <div class="services-box-2 d-flex aos-init servicehome"
                                             data-aos="fade-up"
                                             data-aos-duration="1500"
                                             data-aos-delay="<?php echo e($index * 100); ?>"
                                             data-aos-anchor-placement="top-bottom"
                                             data-aos-once="true">
                                            <div class="fac-icon services-box-div">
                                                <img src="<?php echo e(asset('admin/facilityImages/' . $data->icon)); ?>" alt="<?php echo e($data->name); ?>">
                                            </div>
                                            <div class="contant">
                                                <h3><a href="javascript:void(0)"><?php echo e($data->name); ?></a></h3>
                                                <p><?php echo e($data->short_description); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            
                        

                        </div>
                        


                    </div>
                </div>
            </div>
        </div>
        <!--  <div class="our-facilties-section content-area-5">
                                                              <div class="overlay">
                                                                  <div class="container">
                                                                       Main title
                                                                      <div class="row justify-content-center">
                                                                          <div class="col-md-8">
                                                                              <div class="main-title" data-aos="fade-up" data-aos-duration="1500">
                                                                                  <h2><?php echo e($home->faciltie_one_word); ?> <span><?php echo e($home->faciltie_heading); ?></span></h2>
                                                                                  <p><?php echo e($home->faciltie_title); ?></p>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                      <div class="row">
                                                                        <?php $__currentLoopData = $facility; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-4 col-md-6 col-sm-12">
                                                                              <div class="services-box-2 d-flex" data-aos="fade-up" data-aos-duration="1500">
                                                                                  <div class="icon">
                                                                                      <i class="<?php echo e($data->icon); ?>"></i>
                                                                                  </div>
                                                                                  <div class="contant">
                                                                                      <h3><a href="javascript:void(0)"><?php echo e($data->name); ?></a></h3>
                                                                                      <p><?php echo e($data->short_description); ?></p>
    
                                                                                  </div>
                                                                              </div>
                                                                          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    
    
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>-->
        <!-- Our facilties section end -->

        <style>
            .rannklyWidget.rannklyWidgetMain {
                margin: 0 auto;
                max-width: -moz-fit-content;
                max-width: fit-content;
                max-width: 100% !important;
                position: relative;
                z-index: 1;
            }
        </style>
        <!-- Testimonial 2 start -->
        <div class="testimonial-4 comon-slick">
            <div class="container">
                <div class="row justify-content-center">
                    <!-- Main title -->
                    <div class="main-title mb-3 text-center" data-aos="fade-up" data-aos-duration="1500">
                        <h2><?php echo e($home->testimonial_one_word); ?> <span><?php echo e($home->testimonial_heading); ?></span></h2>
                        <p><?php echo e($home->testimonial_title); ?></p>
                    </div>
                    <div class="col-lg-12" data-aos="fade-up" data-aos-duration="1500">
                        <?php echo $testimonial->link; ?>

                        <!-- Slick slider area start -->
                        <!--  <div class="slick row comon-slick-inner d-none"data-slick='{"slidesToShow": 2, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 1}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                                                                            <div class="item slide-box">
                                                                                <div class="testimonial-item-new">
                                                                                    <div class="author-img fix">
                                                                                        <div class="author-avatar">
                                                                                            <img src="img/avatar-1.jpg" alt="testimonial-2">
                                                                                            <div class="icon">
                                                                                                <i class="fa fa-quote-right"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="author-content">
                                                                                        <h5 class="left-line pl-40">Amir Silva, <span class="desig">Designer</span></h5>
    
                                                                                    </div>
                                                                                    <p>But I must explain to you how all this mistake denouncing pleasure and praising pain was
                                                                                        born and I will give you a complete account of the system, and expound the actual </p>
    
                                                                                </div>
                                                                            </div>
                                                                            <div class="item slide-box">
                                                                                <div class="testimonial-item-new">
                                                                                    <div class="author-img fix">
                                                                                        <div class="author-avatar">
                                                                                            <img src="img/avatar-2.jpg" alt="testimonial-2">
                                                                                            <div class="icon">
                                                                                                <i class="fa fa-quote-right"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="author-content">
                                                                                        <h5 class="left-line pl-40">Navan Roy, <span class="desig">Manager</span></h5>
                                                                                    </div>
                                                                                    <p>But I must explain to you how all this mistake denouncing pleasure and praising pain was
                                                                                        born and I will give you a complete account of the system, and expound the actual </p>
    
                                                                                </div>
                                                                            </div>
                                                                            <div class="item slide-box">
                                                                                <div class="testimonial-item-new">
                                                                                    <div class="author-img fix">
                                                                                        <div class="author-avatar">
                                                                                            <img src="img/avatar-3.jpg" alt="testimonial-2">
                                                                                            <div class="icon">
                                                                                                <i class="fa fa-quote-right"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="author-content">
                                                                                        <h5 class="left-line pl-40">Roky Nel, <span class="desig">Consultant</span></h5>
                                                                                    </div>
                                                                                    <p>But I must explain to you how all this mistake denouncing pleasure and praising pain was
                                                                                        born and I will give you a complete account of the system, and expound the actual </p>
    
                                                                                </div>
                                                                            </div>
                                                                    </div>-->
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial 2 end -->


        <section class="booking-area style-two pb-5">
            <div class="container">
                <div class="bg-img">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <!-- Main title -->
                            <div class="main-title" data-aos="fade-up" data-aos-duration="1500">
                                <h2><?php echo e($home->location_one_word); ?> <span><?php echo e($home->location_heading); ?></span></h2>
                                <p><?php echo e($home->location_title); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-lg-7 col-md-12">
                            <div class="google-map">
                                <a target="_blank" href="<?php echo e($sitesetting->site_location); ?>">
                                    <img width="100%" src="<?php echo e(asset('frontend/img/google-img.jpg')); ?>" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12">
                            <div class="single-booking-box">
                                <ul>
                                    <?php $__currentLoopData = $location; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <div class="d-flex align-items-center">
                                            <img src="<?php echo e(asset('admin/locationImage/' . $data->image)); ?>" alt="">
                                            <p class=" ms-3 mb-0"><?php echo e($data->name); ?></p>
                                        </div>
                                        <p class="acc_style04"><?php echo e($data->distance); ?> &nbsp; |
                                            &nbsp;<?php echo e($data->time); ?>

                                        </p>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--row-->
                </div>
                <!--bg-img-->
            </div>
        </section>

        <style>
            .rannklyWidget.rannklyWidgetMain {
                z-index: 99990 !important;
            }
        </style>
        <!-- Blog section start -->
        <div class="blog-section content-area comon-slick">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <!-- Main title -->
                        <div class="main-title">
                            <h2><?php echo e($home->blog_one_word); ?> <span> <?php echo e($home->blog_heading); ?></span></h2>
                            <p><?php echo e($home->blog_title); ?></p>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel blog-custom-carousel row wow fadeInUp delay-04s">
                    <?php $__currentLoopData = $blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item slide-box" data-aos="fade-up" data-aos-duration="1500">
                        <div class="blog-1">
                            <div class="blog-image">
                                <?php
                                $images = json_decode($data->images, true); // Decode as associative array
                                ?>
                                <?php if(is_array($images) && !empty($images) && isset($images[0])): ?>
                                <img src="<?php echo e(asset('admin/blogImage/' . $images[0]['path'])); ?>" alt="image"
                                     class="img-fluid w-100">
                                <?php else: ?>
                                <p>No image available</p>
                                <?php endif; ?>
                                <div class="profile-user">
                                    <img src="<?php echo e(asset('admin/blogImage/' . $data->author_image)); ?>" alt="user">
                                </div>
                                <div class="date-box">
                                    <span><?php echo e(\Carbon\Carbon::parse($data->publish_date)->format('d')); ?></span><?php echo e(\Carbon\Carbon::parse($data->publish_date)->format('M ')); ?>

                                </div>
                            </div>
                            <div class="detail">
                                <div class="post-meta clearfix">
                                    <ul>
                                        <li>
                                            <strong><a href="<?php echo e(route('frontend.blog-details', $data->slug)); ?>">By:
                                                    <?php echo e($data->author); ?></a></strong>
                                        </li>
                                        <li class="float-right mr-0"><a
                                                href="<?php echo e(route('frontend.blog-details', $data->slug)); ?>"><i
                                                    class="fa fa-calendar"></i></a><?php echo e(\Carbon\Carbon::parse($data->publish_date)->format('d M Y')); ?>

                                        </li>

                                    </ul>
                                </div>
                                <h3>
                                    <a href="<?php echo e(route('frontend.blog-details', $data->slug)); ?>"><?php echo e($data->title); ?></a>
                                </h3>
                                <p><?php echo e($data->short_description); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </div>
        <!-- Blog section end -->
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', ['meta_title' => $meta_title ?? '', 'meta_keywords' => $meta_keywords ?? '', 'meta_description' => $meta_description ?? ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/demo82_color_usr/data/www/demo82.colormoon.in/rockdale/resources/views/frontend/index.blade.php ENDPATH**/ ?>