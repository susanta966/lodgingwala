@extends('admin.layout.app')

@section('title')
    Amenities
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
                <!-- Start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 mt-3">
                                    <h5 style="margin-left: 19px;">Amenities</h5>
                                </div>
                                <div class="col-lg-12 mt-3 ml-5 d-flex justify-content-left">
                                    <a href="{{ route('amenities.create') }}" class="btn btn-primary"><i
                                            class="fa fa-plus mr-1"></i>Add New</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End page title -->
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
                                    <th>Sl No</th>
                                    <th>Name</th>

                                    <th>Icon</th>
                                    <th>Status</th>

                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $serial = 1; @endphp
                                @foreach ($amenities as $data)
                                    <tr>
                                        <td>{{ $serial++ }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>
                                            <div class="image-card">

                                                <a href="{{ asset('admin/amenityImage/' . $data->icon) }}" target="_blank">
                                                    <img src="{{ asset('admin/amenityImage/' . $data->icon) }}" alt="icon"></a
                                                        >
                                            </div>
                                        </td>

                                        <td>{{ $data->status == 1 ? 'Active' : 'Inactive' }}</td>

                                        <td class="d-flex justify-content-center">
                                            <div class="action-buttons">
                                                <a href="{{ route('amenities.edit', $data->id) }}" class="btn btn-success">
                                                    <i class="fa fa-pencil"></i> Edit
                                                </a>
                                                <form method="POST" action="{{ route('amenities.destroy', $data->id) }}"
                                                    class="delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger delete-btn">
                                                        <i class="fa fa-times"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                            {{-- <a href="{{ route('amenities.edit', $data->id) }}" class="btn btn-success"><i class="fa fa-pencil mr-1"></i>Edit</a>
                                        <form method="POST" action="{{ route('amenities.destroy', $data->id) }}" class="delete-form ml-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger delete-btn delete-image-btn"><i class="fa fa-times-rectangle mr-1"></i>Delete</button>
                                        </form> --}}
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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteImageButtons = document.querySelectorAll('.delete-image-btn');
            deleteImageButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const form = this.closest('form');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'You will not be able to recover this image!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection
