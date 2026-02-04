<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\BiomedServicesController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DisclaimerController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LocationPageController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\RentalServiceController;
use App\Http\Controllers\RepairServiceController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\TermsAndConditionsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| 🔁 OLD URL REDIRECTIONS (301 – SEO Friendly)
|--------------------------------------------------------------------------
| These routes handle legacy / old URLs and permanently redirect
| them to new URLs to preserve SEO rankings and backlinks.
| IMPORTANT: These MUST be defined before actual site routes.
|--------------------------------------------------------------------------
*/

Route::permanentRedirect('/Sales', '/');
Route::permanentRedirect('/Service-Request', '/');
Route::permanentRedirect('/MedRad-Smart-System', '/');
Route::permanentRedirect('/ecommerce-product-checkout', '/');
Route::permanentRedirect('/Inventory', '/');
Route::permanentRedirect('/ecommerce-product-detail/3', '/');
Route::permanentRedirect('/categoryProduct', '/');
Route::permanentRedirect('/ecommerce-store', '/');
Route::permanentRedirect('/ecommerce-store/search', '/');
Route::permanentRedirect('/about', '/about-us');
Route::permanentRedirect('/contact', '/contact-us');
Route::permanentRedirect('/BioMed-Service', '/services');
Route::permanentRedirect('/medical-equipment-rental', '/rental-services');
Route::permanentRedirect('/faqs/what-types-of-medical-equipment-do-you-repair-in-dallas-tx', '/faqs');
Route::permanentRedirect('/repair', '/medical-equipment-repair');
Route::permanentRedirect('/rental', '/rental-services');
Route::permanentRedirect('/Rental', '/rental-services');
Route::permanentRedirect('/locations/sanantonio-tx', '/locations/san-antonio-tx');
Route::permanentRedirect('/medical-equipment-repair-in-dallas', '/repairing-services/dallas');
Route::permanentRedirect('/medical-equipment-repair-in-houston', '/repairing-services/houston');
Route::permanentRedirect('/medical-equipment-repair-in-Austin', '/repairing-services/austin');
// Route::permanentRedirect('/medical-equipment-repair-in-San-Antonio', '/repairing-services/san-antonio');
// Route::permanentRedirect('/c-arm-san-antonio', '/c-arm-repairing/c-arm-in-san-antonio');

Route::get('/c-arm', function () {
    return redirect()->route('repair.service.detail', [
        'category' => 'c-arm-repairing',
        'slug' => 'texas',
    ], 301);
});

Route::get('/c-arm-dallas', function () {
    return redirect()->route('repair.service.detail', [
        'category' => 'c-arm-repairing',
        'slug' => 'c-arm-in-dallas',
    ], 301);
});

Route::get('/c-arm-houston', function () {
    return redirect()->route('repair.service.detail', [
        'category' => 'c-arm-repairing',
        'slug' => 'c-arm-in-houston',
    ], 301);
});

Route::get('/c-arm-austin', function () {
    return redirect()->route('repair.service.detail', [
        'category' => 'c-arm-repairing',
        'slug' => 'c-arm-in-austin',
    ], 301);
});

Route::get('/x-ray-machine-for-sale-rent-repair-houston', function () {
    return redirect()->route('repair.service.detail', [
        'category' => 'x-ray-repairing',
        'slug' => 'x-ray-in-houston',
    ], 301);
});

Route::get('/x-ray-machine-for-sale-rent-repair-austin', function () {
    return redirect()->route('repair.service.detail', [
        'category' => 'x-ray-repairing',
        'slug' => 'x-ray-in-austin',
    ], 301);
});

Route::get('/x-ray-machine-for-sale-rent-repair-dallas', function () {
    return redirect()->route('repair.service.detail', [
        'category' => 'x-ray-repairing',
        'slug' => 'x-ray-in-dallas',
    ], 301);
});

Route::get('/x-ray-machine-for-sale-rent-repair-in-san-antonio', function () {
    return redirect()->route('repair.service.detail', [
        'category' => 'x-ray-repairing',
        'slug' => 'x-ray-in-san-antonio',
    ], 301);
});



/*
|--------------------------------------------------------------------------
| ✅ END OF REDIRECTION ROUTES
|--------------------------------------------------------------------------
| All redirects are declared above.
| Actual website routes start below.
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| 🌐 MAIN WEBSITE ROUTES
|--------------------------------------------------------------------------
| These routes handle all frontend pages of the website.
|--------------------------------------------------------------------------
*/

Route::get('/', [LandingPageController::class, 'landingPage'])->name('home');
Route::get('/services', [BiomedServicesController::class, 'mainPage'])->name('biomed-services');

Route::get('/rental-services', [RentalServiceController::class, 'landingPage'])->name('rental-services');
Route::get('/about-us', [AboutUsController::class, 'landingPage'])->name('about-us');

// Specific redirects (must be BEFORE any generic routes)
Route::get('/locations', [LocationPageController::class, 'landingPage'])->name('location');

// Repair services detail routes (must be BEFORE locations/{slug} to avoid conflicts)
Route::get('/repairing-services/{slug}', [RepairServiceController::class, 'repairServiceDetail'])->defaults('category', 'repairing-services')->name('repair.service.repairing');
Route::get('/c-arm-repairing/{slug}', [RepairServiceController::class, 'repairServiceDetail'])->defaults('category', 'c-arm-repairing')->name('repair.service.carm');
Route::get('/x-ray-repairing/{slug}', [RepairServiceController::class, 'repairServiceDetail'])->defaults('category', 'x-ray-repairing')->name('repair.service.xray');

// Location detail route (after repair services to avoid conflicts)
Route::get('/locations/{slug}', [LocationPageController::class, 'locationDetail'])->name('location.detail');
Route::get('/contact-us', [ContactUsController::class, 'landingPage'])->name('contact-us');
Route::get('/privacy-policy', [PrivacyPolicyController::class, 'landingPage'])->name('privacy');
Route::get('/terms-and-conditions', [TermsAndConditionsController::class, 'landingPage'])->name('terms');
Route::get('/disclaimer', [DisclaimerController::class, 'landingPage'])->name('disclaimer');
Route::get('/blog', [BlogController::class, 'landingPage'])->name('blogs');
Route::get('/blog/{slug}', [BlogController::class, 'blogDetail'])->name('blog.detail');
Route::post('/blog-comment/{slug}', [BlogController::class, 'blogComment'])->name('post.blog.comment');
Route::get('/feedback', [ReviewsController::class, 'landingPage'])->name('feedback');
Route::post('/feedback', [ReviewsController::class, 'store'])->name('post.feedback');

// web.php
Route::get('/rentals/filter', [AjaxController::class, 'filterRentalProducts'])->name('rentals.filter');
Route::get('/faqs', [FaqController::class, 'landingPage'])->name('faqs');
Route::get('/medical-equipment-repair', [RepairServiceController::class, 'landingPage'])->name('repair');

// Sitemap route
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/{category}/{slug}', [RepairServiceController::class, 'repairServiceDetail'])->name('repair.service.detail');

// ===========================
// Inquiry Form
// ===========================
Route::controller(InquiryController::class)->group(function () {
    Route::post('/contact-us', 'contactUsForm')->name('contact.us.form');
    Route::post('/service-request', 'serviceRequest')->name('service.request.submit');
    Route::post('/consultancy', 'consultancyForm')->name('consultancy.submit');
    Route::post('/buy-product', 'buyProductForm')->name('buy.product.submit');
    Route::post('/quote-submit', 'getAQuote')->name('get-a-quote.submit');
});

// ===========================
// Ajax Routes
// ===========================

Route::prefix('ajax')->group(function () {

    // Get cities route
    Route::get('/get-cities/{state_id}', [LandingPageController::class, 'getCities'])->name('get.cities');

    // Blog filter route
    Route::get('/blogs/filter', [BlogController::class, 'filterBlogs'])->name('blogs.filter');

    Route::get('/best-products/filter', [LandingPageController::class, 'filter'])->name('best.products.filter');

    Route::get('/latest-products/filter', [LandingPageController::class, 'latestProductsfilter'])->name('latest.products.filter');

    // Reviews filter route
    Route::get('/feedbacks/filter', [ReviewsController::class, 'filterReviews'])->name('reviews.filter');
});

// IMPORTANT: Generic slug routes should be placed LAST
// This ensures all specific routes are matched first
// DISABLED: This route was catching single-segment URLs and causing redirect loops
Route::get('/{slug}', [OfferController::class, 'offerDetail'])->name('offer.detail');
