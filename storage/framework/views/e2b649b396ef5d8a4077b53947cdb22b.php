<?php $__env->startSection('title'); ?>
    Banquet
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
                                    <h5 style="margin-left: 19px;">Banquet</h5>
                                </div>
                                <div class="col-lg-12 mt-3 ml-5 d-flex justify-content-left">
                                    <a href="<?php echo e(route('banquets.create')); ?>" class="btn btn-primary"><i
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
                            <span class="closebtn" onclick="this.parentElement.style.display = 'none';">&times;</span>
                            <span class="font-weight-bold h5"><?php echo e($message); ?></span>
                        </div>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped iq-table1" data-toggle="data-table">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Name</th>
                                    <th>Person</th>
                                    <th>Image</th>
                                    <th>Sliders</th>
                                    <th>Status</th>
                                    <th>Priority</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $serial = 1; ?>
                                <?php $__currentLoopData = $banquets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($serial++); ?></td>
                                        <td><?php echo e($data->name); ?></td>
                                        <td><?php echo e($data->person); ?></td>
                                        <td>
                                            <a href="<?php echo e(asset('admin/banquetImages/' . $data->image)); ?>" target="_blank">
                                                <img src="<?php echo e(asset('admin/banquetImages/' . $data->image)); ?>" alt="icon"
                                                    style="width: 100px;height:100px;">
                                            </a>
                                        </td>
                                        <td>
                                            <div id="sortable-images-<?php echo e($data->id); ?>" class="image-container"
                                                data-banquet-id="<?php echo e($data->id); ?>">
                                                <?php
                                                    $images = collect(json_decode($data->images, true))
                                                        ->map(function ($image, $index) {
                                                            if (is_string($image)) {
                                                                $image = ['path' => $image, 'priority' => 0]; // Default priority to 0
                                                            }
                                                            return [
                                                                'path' => $image['path'],
                                                                'priority' => $image['priority'] ?? 0,
                                                                'index' => $index,
                                                            ];
                                                        })
                                                        ->sortBy('priority'); // Sort images by priority
                                                ?>

                                                <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="image-card" data-image-index="<?php echo e($image['index']); ?>"
                                                        data-priority="<?php echo e($image['priority']); ?>">
                                                        <a href="<?php echo e(asset('admin/banquetImages/' . $image['path'])); ?>"
                                                            target="_blank">
                                                            <img src="<?php echo e(asset('admin/banquetImages/' . $image['path'])); ?>"
                                                                alt="Image">
                                                        </a>
                                                        <form method="POST"
                                                            action="<?php echo e(route('banquets.destroyImage', ['id' => $data->id, 'index' => $image['index']])); ?>"
                                                            class="delete-image-form">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('DELETE'); ?>
                                                            <button type="button" class="delete-image-btn">×</button>
                                                        </form>
                                                        <input type="number" class="priority-input"
                                                            value="<?php echo e($image['priority']); ?>"
                                                            data-index="<?php echo e($image['index']); ?>" min="0">
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                            <button class="save-priority-btn btn-primary mt-2"
                                                data-banquet-id="<?php echo e($data->id); ?>">
                                                Save Priority
                                            </button>
                                        </td>

                                        <td><?php echo e($data->status == 1 ? 'Active' : 'Inactive'); ?></td>
                                        <td><?php echo e($data->priority); ?></td>
                                        <td class="d-flex justify-content-center">
                                            <a href="<?php echo e(route('banquets.edit', $data->id)); ?>" class="btn btn-success">
                                                <i class="fa fa-pencil mr-1"></i>Edit
                                            </a>
                                            <form method="POST" action="<?php echo e(route('banquets.destroy', $data->id)); ?>"
                                                class="delete-form ml-2" style="display:inline-block;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-times-rectangle mr-1"></i>Delete
                                                </button>
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
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".save-priority-btn").forEach(button => {
                button.addEventListener("click", function() {
                    const dataId = this.getAttribute(
                        "data-banquet-id"); // Corrected to use data-banquet-id
                    let imageData = [];
                    document.querySelectorAll(`#sortable-images-${dataId} .priority-input`).forEach(
                        input => {
                            imageData.push({
                                index: input.dataset.index,
                                priority: input.value
                            });
                        });
                    fetch("<?php echo e(route('banquets.updateImagePriority', ['id' => ':id'])); ?>".replace(
                            ':id', dataId), {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute("content")
                            },
                            body: JSON.stringify({
                                images: imageData
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            //                            console.log(response)
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

        document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.delete-image-btn').forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent default behavior

            const form = this.closest('form');
            const imageCard = this.closest('.image-card');

            if (!form || !imageCard) return; // Ensure elements exist

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
                        method: "POST", // Use DELETE method directly
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                            "Content-Type": "application/json"
                        },
                        // body: JSON.stringify({}) // No need for _method: "DELETE" since method is DELETE
                        body: JSON.stringify({
                                _method: "DELETE"
                            }) // Send DELETE request
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire("Deleted!", "The image has been deleted.", "success");
                            imageCard.remove(); // Remove image from UI
                        } else {
                            Swal.fire("Error!", "Failed to delete the image.", "error");
                        }
                    })
                    .catch(error => {
                        // console.error("Error:", error);
                        Swal.fire("Error!", "Something went wrong.", "error");
                    });
                }
            });
        });
    });
});

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/demo82_color_usr/data/www/demo82.colormoon.in/rockdale/resources/views/admin/banquet/index.blade.php ENDPATH**/ ?>