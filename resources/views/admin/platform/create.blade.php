@extends('admin.layout.app')

@section('title')
Add Platform
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
                                <h5 style="margin-left: 19px;">Add Platform</h5>
                            </div>
                            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('platform.index') }}">Platforms</a></li>
                                        <li class="breadcrumb-item active">Add Platform</li>
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

            <form method="POST" action="{{ route('platform.store') }}" enctype="multipart/form-data">
                @csrf
               

                <div class="card-body">
                    <div class="row p-4">
                       <div class="col-md-6">
    <div class="form-group">
        <label for="link">Select Booknow</label>
        <select name="booknow" id="booknow" class="form-control">
            <option value="">Select</option>
            @foreach($booknow as $data)
                <option value="{{ $data->id }}">{{ $data->title }}</option>
            @endforeach
        </select>
        @error('booknow')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>

                        <!-- Platform Link -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="link">Platform Link</label>
                                <input type="text" class="form-control" id="link" name="link"
                                       value="{{ old('link') }}" placeholder="Enter platform link">
                                @error('link')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Image -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Platform Image</label>
                                <input type="file" name="image" class="form-control" id="image" accept="image/*">
                                 <span class="text-danger">*Recommended image size: 40 × 40px</span>
                                @error('image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>

                    </div>
                </div>

                <div class="d-flex justify-content-end mb-4 mr-4">
                    <button type="submit" class="btn btn-primary rounded text-capitalize">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
