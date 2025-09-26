@extends('frontend.layouts.app')

@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner"
        style="background : url('{{ asset('admin/siteImage/' . $sitesettings->banquet_breadcome_image) }}'); background-size :cover; background-position:center">
        <div class="container">
            <div class="breadcrumb-area">
                <h3>Banquet Hall</h3>
            </div>
            <nav class="breadcrumbs">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Banquet Hall</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Sub Banner end -->




    <div class="content-area-15 rooms-detail-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-xs-12">
                    <div class="rooms-detail-info">
                        <!-- Heading courses start -->
                        <div class="heading-rooms  clearfix">
                            <div class="pull-left">
                                <h3> {{ $banquet->name }}</h3>
                                <!--                       <p>                                                                                        <i class="fa fa-map-marker"></i>
                                                                                                                                </p>-->
                            </div>
                            <div class="view-full">
                                {{-- <button type="button" data-bs-toggle="modal" data-bs-target="#fullScreenModal"> --}}
                                <button type="button" id="full-view">
                                    View In Full Screen
                                </button>
                            </div>
                        </div>
                        <!-- Heading courses end -->

                        <!-- sidebar start -->
                        <div class="rooms-detail-slider">
                            <!--  Rooms detail slider start -->
                            <div class="rooms-detail-sliders mb-40">

                                <div class="main-slider">
                                    @foreach (json_decode($banquet->images, true) as $image)
                                        <div>
                                            <a href="{{ asset('admin/banquetImages/' . ($image['path'] ?? $image)) }}"
                                                class="popup-image">
                                                <img src="{{ asset('admin/banquetImages/' . ($image['path'] ?? $image)) }}"
                                                    class="w-100 img-fluid" alt="photo">
                                            </a>
                                        </div>
                                    @endforeach


                                </div>

                                <!-- Thumbnail Slider (Thumbnails) -->
                                <div class="thumbnail-slider">
                                    @foreach (json_decode($banquet->images, true) as $image)
                                        <div>

                                            <img src="{{ asset('admin/banquetImages/' . ($image['path'] ?? $image)) }}"
                                                class="w-100 img-fluid" alt="photo">

                                        </div>
                                    @endforeach

                                </div>
                            </div>

                        </div>

                        <div class="detail">
                            <div class="heading clearfix">
                                <h3 class="title">
                                    {{ $banquet->name }}
                                </h3>
                            </div>
                            <p>{!! $banquet->short_description !!}</p>
                            <!-- <ul class="fecilities clearfix">
                                                                    <li>
                                                                        <i class="fa fa-users"></i>
                                                                        {{ $banquet->person }}
                                                                    </li>

                                                                    @foreach (json_decode($banquet->amenities_id) as $id)
    @php
        $amenity = App\Models\Amenitie::find($id);
    @endphp
                                                                        @if ($amenity && $amenity->icon)
    <li>
                                                                                <img src="{{ asset('admin/amenityImage/' . $amenity->icon) }}"
                                                                                    alt="{{ $amenity->name }} icon">
                                                                                {{ $amenity->name }}
                                                                            </li>
    @endif
    @endforeach
                                                                </ul> -->
                        </div>

                    </div>
                    <!-- sidebar end -->

                </div>
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 ps-3">
                    <h4 class="mb-4 text-center">Our Banquets</h4>
                    <ul>
                        @foreach ($latest->where('id', '!=', $currentbanquet->id) as $data)
                            <li>
                                <div class="hotel-box-3">
                                    <div class="hotel-inner">
                                        <div class="property-inner custom-propery-div">
                                            <a href="{{ route('frontend.banquet-details', $data->slug) }}">
                                                <div class="inner-property-img">
                                                    <img class="img-fluid w-100"
                                                        src="{{ asset('admin/banquetImages/' . $data->image) }}"
                                                        alt="photo">
                                                 </div>
                                                <div class="lhg-section">
                                                    <h3>

                                                        {{ $data->name }}

                                                    </h3>
                                                    <ul class="facilities-list clearfix">
                                                        <li>
                                                            <img src="{{asset('frontend/img/group.png')}}" alt="icon">
                                                            {{-- <i class="fa fa-users"></i> --}}
                                                            
                                                            {{ $data->person }}
                                                        </li>

                                                        @foreach (json_decode($banquet->amenities_id) as $id)
                                                            @php
                                                                $amenity = App\Models\Amenitie::find($id);
                                                            @endphp
                                                            @if ($amenity && $amenity->icon)
                                                                <li>
                                                                    <img src="{{ asset('admin/amenityImage/' . $amenity->icon) }}"
                                                                        alt="{{ $amenity->name }} icon">
                                                                    {{ $amenity->name }}
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>

                                                </div>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach


                    </ul>

                </div>
            </div>
        </div>
    </div>
    {{-- model --}}
    <div class="modal fade" id="fullScreenModal" tabindex="-1" aria-labelledby="fullScreenModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fullScreenModalLabel"> {{ $banquet->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Bootstrap Carousel -->
                    <div id="carouselGallery" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            {{-- @foreach (json_decode($blog->images) as $index => $image)
                        <div class="property-inner">
                            <a href="{{ asset('admin/blogImage/' . $image->path) }}" class="popup-image">
                                <img src="{{ asset('admin/blogImage/' . $image->path) }}" class="w-100 img-fluid"
                                    alt="photo">
                            </a>
                        </div>
                    @endforeach --}}

                            @foreach (json_decode($banquet->images, true) as $index => $image)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('admin/banquetImages/' . ($image['path'] ?? $image)) }}"
                                        class="d-block w-100 img-fluid" alt="photo">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselGallery"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselGallery"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        checkOutInput.on('change', function() {
            var checkInDate = checkInInput.datepicker('getDate');
            var checkOutDate = checkOutInput.datepicker('getDate');
            if (checkInDate && checkOutDate && checkOutDate < checkInDate) {
                alert('Check-out date cannot be earlier than check-in date.');
                checkOutInput.val('');
            }
        });
    </script>
@endsection
