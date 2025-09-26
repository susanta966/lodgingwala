@extends('frontend.layouts.app', ['meta_title' => $meta_title ?? '', 'meta_keywords' => $meta_keywords ?? '', 'meta_description' => $meta_description ?? ''])
@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner"
        style="background: url('{{ asset('admin/siteImage/' . $sitesettings->book_now_breadcome_image) }}'); background-size: cover; background-position: center">
        <div class="container">
            <div class="breadcrumb-area">
                <h3>Book Now</h3>
            </div>
            <nav class="breadcrumbs">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Book Now</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Hotel section start -->
    <div class="content-area book-now-section bg-grey">
        <div class="overlay">
            <div class="container">
                <div class="row justify-content-center">
                    @foreach ($booknow as $data)
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="hotel-box">
                                <!-- Photo thumbnail -->
                                <div class="photo-thumbnail">
                                    <div class="photo">
                                        <img src="{{ asset('admin/booknowImages/' . $data->image) }}" alt="photo"
                                            class="img-fluid w-100">
                                    </div>
                                </div>
                                <!-- Detail -->
                                <div class="detail clearfix">
                                    <h3 class="text-center mb-0">
                                        <a data-bs-toggle="modal" data-bs-target="#modal-{{ $data->id }}"
                                            type="button">{{ $data->title }}</a>
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <!-- Dynamic Modal for each hotel box -->
                        <div class="modal fade" id="modal-{{ $data->id }}" tabindex="-1"
                            aria-labelledby="modalLabel-{{ $data->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modalLabel-{{ $data->id }}">{{ $data->title }}
                                        </h1>
                                    </div>
                                    <div class="modal-body" id="modal-body-{{ $data->id }}">
                                        <div class="room-popup">
                                            <img class="img-fluid bk-ig"
                                                src="{{ asset('admin/booknowImages/' . $data->image) }}" alt="">
                                            <h6>{{ $data->title }}</h6>
                                            <ul id="platform-list-{{ $data->id }}"></ul>
                                            <ul class="pt-2 contatc-ul">
                                                <li><a href="tel:{{ $data->phone }}"><i class="fa fa-phone"></i>
                                                        {{ $data->phone }}</a></li>
                                                @if (!empty($data->email_1))
                                                    <li>
                                                        <a href="mailto:{{ $data->email_1 }}">
                                                            <i class="fa fa-envelope"></i> {{ $data->email_1 }}
                                                        </a>
                                                    </li>
                                                @endif

                                                @if (!empty($data->email_2))
                                                    <li>
                                                        <a href="mailto:{{ $data->email_2 }}">
                                                            <i class="fa fa-envelope"></i> {{ $data->email_2 }}
                                                        </a>
                                                    </li>
                                                @endif

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Hotel section end -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Event listener for opening each modal
            $('[data-bs-toggle="modal"]').on('click', function() {
                let id = $(this).data('bs-target').replace('#modal-', '');
                console.log(id);
                fetchPlatformData(id);
            });

            // Function to make AJAX call to fetch platform data
            function fetchPlatformData(booknowId) {
                $.ajax({
                    url: "{{ route('frontend.getPlatformData') }}", // Update this route
                    type: "GET",
                    data: {
                        id: booknowId
                    },
                    success: function(response) {
                        // Empty the previous data
                        $('#platform-list-' + booknowId).empty();

                        // Append the new data
                        response.data.forEach(platform => {
                            $('#platform-list-' + booknowId).append(`
                            <a href="${platform.link}" target="_blank"><li><img width="40" src="{{ asset('admin/platformImage') }}/${platform.images}" alt=""></li></a>
                        `);
                        });
                    },
                    error: function(error) {
                        console.error("Error fetching platform data", error);
                    }
                });
            }
        });
    </script>
@endsection
