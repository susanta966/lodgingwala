@php
    $sitedetails = \App\Models\SiteSetting::find(1);
    $facilities = \App\Models\Facility::where('status', 1)->orderBy('priority', 'asc')->take(6)->get();

@endphp

<div class="sticky-icon">
    @if ($sitedetails->instagram)
        <a href="{{ $sitedetails->instagram }}" class="Instagram" target="_blank">
            <i class="fa-brands fa-instagram"></i> Instagram
        </a>
    @endif
    @if ($sitedetails->facebook)
        <a href="{{ $sitedetails->facebook }}" class="Facebook" target="_blank">
            <i class="fa-brands fa-facebook-f"></i> Facebook
        </a>
    @endif
    @if ($sitedetails->twitter)
        <a href="{{ $sitedetails->twitter }}" class="Twitter" target="_blank">
            <i class="fa-brands fa-x-twitter"></i> Twitter
        </a>
    @endif
    @if ($sitedetails->whatsapp)
        <a href="https://wa.me/{{ $sitedetails->whatsapp }}" class="whatsapp" target="_blank">
            <i class="fa-brands fa-whatsapp"></i> Whatsapp
        </a>
    @endif
    <!--  @if ($sitedetails->phone)
<a href="tel:{{ $sitedetails->phone }}" class="call">
    <i class="fa-solid fa-phone"></i> Call
  </a>
@endif-->
</div>

<!-- Footer start -->
<footer class="main-footer clearfix" style="background: #000; background-position: center; background-size: cover;">
    <div class="container">
        <!-- Footer info-->
        <div class="footer-info">
            <div class="row justify-content-between">
                <div class="col-lg-4 col-md-4 col-sm-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="main-title-2">
                        <img width="250" src="{{ asset('admin/siteImage/ftlogo/' . $sitedetails->ftlogo) }}"
                            alt="">
                    </div>
                    <p>{{ $sitedetails->site_about }}</p>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12" data-aos="fade-up" data-aos-duration="1500">
                    <div class="footer-item">
                        <div class="main-title-2">
                            <h1>Useful Links</h1>
                        </div>
                        <ul class="links">
                            <li>
                                <a href="{{ route('frontend.home') }}">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('frontend.about') }}">About Us</a>
                            </li>
                            <li>
                                <a href="{{ route('frontend.room') }}">Rooms</a>
                            </li>
                            <li>
                                <a href="{{ route('frontend.blog') }}">Blog</a>
                            </li>
                            <!--                            <li>
                                <a href="{{ route('frontend.review') }}">Review Us</a>
                            </li>-->
                            <li>
                                <a href="{{ route('frontend.contact') }}">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12" data-aos="fade-up" data-aos-duration="1500">
                    <div class="footer-item">
                        <div class="main-title-2">
                            <h1>Facilities</h1>
                        </div>
                        <ul class="links">
                            @foreach ($facilities as $data)
                                <li>
                                    <a href="javascript:void(0)">
                                        {{ $data->name }}</a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="footer-item">
                        <div class="main-title-2">
                            <h1>Contact Us</h1>
                        </div>
                        <ul class="personal-info">
                            <li>
                                <i class="fa fa-map-marker"></i>
                                {{ $sitedetails->address }}
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i>
                                <a href="mailto:{{ $sitedetails->email }}"> {{ $sitedetails->email }}</a>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i>
                                <a href="tel:{{ $sitedetails->phone }}"> {{ $sitedetails->phone }}</a>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i>
                                <a href="tel:{{ $sitedetails->whatsapp }}">{{ $sitedetails->whatsapp }}</a>
                            </li>
                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="copy-right">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-7">
                    <p class="text-center">
                        Copyright <span id="currentYear"></span> Rockdale. All rights reserved. Design and Developed by
                        <a target="_blank" href="https://thecolourmoon.com/">Colourmoon</a>.
                    </p>

                    <script>
                        document.getElementById("currentYear").textContent = new Date().getFullYear();
                    </script>
                </div>
                <div class="col-lg-5 col-md-5">
                    <div class="clearfix"></div>
                    <ul class="social-list">
                        @if ($sitedetails->instagram)
                            <li><a href="{{ $sitedetails->instagram }}"><i class="fa-brands fa-instagram"></i></a></li>
                        @endif
                        @if ($sitedetails->facebook)
                            <li><a href="{{ $sitedetails->facebook }}"><i class="fa-brands fa-facebook-f"></i></a></li>
                        @endif
                        @if ($sitedetails->twitter)
                            <li><a href="{{ $sitedetails->twitter }}"><i class="fa-brands fa-x-twitter"></i></a></li>
                        @endif
                        <!-- WhatsApp and Phone might need actual URLs -->
                        <li><a href="https://wa.me/{{ $sitedetails->whatsapp }}" target="_blank"><i
                                    class="fa-brands fa-whatsapp"></i></a></li>
                        <!--    <li><a href="tel:{{ $sitedetails->phone_number }}"><i class="fa-solid fa-phone"></i></a></li>-->
                    </ul>

                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Footer end -->
<style>
    .close-model button.btn-close {
        border: 3px solid #991e17;
        border-radius: 50%;
        font-size: 10px;
        opacity: 1;
        color: #ff2e17;
        padding: 10px;
    }

    .modal-header {
        display: flex;
        flex-shrink: 0;
        align-items: center;
        position: absolute;
        justify-content: space-between;
        padding: 1rem 1rem;
        border-bottom: 0px solid #dee2e6;
        border-top-left-radius: calc(.3rem - 1px);
        border-top-right-radius: calc(.3rem - 1px);
        right: 0;
        top: 10px;
    }

    .modal-logo img {
        width: 180px;
    }

    .model-hrd {
        margin-top: 10px;
    }

    .model-hrd span {
        color: #981d16;
    }

    .modal-content {
        position: relative;
        display: flex;
        flex-direction: column;
        width: 100%;
        pointer-events: auto;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid rgba(0, 0, 0, .2);
        border-radius: 10px;
        outline: 0;
        border-bottom: 5px solid #981d16;
        border-top: 5px solid #981d16;
    }

    .popular-places-section .carousel-control-next,
    .carousel-control-prev {
        width: 15% !important;
        opacity: 1;
    }

    .sidebar-navigation .menu-list a.active {
        color: #991e17 !important;
        font-weight: bold;
    }

    /* Dots Container */
    .owl-dots {
        display: flex !important;
        justify-content: center;
        align-items: center;
        gap: 8px;
        /* Adds spacing between dots */
        margin-top: 15px;
        position: relative;
        /* Prevents unwanted absolute positioning */
    }

    /* Default Dot Style */
    .owl-dot {
        width: 12px;
        background: #999 !important;
        color: inherit;
        border: none;
        padding: 0 !important;
        font: inherit;
        height: 12px;
    }

    /* Active Dot */
    .owl-dot.active {
        background-color: #c72726 !important;
        /* Active color */
    }

    /* Hover Effect */
    .owl-dot:hover {
        background-color: #ff4500 !important;
    }

    /* Navigation Buttons */
    .owl-carousel .owl-nav button.owl-next,
    .owl-carousel .owl-nav button.owl-prev {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 40px;
        height: 40px;
        background-color: rgba(0, 0, 0, 0.5);
        border: none;
        border-radius: 50%;
        color: white;
        font-size: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.3s ease-in-out;
    }

    /* Left & Right Arrows Position */
    .owl-carousel .owl-nav button.owl-prev {
        left: -50px;
    }

    .owl-carousel .owl-nav button.owl-next {
        right: -50px;
    }

    /* Hover Effect for Navigation */
    .owl-carousel .owl-nav button.owl-next:hover,
    .owl-carousel .owl-nav button.owl-prev:hover {
        background-color: #ff6600;
    }

    .navbar-nav .nav-item .nav-link:hover,
    .navbar-nav .nav-item .nav-link:focus {
        color: #991e17;
    }

    .navbar-nav .nav-item.active .nav-link {
        color: #991e17 !important;
    }

    .navbar-nav .nav-item .nav-link {
        position: relative;
        padding: 10px 15px;
        color: #333;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .navbar-nav .nav-item .nav-link:hover {
        color: #991e17;
    }

    .navbar-nav .nav-item.active .nav-link {
        color: #991e17 !important;
        font-weight: 600;
        background-color: rgba(153, 30, 23, 0.1);
        border-radius: 5px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .navbar-nav .nav-item.active .nav-link::before {
        content: '';
        position: absolute;
        bottom: -3px;
        left: 10px;
        width: calc(100% - 20px);
        height: 2px;
        background-color: #991e17;
        transition: width 0.3s ease;
    }

    .navbar-nav .nav-item .nav-link:hover::before,
    .navbar-nav .nav-item.active .nav-link::before {
        width: calc(100% - 20px);
    }

    .navbar-nav .nav-item .nav-link:hover {
        background-color: rgba(153, 30, 23, 0.05);
    }
</style>
<script>
    function closeNav() {
        // Hide the sidebar by adding/removing the active class
        document.getElementById("sidebar").classList.remove('active');
    }

    // Close sidebar when clicking the dismiss button
    document.getElementById('dismiss').addEventListener('click', function() {
        closeNav();
    });

    // Close sidebar when clicking on an internal link (like Banquets)
    document.querySelectorAll('.menu-list a').forEach(item => {
        item.addEventListener('click', function() {
            closeNav(); // Close sidebar on menu click
        });
    });
</script>
<script>
   document.addEventListener('DOMContentLoaded', () => {
    AOS.init({
        duration: 1500,
        once: true
    });

    document.querySelectorAll('.fac-icon').forEach(function(icon) {
        icon.addEventListener('click', function(event) {
            event.stopPropagation();
            AOS.refresh(); // Refresh AOS positions
        });
    });
});

    $(document).ready(function() {
    AOS.init();

    // Re-bind click event after AOS load
    $('.btn.btn-default').on('click', function(event) {
        event.stopPropagation();
        window.location.href = $(this).attr('href');
    });
});

</script>

<script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap-submenu.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.mb.YTPlayer.js') }}"></script>
<script src="{{ asset('frontend/js/wow.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.scrollUp.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.filterizr.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('frontend/js/slick.min.js') }}"></script>
<script src="{{ asset('frontend/js/sidebar.js') }}"></script>
<script src="{{ asset('frontend/js/app.js') }}"></script>
<script src="{{ asset('frontend/js/dropzone.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://kit.fontawesome.com/0f23c2455c.js" crossorigin="anonymous"></script>
<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    AOS.init();
</script>

<script>
    $(document).ready(function() {
        $(".blog-custom-carousel").owlCarousel({
            loop: true, // Enables infinite loop
            margin: 10, // Space between slides
            nav: false, // Enable navigation arrows
            dots: true, // Enable dots
            autoplay: true, // Auto-slide enabled
            autoplayTimeout: 3000, // 3s per slide
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1
                }, // Mobile: 1 slide
                768: {
                    items: 3
                } // Desktop: 3 slides
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.blog-slider').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            dots: false,
            arrows: true,
            prevArrow: '<div class="slick-nav prev-arrow"><i class="fas fa-chevron-left"></i></div>',
            nextArrow: '<div class="slick-nav next-arrow"><i class="fas fa-chevron-right"></i></div>',
        });
    });
</script>
<script>
    $('.popup-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
        },
        callbacks: {
            elementParse: function(item) {
                console.log(item.el[0].className);
                if (item.el[0].className == 'video') {
                    item.type = 'iframe',
                        item.iframe = {
                            patterns: {
                                youtube: {
                                    index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).

                                    id: 'v=', // String that splits URL in a two parts, second part should be %id%
                                    // Or null - full URL will be returned
                                    // Or a function that should return %id%, for example:
                                    // id: function(url) { return 'parsed id'; } 

                                    src: '//www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe. 
                                },
                                vimeo: {
                                    index: 'vimeo.com/',
                                    id: '/',
                                    src: '//player.vimeo.com/video/%id%?autoplay=1'
                                },
                                gmaps: {
                                    index: '//maps.google.',
                                    src: '%id%&output=embed'
                                }
                            }
                        }
                } else {
                    item.type = 'image',
                        item.tLoading = 'Loading image #%curr%...',
                        item.mainClass = 'mfp-img-mobile',
                        item.image = {
                            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
                        }
                }

            }
        }
    });
</script>
<script>
    $(document).ready(function() {
        // Show the modal after 3 seconds (3000 milliseconds)
        setTimeout(function() {
            var myModal = new bootstrap.Modal(document.getElementById('autoMessageModal'));
            myModal.show();
        }, 3000); // Adjust time as needed
    });
</script>
<script>
    $(document).ready(function() {
        $('.slider-tp').slick({
            autoplay: true,
            autoplaySpeed: 3000, // Change the speed as needed
            dots: false, // Optional: Show dots for navigation
            arrows: true, // Optional: Show arrows for navigation
            prevArrow: '<div class="slick-nav prev-arrow"><i class="fas fa-chevron-left"></i></div>',
            nextArrow: '<div class="slick-nav next-arrow"><i class="fas fa-chevron-right"></i></div>',
            responsive: [{
                    breakpoint: 1024, // Adjust breakpoint as needed
                    settings: {
                        slidesToShow: 1, // Number of slides to show at this breakpoint
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768, // Adjust breakpoint as needed
                    settings: {
                        slidesToShow: 1, // Number of slides to show at this breakpoint
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480, // Adjust breakpoint as needed
                    settings: {
                        slidesToShow: 1, // Number of slides to show at this breakpoint
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });
</script>
<!-- <script>
    $(document).ready(function() {
        // Initialize the main slider
        $('.main-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            prevArrow: '<div class="slick-nav prev-arrow"><i class="fas fa-chevron-left"></i></div>',
            nextArrow: '<div class="slick-nav next-arrow"><i class="fas fa-chevron-right"></i></div>',
            fade: true,
            asNavFor: '.thumbnail-slider' // Link to thumbnail slider
        });

        // Initialize the thumbnail slider
        $('.thumbnail-slider').slick({
            slidesToShow: 4,
            arrows: true,
            prevArrow: '<div class="slick-nav prev-arrow"><i class="fas fa-chevron-left"></i></div>',
            nextArrow: '<div class="slick-nav next-arrow"><i class="fas fa-chevron-right"></i></div>',
            slidesToScroll: 1,
            asNavFor: '.main-slider', // Link back to main slider
            dots: false,
            focusOnSelect: true
        });
    });
</script> -->
<script>
    $(document).ready(function() {
        // Initialize the main slider
        $('.main-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            prevArrow: '<div class="slick-nav prev-arrow"><i class="fas fa-chevron-left"></i></div>',
            nextArrow: '<div class="slick-nav next-arrow"><i class="fas fa-chevron-right"></i></div>',
            fade: true,
            asNavFor: '.thumbnail-slider' // Link with thumbnail slider
        });

        // Initialize the thumbnail slider
        $('.thumbnail-slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.main-slider', // Link with main slider
            focusOnSelect: true,
            arrows: false,
            centerMode: true // Optional: Center the active thumbnail
        });

        // Initialize Magnific Popup on the main slider images
        $('.main-slider').magnificPopup({
            delegate: 'a.popup-image', // Only anchor tags with .popup-image class in main-slider
            type: 'image',
            gallery: {
                enabled: true // Enables gallery mode for navigation
            },
            mainClass: 'mfp-fade', // Optional: Adds fade effect to popup
            removalDelay: 300 // Optional: Delay to match fade effect
        });

        $('#full-view').click(function() {
            // Destroy existing instance to load updated images
            $('.main-slider').magnificPopup('destroy');

            // Reinitialize with updated images
            $('.main-slider').magnificPopup({
                delegate: 'a.popup-image', // Only anchor tags with .popup-image class in main-slider
                type: 'image',
                gallery: {
                    enabled: true // Enables gallery mode for navigation
                },
                mainClass: 'mfp-fade', // Optional: Adds fade effect to popup
                removalDelay: 300 // Optional: Delay to match fade effect
            }).magnificPopup('open'); // Open the popup with new images
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.slick').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.blogc-slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true, // Enables loop
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: true,
            dots: false,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        infinite: true
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        infinite: true
                    }
                }
            ]
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile menu toggle
        const menuItems = document.querySelectorAll('.has-megamenu > a');

        menuItems.forEach(item => {
            item.addEventListener('click', function(e) {
                if (window.innerWidth <= 991) {
                    e.preventDefault();
                    const parent = this.parentElement;
                    parent.classList.toggle('active');
                }
            });
        });
    });
</script>


</body>

</html>
