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
                                <h5 style="margin-left: 19px;">About</h5>
                            </div>
                            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item">
                                            <a href="{{ url('/admin/dashboard') }}">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('abouts.index') }}">About</a>
                                        </li>
                                        <li class="breadcrumb-item active">Edit</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        @section('title')
                            About Edit
                        @endsection
                    </div>
                </div>
            </div>
            <!-- End Page Title -->

            @if (session('success'))
                <span class="alert alert-success">{{ session('success') }}</span>
            @endif

            <form method="POST" action="{{ route('abouts.update', $about->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row p-4">
                        <!-- Title -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title" class="col-form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" 
                                       value="{{ $about->title }}" placeholder="Enter Title">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Heading -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="heading" class="col-form-label">Heading</label>
                                <input type="text" name="heading" value="{{ $about->heading }}" 
                                       class="form-control" placeholder="Enter Heading">
                                @error('heading')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="one_word" class="col-form-label">One Word</label>
                                <input type="text" name="one_word" value="{{ $about->one_word }}" 
                                       class="form-control" placeholder="Enter One Word">
                                @error('one_word')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description" class="col-form-label">Description</label>
                                <textarea class="form-control ckeditor" id="description" name="description" 
                                          rows="4" placeholder="Enter Description">{{ $about->description }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Image -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image" class="col-form-label">Image</label>
                                <input type="file" name="image" class="form-control">
                              <span class="text-danger">*Recommended image size: 676 × 500px</span>
                                @if ($about->image)
                                    <a href="{{ asset('admin/aboutImages/' . $about->image) }}" target="_blank" rel="noopener noreferrer">
                                        <img src="{{ asset('admin/aboutImages/' . $about->image) }}" 
                                             alt="Image" style="width: 60px; height: 60px;">
                                    </a>
                                @endif
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Year of Experience -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="year_of_exprience" class="col-form-label">Year of Experience</label>
                                <input type="text" name="year_of_exprience" 
                                       value="{{ $about->year_of_exprience }}" 
                                       class="form-control" placeholder="Enter Year of Experience">
                                @error('year_of_exprience')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Year of Experience Title -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="year_of_exprience_title" class="col-form-label">Experience Title</label>
                                <input type="text" name="year_of_exprience_title" 
                                       value="{{ $about->year_of_exprience_title }}" 
                                       class="form-control" placeholder="Enter Experience Title">
                                @error('year_of_exprience_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Testimonials Section -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="testimonials_word" class="col-form-label">Testimonials Word</label>
                                <input type="text" name="testimonials_word" 
                                       value="{{ $about->testimonials_word }}" 
                                       class="form-control" placeholder="Enter Testimonials Word">
                                @error('testimonials_word')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="testimonials_heading" class="col-form-label">Testimonials Heading</label>
                                <input type="text" name="testimonials_heading" 
                                       value="{{ $about->testimonials_heading }}" 
                                       class="form-control" placeholder="Enter Testimonials Heading">
                                @error('testimonials_heading')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="testimonials_short_description" class="col-form-label">Testimonials Short Description</label>
                                <input type="text" name="testimonials_short_description" 
                                       value="{{ $about->testimonials_short_description }}" 
                                       class="form-control" placeholder="Enter Short Description">
                                @error('testimonials_short_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Facilities Section -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="facilties_word" class="col-form-label">Facilities Word</label>
                                <input type="text" name="facilties_word" 
                                       value="{{ $about->facilties_word }}" 
                                       class="form-control" placeholder="Enter Facilities Word">
                                @error('facilties_word')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="facilties_heading" class="col-form-label">Facilities Heading</label>
                                <input type="text" name="facilties_heading" 
                                       value="{{ $about->facilties_heading }}" 
                                       class="form-control" placeholder="Enter Facilities Heading">
                                @error('facilties_heading')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="facilties_short_description" class="col-form-label">Facilities Short Description</label>
                                <input type="text" name="facilties_short_description" 
                                       value="{{ $about->facilties_short_description }}" 
                                       class="form-control" placeholder="Enter Short Description">
                                @error('facilties_short_description')
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
