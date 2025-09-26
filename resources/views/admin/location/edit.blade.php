@extends('admin.layout.app')

@section('title')
    Edit Location
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
                                    <h5 style="margin-left: 19px;">Edit Location</h5>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="{{ route('locations.index') }}">Locations</a></li>
                                            <li class="breadcrumb-item active">Edit Location</li>
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

                <form method="POST" action="{{ route('locations.update', $location->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="row p-4">
                            <!-- Location Name -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Location Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $location->name) }}" placeholder="Enter Location Name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Distance -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="distance">Distance</label>
                                    <input type="text" class="form-control" id="distance" name="distance" value="{{ old('distance', $location->distance) }}" placeholder="Enter Distance">
                                    @error('distance')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Time -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="time">Time</label>
                                    <input type="text" class="form-control" id="time" name="time" value="{{ old('time', $location->time) }}" placeholder="Enter Time">
                                    @error('time')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Image -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Select Image</label>
                                    <input type="file" name="image" class="form-control" id="image" accept="image/*">
                                     <span class="text-danger">*Recommended image size: 50 × 50px</span>
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    @if($location->image)
                                        <img src="{{ asset('admin/locationImage/' . $location->image) }}" alt="Current Image" class="mt-2" style="max-width: 150px;">
                                    @endif
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
