@extends('admin.layout.app')

@section('title')
    Add Room
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
                                    <h5 style="margin-left: 19px;">Add Room</h5>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a
                                                    href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="{{ route('rooms.index') }}">Rooms</a></li>
                                            <li class="breadcrumb-item active">Add Room</li>
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

                <form method="POST" action="{{ route('rooms.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="row p-4">
                            <!-- Room Name -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Room Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name') }}" placeholder="Enter Room Name">
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
                                        name="short_description" value="{{ old('short_description') }}"
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
                                        name="room_description_heading" value="{{ old('room_description_heading') }}"
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
                                    <textarea class="form-control" id="room_description" name="room_description" rows="3"
                                        placeholder="Enter Room Description">{{ old('room_description') }}</textarea>
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
                                        value="{{ old('amenites_heading') }}" placeholder="Enter Amenities Heading">
                                    @error('amenites_heading')
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
                                                    class="form-check-input" id="amenity_{{ $amenity->id }}">
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

                            <!-- House Rules -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="house_rule">House Rules</label>
                                    <textarea class="form-control ckeditor" id="house_rule" name="house_rule" rows="3"
                                        placeholder="Enter House Rules">{{ old('house_rule') }}</textarea>
                                    @error('house_rule')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Cancellation -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="cancellation_rule">Cancellation Policy</label>
                                    <textarea class="form-control ckeditor" id="cancellation_rule" name="cancellation_rule" rows="3"
                                        placeholder="Enter Cancellation Policy">{{ old('cancellation_rule') }}</textarea>
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

                            <!-- Best Room -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="best_room">Best Room</label>
                                    <select name="best_room" id="best_room" class="form-control">
                                        <option value="1" {{ old('best_room') == 1 ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ old('best_room') == 0 ? 'selected' : '' }}>No</option>
                                    </select>
                                    @error('best_room')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Room Images -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="images" class="col-form-label">Select Room Images</label>
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

                            <!-- Image Priority Section -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image_priorities">Image Priorities</label>
                                    <div id="image_priorities">
                                        <div class="row" id="image_priority_inputs"></div>
                                    </div>
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

    <!-- JavaScript to dynamically add priority inputs -->
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
