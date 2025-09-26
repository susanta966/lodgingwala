@extends('admin.layout.app')

@section('title')
    Edit Room
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
                                    <h5 style="margin-left: 19px;">Edit Room</h5>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a
                                                    href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="{{ route('rooms.index') }}">Rooms</a></li>
                                            <li class="breadcrumb-item active">Edit Room</li>
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

                <form method="POST" action="{{ route('rooms.update', $room->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="row p-4">
                            <!-- Name -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Room Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name', $room->name) }}" placeholder="Enter Room Name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Area -->
                         

                            <!-- Short Description -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="short_description">Short Description</label>
                                    <input type="text" class="form-control" id="short_description"
                                        name="short_description"
                                        value="{{ old('short_description', $room->short_description) }}"
                                        placeholder="Enter Short Description">
                                    @error('short_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Room Description Heading -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="room_description_heading">Room Description Heading</label>
                                    <input type="text" class="form-control" id="room_description_heading"
                                        name="room_description_heading"
                                        value="{{ old('room_description_heading', $room->room_description_heading) }}"
                                        placeholder="Enter Room Description Heading">
                                    @error('room_description_heading')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Room Description -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="room_description">Room Description</label>
                                    <textarea class="form-control" id="room_description" name="room_description" rows="4">{{ old('room_description', $room->room_description) }}</textarea>
                                    @error('room_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Amenities Heading -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amenites_heading">Amenities Heading</label>
                                    <input type="text" class="form-control" id="amenites_heading" name="amenites_heading"
                                        value="{{ old('amenites_heading', $room->amenites_heading) }}"
                                        placeholder="Enter Amenities Heading">
                                    @error('amenites_heading')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

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

                            <!-- House Rule -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="house_rule">House Rule</label>
                                    <textarea class="form-control ckeditor" id="house_rule" name="house_rule" rows="4">{{ old('house_rule', $room->house_rule) }}</textarea>
                                    @error('house_rule')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Cancellation Rule -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="cancellation_rule">Cancellation Rule</label>
                                    <textarea class="form-control ckeditor" id="cancellation_rule" name="cancellation_rule" rows="4">{{ old('cancellation_rule', $room->cancellation_rule) }}</textarea>
                                    @error('cancellation_rule')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Status -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" {{ $room->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $room->status == 0 ? 'selected' : '' }}>Inactive
                                        </option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="priority">Priority</label>
                                    <input type="text" name="priority" class="form-control" id="priority"
                                        value="{{ old('priority', $room->priority) }}" placeholder="Enter Priority">
                                    @error('priority')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Best Room -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="best_room">Best Room</label>
                                    <select name="best_room" id="best_room" class="form-control">
                                        <option value="1" {{ $room->best_room == 1 ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ $room->best_room == 0 ? 'selected' : '' }}>No</option>
                                    </select>
                                    @error('best_room')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="images">Select Room Images</label>
                                    <input type="file" name="images[]" class="form-control" id="images" accept="image/*" multiple>
                                    <small class="form-text text-muted">Recommended image size: 750 × 450px</small>
                            
                                    @if (!empty($room->images) && is_array(json_decode($room->images, true)))
                                        <div class="image-gallery">
                                            @foreach (json_decode($room->images, true) as $index => $image)
                                                <div class="image-card" data-image-index="{{ $index }}">
                                                    <div class="image-wrapper">
                                                        <a href="{{ asset('admin/roomImages/' . $image['path']) }}" target="_blank" class="image-link">
                                                            <img src="{{ asset('admin/roomImages/' . $image['path']) }}" alt="Room Image" class="image-thumbnail">
                                                        </a>
                                                    </div>
                            
                                                    <div class="image-actions">
                                                        <div class="priority-wrapper">
                                                            <label for="priority-{{ $index }}" class="priority-label">Priority:</label>
                                                            <input type="number" id="priority-{{ $index }}" name="image_priorities[{{ $index }}]"
                                                                   value="{{ old('image_priorities.' . $index, $image['priority']) }}" min="0" class="priority-input">
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
                            
                            <style>
                                /* Image Gallery */
                                .image-gallery {
                                    display: grid;
                                    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                                    gap: 15px;
                                    margin-top: 20px;
                                }
                            
                                /* Image Card */
                                .image-card {
                                    background: #fff;
                                    border: 1px solid #e0e0e0;
                                    border-radius: 12px;
                                    overflow: hidden;
                                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                                    display: flex;
                                    flex-direction: column;
                                    align-items: center;
                                    padding: 10px;
                                    width: 150px;
                                    position: relative;
                                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                                    text-align: center;
                                }
                            
                                /* Image Wrapper */
                                .image-wrapper {
                                    width: 100%;
                                    text-align: center;
                                    margin-bottom: 10px;
                                    position: relative;
                                }
                            
                                .image-thumbnail {
                                    width: 20px; /* Fixed image size */
                                    height: 20px; /* Fixed image size */
                                    border-radius: 8px;
                                    transition: transform 0.3s ease, opacity 0.3s ease;
                                }
                            
                                /* Hover effect for image */
                                .image-thumbnail:hover {
                                    transform: scale(1.05);
                                    opacity: 0.85;
                                }
                            
                                /* Image Actions */
                                .image-actions {
                                    display: flex;
                                    justify-content: center;
                                    width: 100%;
                                    margin-top: 10px;
                                    align-items: center;
                                }
                            
                                /* Priority Section */
                                .priority-wrapper {
                                    display: flex;
                                    align-items: center;
                                    justify-content: center; /* Center the priority input */
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
                            
                                /* General Styles for Mobile Responsiveness */
                                @media (max-width: 768px) {
                                    .image-card {
                                        width: calc(50% - 1rem); /* Two images per row on medium screens */
                                    }
                                }
                            
                                @media (max-width: 576px) {
                                    .image-card {
                                        width: 100%; /* One image per row on small screens */
                                    }
                                }
                            </style>
                            


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
