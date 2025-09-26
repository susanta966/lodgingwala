<?php $__env->startSection('maincontent'); ?>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.css">
    <div class="col-12">

        <div class="card-group box-margin">
            <div class="card">
                
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 mt-3">
                                    <h5 style="margin-left: 19px;">SEO</h5>
                                </div>
<!--                                 <div class="col-lg-12 mt-3 ml-5 d-flex justify-content-left">
                                <a href="#" class="btn btn-primary"><i class="fa fa-plus mr-1"></i>Add New</a>
                            </div>-->
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"  style="margin-left: -19px;">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/dashboard')); ?>">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Seos</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <?php $__env->startSection('title'); ?>
                            Seo
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
                                   
                                    <th>Page Name</th>
                                    <th>Meta Title</th>
                                    <th>Meta Keyword</th>
                                    <th>Meta Description</th>
                                    
                                    
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $seo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($data->page_name); ?></td>
                                        <td><?php echo e($data->meta_title); ?></td>
                                        <td><?php echo e(implode(",", json_decode($data->meta_keywords))); ?></td>
                                        <td><?php echo e($data->meta_description); ?></td>
                              
                                              
                                        <td>
                                            <a href="<?php echo e(route('admin.seo.edit', $data->id)); ?>" class="btn btn-success"><i class="fa fa-pencil  mr-1"></i>Edit</a></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.js"></script>
    <script>
 $(document).ready(function() {
    console.log('Before DataTable Initialization');
    $('#datatable').DataTable();
    console.log('After DataTable Initialization');
});

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/demo82_color_usr/data/www/demo82.colormoon.in/rockdale/resources/views/admin/seo/index.blade.php ENDPATH**/ ?>