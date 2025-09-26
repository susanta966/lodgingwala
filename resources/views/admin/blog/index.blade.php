@extends('admin.layout.app')

@section('title')
    Blog Index
@endsection

@section('maincontent')
    <style>
        .image-container {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .image-card {
            position: relative;
            width: 80px;
            text-align: center;
            background: #fff;
            padding: 5px;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .image-card:hover {
            transform: scale(1.05);
        }

        .image-card img {
            width: 100%;
            height: auto;
            border-radius: 3px;
        }

        .delete-image-btn {
            position: absolute;
            top: 2px;
            right: 2px;
            background: red;
            color: white;
            border: none;
            width: 18px;
            height: 18px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 12px;
            border-radius: 50%;
            cursor: pointer;
            transition: background 0.2s;
        }

        .delete-image-btn:hover {
            background: darkred;
        }

        .priority-input {
            width: 100%;
            padding: 3px;
            text-align: center;
            margin-top: 3px;
            border-radius: 3px;
            border: 1px solid #ddd;
            font-size: 12px;
        }

        #save-priority-btn {
            display: block;
            margin-top: 10px;
            background: #007bff;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            font-size: 12px;
            cursor: pointer;
            transition: background 0.2s;
        }

        #save-priority-btn:hover {
            background: #0056b3;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 5px;
            flex-wrap: wrap;
        }

        .action-buttons .btn {
            padding: 5px 10px;
            font-size: 12px;
        }
    </style>
    <div class="col-12">
        <div class="card-group box-margin">
            <div class="card">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 mt-3">
                                    <h5 style="margin-left: 19px;">Blogs</h5>
                                </div>
                                <div class="col-lg-12 mt-3 ml-5 d-flex justify-content-left">
                                    <a href="{{ route('blogs.create') }}" class="btn btn-primary"><i
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
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Images</th>
                                    <th>Status</th>
                                    <th>Priority</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $key=>$blog)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $blog->title }}</td>
                                        <td>{{ $blog->author }}</td>
                                        <td>
                                            <div id="sortable-images-{{ $blog->id }}" class="image-container"
                                                data-blog-id="{{ $blog->id }}">
                                                @php
                                                    $images = collect(json_decode($blog->images, true))
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
                                                        <a href="{{ asset('admin/blogImage/' . $image['path']) }}"
                                                            target="_blank">
                                                            <img src="{{ asset('admin/blogImage/' . $image['path']) }}"
                                                                alt="Image">
                                                        </a>
                                                        <form method="POST"
                                                            action="{{ route('blogs.imagedestroy', ['id' => $blog->id, 'index' => $image['index']]) }}"
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
                                            <button class="save-priority-btn btn-primary mt-2" data-blog-id="{{ $blog->id }}">Save
                                                Priority</button>
                                        </td>
                                        <td>{{ $blog->status == 1 ? 'Active' : 'Inactive' }}</td>
                                        <td>{{ $blog->priority }}</td>
                                        <td>
                                            <div class="action-buttons">
                                                <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-success">
                                                    <i class="fa fa-pencil"></i> Edit
                                                </a>
                                                <form method="POST" action="{{ route('blogs.destroy', $blog->id) }}" class="delete-form">
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
        document.addEventListener('DOMContentLoaded', function() {
            const deleteImageButtons = document.querySelectorAll('.delete-image-btn');
            deleteImageButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();  // Prevent default action (form submission)
                    const form = this.closest('form');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'You will not be able to recover this blog!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();  // Submit the form if confirmed
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
                    const blogId = this.getAttribute("data-blog-id"); // Get the blog ID
                    let imageData = [];

                    // Gather image data for this specific blog
                    document.querySelectorAll(`#sortable-images-${blogId} .priority-input`).forEach(
                        input => {
                            imageData.push({
                                index: input.dataset.index,
                                priority: input.value
                            });
                        });

                    // Send the updated priority data to the server
                    fetch("{{ route('blogs.updateImagePriority', ':id') }}".replace(':id', blogId), {
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
    </script>
@endsection
