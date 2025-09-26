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
                                    <h5 style="margin-left: 19px;">Achievements</h5>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Achievements</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            @section('title')
                                Achievements
                            @endsection
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert bg-success text-white">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                               <span class="font-weight-bold h5">{{ $message }}</span>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped iq-table1" data-toggle="data-table">
                            <thead>
                                <tr>
                                   
                                    
                                    
                                    <th>Completed Projects</th>
                                    <th>Satisfied Customers</th>
                                    <th>Team Members</th>
                                    <th>Awards Won</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($achievements as $data)
                                    <tr>
                                        <td>{{ $data->completed_projects }}</td>
                                        <td>{{ $data->satisfied_customers }}</td>
                                        <td>{{ $data->team_members }}</td>
                                        <td>{{ $data->awards_won }}</td>
                                        <td><a  class="btn btn-success btn-sm" href="{{ route('achievements.edit', $data->id) }}"><i class="fa fa-pencil mr-2">Edit</a></td>
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


