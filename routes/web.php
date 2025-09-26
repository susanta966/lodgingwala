<?php
// admin side
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AmenitieController;
use App\Http\Controllers\Admin\BanquetController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\BooknowController;
use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PlatformController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\RoomImagesController;
use App\Http\Controllers\Admin\MobileSliderController;

// webside
use App\Http\Controllers\Frontend\BookPageController;
use App\Http\Controllers\Frontend\BlogPageController;
use App\Http\Controllers\Frontend\AboutPageController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\RoomPageController;
use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\Frontend\ReviewPageController;
use App\Http\Controllers\Frontend\BanquetPageController;
use Illuminate\Support\Facades\Route;

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider and all of them will
  | be assigned to the "web" middleware group. Make something great!
  |
 */


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
        //dashboard
        Route::get('/logout', [DashboardController::class, 'logout'])->name('admin.logout');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        // Site settings
        Route::resource('sitesettings', SiteSettingController::class);
        Route::resource('blogs', BlogController::class);
        Route::delete('/blogs/{id}/image/{index}', [BlogController::class, 'destroyImage'])->name('blogs.imagedestroy');
        Route::post('rooms/{roomId}/update-image-priority', [RoomController::class, 'updateImagePriority'])->name('rooms.updateImagePriority');
        Route::post('/blogs/{id}/updateImagePriority', [BlogController::class, 'updateImagePriority'])->name('blogs.updateImagePriority');
               Route::post('/banquets/{id}/updateImagePriority', [BanquetController::class, 'updateImagePriority'])->name('banquets.updateImagePriority');
        Route::resource('booknow', BooknowController::class);
        Route::delete('booknow/{id}/image/{index}', [BooknowController::class, 'destroyImage'])->name('booknow.destroyImage');
        Route::resource('facility', FacilityController::class);
        Route::resource('sliders', SliderController::class);
        Route::resource('abouts', AboutController::class);
        Route::resource('reviews', ReviewController::class);
        Route::resource('testimonials', TestimonialController::class);
        Route::resource('locations', LocationController::class);
        Route::resource('amenities', AmenitieController::class);
        Route::resource('rooms', RoomController::class);
        Route::resource('room-images', RoomImagesController::class);
        Route::resource('banquets', BanquetController::class);
        Route::resource('home', HomeController::class);
        Route::resource('mobile-slider', MobileSliderController::class);

        Route::resource('platform', PlatformController::class);
        Route::post('/blogs/{id}/update-image-order', [BlogController::class, 'updateImageOrder'])
                ->name('blogs.update-image-order');
        Route::post('/rooms/{id}/update-image-order', [RoomController::class, 'updateImageOrder'])
                ->name('rooms.update-image-order');
        Route::post('/banquets/{id}/update-image-order', [BanquetController::class, 'updateImageOrder'])
                ->name('banquets.update-image-order');
        Route::delete('rooms/{id}/image/{index}', [RoomController::class, 'destroyImage'])->name('rooms.destroyImage');
        Route::delete('banquets/{id}/image/{index}', [BanquetController::class, 'destroyImage'])->name('banquets.destroyImage');
        //logs
        Route::get('/log', [LoginController::class, 'index'])->name('admin.log.index');
        Route::delete('/log/delete/{id}', [LoginController::class, 'delete'])->name('admin.log.delete');

        //SEO
        Route::get('/seo', [SeoController::class, 'index'])->name('admin.seo.index');
        Route::get('/seo/{id}', [SeoController::class, 'edit'])->name('admin.seo.edit');
        Route::post('/seo/{id}', [SeoController::class, 'update'])->name('admin.seo.update');

        //Enquiry
        Route::get('/enquiry', [EnquiryController::class, 'index'])->name('admin.enquiry.index');
        Route::delete('/enquiry/delete/{id}', [EnquiryController::class, 'delete'])->name('admin.enquiry.delete');
        Route::get('/contact-form', [EnquiryController::class, 'contactindex'])->name('admin.contactform.index');
        //change password
        Route::get('/change-password', [ChangePasswordController::class, 'showChangePasswordForm'])->name('password.change');
        Route::post('/change-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

        Route::get('/popup', [HomeController::class, 'popupIndex'])->name('admin.popup.index');
        Route::get('/popup/{id}', [HomeController::class, 'popupedit'])->name('admin.popup.edit');
        Route::put('/popup/{id}', [HomeController::class, 'popupupdate'])->name('admin.popup.update');
});

// Admin login
Route::get('admin/login', [LoginController::class, 'showLoginForm'])->name('admin.show');
Route::post('admin/login', [LoginController::class, 'login'])->name('admin.login');
// Route::get('/',function(){
//     return view('frontend.about');
// });
Route::get('/', [HomePageController::class, 'index'])->name('frontend.home');
Route::get('/about', [AboutPageController::class, 'index'])->name('frontend.about');
Route::get('/rooms-page', [RoomPageController::class, 'index'])->name('frontend.room');
Route::get('/rooms-details/{slug}', [RoomPageController::class, 'show'])->name('frontend.room-details');
Route::get('/blog-page', [BlogPageController::class, 'index'])->name('frontend.blog');
Route::get('/blog-details/{slug}', [BlogPageController::class, 'show'])->name('frontend.blog-details');
Route::get('/book-now', [BookPageController::class, 'index'])->name('frontend.booknow');
Route::get('/contact', [ContactController::class, 'index'])->name('frontend.contact');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
Route::get('review-page', [ReviewPageController::class, 'index'])->name('frontend.review');
Route::get('/get-platform-data', [BookPageController::class, 'getPlatformData'])->name('frontend.getPlatformData');
Route::get('/banquet-details/{slug}', [BanquetPageController::class, 'index'])->name('frontend.banquet-details');
Route::get('/banquet-details/{slug}', [BanquetPageController::class, 'index'])->name('frontend.banquet-details');
Route::get('/banquetpage}', [BanquetPageController::class, 'banquetpage'])->name('frontend.banquetpage');