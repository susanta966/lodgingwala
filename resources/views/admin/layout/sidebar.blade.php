@php
$sitedetails = \App\Models\SiteSetting::find(1);
$defaultLogo = asset('admin/img/core-img/logo.png');
$defaultFavicon = asset('admin/img/core-img/favicon.png');
$defaultFtlogo = asset('admin/img/core-img/small-logo.png');
@endphp
<style>
    .ecaps-logo a img {
        max-height: 85px;
        width: auto;
        margin: auto;
    }
    /* Ensures treeview items are collapsible by default */
    .sidebar-menu .treeview-menu {
        display: none;
    }

    /* Makes the submenu visible when the parent treeview has the 'menu-open' class */
    .sidebar-menu .treeview.menu-open .treeview-menu {
        display: block;
    }

</style>
<!-- Sidemenu Area -->
<div class="ecaps-sidemenu-area">
    <!-- Desktop Logo -->
    <div class="ecaps-logo">
       <a href="{{ route('admin.dashboard') }}">
          <img class="desktop-logo" style="height: 65px;width:220px;"
              src="{{ $sitedetails && $sitedetails->logo ? asset('admin/siteImage/logo/' . $sitedetails->logo) : $defaultLogo }}" alt="Desktop Logo">
          <img class="small-logo"
              src="{{ $sitedetails && $sitedetails->logo ? asset('admin/siteImage/logo/' . $sitedetails->logo) : $defaultLogo }}" alt="Mobile Logo">
       </a>
    </div>

    <!-- Side Nav -->
    <div class="ecaps-sidenav" id="ecapsSideNav">
        <!-- Side Menu Area -->
        <div class="side-menu-area">
            <!-- Sidebar Menu -->
            <nav>
                <ul class="sidebar-menu" data-widget="tree">
                    <!-- Dashboard -->
                    <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-dashboard"></i> <!-- Dashboard icon -->
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <!-- Site Settings -->
                    <li class="{{ request()->is('sitesettings*') ? 'active' : '' }}">
                        <a href="{{ route('sitesettings.index') }}">
                            <i class="fa fa-cogs"></i> <!-- Settings icon -->
                            <span>Site-Settings</span>
                        </a>
                    </li>

                    <!-- Home Section with Nested Submenus -->
                    <li class="treeview {{ request()->is('admin/home*') || request()->is('admin/sliders*') || request()->is('admin/popup*') || request()->is('admin/mobile-slider*') || request()->is('admin/banquets*') || request()->is('admin/locations*') ? 'active menu-open' : '' }}">
                        <a href="javascript:void(0)">
                            <i class="zmdi zmdi-home"></i> <span>Home</span> <i class="fa fa-angle-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ request()->is('admin/sliders*') ? 'active' : '' }}">
                                <a href="{{ route('sliders.index') }}">- Web Sliders</a>
                            </li>
                            <li class="{{ request()->is('admin/mobile-slider*') ? 'active' : '' }}">
                                <a href="{{ route('mobile-slider.index') }}">- MObile Sliders</a>
                            </li>
                            <li class="{{ request()->is('admin/home') ? 'active' : '' }}">
                                <a href="{{ route('home.index') }}">- Home</a>
                            </li>
                            <li class="{{ request()->is('admin/popup*') ? 'active' : '' }}">
                                <a href="{{ route('admin.popup.index') }}">- Pop Up</a>
                            </li>
                            <li class="{{ request()->is('admin/banquets*') ? 'active' : '' }}">
                                <a href="{{ route('banquets.index') }}">- Banquets</a>
                            </li>
                            <li class="{{ request()->is('admin/locations*') ? 'active' : '' }}">
                                <a href="{{ route('locations.index') }}">- Our Location</a>
                            </li>
                        </ul>
                    </li>

                    <!-- About Us Section with Nested Submenus -->
                    <li class="treeview {{ request()->is('admin/abouts*') || request()->is('admin/testimonials*') || request()->is('admin/facility*') ? 'active menu-open' : '' }}">
                        <a href="javascript:void(0)">
                            <i class="fa fa-info-circle"></i> <span>About us</span> <i class="fa fa-angle-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ request()->is('admin/abouts') ? 'active' : '' }}">
                                <a href="{{ route('abouts.index') }}">- About us</a>
                            </li>
                            <li class="{{ request()->is('admin/testimonials*') ? 'active' : '' }}">
                                <a href="{{ route('testimonials.index') }}">- Our Testimonial</a>
                            </li>
                            <li class="{{ request()->is('admin/facility*') ? 'active' : '' }}">
                                <a href="{{ route('facility.index') }}">- Our Facility</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Rooms Section with Nested Submenus -->
                    <li class="treeview {{ request()->is('admin/rooms*') || request()->is('admin/amenities*') || request()->is('admin/room_images*')  ? 'active menu-open' : '' }}">
                        <a href="javascript:void(0)">
                            <i class="fa fa-bed"></i> <span>Rooms</span> <i class="fa fa-angle-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ request()->is('admin/rooms') ? 'active' : '' }}">
                                <a href="{{ route('rooms.index') }}">- Rooms</a>
                            </li>

                            <li class="{{ request()->is('admin/amenities*') ? 'active' : '' }}">
                                <a href="{{ route('amenities.index') }}">- Our Amenities</a>
                            </li>
                        </ul>
                    </li>

                    <li class="{{ request()->is('admin/enquiry*') ? 'active' : '' }}">
                        <a href="{{ route('admin.enquiry.index') }}">
                            <i class="fa fa-bed"></i>  
                            <span>Room Enquiry</span>    
                        </a>
                    </li>

                    <li class="{{ request()->is('admin/contact-form*') ? 'active' : '' }}">
                        <a href="{{ route('admin.contactform.index') }}">
                            <i class="fa fa-envelope"></i>   
                            <span>Contact Enquiry</span>
                        </a>
                    </li>

                    <!-- Rooms Section with Nested Submenus -->
                    {{-- <li class="treeview {{ request()->is('admin/enquiry*') || request()->is('admin/contact-form*') ? 'active menu-open' : '' }}">
                    <a href="javascript:void(0)">
                        <i class="fa fa-info"></i> <span>Contact</span> <i class="fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ request()->is('admin/enquiry') ? 'active' : '' }}">
                            <a href="{{ route('admin.enquiry.index') }}">- Enquiry</a>
                        </li>
                        <li class="{{ request()->is('admin/contact-form') ? 'active' : '' }}">
                            <a href="{{ route('admin.contactform.index') }}">- Contact Details</a>
                        </li>
                    </ul>
                    </li> --}}



                    <li class="{{ request()->is('reviews*') ? 'active' : '' }}">
                        <a href="{{ route('reviews.index') }}">
                            <i class="fa fa-star"></i>   
                            <span>Reviews</span>
                        </a>
                    </li>



                    <li class="{{ request()->is('booknow*') ? 'active' : '' }}">
                        <a href="{{ route('booknow.index') }}">
                            <i class="fa fa-shopping-cart"></i> <!-- Book Now icon -->
                            <span>Book-Now</span>
                        </a>
                    </li>

                    <li class="{{ request()->is('platform*') ? 'active' : '' }}">
                        <a href="{{ route('platform.index') }}">
                            <i class="fa fa-calendar-check-o"></i> <!-- Platform icon -->
                            <span>Platforms</span>
                        </a>
                    </li>

                    <li class="{{ request()->is('blogs*') ? 'active' : '' }}">
                        <a href="{{ route('blogs.index') }}">
                            <i class="fa fa-pencil"></i> <!-- Blogs icon -->
                            <span>Blogs</span>
                        </a>
                    </li>

                    <li class="{{ request()->routeIs('admin.seo.index') ? 'active' : '' }}">
                        <a href="{{ route('admin.seo.index') }}">
                            <i class="fa fa-search"></i> <!-- SEO icon -->
                            <span>SEO</span>
                        </a>
                    </li>

                    <li class="{{ request()->routeIs('admin.log.index') ? 'active' : '' }}">
                        <a href="{{ route('admin.log.index') }}">
                            <i class="fa fa-database"></i> <!-- Log Data icon -->
                            <span>Log Data</span>
                        </a>
                    </li>

                    <li class="{{ request()->routeIs('password.change') ? 'active' : '' }}">
                        <a href="{{ route('password.change') }}">
                            <i class="fa fa-lock"></i> <!-- Change Password icon -->
                            <span>Change Password</span>
                        </a>
                    </li>

                    <li class="{{ request()->routeIs('admin.logout') ? 'active' : '' }}">
                        <a href="{{ route('admin.logout') }}">
                            <i class="fa fa-sign-out"></i> <!-- Logout icon -->
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>




        </div>
    </div>
</div>

<!-- Page Content -->
<div class="ecaps-page-content">



    {{-- 
    1st level menu 
    <li class="treeview menu-open">
    <a href="javascript:void(0)"><i class="zmdi zmdi-time-interval"></i><span>Icons</span> <i
            class="fa fa-angle-right"></i></a>
        <ul class="treeview-menu" style="display: block;">
            <li><a href="font-awesome.html">- Font-Awsome Icons</a></li>
            <li><a href="pe-7-stroke.html">- Pe-7 Stroke Icons</a></li>
            <li><a href="matarial-icons.html">- Materialize Icons</a></li>
            <li><a href="themify-icons.html">- Themify Icons</a></li>
            <li><a href="elegant-icons.html">- Elegant Icons</a></li>
            <li><a href="et-line-icons.html">- Et-line Icons</a></li>
        </ul>
    </li>
   --  }}

    {{-- 
     2nd level menu
    <li class="treeview menu-ope                                    n">
            <a href="javascript:void(0)"><i class="zmdi zmdi-view-list"></i> <span>Multilevel</span>                    <i
                    class="fa fa-angle-right"></i></a>
        <ul class="treeview-menu" style="display: block;">
            <li><a href="#">Level One</a></li>
            <li class="treeview menu        -open">
                <a href="#">Level One <i class="fa fa-angle-right"></i><                        /a>
                        <ul class="treeview-menu" style="displa                            y: block;">
                            <li><a href="#">-                            Level Two</a></li>
                            <li><a hr                            ef="#">- Level Two</a></li>
                            <                        li><a href="#">- Level                    Two</a></li>
                        </ul>
                    <                /li>
                    <li><a href="#">Level One</a></li>
                </ul>
    </li> 
    --}}
