@extends('admin.layout.app')

@section('title')
    Banquet
@endsection

@section('maincontent')
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
                                    <a href="{{ route('banquets.create') }}" class="btn btn-primary"><i
                                            class="fa fa-plus mr-1"></i>Add New</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End page title -->
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
                                    <th>Person</th>
                                    <th>Image</th>
                                    <th>Sliders</th>
                                    <th>Status</th>
                                    <th>Priority</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $serial = 1; @endphp
                                @foreach ($banquets as $key => $data)
                                    <tr>
                                        <td>{{ $serial++ }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->person }}</td>
                                        <td>
                                            <a href="{{ asset('admin/banquetImages/' . $data->image) }}" target="_blank">
                                                <img src="{{ asset('admin/banquetImages/' . $data->image) }}" alt="icon"
                                                    style="width: 100px;height:100px;">
                                            </a>
                                        </td>
                                        <td>
                                            <div id="sortable-images-{{ $data->id }}" class="image-container"
                                                data-banquet-id="{{ $data->id }}">
                                                @php
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
                                                @endphp

                                                @foreach ($images as $image)
                                                    <div class="image-card" data-image-index="{{ $image['index'] }}"
                                                        data-priority="{{ $image['priority'] }}">
                                                        <a href="{{ asset('admin/banquetImages/' . $image['path']) }}"
                                                            target="_blank">
                                                            <img src="{{ asset('admin/banquetImages/' . $image['path']) }}"
                                                                alt="Image">
                                                        </a>
                                                        <form method="POST"
                                                            action="{{ route('banquets.destroyImage', ['id' => $data->id, 'index' => $image['index']]) }}"
                                                            class="delete-image-form">
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
                                                data-banquet-id="{{ $data->id }}">
                                                Save Priority
                                            </button>
                                        </td>

                                        <td>{{ $data->status == 1 ? 'Active' : 'Inactive' }}</td>
                                        <td>{{ $data->priority }}</td>
                                        <td class="d-flex justify-content-center">
                                            <a href="{{ route('banquets.edit', $data->id) }}" class="btn btn-success">
                                                <i class="fa fa-pencil mr-1"></i>Edit
                                            </a>
                                            <form method="POST" action="{{ route('banquets.destroy', $data->id) }}"
                                                class="delete-form ml-2" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-times-rectangle mr-1"></i>Delete
                                                </button>
                                            </form>
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
                    fetch("{{ route('banquets.updateImagePriority', ['id' => ':id']) }}".replace(
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
@endsection
