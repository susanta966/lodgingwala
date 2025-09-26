@extends('admin.layout.app')

@section('title')
    {{ $data->name }}
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
                                    <h5 style="margin-left: 19px;">{{ $data->name }}</h5>
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
                                    <th>Image</th>
                                    <th>Priority</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roomimage as $image)
                               
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>
                                        <a href="{{ asset('admin/roomimage/' . $image->image) }}" target="_blank">
                                            <img src="{{ asset('admin/roomimage/' . $image->image) }}" alt="icon"
                                                style="width: 100px;height:100px;"></a>
                                    </td>
                                    <td>{{$image->priority}}</td>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize the sortable container for each blog's images
            const sortableContainers = document.querySelectorAll('.sortable-images');
            sortableContainers.forEach(container => {
                const roomId = container.getAttribute(
                    'data-blog-id'); // Get the blog ID from the data attribute
                new Sortable(container, {
                    onEnd: function(evt) {
                        // Get the new order of images after the drag
                        const newOrder = Array.from(container.children).map(item => item
                            .getAttribute('data-image-index'));

                        // Send the new order to the server to update the database
                        updateImageOrder(roomId, newOrder);
                    }
                });
            });

            // Function to send the new image order to the server using AJAX
            function updateImageOrder(roomId, newOrder) {
                $.ajax({
                    url: `./rooms/${roomId}/update-image-order`, // The URL to hit
                    method: 'POST', // The HTTP method
                    data: {
                        order: newOrder, // The new order of images
                        _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire('Success', 'The image order has been updated.', 'success');
                        } else {
                            Swal.fire('Error', 'There was an error updating the image order.', 'error');
                        }
                    },
                    error: function(error) {
                        console.error('Error:', error);
                        Swal.fire('Error', 'There was an error updating the image order.', 'error');
                    }
                });
            }
        });
    </script>
@endsection
