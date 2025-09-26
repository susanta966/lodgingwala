@extends('admin.layout.app')

@section('title')
Rooms Index
@endsection

@section('maincontent')

<div class="col-12">
    <div class="card-group box-margin">
        <div class="card">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 mt-3">
                                <h5 style="margin-left: 19px;">Rooms</h5>
                            </div>
                            <div class="col-lg-12 mt-3 ml-5 d-flex justify-content-left">
                                <a href="{{ route('rooms.create') }}" class="btn btn-primary"><i
                                        class="fa fa-plus mr-1"></i>Add New</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert bg-success text-white">
                    <span class="closebtn" onclick="this.parentElement.style.display = 'none';">&times;</span>
                    <span class="font-weight-bold h5">{{ $message }}</span>
                </div>
                @endif
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped iq-table1" data-toggle="data-table">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Images</th>
                                <th>Status</th>
                                <th>Priority</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rooms as $key => $room)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $room->name }}</td>
                                <td>{{ $room->title }}</td>
                                <td>
                                    <div id="sortable-images-{{ $room->id }}" class="image-container"
                                         data-room-id="{{ $room->id }}">
                                        @php
                                        $images = collect(json_decode($room->images, true))
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
                                        @endphp

                                        @foreach ($images as $image)
                                        <div class="image-card" data-image-index="{{ $image['index'] }}"
                                             data-priority="{{ $image['priority'] }}">
                                            <a href="{{ asset('admin/roomImages/' . $image['path']) }}"
                                               target="_blank">
                                                <img src="{{ asset('admin/roomImages/' . $image['path']) }}"
                                                     alt="Image">
                                            </a>
                                            <form method="POST" action="{{ route('rooms.destroyImage', ['id' => $room->id, 'index' => $image['index']]) }}" class="delete-image-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="delete-image-btn">×</button>
                                            </form>
                                            <input type="number" class="priority-input"
                                                   value="{{ $image['priority'] }}"
                                                   data-index="{{ $image['index'] }}" min="0">
                                        </div>
                                        @endforeach
                                    </div>
                                    <button class="save-priority-btn btn-primary mt-2"
                                            data-room-id="{{ $room->id }}">
                                        Save Priority</button>
                                </td>
                                <td>{{ $room->status == 1 ? 'Active' : 'Inactive' }}</td>
                                <td>{{ $room->priority }}</td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-success">
                                            <i class="fa fa-pencil"></i> Edit
                                        </a>
                                        <form method="POST" action="{{ route('rooms.destroy', $room->id) }}"
                                              class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger delete-btn">
                                                <i class="fa fa-times"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
                            // Delete image functionality (already exists in your original script)
                            document.addEventListener('DOMContentLoaded', function () {
                                const deleteImageButtons = document.querySelectorAll('.delete-btn');
                                deleteImageButtons.forEach(button => {
                                    button.addEventListener('click', function (event) {
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
    document.addEventListener("DOMContentLoaded", function () {
        // Select all "Save Priority" buttons dynamically
        document.querySelectorAll(".save-priority-btn").forEach(button => {
            button.addEventListener("click", function () {
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
                fetch("{{ route('rooms.updateImagePriority', ':id') }}".replace(':id',
                        roomId), {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector(
                                'meta[name="csrf-token"]')
                                .getAttribute("content")
                    },
                    body: JSON.stringify({images: imageData})
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
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.delete-image-btn').forEach(button => {
            button.addEventListener('click', function (event) {
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
@endsection
