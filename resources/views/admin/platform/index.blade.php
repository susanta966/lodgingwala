@extends('admin.layout.app')
@section('title')
    Platforms
@endsection

@section('maincontent')
<style>
    .image-container {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }

    .image-card {
        position: relative;
        width: 80px;
        text-align: center;
        background: #fff;
        padding: 5px;
        border-radius: 5px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .image-card:hover {
        transform: scale(1.05);
    }

    .image-card img {
        width: 100%;
        height: auto;
        border-radius: 3px;
    }

    .delete-image-btn {
        position: absolute;
        top: 2px;
        right: 2px;
        background: red;
        color: white;
        border: none;
        width: 18px;
        height: 18px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 12px;
        border-radius: 50%;
        cursor: pointer;
        transition: background 0.2s;
    }

    .delete-image-btn:hover {
        background: darkred;
    }

    .priority-input {
        width: 100%;
        padding: 3px;
        text-align: center;
        margin-top: 3px;
        border-radius: 3px;
        border: 1px solid #ddd;
        font-size: 12px;
    }

    #save-priority-btn {
        display: block;
        margin-top: 10px;
        background: #007bff;
        color: white;
        padding: 5px 10px;
        border: none;
        border-radius: 5px;
        font-size: 12px;
        cursor: pointer;
        transition: background 0.2s;
    }

    #save-priority-btn:hover {
        background: #0056b3;
    }

    .action-buttons {
        display: flex;
        justify-content: center;
        gap: 5px;
        flex-wrap: wrap;
    }

    .action-buttons .btn {
        padding: 5px 10px;
        font-size: 12px;
    }
</style>
    <div class="col-12">
        <div class="card-group box-margin">
            <div class="card">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 mt-3">
                                    <h5 style="margin-left: 19px;">Platforms</h5>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a
                                                    href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Platforms</li>
                                        </ol>
                                    </div>

                                </div>
                                <div class="col-lg-12 mt-3 ml-5 d-flex justify-content-left">
                                    <a href="{{ route('platform.create') }}" class="btn btn-primary"><i
                                            class="fa fa-plus mr-1"></i>Add New</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert bg-success text-white">
                            <span class="closebtn" onclick="this.parentElement.style.display = 'none';">&times;</span>
                            <span class="font-weight-bold h5">{{ $message }}</span>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped iq-table1" data-toggle="data-table">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Book-now</th>
                                    <th>Links</th>
                                    <th>Images</th>
                                    <th class="d-flex justify-content-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $serial = 1;
                                @endphp
                                @foreach ($platforms as $data)
                                    <tr>
                                        <td>{{ $serial++ }}</td>
                                        <td>{{ $data->title }} </td>
                                        <td>{{ $data->link }}</td>
                                        <td>
                                            <div class="image-card">
                                                <a href="{{ asset('admin/platformImage/' . $data->images) }}"
                                                    target="_blank">
                                                    <img src="{{ asset('admin/platformImage/' . $data->images) }}"
                                                        alt="icon"></a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="action-buttons">
                                                <a href="{{ route('platform.edit', $data->id) }}" class="btn btn-success">
                                                    <i class="fa fa-pencil"></i> Edit
                                                </a>
                                                <form method="POST" action="{{ route('platform.destroy', $data->id) }}"
                                                    class="delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger delete-btn">
                                                        <i class="fa fa-times"></i> Delete
                                                    </button>
                                                </form>
                                            </div>

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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach(button => {
                button.addEventListener('click', (event) => {
                    event.preventDefault();
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'You will not be able to recover this item!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            event.target.closest('form').submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection
@section('js_code')
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
@endsection
