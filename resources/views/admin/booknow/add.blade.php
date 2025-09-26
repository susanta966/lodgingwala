
@extends('admin.layout.app')

@section('title')
Book Now Add
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
                                <h5 class="m-0">Book Now Add</h5>
                            </div>
                            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12 text-end">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('booknow.index') }}">Book Now</a></li>
                                        <li class="breadcrumb-item active">Book Now Add</li>
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

            <form method="POST" action="{{ route('booknow.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    <div class="row p-4">
                        <!-- Title -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Enter Title">
                                @error('title')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Heading -->
                        <!--                        <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="heading">Heading</label>
                                                        <input type="text" class="form-control" id="heading" name="heading" value="{{ old('heading') }}" placeholder="Enter Heading">
                                                        @error('heading')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>-->

                        <!-- Main Image -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Main Image</label>
                                <input type="file" name="image" class="form-control" id="image" accept="image/*">
                                <small class="text-danger d-block mt-2">
                                    Recommended size: <strong>350 × 250px</strong>
                                </small>

                                @error('image')
                                <span class="text-danger d-block mt-1">{{ $message }}</span>
                                @enderror                            
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone') }}" placeholder="Enter Phone Number">
                                @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email-1</label>
                                <input type="email" name="email_1" class="form-control" id="email_1" value="{{ old('email_1') }}" placeholder="Enter Email">
                                @error('email_1')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email-2</label>
                                <input type="email" name="email_2" class="form-control" id="email_2" value="{{ old('email_2') }}" placeholder="Enter Email">
                                @error('email_1')
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


                        <!-- Submit Button -->
                        <div class="col-12 mt-4 text-end">
                            <button type="submit" class="btn btn-primary rounded text-capitalize">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
