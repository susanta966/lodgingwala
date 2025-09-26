<?php $__env->startSection('content'); ?>
    <!-- Sub banner start -->
    <div class="sub-banner"
        style="background: url('<?php echo e(asset('admin/siteImage/' . $sitesettings->book_now_breadcome_image)); ?>'); background-size: cover; background-position: center">
        <div class="container">
            <div class="breadcrumb-area">
                <h3>Book Now</h3>
            </div>
            <nav class="breadcrumbs">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('frontend.home')); ?>">Home</a></li>
                    <li class="breadcrumb-item active">Book Now</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Hotel section start -->
    <div class="content-area book-now-section bg-grey">
        <div class="overlay">
            <div class="container">
                <div class="row justify-content-center">
                    <?php $__currentLoopData = $booknow; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="hotel-box">
                                <!-- Photo thumbnail -->
                                <div class="photo-thumbnail">
                                    <div class="photo">
                                        <img src="<?php echo e(asset('admin/booknowImages/' . $data->image)); ?>" alt="photo"
                                            class="img-fluid w-100">
                                    </div>
                                </div>
                                <!-- Detail -->
                                <div class="detail clearfix">
                                    <h3 class="text-center mb-0">
                                        <a data-bs-toggle="modal" data-bs-target="#modal-<?php echo e($data->id); ?>"
                                            type="button"><?php echo e($data->title); ?></a>
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <!-- Dynamic Modal for each hotel box -->
                        <div class="modal fade" id="modal-<?php echo e($data->id); ?>" tabindex="-1"
                            aria-labelledby="modalLabel-<?php echo e($data->id); ?>" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modalLabel-<?php echo e($data->id); ?>"><?php echo e($data->title); ?>

                                        </h1>
                                    </div>
                                    <div class="modal-body" id="modal-body-<?php echo e($data->id); ?>">
                                        <div class="room-popup">
                                            <img class="img-fluid bk-ig"
                                                src="<?php echo e(asset('admin/booknowImages/' . $data->image)); ?>" alt="">
                                            <h6><?php echo e($data->title); ?></h6>
                                            <ul id="platform-list-<?php echo e($data->id); ?>"></ul>
                                            <ul class="pt-2 contatc-ul">
                                                <li><a href="tel:<?php echo e($data->phone); ?>"><i class="fa fa-phone"></i>
                                                        <?php echo e($data->phone); ?></a></li>
                                                <?php if(!empty($data->email_1)): ?>
                                                    <li>
                                                        <a href="mailto:<?php echo e($data->email_1); ?>">
                                                            <i class="fa fa-envelope"></i> <?php echo e($data->email_1); ?>

                                                        </a>
                                                    </li>
                                                <?php endif; ?>

                                                <?php if(!empty($data->email_2)): ?>
                                                    <li>
                                                        <a href="mailto:<?php echo e($data->email_2); ?>">
                                                            <i class="fa fa-envelope"></i> <?php echo e($data->email_2); ?>

                                                        </a>
                                                    </li>
                                                <?php endif; ?>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Hotel section end -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Event listener for opening each modal
            $('[data-bs-toggle="modal"]').on('click', function() {
                let id = $(this).data('bs-target').replace('#modal-', '');
                console.log(id);
                fetchPlatformData(id);
            });

            // Function to make AJAX call to fetch platform data
            function fetchPlatformData(booknowId) {
                $.ajax({
                    url: "<?php echo e(route('frontend.getPlatformData')); ?>", // Update this route
                    type: "GET",
                    data: {
                        id: booknowId
                    },
                    success: function(response) {
                        // Empty the previous data
                        $('#platform-list-' + booknowId).empty();

                        // Append the new data
                        response.data.forEach(platform => {
                            $('#platform-list-' + booknowId).append(`
                            <a href="${platform.link}" target="_blank"><li><img width="40" src="<?php echo e(asset('admin/platformImage')); ?>/${platform.images}" alt=""></li></a>
                        `);
                        });
                    },
                    error: function(error) {
                        console.error("Error fetching platform data", error);
                    }
                });
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', ['meta_title' => $meta_title ?? '', 'meta_keywords' => $meta_keywords ?? '', 'meta_description' => $meta_description ?? ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/demo82_color_usr/data/www/demo82.colormoon.in/rockdale/resources/views/frontend/book-now.blade.php ENDPATH**/ ?>