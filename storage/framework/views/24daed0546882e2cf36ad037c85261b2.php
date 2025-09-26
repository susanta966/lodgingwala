<?php $__env->startSection('content'); ?>
<!-- Sub banner start -->
<div class="sub-banner" style="background : url('<?php echo e(asset('admin/siteImage/'.$sitesetting->contact_breadcome_image)); ?>'); background-size :cover; background-position:center">
    <div class="container">
        <div class="breadcrumb-area">
            <h3>Contact Us</h3>
        </div>
        <nav class="breadcrumbs">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('frontend.home')); ?>">Home</a></li>
                <li class="breadcrumb-item active">Contact Us</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Sub Banner end -->

<!-- Contact 1 start -->
<div class="contact-1 content-area-6">
    <div class="container">
        <div class="main-title">
            <h1>Contact Us</h1>
            <!-- <p><?php echo e($sitesetting->contact_title); ?></p> -->
        </div>
        <div class="row">
            <div class="col-lg-7 col-md-12 col-sm-12">
                <!-- Contact form start -->
                <div class="contact-form">
                    <form action="<?php echo e(route('contact.store')); ?>" method="POST" enctype="multipart/form-data">
                          <?php if($message = Session::get('success')): ?>
                    <div class="alert bg-success text-white">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        <span class="font-weight-bold h5"><?php echo e($message); ?></span>
                    </div>
                <?php endif; ?>
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control" value="<?php echo e(old('name')); ?>" id="floating-full-name" name="name" placeholder="Full Name" required>
                                    <label for="floating-full-name">Full Name</label>
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
                            </div>
                            
                            <div class="col-lg-6 col-md-6">
                                <div class="form-floating mb-4">
                                    <input type="email" class="form-control" id="floating-email-address" value="<?php echo e(old('email')); ?>" name="email" placeholder="Email Address" required>
                                    <label for="floating-email-address">Email address</label>
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
                            </div>
                            
                            <div class="col-lg-6 col-md-6">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control" id="floating-subject"  value="<?php echo e(old('subject')); ?>" name="subject" placeholder="Subject" required>
                                    <label for="floating-subject">Subject</label>
                                    <?php $__errorArgs = ['subject'];
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
                            </div>
                            
                            <div class="col-lg-6 col-md-6">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control" id="floating-phone-Number" value="<?php echo e(old('phone')); ?>" name="phone" placeholder="Phone Number" required>
                                    <label for="floating-phone-Number">Phone Number</label>
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
                            </div>
                            
                            <div class="col-lg-12 col-md-12">
                                <div class="form-floating mb-4">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="message" style="height: 60px" required><?php echo e(old('message')); ?></textarea>
                                    <label for="floatingTextarea2">Comments</label>
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
                            </div>
                            
                            <div class="col-lg-12 col-md-12">
                                <div class="send-btn text-center">
                                    <button type="submit" class="btn-md btn-theme btn-4 btn-7">Send Message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                </div>
                <!-- Contact form end -->
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12">
                <!-- Contact details start -->
                <div class="contact-details">
                    <div class="contact-item d-flex mb-3">
                        <div class="icon">
                        <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div class="contant add-left">
                            <h4>Address</h4>
                            <p><?php echo e($sitesetting->address); ?>

                            </p>
                        </div>
                    </div>
                    <div class="contact-item d-flex mb-3">
                        <div class="icon">
                        <i class="fa-solid fa-phone"></i>
                        </div>
                        <div class="contant">
                            <h4>Phone Number</h4>
                            <p>
                                <a href="tel:<?php echo e($sitesetting->phone); ?>"><?php echo e($sitesetting->phone); ?></a>
                            </p>
                            <p>
                                <a href="tel:<?php echo e($sitesetting->whatsapp); ?>"><?php echo e($sitesetting->whatsapp); ?></a>
                            </p>
                        </div>
                    </div>
                    <div class="contact-item d-flex mb-3">
                        <div class="icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="contant">
                            <h4>Email Address</h4>
                            <p>
                                <a href="mailto:<?php echo e($sitesetting->email); ?>"><?php echo e($sitesetting->email); ?></a>
                            </p>
                        </div>
                    </div>
                  

                </div>
                <!-- Contact details end -->
            </div>
        </div>
    </div>
</div>
<!-- Contact-1 end -->

<!-- Google map start -->
<div class="section">
    <div class="map">
    <iframe src="<?php echo e($sitesetting->map_link); ?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>
<!-- Google map end -->
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app',['meta_title' => $meta_title ?? "",'meta_keywords' => $meta_keywords ?? "",'meta_description' => $meta_description ?? ""], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/demo82_color_usr/data/www/demo82.colormoon.in/rockdale/resources/views/frontend/contact.blade.php ENDPATH**/ ?>