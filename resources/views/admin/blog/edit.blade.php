@extends('admin.layout.app')

@section('title')
    Blog Edit
@endsection

@section('maincontent')
    <style>
        /* Image Gallery */
        .image-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        /* Image Card */
        .image-card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px;
            position: relative;
        }

        /* Image Wrapper */
        .image-wrapper {
            width: 100%;
            text-align: center;
            margin-bottom: 10px;
        }

        .image-thumbnail {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            transition: transform 0.3s ease;
        }

        .image-thumbnail:hover {
            transform: scale(1.05);
        }

        /* Priority and Delete Section */
        .image-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            margin-top: 10px;
        }

        .priority-wrapper {
            display: flex;
            align-items: center;
        }

        .priority-label {
            margin-right: 10px;
            font-size: 14px;
            color: #333;
        }

        .priority-input {
            width: 60px;
            padding: 5px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-align: center;
        }

        .delete-image-btn {
            background: #ff4d4f;
            color: white;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            font-size: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .delete-image-btn:hover {
            background: #e60000;
        }

        .delete-image-btn:focus {
            outline: none;
        }

        /* General Gallery Styles */
        .image-gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .image-card {
            position: relative;
            width: calc(33.333% - 1rem);
            /* Three images per row */
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            background-color: #f9f9f9;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .image-card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
        }

        /* Image Wrapper */
        .image-wrapper {
            position: relative;
            width: 100%;
            height: 100px;
            /* Set a fixed height for images */
            overflow: hidden;
        }

        .image-thumbnail {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: opacity 0.3s ease;
        }

        .image-card:hover .image-thumbnail {
            opacity: 0.8;
        }

        /* Image Actions */
        .image-actions {
            padding: 10px 15px;
            background-color: #fff;
            border-top: 1px solid #ddd;
        }

        .priority-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .priority-label {
            font-weight: 600;
            font-size: 14px;
        }

        .priority-input {
            width: 60px;
            padding: 5px;
            text-align: center;
            font-size: 14px;
        }

        .form-control-sm {
            padding: 0.375rem 0.75rem;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .image-card {
                width: calc(50% - 1rem);
                /* Two images per row on medium screens */
            }
        }

        @media (max-width: 576px) {
            .image-card {
                width: 100%;
                /* One image per row on small screens */
            }
        }
    </style>
    <div class="col-12">
        <div class="card-group box-margin">
            <div class="card">
                <!-- Page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 mt-3">
                                    <h5 style="margin-left: 19px;">Blog Edit</h5>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a
                                                    href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="{{ route('blogs.index') }}">Blogs</a></li>
                                            <li class="breadcrumb-item active">Blog Edit</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End page title -->

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form method="POST" action="{{ route('blogs.update', $blog->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="row p-4">
                            <!-- Blog Title -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Blog Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ old('title', $blog->title) }}" placeholder="Enter Title">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Short Description -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="short_description">Short Description</label>
                                    <input type="text" class="form-control" id="short_description"
                                        name="short_description"
                                        value="{{ old('short_description', $blog->short_description) }}"
                                        placeholder="Enter Short Description">
                                    @error('short_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Blog Description -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control ckeditor" id="description" name="description" rows="4"
                                        placeholder="Enter Description">{{ old('description', $blog->description) }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Author Name -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="author">Author</label>
                                    <input type="text" class="form-control" id="author" name="author"
                                        value="{{ old('author', $blog->author) }}" placeholder="Enter Author Name">
                                    @error('author')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Author Image -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="author_image">Author Image</label>
                                    <input type="file" name="author_image" class="form-control" id="author_image"
                                        accept="image/*">
                                    <small class="form-text text-muted">Recommended image size: 350 × 250px</small>
                                    @if ($blog->author_image)
                                        <div class="mt-2">
                                            <a href="{{ asset('admin/blogImage/' . $blog->author_image) }}" target="_blank"
                                                rel="noopener noreferrer">
                                                <img src="{{ asset('admin/blogImage/' . $blog->author_image) }}"
                                                    alt="Current Image" style="width: 100px;">
                                            </a>
                                        </div>
                                    @endif
                                    @error('author_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Blog Images -->

                            <!-- Publish Date -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="publish_date">Publish Date</label>
                                    <input type="date" name="publish_date" class="form-control" id="publish_date"
                                        value="{{ old('publish_date', $blog->publish_date) }}">
                                    @error('publish_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" {{ old('status', $blog->status) == 1 ? 'selected' : '' }}>
                                            Active</option>
                                        <option value="0" {{ old('status', $blog->status) == 0 ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Priority -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="priority">Priority</label>
                                    <input type="number" name="priority" class="form-control" id="priority"
                                        value="{{ old('priority', $blog->priority) }}" placeholder="Enter Priority">
                                    @error('priority')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="images">Select Blog Images</label>
                                    <input type="file" name="images[]" class="form-control" id="images"
                                        accept="image/*" multiple>
                                    <small class="form-text text-muted">Recommended image size: 750 × 450px</small>

                                    @if (!empty($blog->images) && is_array(json_decode($blog->images, true)))
                                        <div class="image-gallery">
                                            @foreach (json_decode($blog->images, true) as $index => $image)
                                                <div class="image-card" data-image-index="{{ $index }}">
                                                    <div class="image-wrapper">
                                                        <a href="{{ asset('admin/blogImage/' . $image['path']) }}"
                                                            target="_blank" class="image-link">
                                                            <img src="{{ asset('admin/blogImage/' . $image['path']) }}"
                                                                alt="Room Image" class="image-thumbnail">
                                                        </a>
                                                    </div>

                                                    <div class="image-actions">
                                                        <div class="priority-wrapper">
                                                            <label for="priority-{{ $index }}"
                                                                class="priority-label">Priority:</label>
                                                            <input type="number" id="priority-{{ $index }}"
                                                                name="image_priorities[{{ $index }}]"
                                                                value="{{ old('image_priorities.' . $index, $image['priority']) }}"
                                                                min="0" class="priority-input">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif

                                    @error('images')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                         



                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-end mb-5">
                            <button type="submit" class="btn btn-primary rounded text-capitalize">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- <script>
        document.querySelectorAll('.delete-image-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                // Prevent the delete button from submitting the form immediately
                e.preventDefault();

                // Show confirmation prompt
                if (confirm('Are you sure you want to delete this image?')) {
                    // If confirmed, submit the associated delete form
                    const form = this.closest('form');
                    form.submit();
                }
            });
        });
    </script> --}}
@endsection
