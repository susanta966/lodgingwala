@extends('admin.layout.app')

@section('title')
Reviews
@endsection

@section('maincontent')
<div class="col-12">
    <div class="card-group box-margin">
        <div class="card">
            <!-- Start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 mt-3">
                                <h5 style="margin-left: 19px;">Reviews</h5>
                            </div>
                            {{-- <div class="col-lg-12 mt-3 ml-5 d-flex justify-content-left">
                                <a href="{{ route('review.create') }}" class="btn btn-primary"><i class="fa fa-plus mr-1"></i>Add New</a>
                            </div> --}}
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
                                <th>Heading</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Link</th>
                           
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $serial = 1; @endphp
                            @foreach ($reviews as $data)
                                <tr>
                                    <td>{{ $serial++ }}</td>
                                    <td>{{ $data->heading }}</td>
                                    <td>{{ $data->title }}</td>
                                    <td>
                                     <a href="{{ asset('admin/reviewImages/'.$data->image) }}" target="_blank" >  <img src="{{ asset('admin/reviewImages/'.$data->image) }}" alt="icon" style="width: 100px;height:100px;"></a>
                                    </td>
                                    <td>{{ $data->link }}</td>
                                    <td class="d-flex justify-content-center">
                                        <a href="{{ route('reviews.edit', $data->id) }}" class="btn btn-success"><i class="fa fa-pencil mr-1"></i>Edit</a>
                                        {{-- <form method="POST" action="{{ route('facility.destroy', $data->id) }}" class="delete-form ml-2">
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
    document.addEventListener('DOMContentLoaded', function () {
        const deleteImageButtons = document.querySelectorAll('.delete-image-btn');
        deleteImageButtons.forEach(button => {
            button.addEventListener('click', function (event) {
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
