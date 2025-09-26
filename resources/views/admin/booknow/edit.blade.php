@extends('admin.layout.app')

@section('title')
    Edit Book Now
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
                                    <h5 style="margin-left: 19px;">Edit Book Now</h5>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="{{ route('booknow.index') }}">Book Now</a></li>
                                            <li class="breadcrumb-item active">Edit Book Now</li>
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

                <form method="POST" action="{{ route('booknow.update', $booknow->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="row p-4">
                            <!-- Title -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $booknow->title) }}" placeholder="Enter Title">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Heading -->
<!--                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="heading">Heading</label>
                                    <input type="text" class="form-control" id="heading" name="heading" value="{{ old('heading', $booknow->heading) }}" placeholder="Enter Heading">
                                    @error('heading')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>-->

                            <!-- Image -->
                            <div class="col-md-6">
                                <div class="card shadow-sm p-3">
                                    <div class="form-group">
                                        <label for="image" class="fw-bold">Main Image</label>
                                        
                                        <div class="custom-file">
                                            <input type="file" name="image" class="form-control" id="image" accept="image/*">
                                        </div>
                                        
                                        <small class="text-danger d-block mt-2">
                                            Recommended size: <strong>350 × 250px</strong>
                                        </small>
                                        
                                        @error('image')
                                            <span class="text-danger d-block mt-1">{{ $message }}</span>
                                        @enderror
                            
                                        @if($booknow->image)
                                            <div class="mt-3">
                                                <label class="fw-bold d-block">Current Image</label>
                                                <img src="{{ asset('admin/booknowImages/' . $booknow->image) }}" alt="Current Image" class="border rounded shadow-sm" style="max-width: 150px;">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            

                          

                            <!-- Phone -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone', $booknow->phone) }}" placeholder="Enter Phone Number">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email-1</label>
                                    <input type="email" name="email_1" class="form-control" id="email_1" value="{{ old('email_1', $booknow->email_1) }}" placeholder="Enter Email">
                                    @error('email_1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email-2</label>
                                    <input type="email" name="email_2" class="form-control" id="email_2" value="{{ old('email_2', $booknow->email_2) }}" placeholder="Enter Email">
                                    @error('email_2')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" {{ old('status', $booknow->status) == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status', $booknow->status) == 0 ? 'selected' : '' }}>Inactive</option>
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
                                    <input type="text" name="priority" class="form-control" id="priority" value="{{ old('priority', $booknow->priority) }}" placeholder="Enter Priority">
                                    @error('priority')
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
