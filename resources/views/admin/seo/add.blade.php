@extends('admin.layout.app')

@section('maincontent')
    <div class="col-12">
        <div class="card-group box-margin">
            <div class="card">
                  <!-- start page title -->
                  <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 mt-3">
                                    <h5 style="margin-left: 19px;">Seo Add</h5>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"  style="margin-left: -19px;">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                            <li class="breadcrumb-item active"><a href="{{ route('admin.seo.index') }}">Seo</a></li>
                                            <li class="breadcrumb-item active">Seo Add</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            @section('title')
                            Seo Add
                            @endsection
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                    @if (session('success'))
                        <span class="alert alert-success">{{ session('success') }}</span>
                    @endif
                    <form method="POST" action="{{ route('admin.seo.store' }}"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="card-body  ">
                            <div class="row p-4">
                               <div class="col-6">

                                    <div class="form-group">
                                        <label for="customFile1" class="col-form-label">Page Name</label>
                                        <input type="text" name="page_name"
                                            value="{{old('page_name') }}"class="form-control"
                                            placeholder="Enter page name">
                                        @error('page_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">

                                    <div class="form-group">
                                        <label for="customFile1" class="col-form-label">Meta Title</label>
                                        <input type="text" name="meta_title"
                                            value="{{ old('meta_title') }}"class="form-control"
                                            placeholder="Enter Meta Title">
                                        @error('meta_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="meta_keywords" class="col-form-label">Meta Keywords</label>
                                        <textarea id="meta_keywords" name="meta_keywords" class="form-control" placeholder="Enter Meta Keywords"></textarea>
                                        <span class="badge badge-danger">Please click enter tab for new keywords</span>
                                        @error('meta_keywords')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="meta_description" class="col-form-label">Meta Description</label>
                                        <textarea name="meta_description" class="form-control " placeholder="Enter Meta Description">{{ old('meta_description') }}</textarea>
                                        @error('meta_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Breadcrumb Image</label>
                                    <input type="file" name="image" class="form-control" id="image" accept="image/*">
                                     <span class="text-danger">*Recommended image size: 1920 × 450px</span>
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    
                                </div>
                            </div>
                               
                            </div>
                            <div class="d-flex align-items-right gap-5 flex-wrap ml-4 mb-5">
                                <button type="submit" class="btn btn-primary rounded text-capitalize">Submit</button>
                                {{-- <button type="submit" class="btn btn-danger rounded text-capitalize">cancel</button> --}}
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>



    </div>
    </div>
    </div>
  
@endsection
