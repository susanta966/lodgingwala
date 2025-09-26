@extends('admin.layout.app')

@section('title')
Amenities Edit
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
                                    <h5 style="margin-left: 19px;">Amenities Edit</h5>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="{{ route('amenities.index') }}">Amenities</a></li>
                                            <li class="breadcrumb-item active">Amenities Edit</li>
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

                <form method="POST" action="{{ route('amenities.update', ['amenity'=>$amenitie->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="row p-4">
                            <!-- Name -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $amenitie->name) }}" placeholder="Enter Name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Short Description -->
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label for="icon">Icon</label>
                                    <input type="file" name="icon" class="form-control" id="icon" accept="image/*">
                                    <p>Current Image: <img src="{{ asset('admin/amenityImage/' . $amenitie->icon) }}" width="100" alt="Aminity Image"></p>
                                     <span class="text-danger">*Recommended image size: 30 × 30px</span>
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                          
                            <!-- Status -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" {{ old('status', $amenitie->status) == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status', $amenitie->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
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
