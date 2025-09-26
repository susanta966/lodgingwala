@extends('admin.layout.app')

@section('title')
    Room Image Edit
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
                                    <h5 style="margin-left: 19px;">Room Image Edit</h5>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a
                                                    href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="{{ route('room-images.index') }}">Room
                                                    Images</a>
                                            <li class="breadcrumb-item active">Room Image Edit</li>
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

                <form method="POST" action="{{ route('room-images.update',$list->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Use PUT method for updating the resource -->

                    <div class="card-body">
                        <div class="row p-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Room</label>
                                    <select id="frequencySelect" name="rooms_id" class="form-control choices-single">
                                        <option value="" disabled selected>Select Room</option>
                                        @foreach ($rooms as $categ)
                                            <option value="{{ $categ->id }}" {{ old('rooms_id',$list->rooms_id) == $categ->id ? 'selected' : '' }}>
                                               
                                                {{ $categ->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
        
                            <!-- Main Image -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" class="form-control" id="image"
                                        accept="image/*">
                                    <span class="text-danger">*Recommended image size: 410 × 450px</span>
                                    
                                        <a href="{{ asset('admin/roomimage/' . $list->image) }}" target="_blank"
                                            rel="noopener noreferrer">
                                            <img src="{{ asset('admin/roomimage/' . $list->image) }}"
                                                alt="Current Image" style="width:100px; margin-top: 10px;"></a>
                                
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                          
                            <!-- Priority -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="priority">Priority</label>
                                    <input type="text" name="priority" class="form-control" id="priority"
                                        value="{{ old('priority',$list->priority) }}" placeholder="Enter Priority">
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
F
