
<?php $__env->startSection('title'); ?>
<?php
$page_title = 'Site Setting'    
?>
<?php echo e($page_title); ?>

<?php $__env->stopSection(); ?>
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
                                <h5 style="margin-left: 19px;">Site Settings</h5>
                            </div>
                            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"  style="margin-left: -19px;">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/dashboard')); ?>">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Site Settings</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <?php $__env->startSection('title'); ?>
                        Site Settings
                        <?php $__env->stopSection(); ?>
                    </div>
                </div>
            </div>
            <!-- end page title -->
                <div class="card-body">
                    <?php if($message = Session::get('success')): ?>
                    <div class="alert bg-success text-white">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                         <span class="font-weight-bold h5"><?php echo e($message); ?></span>
                    </div>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped iq-table1" data-toggle="data-table">
                            <thead>
                                <tr>
                                    <th>Site Title</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                   
                                    <th>Facebook</th>
                                    <th>Logo</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $sitesettings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($data->site_title); ?></td>
                                        <td><?php echo e($data->email); ?></td>
                                        <td><?php echo e($data->phone); ?></td>
                                        
                                        <td><?php echo e($data->facebook); ?></td>
                                        <td><a href="<?php echo e(asset('admin/siteImage/logo/' . $data->logo)); ?>" target="_blank" rel="noopener noreferrer"><img src="<?php echo e(asset('admin/siteImage/logo/' . $data->logo)); ?>" alt=""
                                                style="width:50px;height:50px"></a></td>
                                        <td><a class="btn btn-success btn-sm" href="<?php echo e(route('sitesettings.edit',$data->id)); ?>"><i class="fa fa-pencil  mr-1"></i>Edit</a></td>
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
<?php $__env->startSection('js_code'); ?>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#datatable').DataTable();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/demo82_color_usr/data/www/demo82.colormoon.in/rockdale/resources/views/admin/siteSetting/index.blade.php ENDPATH**/ ?>