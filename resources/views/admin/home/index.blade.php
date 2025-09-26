@extends('admin.layout.app')

@section('maincontent')
    <div class="col-12">
        <div class="card-group box-margin">
            <div class="card">
                <!-- Start Page Title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 mt-3">
                                    <h5 style="margin-left: 19px;">Home</h5>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item">
                                                <a href="{{ url('/admin/dashboard') }}">Dashboard</a>
                                            </li>
                                            <li class="breadcrumb-item active">Home</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            @section('title', 'Home')
                        </div>
                    </div>
                </div>
                <!-- End Page Title -->

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert bg-success text-white">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                            <span class="font-weight-bold h5">{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped iq-table1" data-toggle="data-table">
                            <thead>
                                <tr>
                                  
                                    <th>Best Room One Word</th>
                                    <th>Best Room Heading</th>
                                    <th>Best Room Title</th>
                                    <th>Banquet One Word</th>
                                    <th>Banquet Heading</th>
                                    <th>Banquet Title</th>
                                    <th>Faciltie One Word</th>
                                    <th>Faciltie Heading</th>
                                    <th>Faciltie Title</th>
                                    <th>Testimonial One Word</th>
                                    <th>Testimonial Heading</th>
                                    <th>Testimonial Title</th>
                                    <th>Location One Word</th>
                                    <th>Location Heading</th>
                                    <th>Location Title</th>
                                    <th>Blog One Word</th>
                                    <th>Blog Heading</th>
                                    <th>Blog Title</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($home as $home)
                                    <tr>
                                       
                                        <td>{{ $home->best_room_one_word }}</td>
                                        <td>{{ $home->best_room_heading }}</td>
                                        <td>{{ $home->best_room_title }}</td>
                                        <td>{{ $home->banquet_one_word }}</td>
                                        <td>{{ $home->banquet_heading }}</td>
                                        <td>{{ $home->banquet_title }}</td>
                                        <td>{{ $home->faciltie_one_word }}</td>
                                        <td>{{ $home->faciltie_heading }}</td>
                                        <td>{{ $home->faciltie_title }}</td>
                                        <td>{{ $home->testimonial_one_word }}</td>
                                        <td>{{ $home->testimonial_heading }}</td>
                                        <td>{{ $home->testimonial_title }}</td>
                                        <td>{{ $home->location_one_word }}</td>
                                        <td>{{ $home->location_heading }}</td>
                                        <td>{{ $home->location_title }}</td>
                                        <td>{{ $home->blog_one_word }}</td>
                                        <td>{{ $home->blog_heading }}</td>
                                        <td>{{ $home->blog_title }}</td>
                                        <td>{{ $home->created_at }}</td>
                                        <td>{{ $home->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('home.edit', $home->id) }}" class="btn btn-success btn-sm">
                                                <i class="fa fa-pencil mr-2"></i>Edit
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
