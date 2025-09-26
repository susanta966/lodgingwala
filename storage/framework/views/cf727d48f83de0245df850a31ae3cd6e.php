<?php $__env->startSection('title'); ?>
    Book-Now
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
                                    <h5 style="margin-left: 19px;">Book-Now</h5>
                                </div>
                                <div class="col-lg-12 mt-3 ml-5 d-flex justify-content-left">
                                    <a href="<?php echo e(route('booknow.create')); ?>" class="btn btn-primary"><i
                                            class="fa fa-plus mr-1"></i>Add New</a>
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
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Priority</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $serial = 1; ?>
                                <?php $__currentLoopData = $booknows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booknow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($serial++); ?></td>
                                        <td><?php echo e($booknow->title); ?></td>
                                        <td><?php echo e($booknow->status == 1 ? 'Active' : 'Inactive'); ?></td>
                                        <td><?php echo e($booknow->priority); ?></td>
                                        <td class="d-flex justify-content-center">
                                            <div class="action-buttons">
                                                <a href="<?php echo e(route('booknow.edit', $booknow->id)); ?>"
                                                    class="btn btn-success"><i class="fa fa-pencil mr-1"></i>Edit</a>
                                                <form method="POST" action="<?php echo e(route('booknow.destroy', $booknow->id)); ?>"
                                                    class="delete-form">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-danger delete-btn">
                                                        <i class="fa fa-times"></i> Delete
                                                    </button>
                                            </div>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Delete image functionality (already exists in your original script)
        document.addEventListener('DOMContentLoaded', function() {
            const deleteImageButtons = document.querySelectorAll('.delete-btn');
            deleteImageButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent default action (form submission)
                    const form = this.closest('form');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'You will not be able to recover this room!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // Submit the form if confirmed
                        }
                    });
                });
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Select all "Save Priority" buttons dynamically
            document.querySelectorAll(".save-priority-btn").forEach(button => {
                button.addEventListener("click", function() {
                    const roomId = this.getAttribute("data-room-id"); // Get the room ID
                    let imageData = [];

                    // Gather image data for this specific room
                    document.querySelectorAll(`#sortable-images-${roomId} .priority-input`).forEach(
                        input => {
                            imageData.push({
                                index: input.dataset.index,
                                priority: input.value
                            });
                        });

                    // Send the updated priority data to the server
                    fetch("<?php echo e(route('rooms.updateImagePriority', ':id')); ?>".replace(':id',
                            roomId), {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": document.querySelector(
                                        'meta[name="csrf-token"]')
                                    .getAttribute("content")
                            },
                            body: JSON.stringify({
                                images: imageData
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert("Image priority updated successfully!");
                                location.reload();
                            } else {
                                alert("Failed to update priority.");
                            }
                        })
                        .catch(error => console.error("Error:", error));
                });
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.delete-image-btn').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent default behavior

                    const form = this.closest('form');
                    const imageCard = this.closest('.image-card');

                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'This image will be permanently deleted!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch(form.action, {
                                    method: "POST",
                                    headers: {
                                        "X-CSRF-TOKEN": document.querySelector(
                                            'meta[name="csrf-token"]').getAttribute(
                                            "content"),
                                        "Content-Type": "application/json"
                                    },
                                    body: JSON.stringify({
                                        _method: "DELETE"
                                    }) // Send DELETE request
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire("Deleted!",
                                            "The image has been deleted.", "success"
                                        );
                                        imageCard.remove(); // Remove image from UI
                                    } else {
                                        Swal.fire("Error!",
                                            "Failed to delete the image.", "error");
                                    }
                                })
                                .catch(error => console.error("Error:", error));
                        }
                    });
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/demo82_color_usr/data/www/demo82.colormoon.in/rockdale/resources/views/admin/booknow/index.blade.php ENDPATH**/ ?>