<?php $__env->startSection('maincontent'); ?>
    <div class="col-12">
        <div class="card-group box-margin">
            <div class="card">
                <!-- Start Page Title -->
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
                                            <li class="breadcrumb-item">
                                                <a href="<?php echo e(url('/admin/dashboard')); ?>">Dashboard</a>
                                            </li>
                                            <li class="breadcrumb-item active">Pop up</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        <?php $__env->startSection('title', 'Pop up'); ?>
                    </div>
                </div>
            </div>
            <!-- End Page Title -->

            <div class="card-body">
                <?php if(session('success')): ?>
                    <div class="alert bg-success text-white">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        <span class="font-weight-bold h5"><?php echo e(session('success')); ?></span>
                    </div>
                <?php endif; ?>

                <div class="table-responsive">
                    <table id="datatable" class="table table-striped iq-table1" data-toggle="data-table">
                        <thead>
                            <tr>
                                <th>Pop up Heading</th>
                                <th>Pop up Heading Word</th>
                                <th>Pop up Heading Word 2</th>

                                <th>Pop up Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $__currentLoopData = $popup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $home): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($home->modal_heading); ?></td>
                                    <td><?php echo e($home->modal_heading_word); ?></td>
                                    <td><?php echo e($home->modal_heading_word_2); ?></td>

                                    <td>
                                        <img src="<?php echo e(asset('admin/homeImage/' . $home->modal_image)); ?>"
                                            alt="Modal Image" width="80" height="80">
                                    </td>
                                    <td><?php echo e($home->popup == 1 ? 'Active' : 'Inactive'); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('admin.popup.edit', $home->id)); ?>"
                                            class="btn btn-success btn-sm">
                                            <i class="fa fa-pencil mr-2"></i>Edit
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/demo82_color_usr/data/www/demo82.colormoon.in/rockdale/resources/views/admin/popup/index.blade.php ENDPATH**/ ?>