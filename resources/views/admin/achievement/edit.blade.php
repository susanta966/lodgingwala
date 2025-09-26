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
                                <h5 style="margin-left: 19px;">Achievement</h5>
                            </div>
                            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item">
                                            <a href="{{ url('/admin/dashboard') }}">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item active">
                                            <a href="{{ route('achievements.index') }}">Achievement</a>
                                        </li>
                                        <li class="breadcrumb-item active">Achievement Edit</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        @section('title')
                        Achievement Edit
                        @endsection
                    </div>
                </div>
            </div>
            <!-- end page title -->
            @if (session('success'))
                <span class="alert alert-success">{{ session('success') }}</span>
            @endif
            <form method="POST" action="{{ route('achievements.update', $achievement->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row p-4">
                        <!-- Service Title -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="completed_projects" class="col-form-label">Completed Projects</label>
                                <input type="text" name="completed_projects" value="{{ $achievement->completed_projects }}" class="form-control" placeholder="Enter Completed Projects">
                                @error('completed_projects')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                         <div class="col-6">
                            <div class="form-group">
                                <label for="completed_projects_sign" class="col-form-label">Completed Projects Sign</label>
                                <input type="text" name="completed_projects_sign" value="{{ $achievement->completed_projects_sign }}" class="form-control" placeholder="Enter Completed Projects">
                                @error('completed_projects_sign')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Blog Title -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="satisfied_customers" class="col-form-label">Satisfied Customers</label>
                                <input type="text" name="satisfied_customers" value="{{ $achievement->satisfied_customers }}" class="form-control" placeholder="Enter Happy Clients">
                                @error('satisfied_customers')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                         <div class="col-6">
                            <div class="form-group">
                                <label for="satisfied_customers_sign" class="col-form-label">Satisfied Customers Sign</label>
                                <input type="text" name="satisfied_customers_sign" value="{{ $achievement->satisfied_customers_sign }}" class="form-control" placeholder="Enter Happy Clients">
                                @error('satisfied_customers_sign')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Contact Title -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="team_members" class="col-form-label">Team Members</label>
                                <input type="text" name="team_members" value="{{ $achievement->team_members }}" class="form-control" placeholder="Enter Expert Team">
                                @error('team_members')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                          <div class="col-6">
                            <div class="form-group">
                                <label for="team_members_sign" class="col-form-label">Team Members Sign</label>
                                <input type="text" name="team_members_sign" value="{{ $achievement->team_members_sign }}" class="form-control" placeholder="Enter Expert Team">
                                @error('team_members_sign')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                          <!-- Contact Title -->
                          <div class="col-6">
                            <div class="form-group">
                                <label for="awards_won" class="col-form-label">Awards Won</label>
                                <input type="text" name="awards_won" value="{{ $achievement->awards_won }}" class="form-control" placeholder="Enter Awards Won">
                                @error('awards_won')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                           <div class="col-6">
                            <div class="form-group">
                                <label for="awards_won_sign" class="col-form-label">Awards Won Sign</label>
                                <input type="text" name="awards_won_sign" value="{{ $achievement->awards_won_sign }}" class="form-control" placeholder="Enter Awards Won">
                                @error('awards_won_sign')
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
