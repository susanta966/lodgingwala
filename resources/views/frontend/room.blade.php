@extends('frontend.layouts.app', ['meta_title' => $meta_title ?? '', 'meta_keywords' => $meta_keywords ?? '', 'meta_description' => $meta_description ?? ''])
@section('content')
<!-- Sub banner start -->
<div class="sub-banner"
     style="background : url('{{ asset('admin/siteImage/' . $sitesettings->room_breadcome_image) }}'); background-size :cover; background-position:center">
    <div class="container">
        <div class="breadcrumb-area">
            <h3>Rooms</h3>
        </div>
        <nav class="breadcrumbs">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                <li class="breadcrumb-item active">Rooms</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Sub Banner end -->

<section class="rooms-section">
    <div class="container">
        <div class="row">

            @foreach ($room as $data)
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="hotel-box" data-aos="fade-up" data-aos-duration="1500">
                    <!-- Photo thumbnail -->
                    <div class="photo-thumbnail">
                        <div class="photo">

                            @php
                            $images = json_decode($data->images, true); // Decode as associative array
                            @endphp
                            @if (is_array($images) && !empty($images) && isset($images[0]))
                            <img src="{{ asset('admin/roomImages/' . $images[0]['path']) }}" alt="photo"
                                 class="img-fluid w-100">
                            <a href="{{ route('frontend.room-details', $data->slug) }}">
                                <span class="blog-one__plus"></span>
                            </a>
                            @else
                            <p>No image available</p>
                            @endif


                        </div>
                        <div class="pr">
                            <div class="rating">
                                @for ($i = 0; $i < $data->star; $i++)
                                <i class="fa fa-star"></i>
                                @endfor

                                {{-- <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-full"></i> --}}
                                        </div>
                                        {{ $data->price }}
                                    </div>
                                </div>
                                <!-- Detail -->
                                <div class="detail clearfix">
                                    <h3>
                                        <a href="{{ route('frontend.room-details', $data->slug) }}">{{ $data->name }}</a>
                                    </h3>
                                    <span class="location">
                                <a href="{{ route('frontend.room-details', $data->slug) }}">
                                    @if (!empty((string) $data->area))
                                    <i class="flaticon-bed"></i> {{ $data->area }}
                                    @endif
                                </a>
                            </span>
                            <p>{{ $data->short_description }}</p>
                            <a class="btn btn-default" href="{{ route('frontend.room-details', $data->slug) }}">Read
                                More</a>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div><!--container-->
</section>
@endsection
