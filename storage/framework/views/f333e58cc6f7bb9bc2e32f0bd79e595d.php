

<?php $__env->startSection('title'); ?>
    Room Images
<?php $__env->stopSection(); ?>

<?php $__env->startSection('maincontent'); ?>
    <div class="col-12">
        <div class="card-group box-margin">
            <div class="card">
                <!-- Start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 mt-3">
                                    <h5 style="margin-left: 19px;">Room Images</h5>
                                </div>
                                <div class="col-lg-12 mt-3 ml-5 d-flex justify-content-left">
                                    <a href="<?php echo e(route('room-images.create')); ?>" class="btn btn-primary"><i
                                            class="fa fa-plus mr-1"></i>Add Image</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End page title -->
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
                                    <th>Room Name</th>
                                    <th>Image</th>
                                    <th>Priority</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $serial = 1; ?>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($serial++); ?></td>
                                        <td><?php echo e($data->rooms_name); ?></td>
                                        <td>
                                            <a href="<?php echo e(asset('admin/roomimage/' . $data->image)); ?>" target="_blank">
                                                <img src="<?php echo e(asset('admin/roomimage/' . $data->image)); ?>" alt="icon"
                                                    style="width: 100px;height:100px;"></a>
                                        </td>
                                        <td><?php echo e($data->priority); ?></td>
                                        <td class="d-flex justify-content-center">
                                            <a href="<?php echo e(route('room-images.edit', $data->id)); ?>" class="btn btn-success"><i
                                                    class="fa fa-pencil mr-1"></i>Edit</a>
                                            
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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteImageButtons = document.querySelectorAll('.delete-image-btn');
            deleteImageButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const form = this.closest('form');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'You will not be able to recover this image!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize the sortable container for each blog's images
            const sortableContainers = document.querySelectorAll('.sortable-images');
            sortableContainers.forEach(container => {
                const banquetId = container.getAttribute(
                    'data-banquet-id'); // Get the blog ID from the data attribute
                new Sortable(container, {
                    onEnd: function(evt) {
                        // Get the new order of images after the drag
                        const newOrder = Array.from(container.children).map(item => item
                            .getAttribute('data-image-index'));

                        // Send the new order to the server to update the database
                        updateImageOrder(banquetId, newOrder);
                    }
                });
            });

            // Function to send the new image order to the server using AJAX
            function updateImageOrder(banquetId, newOrder) {
                $.ajax({
                    url: `./banquets/${banquetId}/update-image-order`, // The URL to hit
                    method: 'POST', // The HTTP method
                    data: {
                        order: newOrder, // The new order of images
                        _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire('Success', 'The image order has been updated.', 'success');
                        } else {
                            Swal.fire('Error', 'There was an error updating the image order.', 'error');
                        }
                    },
                    error: function(error) {
                        console.error('Error:', error);
                        Swal.fire('Error', 'There was an error updating the image order.', 'error');
                    }
                });
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/demo82_color_usr/data/www/demo82.colormoon.in/rockdale/resources/views/admin/room_images/index.blade.php ENDPATH**/ ?>