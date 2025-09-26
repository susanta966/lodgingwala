<?php
$sitedetails = \App\Models\SiteSetting::find(1);
?>
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
        <a href="<?php echo e(route('admin.dashboard')); ?>"><img class="desktop-logo" style="height: 65px;width:220px;"
                                                      src="<?php echo e(asset('admin/siteImage/logo/' . $sitedetails->logo)); ?>" alt="Desktop Logo"> <img class="small-logo"
                                                      src="<?php echo e(asset('admin/siteImage/logo/' . $sitedetails->logo)); ?>" alt="Mobile Logo"></a>
    </div>

    <!-- Side Nav -->
    <div class="ecaps-sidenav" id="ecapsSideNav">
        <!-- Side Menu Area -->
        <div class="side-menu-area">
            <!-- Sidebar Menu -->
            <nav>
                <ul class="sidebar-menu" data-widget="tree">
                    <!-- Dashboard -->
                    <li class="<?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('admin.dashboard')); ?>">
                            <i class="fa fa-dashboard"></i> <!-- Dashboard icon -->
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <!-- Site Settings -->
                    <li class="<?php echo e(request()->is('sitesettings*') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('sitesettings.index')); ?>">
                            <i class="fa fa-cogs"></i> <!-- Settings icon -->
                            <span>Site-Settings</span>
                        </a>
                    </li>

                    <!-- Home Section with Nested Submenus -->
                    <li class="treeview <?php echo e(request()->is('admin/home*') || request()->is('admin/sliders*') || request()->is('admin/popup*') || request()->is('admin/mobile-slider*') || request()->is('admin/banquets*') || request()->is('admin/locations*') ? 'active menu-open' : ''); ?>">
                        <a href="javascript:void(0)">
                            <i class="zmdi zmdi-home"></i> <span>Home</span> <i class="fa fa-angle-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="<?php echo e(request()->is('admin/sliders*') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('sliders.index')); ?>">- Web Sliders</a>
                            </li>
                            <li class="<?php echo e(request()->is('admin/mobile-slider*') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('mobile-slider.index')); ?>">- MObile Sliders</a>
                            </li>
                            <li class="<?php echo e(request()->is('admin/home') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('home.index')); ?>">- Home</a>
                            </li>
                            <li class="<?php echo e(request()->is('admin/popup*') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('admin.popup.index')); ?>">- Pop Up</a>
                            </li>
                            <li class="<?php echo e(request()->is('admin/banquets*') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('banquets.index')); ?>">- Banquets</a>
                            </li>
                            <li class="<?php echo e(request()->is('admin/locations*') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('locations.index')); ?>">- Our Location</a>
                            </li>
                        </ul>
                    </li>

                    <!-- About Us Section with Nested Submenus -->
                    <li class="treeview <?php echo e(request()->is('admin/abouts*') || request()->is('admin/testimonials*') || request()->is('admin/facility*') ? 'active menu-open' : ''); ?>">
                        <a href="javascript:void(0)">
                            <i class="fa fa-info-circle"></i> <span>About us</span> <i class="fa fa-angle-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="<?php echo e(request()->is('admin/abouts') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('abouts.index')); ?>">- About us</a>
                            </li>
                            <li class="<?php echo e(request()->is('admin/testimonials*') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('testimonials.index')); ?>">- Our Testimonial</a>
                            </li>
                            <li class="<?php echo e(request()->is('admin/facility*') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('facility.index')); ?>">- Our Facility</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Rooms Section with Nested Submenus -->
                    <li class="treeview <?php echo e(request()->is('admin/rooms*') || request()->is('admin/amenities*') || request()->is('admin/room_images*')  ? 'active menu-open' : ''); ?>">
                        <a href="javascript:void(0)">
                            <i class="fa fa-bed"></i> <span>Rooms</span> <i class="fa fa-angle-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="<?php echo e(request()->is('admin/rooms') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('rooms.index')); ?>">- Rooms</a>
                            </li>

                            <li class="<?php echo e(request()->is('admin/amenities*') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('amenities.index')); ?>">- Our Amenities</a>
                            </li>
                        </ul>
                    </li>

                    <li class="<?php echo e(request()->is('admin/enquiry*') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('admin.enquiry.index')); ?>">
                            <i class="fa fa-bed"></i>  
                            <span>Room Enquiry</span>    
                        </a>
                    </li>

                    <li class="<?php echo e(request()->is('admin/contact-form*') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('admin.contactform.index')); ?>">
                            <i class="fa fa-envelope"></i>   
                            <span>Contact Enquiry</span>
                        </a>
                    </li>

                    <!-- Rooms Section with Nested Submenus -->
                    



                    <li class="<?php echo e(request()->is('reviews*') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('reviews.index')); ?>">
                            <i class="fa fa-star"></i>   
                            <span>Reviews</span>
                        </a>
                    </li>



                    <li class="<?php echo e(request()->is('booknow*') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('booknow.index')); ?>">
                            <i class="fa fa-shopping-cart"></i> <!-- Book Now icon -->
                            <span>Book-Now</span>
                        </a>
                    </li>

                    <li class="<?php echo e(request()->is('platform*') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('platform.index')); ?>">
                            <i class="fa fa-calendar-check-o"></i> <!-- Platform icon -->
                            <span>Platforms</span>
                        </a>
                    </li>

                    <li class="<?php echo e(request()->is('blogs*') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('blogs.index')); ?>">
                            <i class="fa fa-pencil"></i> <!-- Blogs icon -->
                            <span>Blogs</span>
                        </a>
                    </li>

                    <li class="<?php echo e(request()->routeIs('admin.seo.index') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('admin.seo.index')); ?>">
                            <i class="fa fa-search"></i> <!-- SEO icon -->
                            <span>SEO</span>
                        </a>
                    </li>

                    <li class="<?php echo e(request()->routeIs('admin.log.index') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('admin.log.index')); ?>">
                            <i class="fa fa-database"></i> <!-- Log Data icon -->
                            <span>Log Data</span>
                        </a>
                    </li>

                    <li class="<?php echo e(request()->routeIs('password.change') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('password.change')); ?>">
                            <i class="fa fa-lock"></i> <!-- Change Password icon -->
                            <span>Change Password</span>
                        </a>
                    </li>

                    <li class="<?php echo e(request()->routeIs('admin.logout') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('admin.logout')); ?>">
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



    
<?php /**PATH /var/www/demo82_color_usr/data/www/demo82.colormoon.in/rockdale/resources/views/admin/layout/sidebar.blade.php ENDPATH**/ ?>