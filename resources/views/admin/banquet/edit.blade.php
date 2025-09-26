@extends('admin.layout.app')

@section('title')
    Edit Banquet
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
                                    <h5 style="margin-left: 19px;">Edit Banquet</h5>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a
                                                    href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="{{ route('banquets.index') }}">Banquets</a>
                                            </li>
                                            <li class="breadcrumb-item active">Edit Banquet</li>
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

                <form method="POST" action="{{ route('banquets.update', $banquet->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="row p-4">
                            <!-- Name -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name', $banquet->name) }}" placeholder="Enter Name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="short_description">Short Description</label>
                                    <textarea class="form-control ckeditor" id="short_description" name="short_description" placeholder="Enter Short Description">{{ old('short_description', $banquet->short_description) }}</textarea>
                                    @error('short_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            

                            <!-- Person -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="person">Person</label>
                                    <input type="text" class="form-control" id="person" name="person"
                                        value="{{ old('person', $banquet->person) }}" placeholder="Enter Person">
                                    @error('person')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Image (Main Image) -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" class="form-control" id="image"
                                        accept="image/*">
                                    <p>Current Image: <img src="{{ asset('admin/banquetImages/' . $banquet->image) }}"
                                            width="100" alt="Banquet Image"></p>
                                    <span class="text-danger">*Recommended image size: 410 × 450px</span>
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
                                                    class="form-check-input" id="amenity_{{ $amenity->id }}"
                                                    {{ in_array($amenity->id, $roomAmenities) ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="amenity_{{ $amenity->id }}">{{ $amenity->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('amenities')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Status -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1"
                                            {{ old('status', $banquet->status) == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0"
                                            {{ old('status', $banquet->status) == 0 ? 'selected' : '' }}>Inactive</option>
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
                                        value="{{ old('priority', $banquet->priority) }}" placeholder="Enter Priority">
                                    @error('priority')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="images">Slider Images</label>
                                    <input type="file" class="form-control" id="images" name="images[]"
                                        accept="image/*" multiple>
                                    <span class="text-danger">*Recommended image size: 750 × 450px</span>
                                    @if ($banquet->images)
                                        <div class="mt-2">
                                            @foreach (json_decode($banquet->images) as $image)
                                                <img src="{{ asset('admin/banquetImages/' . $image) }}" alt="Room Image"
                                                    style="max-width: 100px;">
                                            @endforeach
                                        </div>
                                    @endif
                                    @error('images')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="images">Select Banquet Images</label>
                                    <input type="file" name="images[]" class="form-control" id="images"
                                        accept="image/*" multiple>
                                    <small class="form-text text-muted">Recommended image size: 750 × 450px</small>

                               @if (!empty($banquet->images) && is_array(json_decode($banquet->images, true)))
                                        <div class="image-gallery">
                                            @foreach (json_decode($banquet->images, true) as $index => $image)
                                                <div class="image-card" data-image-index="{{ $index }}">
                                                    <div class="image-wrapper">
                                                        <a href="{{ asset('admin/banquetImages/' . $image['path']) }}"
                                                            target="_blank" class="image-link">
                                                            <img src="{{ asset('admin/banquetImages/' . $image['path']) }}"
                                                                alt="Room Image" class="image-thumbnail">
                                                        </a>
                                                    </div>

                                                    <div class="image-actions">
                                                        <div class="priority-wrapper">
                                                            <label for="priority-{{ $index }}"
                                                                class="priority-label">Priority:</label>
                                                            <input type="number" id="priority-{{ $index }}"
                                                                name="image_priorities[{{ $index }}]"
                                                                value="{{ $image['priority'] }}" min="0"
                                                                class="priority-input">
                                                        </div>

                                                        <!-- Delete Image Button -->
                                                        {{-- <form method="POST" action="{{ route('rooms.imagedestroy', ['id' => $room->id, 'index' => $index]) }}" class="delete-image-form" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="delete-image-btn">×</button>
                                                        </form> --}}
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

                        <div class="d-flex align-items-right gap-5 flex-wrap ml-4 mb-5">
                            <button type="submit" class="btn btn-primary rounded text-capitalize">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
