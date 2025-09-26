@extends('frontend.layouts.app',['meta_title' => $meta_title ?? "",'meta_keywords' => $meta_keywords ?? "",'meta_description' => $meta_description ?? ""])
@section('content')
<!-- Sub banner start -->
<div class="sub-banner" style="background : url('{{ asset('admin/siteImage/'.$sitesetting->contact_breadcome_image)}}'); background-size :cover; background-position:center">
    <div class="container">
        <div class="breadcrumb-area">
            <h3>Contact Us</h3>
        </div>
        <nav class="breadcrumbs">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                <li class="breadcrumb-item active">Contact Us</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Sub Banner end -->

<!-- Contact 1 start -->
<div class="contact-1 content-area-6">
    <div class="container">
        <div class="main-title">
            <h1>Contact Us</h1>
            <!-- <p>{{ $sitesetting->contact_title }}</p> -->
        </div>
        <div class="row">
            <div class="col-lg-7 col-md-12 col-sm-12">
                <!-- Contact form start -->
                <div class="contact-form">
                    <form action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data">
                          @if ($message = Session::get('success'))
                    <div class="alert bg-success text-white">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        <span class="font-weight-bold h5">{{ $message }}</span>
                    </div>
                @endif
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control" value="{{old('name')}}" id="floating-full-name" name="name" placeholder="Full Name" required>
                                    <label for="floating-full-name">Full Name</label>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-lg-6 col-md-6">
                                <div class="form-floating mb-4">
                                    <input type="email" class="form-control" id="floating-email-address" value="{{old('email')}}" name="email" placeholder="Email Address" required>
                                    <label for="floating-email-address">Email address</label>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-lg-6 col-md-6">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control" id="floating-subject"  value="{{old('subject')}}" name="subject" placeholder="Subject" required>
                                    <label for="floating-subject">Subject</label>
                                    @error('subject')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-lg-6 col-md-6">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control" id="floating-phone-Number" value="{{old('phone')}}" name="phone" placeholder="Phone Number" required>
                                    <label for="floating-phone-Number">Phone Number</label>
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-lg-12 col-md-12">
                                <div class="form-floating mb-4">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="message" style="height: 60px" required>{{old('message')}}</textarea>
                                    <label for="floatingTextarea2">Comments</label>
                                    @error('message')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-lg-12 col-md-12">
                                <div class="send-btn text-center">
                                    <button type="submit" class="btn-md btn-theme btn-4 btn-7">Send Message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                </div>
                <!-- Contact form end -->
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12">
                <!-- Contact details start -->
                <div class="contact-details">
                    <div class="contact-item d-flex mb-3">
                        <div class="icon">
                        <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div class="contant add-left">
                            <h4>Address</h4>
                            <p>{{ $sitesetting->address }}
                            </p>
                        </div>
                    </div>
                    <div class="contact-item d-flex mb-3">
                        <div class="icon">
                        <i class="fa-solid fa-phone"></i>
                        </div>
                        <div class="contant">
                            <h4>Phone Number</h4>
                            <p>
                                <a href="tel:{{ $sitesetting->phone }}">{{ $sitesetting->phone }}</a>
                            </p>
                            <p>
                                <a href="tel:{{ $sitesetting->whatsapp }}">{{ $sitesetting->whatsapp }}</a>
                            </p>
                        </div>
                    </div>
                    <div class="contact-item d-flex mb-3">
                        <div class="icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="contant">
                            <h4>Email Address</h4>
                            <p>
                                <a href="mailto:{{ $sitesetting->email }}">{{ $sitesetting->email }}</a>
                            </p>
                        </div>
                    </div>
                  

                </div>
                <!-- Contact details end -->
            </div>
        </div>
    </div>
</div>
<!-- Contact-1 end -->

<!-- Google map start -->
<div class="section">
    <div class="map">
    <iframe src="{{ $sitesetting->map_link }}" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>
<!-- Google map end -->
    
@endsection