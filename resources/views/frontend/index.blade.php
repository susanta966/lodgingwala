@extends('frontend.layouts.app', ['meta_title' => $meta_title ?? '', 'meta_keywords' => $meta_keywords ?? '', 'meta_description' => $meta_description ?? ''])
@section('content')
    <!-- <style>
                .services-box-div {
                    transition: transform 0.9s cubic-bezier(0.24, 0.74, 0.58, 1), border-radius 0.3s ease-in-out;
                    display: inline-block;
                    /* Ensures it behaves properly */
                }

                .services-box-div:hover {
                    border-radius: 100%;
                    transform: rotateY(360deg);
                }

                @media (max-width: 768px) {
                    .about-box-Experience {
                        display: block !important;
                    }
                }

                .carousel-item img {
                    object-fit: cover;
                    width: 100%;
                    height: 300px;
                    /* Adjust height as needed */
                }

                @media (max-width: 768px) {
                    .carousel-item img {
                        height: 200px;
                        /* Smaller height for mobile */
                    }
                }

                .banner-test-info h2 {
                    font-weight: bold;
                    font-size: 2rem;
                    color: #fff;
                    /* Adjust color if needed */
                }

                @media (max-width: 768px) {
                    .banner-test-info h2 {
                        font-size: 1.5rem;
                    }
                }
            </style> -->
@if ($home->popup === 1)
<div class="modal fade" id="autoMessageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container">
                    <div class="row d-flex justify-content-between align-items-center"
                         style="border-bottom:1px solid #efefef; padding-bottom:10px;">
                        <div class="col-lg-12">
                            <div class="modal-logo text-center">
                                <img src="{{ asset('admin/homeImage/' . $home->modal_image) }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="close-model text-end">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="model-hrd">
                            <h4 style="text-align: center;">{{ $home->modal_heading }}
                                <span>{{ $home->modal_heading_word }}</span> {{ $home->modal_heading_word_2 }}
                            </h4>
                            <p>{!! $home->modal_description !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!-- Banner start -->
<div class="banner d-none d-lg-block d-md-block" id="banner-2">
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner he-slide">
            @foreach ($slider as $index => $data)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                <img class="d-block" style="object-fit: cover;"
                     src="{{ asset('admin/sliderImage/' . $data->image) }}" alt="banner">

                {{-- <img class="d-block w-100 h-100" src="{{ asset('admin/sliderImage/' . $data->image) }}"
                alt="banner"> --}}
                <div class="carousel-caption banner-slider-inner d-flex h-100">
                    <div class="carousel-content container align-self-center">
                        <div class="row bti-section justify-content-center">
                            <div class="col-lg-7 col-md-12 align-self-center">
                                <div class="banner-test-info wow fadeInLeft delay-04s text-center">
                                    <h2>{{ $data->heading }}</h2>
                                    <p>{{ $data->title }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Banner end -->
{{-- <div class="banner d-lg-none d-md-none " id="banner-2mobile">
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carouse    l">
                <div class="carousel-indic        ators">
                    <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="0" cla                ss="active"
                            aria-current="true" aria-label=        "Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleFad                e" data-bs-slide-to="1"
                                   aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carous                elExampleFade" data-bs-slide-to="2"
                   aria-l    abel="Slide 3"></button>
                </div>
          <div class="carousel-inner he-slide">
         @foreach ($mobilesliders as $mobile)            
                    <div class="carousel-item active">
                                            <img class="d-block" style="object-fit: cover;"
                            src="{{ asset('admin/mobilesilder/'.                        $mobile->image) }}"
                            alt="banner">
                        <div class="carousel-caption banner-slider-inner d-flex h-100">
                            <div class="carousel-content container align-self-center">
                                <div class="row bti-section justify-content-center">
                                    <div class="col-lg-7 col-md-12 align-self-center">
                                        <div class="banner-test-info wow fadeInLeft delay-04s text-center">
                                            <h2>{{$mobile->heading}}</h2>
                                            <p>{{$mobile->title}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div> --}}
        <div class="banner d-lg-none d-md-none" id="banner-2mobile">
            @if ($mobilesliders->count() > 0)
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach ($mobilesliders as $index => $mobile)
                    <button type="button" data-bs-target="#carouselExampleFade" 
                            data-bs-slide-to="{{ $index }}" 
                            class="{{ $index == 0 ? 'active' : '' }}" 
                            aria-current="{{ $index == 0 ? 'true' : 'false' }}" 
                            aria-label="Slide {{ $index + 1 }}"></button>
                    @endforeach
                </div>
                <div class="carousel-inner he-slide">
                    @foreach ($mobilesliders as $index => $mobile)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <img class="d-block" style="object-fit: cover;"
                             src="{{ asset('admin/mobilesilder/'.$mobile->image) }}" alt="banner">
                        <div class="carousel-caption banner-slider-inner d-flex h-100">
                            <div class="carousel-content container align-self-center">
                                <div class="row bti-section justify-content-center">
                                    <div class="col-lg-7 col-md-12 align-self-center">
                                        <div class="banner-test-info wow fadeInLeft delay-04s text-center">
                                            <h2>{{ $mobile->heading }}</h2>
                                            <p>{{ $mobile->title }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>

        <!-- About hotel alpha start -->
        <div class="about-hotel-alpha content-area-6">
            <div class="container">
                <div class="shape-img-div">
                    <img class="shape-img-2" src="{{ asset('frontend/img/shape-img-2-1.png') }}" alt="">
                </div>
                <!--shape-img-div-->
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="about-img-section">
                            <div class="image-box">
                                <div class="image"><img src="{{ asset('admin/aboutImages/' . $about->image) }}"
                                                        class="rounded" alt="photo"></div>

                            </div>
                            <div class="col-12 col-md-6">
                                <div class="about-box-Experience">
                                    <h3 class="text-white">{{ $about->year_of_exprience }}</h3>
                                    <p class="mb-0 text-white">{{ $about->year_of_exprience_title }}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 ">
                        <div class="about-content-section">
                            <h5>{{ $about->title }}</h5>
                            <h2>{{ $about->heading }} <span>{{ $about->one_word }}</span></h2>
                            <p>{!! $about->description !!} </p>
                            <a class="btn-lg btn-5" href="{{ route('frontend.about') }}"><span>Explore More</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About hotel alpha start -->

        <!-- Hotel section start -->
        <div class="content-area hotel-section bg-grey"
             style="background: linear-gradient(rgba(0, 0,0,0.9),rgb(0, 0,0,0.9)),url('{{ asset('frontend/img/bg-img-2.png') }}'); background-position: center; background-size: cover;">
            <div class="overlay">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <!-- Main title -->
                            <div class="main-title">
                                <h2 class="text-white">
                                    {{ $home->best_room_one_word }}<span> {{ $home->best_room_heading }}</span></h2>
                                <p>{{ $home->best_room_title }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($bestroom as $data)
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="hotel-box" data-aos="fade-up" data-aos-duration="1500">
                                <!-- Photo thumbnail -->
                                <div class="photo-thumbnail">
                                    <div class="photo">
                                        @php
                                        $images = json_decode($data->images, true); // Decode as associative array
                                        @endphp
                                        @if (is_array($images) && !empty($images) && isset($images[0]))
                                        <img src="{{ asset('admin/roomImages/' . $images[0]['path']) }}"
                                             alt="photo" class="img-fluid w-100">
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
                                            {{--
                                            <i class="fa fa-sta                                            r"></i>
                                            <i class="fa fa-sta                                            r"></i>
                                        <i class="fa fa                                            -star"></i>
                                            <i class="fa fa-star-half-full"></i> --}}
                                        </div>
                                        {{ $data->price }}
                                    </div>
                                </div>
                                <!-- Detail -->
                                <div class="detail clearfix">
                                    <h3>
                                        <a
                                            href="{{ route('frontend.room-details', $data->slug) }}">{{ $data->name }}</a>
                                    </h3>
                                    <span class="location">
                                           <span class="location">
    @if (isset($data->area) && $data->area !== '')
        <a href="{{ route('frontend.room-details', $data->slug) }}">
            <i class="flaticon-bed"></i> {{ $data->area }}
        </a>
    @endif
                                        </span>
                                        <p>{{ $data->short_description }}</p>
                                        <a class="btn btn-default"
                                           href="{{ route('frontend.room-details', $data->slug) }}">Read More</a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <!-- Hotel section end -->

        <!-- Hotel secion start -->
        <div class="hotel-section content-area comon-slick" id="bankid">
            <div class="container">
                <!-- Main title -->
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <!-- Main title -->
                        <div class="main-title">
                            <h2>{{ $home->banquet_one_word }}<span> {{ $home->banquet_heading }}</span></h2>
                            <p>{{ $home->banquet_title }}</p>
                        </div>
                    </div>
                </div>
                <div class="slick row comon-slick-inner csi2 wow fadeInUp delay-04s"
                     data-slick='{
                     "slidesToShow": 3,
                     "autoplay": true,
                     "dots": true,
                     "autoplaySpeed": 3000,
                     "responsive": [
                     {"breakpoint": 1024, "settings": {"slidesToShow": 2, "dots": true}}, 
                     {"breakpoint": 768, "settings": {"slidesToShow": 1, "arrows": false, "dots": true}}
                     ]
                     }'>
                    @foreach ($banquet as $data)
                    <div class="item slide-box">
                        <div class="hotel-box-3">
                            <div class="hotel-inner">
                                <div class="property-inner custom-propery-div">
                                    <a href="{{ route('frontend.banquet-details', $data->slug) }}">
                                        <img class="img-fluid w-100"
                                             src="{{ asset('admin/banquetImages/' . $data->image) }}" alt="photo">
                                        <div class="ling-section">
                                            <h3>{{ $data->name }}</h3>
                                            <div class="banquets-icons">
                                                <ul class="facilities-list clearfix">
                                                    <li>
                                                        <img src="{{ asset('frontend/img/group.png') }}" alt="icon">
                                                        {{-- <i class="fa fa-users"></i> --}}
                                                        {{ $data->person }}
                                                    </li>
                                                    @foreach (json_decode($data->amenities_id) as $id)
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
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Hotel secion end -->
  <style>.serviehome .services-box-2.active .fac-icon { 
    transform: rotateY(360deg);
    transition: transform 0.5s ease;
}
</style>
        <!-- Our facilties section start -->
        <div class="our-facilties-section content-area-5">
            <div class="overlay">
                <div class="container">
                    <!-- Main title -->
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="main-title" data-aos="fade-up" data-aos-duration="1500">
                                <h2>{{ $home->faciltie_one_word }} <span>{{ $home->faciltie_heading }}</span></h2>
                                <p>{{ $home->faciltie_title }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        {{-- @foreach ($facility as $data)
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="services-box-2 d-flex aos-init aos-animate" data-aos="fade-up"
                                 data-aos-duration="1500">
                                <div class="fac-icon services-box-div">
                                    <img src="{{ asset('admin/facilityImages/' . $data->icon) }}">
                                </div>
                                <div class="contant">
                                    <h3><a href="javascript:void(0)">{{ $data->name }}</a></h3>
                                    <p>{{ $data->short_description }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach --}}
                        <div >
                            {{-- @foreach ($facility as $index => $data)
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="services-box-2 d-flex aos-init servicehome aos-animate" data-aos="fade-up"
                                         data-aos-duration="1500">
                                        <div class="fac-icon services-box-div">
                                            <img src="{{ asset('admin/facilityImages/' . $data->icon) }}" alt="{{ $data->name }}">
                                        </div>
                                        <div class="contant">
                                            <h3><a href="javascript:void(0)">{{ $data->name }}</a></h3>
                                            <p>{{ $data->short_description }}</p>
                                        </div>
                                    </div>
                                </div>
                        
                                {{-- Close and open a new row after every 3 items --}}
                                 @if (($index + 1) % 3 == 0)
                                    </div><div class="row">
                                @endif 
                            {{-- @endforeach --}} 
                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                                @foreach ($facility as $index => $data)
                                    <div class="col">
                                        <div class="services-box-2 d-flex aos-init servicehome"
                                             data-aos="fade-up"
                                             data-aos-duration="1500"
                                             data-aos-delay="{{ $index * 100 }}"
                                             data-aos-anchor-placement="top-bottom"
                                             data-aos-once="true">
                                            <div class="fac-icon services-box-div">
                                                <img src="{{ asset('admin/facilityImages/' . $data->icon) }}" alt="{{ $data->name }}">
                                            </div>
                                            <div class="contant">
                                                <h3><a href="javascript:void(0)">{{ $data->name }}</a></h3>
                                                <p>{{ $data->short_description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            
                        

                        </div>
                        


                    </div>
                </div>
            </div>
        </div>
        <!--  <div class="our-facilties-section content-area-5">
                                                              <div class="overlay">
                                                                  <div class="container">
                                                                       Main title
                                                                      <div class="row justify-content-center">
                                                                          <div class="col-md-8">
                                                                              <div class="main-title" data-aos="fade-up" data-aos-duration="1500">
                                                                                  <h2>{{ $home->faciltie_one_word }} <span>{{ $home->faciltie_heading }}</span></h2>
                                                                                  <p>{{ $home->faciltie_title }}</p>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                      <div class="row">
                                                                        @foreach ($facility as $data)
        <div class="col-lg-4 col-md-6 col-sm-12">
                                                                              <div class="services-box-2 d-flex" data-aos="fade-up" data-aos-duration="1500">
                                                                                  <div class="icon">
                                                                                      <i class="{{ $data->icon }}"></i>
                                                                                  </div>
                                                                                  <div class="contant">
                                                                                      <h3><a href="javascript:void(0)">{{ $data->name }}</a></h3>
                                                                                      <p>{{ $data->short_description }}</p>
    
                                                                                  </div>
                                                                              </div>
                                                                          </div>
        @endforeach
    
    
    
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>-->
        <!-- Our facilties section end -->

        <style>
            .rannklyWidget.rannklyWidgetMain {
                margin: 0 auto;
                max-width: -moz-fit-content;
                max-width: fit-content;
                max-width: 100% !important;
                position: relative;
                z-index: 1;
            }
        </style>
        <!-- Testimonial 2 start -->
        <div class="testimonial-4 comon-slick">
            <div class="container">
                <div class="row justify-content-center">
                    <!-- Main title -->
                    <div class="main-title mb-3 text-center" data-aos="fade-up" data-aos-duration="1500">
                        <h2>{{ $home->testimonial_one_word }} <span>{{ $home->testimonial_heading }}</span></h2>
                        <p>{{ $home->testimonial_title }}</p>
                    </div>
                    <div class="col-lg-12" data-aos="fade-up" data-aos-duration="1500">
                        {!! $testimonial->link !!}
                        <!-- Slick slider area start -->
                        <!--  <div class="slick row comon-slick-inner d-none"data-slick='{"slidesToShow": 2, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 1}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                                                                            <div class="item slide-box">
                                                                                <div class="testimonial-item-new">
                                                                                    <div class="author-img fix">
                                                                                        <div class="author-avatar">
                                                                                            <img src="img/avatar-1.jpg" alt="testimonial-2">
                                                                                            <div class="icon">
                                                                                                <i class="fa fa-quote-right"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="author-content">
                                                                                        <h5 class="left-line pl-40">Amir Silva, <span class="desig">Designer</span></h5>
    
                                                                                    </div>
                                                                                    <p>But I must explain to you how all this mistake denouncing pleasure and praising pain was
                                                                                        born and I will give you a complete account of the system, and expound the actual </p>
    
                                                                                </div>
                                                                            </div>
                                                                            <div class="item slide-box">
                                                                                <div class="testimonial-item-new">
                                                                                    <div class="author-img fix">
                                                                                        <div class="author-avatar">
                                                                                            <img src="img/avatar-2.jpg" alt="testimonial-2">
                                                                                            <div class="icon">
                                                                                                <i class="fa fa-quote-right"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="author-content">
                                                                                        <h5 class="left-line pl-40">Navan Roy, <span class="desig">Manager</span></h5>
                                                                                    </div>
                                                                                    <p>But I must explain to you how all this mistake denouncing pleasure and praising pain was
                                                                                        born and I will give you a complete account of the system, and expound the actual </p>
    
                                                                                </div>
                                                                            </div>
                                                                            <div class="item slide-box">
                                                                                <div class="testimonial-item-new">
                                                                                    <div class="author-img fix">
                                                                                        <div class="author-avatar">
                                                                                            <img src="img/avatar-3.jpg" alt="testimonial-2">
                                                                                            <div class="icon">
                                                                                                <i class="fa fa-quote-right"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="author-content">
                                                                                        <h5 class="left-line pl-40">Roky Nel, <span class="desig">Consultant</span></h5>
                                                                                    </div>
                                                                                    <p>But I must explain to you how all this mistake denouncing pleasure and praising pain was
                                                                                        born and I will give you a complete account of the system, and expound the actual </p>
    
                                                                                </div>
                                                                            </div>
                                                                    </div>-->
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial 2 end -->


        <section class="booking-area style-two pb-5">
            <div class="container">
                <div class="bg-img">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <!-- Main title -->
                            <div class="main-title" data-aos="fade-up" data-aos-duration="1500">
                                <h2>{{ $home->location_one_word }} <span>{{ $home->location_heading }}</span></h2>
                                <p>{{ $home->location_title }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-lg-7 col-md-12">
                            <div class="google-map">
                                <a target="_blank" href="{{ $sitesetting->site_location }}">
                                    <img width="100%" src="{{ asset('frontend/img/google-img.jpg') }}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12">
                            <div class="single-booking-box">
                                <ul>
                                    @foreach ($location as $data)
                                    <li>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('admin/locationImage/' . $data->image) }}" alt="">
                                            <p class=" ms-3 mb-0">{{ $data->name }}</p>
                                        </div>
                                        <p class="acc_style04">{{ $data->distance }} &nbsp; |
                                            &nbsp;{{ $data->time }}
                                        </p>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--row-->
                </div>
                <!--bg-img-->
            </div>
        </section>

        <style>
            .rannklyWidget.rannklyWidgetMain {
                z-index: 99990 !important;
            }
        </style>
        <!-- Blog section start -->
        <div class="blog-section content-area comon-slick">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <!-- Main title -->
                        <div class="main-title">
                            <h2>{{ $home->blog_one_word }} <span> {{ $home->blog_heading }}</span></h2>
                            <p>{{ $home->blog_title }}</p>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel blog-custom-carousel row wow fadeInUp delay-04s">
                    @foreach ($blog as $data)
                    <div class="item slide-box" data-aos="fade-up" data-aos-duration="1500">
                        <div class="blog-1">
                            <div class="blog-image">
                                @php
                                $images = json_decode($data->images, true); // Decode as associative array
                                @endphp
                                @if (is_array($images) && !empty($images) && isset($images[0]))
                                <img src="{{ asset('admin/blogImage/' . $images[0]['path']) }}" alt="image"
                                     class="img-fluid w-100">
                                @else
                                <p>No image available</p>
                                @endif
                                <div class="profile-user">
                                    <img src="{{ asset('admin/blogImage/' . $data->author_image) }}" alt="user">
                                </div>
                                <div class="date-box">
                                    <span>{{ \Carbon\Carbon::parse($data->publish_date)->format('d') }}</span>{{ \Carbon\Carbon::parse($data->publish_date)->format('M ') }}
                                </div>
                            </div>
                            <div class="detail">
                                <div class="post-meta clearfix">
                                    <ul>
                                        <li>
                                            <strong><a href="{{ route('frontend.blog-details', $data->slug) }}">By:
                                                    {{ $data->author }}</a></strong>
                                        </li>
                                        <li class="float-right mr-0"><a
                                                href="{{ route('frontend.blog-details', $data->slug) }}"><i
                                                    class="fa fa-calendar"></i></a>{{ \Carbon\Carbon::parse($data->publish_date)->format('d M Y') }}
                                        </li>

                                    </ul>
                                </div>
                                <h3>
                                    <a href="{{ route('frontend.blog-details', $data->slug) }}">{{ $data->title }}</a>
                                </h3>
                                <p>{{ $data->short_description }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- Blog section end -->
        @endsection
