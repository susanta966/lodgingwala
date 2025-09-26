@php
$sitedetails = \App\Models\SiteSetting::find(1);

@endphp
<!DOCTYPE html>
<html lang="zxx">

    <head>
        <!--<title>{{ $sitedetails->site_title }} {{ $meta_title ?? '' }}</title>-->
    <title>Lodgingwala</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <meta name="meta-title" content="{{ $meta_title ?? '' }}">
        <meta name="keywords" content="{{ $meta_keywords ?? '' }}">
        <meta name="description" content="{{ $meta_description ?? '' }}">
        <meta property="og:type" content="{{ $sitedetails->og_type }}">
        <meta property="og:title" content="{{ $sitedetails->og_title }}">
        <meta property="og:description" content="{{ $sitedetails->og_description }}">
        <meta property="og:url" content="{{ $sitedetails->og_url }}">
        <meta property="og:site_name" content="{{ $sitedetails->og_site_name }}">
        <meta property="og:image" content="{{ asset('admin/siteImage/og/' . $sitedetails->og_image) }}">
        <meta property="og:image:width" content="{{ $sitedetails->og_width }}">
        <meta property="og:image:height" content="{{ $sitedetails->og_height }}">

        <!-- Twitter Card Meta Tags -->
        <meta name="twitter:card" content="{{ $sitedetails->twitter_card }}">
        <meta name="twitter:title" content="{{ $sitedetails->twitter_title }}">
        <meta name="twitter:description" content="{{ $sitedetails->og_description }}">
        <meta name="twitter:image" content="{{ asset('admin/siteImage/twitter/' . $sitedetails->twitter_image) }}">

        <!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/animate.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap-submenu.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap-select.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/fonts/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/fonts/flaticon/font/flaticon.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/fonts/linearicons/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/jquery.mCustomScrollbar.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap-datepicker.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/dropzone.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/leaflet.css') }}" type="text/css">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
        <!-- Custom stylesheet -->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/initial.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.css') }}?r=<?=time()?>">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/skins/default.css') }}?r=<?=time()?>">


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">

        <!-- Favicon icon -->
        <link rel="shortcut icon" href="{{ asset('admin/siteImage/favicon/' . $sitedetails->favicon) }}"
              type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

        <!-- Google fonts -->
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    </head>

    <body>

        <!-- Main header start -->
        <header class="main-header" id="main-header-2">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand logos" href="{{ route('frontend.home') }}">
                        <img src="{{ asset('admin/siteImage/logo/' . $sitedetails->logo) }}" alt="logo"
                             class="logo-photo">
                        <img src="{{ asset('admin/siteImage/logo/' . $sitedetails->logo) }}" alt="logo"
                             class="logo-photo2">
                    </a>
                    <button class="navbar-toggler" id="drawer" type="button">
                        <span class="fa fa-bars"></span>
                    </button>
                    <div class="navbar-collapse collapse w-100 justify-content-end" id="navbar">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item {{ Route::is('frontend.home') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('frontend.home') }}">
                                    Home
                                </a>
                            </li>
                            <li class="nav-item {{ Route::is('frontend.about') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('frontend.about') }}">
                                    About Us
                                </a>
                            </li>
                            <li class="nav-item {{ Route::is('frontend.room') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('frontend.room') }}">
                                    Rooms
                                </a>
                            </li>
                            <li class="nav-item {{ request()->is('#bankid') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/') }}#bankid">
                                    Banquets
                                </a>
                            </li>
                            <li class="nav-item {{ Route::is('frontend.blog') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('frontend.blog') }}">
                                    Blogs
                                </a>
                            </li>
                            <li class="nav-item {{ Route::is('frontend.review') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('frontend.review') }}">
                                    Review Us
                                </a>
                            </li>
                            <li class="nav-item {{ Route::is('frontend.contact') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('frontend.contact') }}">
                                    Contact Us
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('frontend.booknow') }}" class="btn-lg btn-4 btn-6">Book Now</a>
                            </li>
                        </ul>
                    </div>
                    
                </nav>

            </div>
        </header>
        <!-- Main header end -->

        <!-- Sidenav start -->
        <nav id="sidebar" class="nav-sidebar sidebar-heading-section">
            <!-- Close btn-->
            <div id="dismiss">
                <i class="fa fa-close"></i>
            </div>
            <div class="sidebar-inner">
                <div class="sidebar-logo">
                    <img src="{{ asset('frontend/img/logo.png') }}" alt="Lodgingwala sidebar logo">
                </div>
                <div class="sidebar-navigation">
                    <ul class="menu-list">
                        <li>
                            <a href="{{ route('frontend.home') }}" class="{{ Route::is('frontend.home') ? 'active' : '' }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('frontend.about') }}" class="{{ Route::is('frontend.about') ? 'active' : '' }}">About Us</a>
                        </li>
                        <li>
                            <a href="{{ route('frontend.room') }}" class="{{ Route::is('frontend.room') ? 'active' : '' }}">Rooms</a>
                        </li>
                       <li>
    <a href="{{ url('/') }}#bankid" onclick="closeNav()">Banquets</a>
</li>
                        <li>
                            <a href="{{ route('frontend.blog') }}" class="{{ Route::is('frontend.blog') ? 'active' : '' }}">Blogs</a>
                        </li>
                        <li>
                            <a href="{{ route('frontend.review') }}" class="{{ Route::is('frontend.review') ? 'active' : '' }}">Review Us</a>
                        </li>
                        <li>
                            <a href="{{ route('frontend.contact') }}" class="{{ Route::is('frontend.contact') ? 'active' : '' }}">Contact Us</a>
                        </li>
                        <li>
                            <a href="{{ route('frontend.booknow') }}" class="{{ Route::is('frontend.booknow') ? 'active' : '' }}">Book Now</a>
                        </li>
                    </ul>
                </div>
                <div class="get-in-touch">
                    <h3 class="heading">Get in Touch</h3>
                    <div class="sidebar-contact-info">
                        <div class="icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="body-info">
                            <a href="mailto:{{ $sitedetails->email }}">{{ $sitedetails->email }}</a>
                        </div>
                    </div>
                    <div class="sidebar-contact-info">
                        <div class="icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="body-info">
                            <a href="tel:{{ $sitedetails->phone }}">{{ $sitedetails->phone }}</a>
                        </div>
                    </div>
                    <div class="sidebar-contact-info mb-0">
                        <div class="icon">
                            <a href="https://wa.me/{{ $sitedetails->whatsapp }}" target="_blank">
                                <i class="fab fa-whatsapp-square"></i>
                            </a>
                        </div>
                        <div class="body-info">
                            <a href="tel:{{ $sitedetails->whatsapp }}">{{ $sitedetails->whatsapp }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        
        <!-- Sidenav end -->

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="main-content">
                            <h1 class="page-title">{{ isset($page_title) ? $page_title : '' }}</h1>
                            <div class="page-content">
                                {!! isset($page_content) ? $page_content : '' !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="sidebar">
                            <div class="widget">
                                <h3 class="widget-title">Recent Posts</h3>
                                <ul class="recent-posts">
                                    @foreach($recent_posts as $post)
                                        <li>
                                            <a href="{{ route('frontend.blog.detail', $post->slug) }}">{{ $post->title }}</a>
                                            <span class="post-date">{{ $post->created_at->format('M d, Y') }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="widget">
                                <h3 class="widget-title">Categories</h3>
                                <ul class="categories">
                                    @foreach($categories as $category)
                                        <li>
                                            <a href="{{ route('frontend.blog.category', $category->slug) }}">{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="widget">
                                <h3 class="widget-title">Tags</h3>
                                <div class="tags">
                                    @foreach($tags as $tag)
                                        <a href="{{ route('frontend.blog.tag', $tag->slug) }}">{{ $tag->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content Wrapper end -->

        <!-- Footer start -->
        <footer class="main-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="footer-widget">
                            <h3 class="widget-title">About Us</h3>
                            <p>{{ $sitedetails->footer_about }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="footer-widget">
                            <h3 class="widget-title">Quick Links</h3>
                            <ul class="quick-links">
                                <li><a href="{{ route('frontend.home') }}">Home</a></li>
                                <li><a href="{{ route('frontend.about') }}">About Us</a></li>
                                <li><a href="{{ route('frontend.room') }}">Rooms</a></li>
                                <li><a href="{{ url('/') }}#bankid">Banquets</a></li>
                                <li><a href="{{ route('frontend.blog') }}">Blogs</a></li>
                                <li><a href="{{ route('frontend.review') }}">Review Us</a></li>
                                <li><a href="{{ route('frontend.contact') }}">Contact Us</a></li>
                                <li><a href="{{ route('frontend.booknow') }}">Book Now</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="footer-widget">
                            <h3 class="widget-title">Contact Us</h3>
                            <div class="contact-info">
                                <div class="icon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="info">
                                    <p>{{ $sitedetails->address }}</p>
                                </div>
                            </div>
                            <div class="contact-info">
                                <div class="icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="info">
                                    <a href="mailto:{{ $sitedetails->email }}">{{ $sitedetails->email }}</a>
                                </div>
                            </div>
                            <div class="contact-info">
                                <div class="icon">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="info">
                                    <a href="tel:{{ $sitedetails->phone }}">{{ $sitedetails->phone }}</a>
                                </div>
                            </div>
                            <div class="contact-info">
                                <div class="icon">
                                    <a href="https://wa.me/{{ $sitedetails->whatsapp }}" target="_blank">
                                        <i class="fab fa-whatsapp-square"></i>
                                    </a>
                                </div>
                                <div class="info">
                                    <a href="tel:{{ $sitedetails->whatsapp }}">{{ $sitedetails->whatsapp }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-bottom">
                            <p>&copy; {{ date('Y') }} Lodgingwala. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer end -->

        <!-- Back to top button -->
        <a id="back-to-top" data-toggle="tooltip" title="Back to Top" href="javascript:void(0)">
            <i class="fa fa-chevron-up"></i>
        </a>

        <!-- Scripts -->
        <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
        <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('frontend/js/animate.min.js') }}"></script>
        <script src="{{ asset('frontend/js/bootstrap-submenu.js') }}"></script>
        <script src="{{ asset('frontend/js/bootstrap-select.min.js') }}"></script>
        <script src="{{ asset('frontend/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
        <script src="{{ asset('frontend/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('frontend/js/dropzone.js') }}"></script>
        <script src="{{ asset('frontend/js/slick.js') }}"></script>
        <script src="{{ asset('frontend/js/leaflet.js') }}"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <!-- Custom script -->
        <script src="{{ asset('frontend/js/script.js') }}"></script>
    </body>

</html>
