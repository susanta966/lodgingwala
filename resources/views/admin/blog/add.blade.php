@extends('admin.layout.app')

@section('title')
    Blog Add
@endsection

@section('maincontent')
    <div class="col-12">
        <div class="card-group box-margin">
            <div class="card">
                <!-- Page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 mt-3">
                                    <h5 style="margin-left: 19px;">Blog Add</h5>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a
                                                    href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="{{ route('blogs.index') }}">Blogs</a></li>
                                            <li class="breadcrumb-item active">Blog Add</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End page title -->

                @if (session('success'))
                    <span class="alert alert-success">{{ session('success') }}</span>
                @endif

                <form method="POST" action="{{ route('blogs.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="row p-4">
                            <!-- Blog Title -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Blog Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ old('title') }}" placeholder="Enter Title">
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
                                        name="short_description" value="{{ old('short_description') }}"
                                        placeholder="Enter Short Description ">
                                    @error('short_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control ckeditor" id="description" name="description" rows="4"
                                        placeholder="Enter Description">{{ old('description') }}</textarea>
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
                                        value="{{ old('author') }}" placeholder="Enter Author Name">
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
                                    <span class="text-danger">*Recommended image size: 350 × 250px</span>
                                    @error('author_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Blog Images -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="images" class="col-form-label">Select Blog Images</label>
                                    <input type="file" name="images[]" class="form-control" id="images"
                                        accept="image/*" multiple>
                                    <span class="text-danger">*Recommended image size: 750 × 450px</span>
                                    @error('images')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    @foreach ($errors->get('images.*') as $messages)
                                        @foreach ($messages as $message)
                                            <span class="text-danger">{{ $message }}</span>
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>

                            <!-- Publish Date -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="publish_date">Publish Date</label>
                                    <input type="date" name="publish_date" class="form-control" id="publish_date"
                                        value="{{ old('publish_date') }}">
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
                                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive
                                        </option>
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
                                    <input type="text" name="priority" class="form-control" id="priority"
                                        value="{{ old('priority') }}" placeholder="Enter Priority">
                                    @error('priority')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Image Priority Section -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="image_priorities">Image Priorities</label>
                                <div id="image_priorities">
                                    <div class="row" id="image_priority_inputs"></div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-right gap-5 flex-wrap ml-4 mb-5">
                            <button type="submit" class="btn btn-primary rounded text-capitalize">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Handling multiple image uploads with priority fields dynamically
        document.getElementById("images").addEventListener("change", function() {
            var input = this;
            var container = document.getElementById("image_priority_inputs");
            container.innerHTML = ''; // Clear any existing inputs

            Array.from(input.files).forEach((file, index) => {
                var div = document.createElement('div');
                div.classList.add('col-md-3');
                div.classList.add('mb-3');

                var inputElement = document.createElement('input');
                inputElement.type = 'number';
                inputElement.name = `image_priorities[${index}]`;
                inputElement.classList.add('form-control');
                inputElement.placeholder = `Priority for ${file.name}`;
                div.appendChild(inputElement);

                container.appendChild(div);
            });
        });
    </script>
@endsection
