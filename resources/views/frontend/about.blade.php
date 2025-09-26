@extends('frontend.layouts.app', ['meta_title' => $meta_title ?? '', 'meta_keywords' => $meta_keywords ?? '', 'meta_description' => $meta_description ?? ''])
@section('content')
<style>
    .services-box-div {
        transition: transform 0.9s cubic-bezier(0.24, 0.74, 0.58, 1), border-radius 0.3s ease-in-out;
        display: inline-block;
        /* Ensures it behaves properly */
    }

    .services-box-div:hover {
        border-radius: 100%;
        transform: rotateY(360deg);
    }
</style>
    <!-- Sub banner start -->
    <div class="sub-banner" 
         style="background : url('{{ asset('admin/siteImage/' . $sitesettings->about_breadcome_image) }}'); background-size :cover; background-position:center">
      
        <div class="container">
            <div class="breadcrumb-area">
                <h3>About Us</h3>
            </div>
            <nav class="breadcrumbs">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">About Us</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Sub Banner end -->

    <div class="about-hotel-alpha content-area-6">
        <div class="container">
            <div class="shape-img-div">
                <img class="shape-img-2" src="{{ asset('frontend/img/shape-img-2-1.png') }}" alt="">
            </div><!--shape-img-div-->
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 wow fadeInLeft delay-04s">
                    <div class="about-img-section">
                        <div class="image-box">
                            <div class="image-1"><img src="{{ asset('admin/aboutImages/' . $about->image) }}"
                                    class="rounded" alt="photo"></div>

                        </div>
                        <div class="about-box-Experience">
                            <h3 class="text-white">{{ $about->year_of_exprience }}</h3>
                            <p class="mb-0 text-white">{{ $about->year_of_exprience_title }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 wow fadeInRight delay-04s">
                    <div class="about-content-section">
                        <h5>{{ $about->title }}</h5>
                        <h2>{{ $about->heading }} <span>{{ $about->one_word }}</span></h2>
                        <p>{!! $about->description !!}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Testimonial 2 start -->
    <div class="testimonial-4 comon-slick">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Main title -->
                <div class="main-title mb-3 text-center" data-aos="fade-up" data-aos-duration="1500">
                    <h2>{{ $about->testimonials_word }} <span>{{ $about->testimonials_heading }}</span></h2>
                    <p>{{ $about->testimonials_short_description }}</p>
                </div>
                <div class="col-lg-12" data-aos="fade-up" data-aos-duration="1500">
                    {!! $testimonial->link !!}
                    <!-- Slick slider area start -->
                    <div class="slick row comon-slick-inner d-none"
                        data-slick='{"slidesToShow": 2, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 1}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial 2 end -->






    <!-- Our facilties section start -->
    <div class="our-facilties-section content-area-5">
        <div class="overlay">
            <div class="container">
                <!-- Main title -->
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="main-title" data-aos="fade-up" data-aos-duration="1500">
                            <h2>{{ $about->facilties_word }} <span>{{ $about->facilties_heading }}</span></h2>
                            <p>{{ $about->facilties_short_description }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">


                    @foreach ($facility as $data)
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
                            <!--                    <div class="services-box-2 d-flex" data-aos="fade-up"
                            data-aos-duration="1500">
                                <div class="icon">
                                    <i class="{{ $data->icon }}"></i>
                                </div>
                                <div class="contant">
                                    <h3><a href="javascript:void(0)">{{ $data->name }}</a></h3>
                                    <p>{{ $data->short_description }}</p>
                                </div>
                            </div>-->
                        </div>
                    @endforeach



                </div>
            </div>
        </div>
    </div>
    <!-- Our facilties section end -->
@endsection
