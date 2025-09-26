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
                                    <h5 style="margin-left: 19px;">Pop up</h5>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item">
                                                <a href="{{ url('/admin/dashboard') }}">Dashboard</a>
                                            </li>
                                            <li class="breadcrumb-item active">Pop up</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        @section('title', 'Pop up')
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
                                <th>Pop up Heading</th>
                                <th>Pop up Heading Word</th>
                                <th>Pop up Heading Word 2</th>

                                <th>Pop up Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($popup as $home)
                                <tr>
                                    <td>{{ $home->modal_heading }}</td>
                                    <td>{{ $home->modal_heading_word }}</td>
                                    <td>{{ $home->modal_heading_word_2 }}</td>

                                    <td>
                                        <img src="{{ asset('admin/homeImage/' . $home->modal_image) }}"
                                            alt="Modal Image" width="80" height="80">
                                    </td>
                                    <td>{{ $home->popup == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <a href="{{ route('admin.popup.edit', $home->id) }}"
                                            class="btn btn-success btn-sm">
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
