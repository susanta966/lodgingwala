

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
                                    <h5 style="margin-left: 19px;">Sliders</h5>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/dashboard')); ?>">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Sliders</li>
                                        </ol>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-3 ml-5 d-flex justify-content-left">
                                    <a href="<?php echo e(route('sliders.create')); ?>" class="btn btn-primary"><i class="fa fa-plus mr-1"></i>Add New</a>
                                </div>
                            </div>
                            <?php $__env->startSection('title'); ?>
                            Sliders
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
                                    <th>Sl No</th>
                                    <th>Heading</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php
                                $serial = 1;
                            ?>
                                <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                         <td><?php echo e($serial++); ?></td>
                                        <td><?php echo e($data->heading); ?></td>
                                        <td><?php echo e($data->status == 1 ? 'Active' : 'Inactive'); ?></td>
                                        <td class="d-flex justify-content-center">
                                            <a href="<?php echo e(route('sliders.edit', $data->id)); ?>" class="btn btn-success"><i class="fa fa-pencil  mr-1"></i>Edit</a>
                                            <form method="POST" action="<?php echo e(route('sliders.destroy', $data->id)); ?>" class="delete-form ml-2">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="button" class="btn btn-danger delete-btn"><i class="fa fa-times-rectangle  mr-1"></i>Delete</button>
                                            </form>
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach(button => {
                button.addEventListener('click', (event) => {
                    event.preventDefault();
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'You will not be able to recover this item!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            event.target.closest('form').submit();
                        }
                    });
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js_code'); ?>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#datatable').DataTable();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/demo82_color_usr/data/www/demo82.colormoon.in/rockdale/resources/views/admin/slider/index.blade.php ENDPATH**/ ?>