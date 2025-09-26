<?php $__env->startSection('title', 'Site Settings'); ?>

<?php $__env->startSection('maincontent'); ?>
    <div class="col-12">
        <div class="card-group box-margin">
            <div class="card">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 mt-3">
                                    <h5 style="margin-left: 19px;"><?php echo $__env->yieldContent('title'); ?></h5>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a
                                                    href="<?php echo e(url('/admin/dashboard')); ?>">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a
                                                    href="<?php echo e(route('sitesettings.index')); ?>"><?php echo $__env->yieldContent('title'); ?></a></li>
                                            <li class="breadcrumb-item active">Edit</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                
                <?php if($message = Session::get('success')): ?>
                    <div class="alert bg-success text-white">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        <span class="font-weight-bold h5"><?php echo e($message); ?></span>
                    </div>
                <?php endif; ?>
                <form method="POST" action="<?php echo e(route('sitesettings.update', $sitesettings->id)); ?>"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>
                    <div class="card-body  ">
                        <div class="row p-4">
                            <div class="col-6">

                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Site Title</label>
                                    <input type="text" name="site_title"
                                        value="<?php echo e(old('site_title', $sitesettings->site_title)); ?>"class="form-control"
                                        placeholder="Enter Site Title">
                                    <?php $__errorArgs = ['site_title'];
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
                            <div class="col-6">

                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Email</label>
                                    <input type="email" name="email"
                                        value="<?php echo e(old('email', $sitesettings->email)); ?>"class="form-control"
                                        placeholder="Enter email">
                                    <?php $__errorArgs = ['email'];
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
                            <div class="col-6">

                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Choose Site Logo</label>
                                    <input class="form-control" type="file" name="logo">
                                    <span class="text-danger">*Recommended image size: 235 × 70px</span>
                                    <br />
                                    <a href="<?php echo e(asset('admin/siteImage/logo/' . $sitesettings->logo)); ?>" target="_blank"
                                        rel="noopener noreferrer"><img
                                            src="<?php echo e(asset('admin/siteImage/logo/' . $sitesettings->logo)); ?>" alt=""
                                            style="width:200px;"></a>
                                    <?php $__errorArgs = ['logo'];
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
                            <div class="col-6">

                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Choose Favicon</label>
                                    <input class="form-control" type="file" name="favicon">
                                    <span class="text-danger">*Recommended image size: 60 × 60px</span>
                                    <br />
                                    <a href="<?php echo e(asset('admin/siteImage/favicon/' . $sitesettings->favicon)); ?>"
                                        target="_blank" rel="noopener noreferrer">
                                        <img src="<?php echo e(asset('admin/siteImage/favicon/' . $sitesettings->favicon)); ?>"
                                            alt="" style="width:150px;height:150px;"></a>
                                    <?php $__errorArgs = ['favicon'];
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
                            <div class="col-6">

                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Choose Footer Logo</label>
                                    <input class="form-control" type="file" name="ftlogo">
                                    <span class="text-danger">*Recommended image size: 250 × 75px</span>
                                    <br />
                                    <a href="<?php echo e(asset('admin/siteImage/ftlogo/' . $sitesettings->ftlogo)); ?>"
                                        target="_blank" rel="noopener noreferrer">
                                        <img src="<?php echo e(asset('admin/siteImage/ftlogo/' . $sitesettings->ftlogo)); ?>"
                                            alt="" style="width:150px;height:150px;"></a>
                                    <?php $__errorArgs = ['flogo'];
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
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="address" class="col-form-label">Address</label>
                                    <textarea name="address" class="form-control" placeholder="Enter Address" rows="6"><?php echo e($sitesettings->address); ?></textarea>
                                    <?php $__errorArgs = ['address'];
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

                            <div class="col-6">

                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Phone</label>
                                    <input type="text" name="phone"
                                        value="<?php echo e(old('phone', $sitesettings->phone)); ?>"class="form-control"
                                        placeholder="Enter Phone Number">
                                    <?php $__errorArgs = ['phone'];
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
                            <div class="col-6">

                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Whatsapp</label>
                                    <input type="text" name="whatsapp"
                                        value="<?php echo e(old('whatsapp', $sitesettings->whatsapp)); ?>"class="form-control"
                                        placeholder="Enter Whatsapp ">
                                    <?php $__errorArgs = ['whatsapp'];
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

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Instagram</label>
                                    <input type="text" name="instagram"
                                        value="<?php echo e(old('instagram', $sitesettings->instagram)); ?>"class="form-control"
                                        placeholder="Enter Instagram">
                                    <?php $__errorArgs = ['instagram'];
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
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Twitter</label>
                                    <input type="text" name="twitter"
                                        value="<?php echo e(old('twitter', $sitesettings->twitter)); ?>"class="form-control"
                                        placeholder="Enter Twitter">
                                    <?php $__errorArgs = ['twitter'];
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
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Facebook</label>
                                    <input type="text" name="facebook"
                                        value="<?php echo e(old('facebook', $sitesettings->facebook)); ?>"class="form-control"
                                        placeholder="Enter Facebook">
                                    <?php $__errorArgs = ['facebook'];
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


                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">OG Title</label>
                                    <input type="text" name="og_title"
                                        value="<?php echo e(old('og_title', $sitesettings->og_title)); ?>"class="form-control"
                                        placeholder="Enter OG Title">
                                    <?php $__errorArgs = ['og_title'];
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
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="og_description" class="col-form-label">OG Description</label>
                                    <input id="og_description" name="og_description" class="form-control"
                                        placeholder="Enter OG Description" value=" <?php echo e($sitesettings->og_description); ?>">
                                    <?php $__errorArgs = ['og_description'];
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
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="og_description" class="col-form-label">OG Type</label>
                                    <input id="og_description" name="og_type" class="form-control "
                                        placeholder="Enter OG Type" value="<?php echo e(old('og_type', $sitesettings->og_type)); ?>">
                                    <?php $__errorArgs = ['og_type'];
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
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="og_description" class="col-form-label">OG Url</label>
                                    <input id="og_description" name="og_url" class="form-control "
                                        placeholder="Enter OG Url" value="<?php echo e(old('og_url', $sitesettings->og_url)); ?>">
                                    <?php $__errorArgs = ['og_url'];
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
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="og_description" class="col-form-label">OG Site Name</label>
                                    <input id="og_description" name="og_site_name" class="form-control "
                                        placeholder="Enter OG Site Name"
                                        value="<?php echo e(old('og_site_name', $sitesettings->og_site_name)); ?>">
                                    <?php $__errorArgs = ['og_site_name'];
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
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Choose OG Image</label>
                                    <input class="form-control" type="file" name="og_image">
                                    <span class="text-danger">*Recommended image size: 350 × 250px</span>
                                    <br />
                                    <a href="<?php echo e(asset('admin/siteImage/og-image/' . $sitesettings->og_image)); ?>"
                                        target="_blank" rel="noopener noreferrer">
                                        <img src="<?php echo e(asset('admin/siteImage/og-image/' . $sitesettings->og_image)); ?>"
                                            alt="" style="width:150px;height:150px;"></a>
                                    <?php $__errorArgs = ['og_image'];
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
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="og_description" class="col-form-label">OG Width</label>
                                    <input id="og_description" name="og_width" class="form-control "
                                        placeholder="Enter OG Width"
                                        value="<?php echo e(old('og_width', $sitesettings->og_width)); ?>">
                                    <?php $__errorArgs = ['og_width'];
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
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="og_description" class="col-form-label">OG Height</label>
                                    <input id="og_description" name="og_height" class="form-control "
                                        placeholder="Enter OG Height"
                                        value="<?php echo e(old('og_height', $sitesettings->og_height)); ?>">
                                    <?php $__errorArgs = ['og_height'];
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
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="twitter_card" class="col-form-label">Twitter Card</label>
                                    <input id="twitter_card" name="twitter_card" class="form-control "
                                        placeholder="Enter Twitter Card"
                                        value="<?php echo e(old('twitter_card', $sitesettings->twitter_card)); ?>">
                                    <?php $__errorArgs = ['twitter_card'];
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
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="twitter_title" class="col-form-label">Twitter Title</label>
                                    <input id="twitter_title" name="twitter_title" class="form-control"
                                        placeholder="Enter Twitter Title"
                                        value="<?php echo e(old('twitter_title', $sitesettings->twitter_title)); ?>">
                                    <?php $__errorArgs = ['twitter_title'];
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
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Choose Twitter Image</label>
                                    <input class="form-control" type="file" name="twitter_image">
                                    <span class="text-danger">*Recommended image size: 350 × 250px</span>
                                    <br />
                                    <a href="<?php echo e(asset('admin/siteImage/twitter-image/' . $sitesettings->twitter_image)); ?>"
                                        target="_blank" rel="noopener noreferrer">
                                        <img src="<?php echo e(asset('admin/siteImage/twitter-image/' . $sitesettings->twitter_image)); ?>"
                                            alt="" style="width:150px;height:150px;"></a>
                                    <?php $__errorArgs = ['twitter_image'];
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
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="site_location" class="col-form-label">Site Location</label>
                                    <input id="site_location" name="site_location" class="form-control "
                                        placeholder="Enter Site Location"
                                        value="<?php echo e(old('site_location', $sitesettings->site_location)); ?>">
                                    <?php $__errorArgs = ['site_location'];
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
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="map_link" class="col-form-label">Map Link</label>
                                    <input id="map_link" name="map_link" class="form-control "
                                        placeholder="Enter Map Link"
                                        value="<?php echo e(old('map_link', $sitesettings->map_link)); ?>">
                                    <?php $__errorArgs = ['map_link'];
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
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="contact_title" class="col-form-label">Contact Title</label>
                                    <input id="contact_title" name="contact_title" class="form-control "
                                        placeholder="Enter Contact Title"
                                        value="<?php echo e(old('contact_title', $sitesettings->contact_title)); ?>">
                                    <?php $__errorArgs = ['contact_title'];
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
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="site_about" class="col-form-label">Site About</label>
                                    <input id="site_about" name="site_about" class="form-control"
                                        placeholder="Enter Site About"
                                        value="<?php echo e(old('site_about', $sitesettings->site_about)); ?>">
                                    <?php $__errorArgs = ['site_about'];
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
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <h5 class="text-center">Breadcrumb Images (Recommended Size: 1600x350)</h5>
                                    <p class="text-center text-muted">Ensure the breadcrumb images follow the recommended
                                        size of 1600 x 350 for optimal display.</p>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="card p-3">
                                        <label for="customFile1" class="form-label">About Breadcome Image</label>
                                        <input class="form-control" type="file" name="about_breadcome_image">
                                        <br />
                                        <a href="<?php echo e(asset('admin/siteImage/' . $sitesettings->about_breadcome_image)); ?>"
                                            target="_blank" rel="noopener noreferrer">
                                            <img src="<?php echo e(asset('admin/siteImage/' . $sitesettings->about_breadcome_image)); ?>"
                                                alt="About Breadcome Image" class="rounded img-thumbnail"
                                                style="width:150px;">
                                        </a>
                                        <?php $__errorArgs = ['about_breadcome_image'];
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

                                <!-- Repeat for each section -->

                                <div class="col-md-6 mb-4">
                                    <div class="card p-3">
                                        <label for="customFile2" class="form-label">Room Breadcome Image</label>
                                        <input class="form-control" type="file" name="room_breadcome_image">
                                        <br />
                                        <a href="<?php echo e(asset('admin/siteImage/' . $sitesettings->room_breadcome_image)); ?>"
                                            target="_blank" rel="noopener noreferrer">
                                            <img src="<?php echo e(asset('admin/siteImage/' . $sitesettings->room_breadcome_image)); ?>"
                                                alt="Room Breadcome Image" class="rounded img-thumbnail"
                                                style="width:150px;">
                                        </a>
                                        <?php $__errorArgs = ['room_breadcome_image'];
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
                                 <div class="col-md-6 mb-4">
                                    <div class="card p-3">
                                        <label for="customFile2" class="form-label">Room Details Breadcome Image</label>
                                        <input class="form-control" type="file" name="roomdeatis_breadcome_imahe">
                                        <br />
                                        <a href="<?php echo e(asset('admin/siteImage/' . $sitesettings->roomdeatis_breadcome_imahe)); ?>"
                                            target="_blank" rel="noopener noreferrer">
                                            <img src="<?php echo e(asset('admin/siteImage/' . $sitesettings->roomdeatis_breadcome_imahe)); ?>"
                                                alt="Room Breadcome Image" class="rounded img-thumbnail"
                                                style="width:150px;">
                                        </a>
                                        <?php $__errorArgs = ['roomdeatis_breadcome_imahe'];
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
                                <div class="col-md-6 mb-4">
                                    <div class="card p-3">
                                        <label for="customFile1" class="col-form-label">Banquet Breadcome
                                            Image</label>
                                        <input class="form-control" type="file" name="banquet_breadcome_image">
                                        <br />
                                        <a href="<?php echo e(asset('admin/siteImage/' . $sitesettings->banquet_breadcome_image)); ?>"
                                            target="_blank" rel="noopener noreferrer">
                                            <img src="<?php echo e(asset('admin/siteImage/' .$sitesettings->banquet_breadcome_image)); ?>"
                                                alt="" style="width:150px;"></a>
                                        <?php $__errorArgs = ['banquet_breadcome_image'];
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
                                <div class="col-md-6 mb-4">
                                    <div class="card p-3">
                                        <label for="customFile1" class="col-form-label">Blogs Breadcome Image</label>
                                        <input class="form-control" type="file" name="blogs_breadcome_image">
                                        <br />
                                        <a href="<?php echo e(asset('admin/siteImage/' . $sitesettings->blogs_breadcome_image)); ?>"
                                            target="_blank" rel="noopener noreferrer">
                                            <img src="<?php echo e(asset('admin/siteImage/' . $sitesettings->blogs_breadcome_image)); ?>"
                                                alt="" style="width:150px;"></a>
                                        <?php $__errorArgs = ['blogs_breadcome_image'];
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
                                <div class="col-md-6 mb-4">
                                    <div class="card p-3">
                                        <label for="customFile1" class="col-form-label">Blogdetiles Breadcome
                                            Image</label>
                                        <input class="form-control" type="file" name="ourblogs_breadcome_image">
                                        <br />
                                        <a href="<?php echo e(asset('admin/siteImage/' . $sitesettings->ourblogs_breadcome_image)); ?>"
                                            target="_blank" rel="noopener noreferrer">
                                            <img src="<?php echo e(asset('admin/siteImage/' . $sitesettings->ourblogs_breadcome_image)); ?>"
                                                alt="" style="width:150px;"></a>
                                        <?php $__errorArgs = ['ourblogs_breadcome_image'];
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
                                <div class="col-md-6 mb-4">
                                    <div class="card p-3">
                                        <label for="customFile1" class="col-form-label">Review Breadcome Image</label>
                                        <input class="form-control" type="file" name="review_breadcome_image">
                                        <br />
                                        <a href="<?php echo e(asset('admin/siteImage/' . $sitesettings->review_breadcome_image)); ?>"
                                            target="_blank" rel="noopener noreferrer">
                                            <img src="<?php echo e(asset('admin/siteImage/' . $sitesettings->review_breadcome_image)); ?>"
                                                alt="" style="width:150px;"></a>
                                        <?php $__errorArgs = ['review_breadcome_image'];
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
                                <!-- Example for additional images -->
                                <div class="col-md-6 mb-4">
                                    <div class="card p-3">
                                        <label for="customFile3" class="form-label">Contact Breadcome Image</label>
                                        <input class="form-control" type="file" name="contact_breadcome_image">
                                        <br />
                                        <a href="<?php echo e(asset('admin/siteImage/' . $sitesettings->contact_breadcome_image)); ?>"
                                            target="_blank" rel="noopener noreferrer">
                                            <img src="<?php echo e(asset('admin/siteImage/' . $sitesettings->contact_breadcome_image)); ?>"
                                                alt="Contact Breadcome Image" class="rounded img-thumbnail"
                                                style="width:150px;">
                                        </a>
                                        <?php $__errorArgs = ['contact_breadcome_image'];
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
                                 <div class="col-md-6 mb-4">
                                    <div class="card p-3">
                                        <label for="customFile3" class="form-label">Booknow Breadcome Image</label>
                                        <input class="form-control" type="file" name="book_now_breadcome_image">
                                        <br />
                                        <a href="<?php echo e(asset('admin/siteImage/' . $sitesettings->book_now_breadcome_image)); ?>"
                                            target="_blank" rel="noopener noreferrer">
                                            <img src="<?php echo e(asset('admin/siteImage/' . $sitesettings->book_now_breadcome_image)); ?>"
                                                alt="book_now_breadcome_image" class="rounded img-thumbnail"
                                                style="width:150px;">
                                        </a>
                                        <?php $__errorArgs = ['book_now_breadcome_image'];
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






                        </div>
                        <div class="d-flex align-items-right gap-5 flex-wrap ml-4 mb-5">
                            <button type="submit" class="btn btn-primary rounded text-capitalize">Submit</button>
                            
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>

    </div>
    </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/demo82_color_usr/data/www/demo82.colormoon.in/rockdale/resources/views/admin/siteSetting/edit.blade.php ENDPATH**/ ?>