@extends('admin.layout.app')

@section('title')
Banquet Add
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
                                <h5 style="margin-left: 19px;">Banquet Add</h5>
                            </div>
                            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('banquets.index') }}">Banquets</a></li>
                                        <li class="breadcrumb-item active">Banquet Add</li>
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

            <form method="POST" action="{{ route('banquets.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    <div class="row p-4">
                        <!-- Title -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter Name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Person -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="person">Person</label>
                                <input type="text" class="form-control" id="person" name="person" value="{{ old('person') }}" placeholder="Enter Person">
                                @error('person')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Short Description -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="short_description">Short Description</label>
                                <textarea class="form-control ckeditor" id="short_description" name="short_description" placeholder="Enter Short Description">{{ old('short_description') }}</textarea>
                                @error('short_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Main Image -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Main Image</label>
                                <input type="file" name="image" class="form-control" id="image" accept="image/*">
                                <span class="text-danger">*Recommended image size: 410 × 450px</span>
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label for="images" class="col-form-label">Select Banquets Images</label>
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
                        <!-- Slider Images -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="image_priorities">Image Priorities</label>
                                <div id="image_priorities">
                                    <div class="row" id="image_priority_inputs"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Amenities (Checkboxes) -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="amenities">Amenities</label>
                                <div>
                                    @foreach ($amenities as $amenity)
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" name="amenities[]" value="{{ $amenity->id }}"
                                                   class="form-check-input" id="amenity_{{ $amenity->id }}">
                                            <label class="form-check-label"
                                                   for="amenity_{{ $amenity->id }}">{{ $amenity->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                @error('amenities')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                @foreach ($errors->get('amenities.*') as $messages)
                                    @foreach ($messages as $message)
                                        <span class="text-danger">{{ $message }}</span>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
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
                                <input type="text" name="priority" class="form-control" id="priority" value="{{ old('priority') }}" placeholder="Enter Priority">
                                @error('priority')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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
