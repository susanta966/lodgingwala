@extends('admin.layout.app')

@section('maincontent')

<div class="col-12">
    <div class="card-group box-margin">
        <div class="card">
            <!-- Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 mt-3">
                                <h5 style="margin-left: 19px;">Testimonials</h5>
                            </div>
                            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item">
                                            <a href="{{ url('/admin/dashboard') }}">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('testimonials.index') }}">Testimonials</a>
                                        </li>
                                        <li class="breadcrumb-item active">Edit</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        @section('title')
                        Testimonials Edit
                        @endsection
                    </div>
                </div>
            </div>
            <!-- End Page Title -->

            @if (session('success'))
                <span class="alert alert-success">{{ session('success') }}</span>
            @endif

            <form method="POST" action="{{ route('testimonials.update', $testimonial->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row p-4">
                        <!-- Title -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="link" class="col-form-label">Link</label>
                                <input type="text" class="form-control" id="link" name="link" 
                                       value="{{ $testimonial->link }}" placeholder="Enter Link">
                                @error('link')
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

@endsection
