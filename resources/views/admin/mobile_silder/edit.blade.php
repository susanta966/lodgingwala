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
                                    <h5 style="margin-left: 19px;">Slider Edit</h5>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a
                                                    href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                            <li class="breadcrumb-item active"><a
                                                    href="{{ route('mobile-slider.index') }}">Sliders</a></li>
                                            <li class="breadcrumb-item active">Slider Edit</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        @section('title')
                            Slider Edit
                        @endsection
                    </div>
                </div>
            </div>
            <!-- end page title -->

            @if (session('success'))
                <span class="alert alert-success">{{ session('success') }}</span>
            @endif

            <form method="POST" action="{{ route('mobile-slider.update',$slider->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="row p-4">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="title" class="col-form-label">Title</label>
                                <input type="text" name="title" value="{{ $slider->title }}" class="form-control"
                                    placeholder="Enter Title" id="title">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="heading" class="col-form-label">Heading</label>
                                <input type="text" name="heading" value="{{ $slider->heading }}" class="form-control"
                                    placeholder="Enter Heading" id="heading">
                                @error('heading')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>



                        <div class="col-6">
                            <div class="form-group">
                                <label for="image" class="col-form-label">Image</label>
                                <input type="file" name="image" class="form-control" id="image"><a
                                    href="{{ asset('admin/mobilesilder/' . $slider->image) }}" target="_blank"
                                    rel="noopener noreferrer">
                                    <span class="text-danger">*Recommended image size: !600 × 700px</span>
                                    <img src="{{ asset('admin/mobilesilder/' . $slider->image) }}" alt=""
                                        style="width:60px;height:60px;"></a>
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-6">
                            <div class="form-group">
                                <label for="status" class="col-form-label">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" @if ($slider->status == 1) selected @endif>Active
                                    </option>
                                    <option value="0" @if ($slider->status == 0) selected @endif>Inactive
                                    </option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="priority" class="col-form-label">Priority</label>
                                <input type="text" name="priority" value="{{ $slider->priority }}"
                                    class="form-control" placeholder="Enter Priority" id="priority">
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
