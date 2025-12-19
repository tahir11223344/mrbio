<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\BiomedServicesController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DisclaimerController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LocationPageController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\RentalServiceController;
use App\Http\Controllers\RepairServiceController;
use App\Http\Controllers\TermsAndConditionsController;
use App\Models\LandingPage;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

    Route::get('/', [LandingPageController::class, 'landingPage'])->name('home');
    Route::get('/services', [BiomedServicesController::class, 'mainPage'])->name('biomed-services');

    Route::get('/rental', [RentalServiceController::class, 'landingPage'])->name('rental-services');
    Route::get('/about-us', [AboutUsController::class, 'landingPage'])->name('about-us');

    Route::get('/location', [LocationPageController::class, 'landingPage'])->name('location');
    Route::get('/location/{slug}', [LocationPageController::class, 'locationDetail'])->name('location.detail');
    Route::get('/contact-us', [ContactUsController::class, 'landingPage'])->name('contact-us');
    Route::get('/privacy', [PrivacyPolicyController::class, 'landingPage'])->name('privacy');
    Route::get('/terms', [TermsAndConditionsController::class, 'landingPage'])->name('terms');
    Route::get('/disclaimer', [DisclaimerController::class, 'landingPage'])->name('disclaimer');
    Route::get('/blogs', [BlogController::class, 'landingPage'])->name('blogs');
    Route::get('/blog/{slug}', [BlogController::class, 'blogDetail'])->name('blog.detail');
    Route::view('/feedback', 'frontend.pages.feedback')->name('feedback');

    // web.php
    Route::get('/rentals/filter', [AjaxController::class, 'filterRentalProducts'])->name('rentals.filter');
    Route::view('/faqs', 'frontend.pages.faqs')->name('faqs');

    Route::get('/repair', [RepairServiceController::class, 'landingPage'])->name('repair');
    Route::get('/{category}/{slug}', [RepairServiceController::class, 'repairServiceDetail'])->name('repair.service.detail');

    Route::prefix('ajax')->group(function () {

        // Get cities route
        Route::get('/get-cities/{state_id}', [LandingPageController::class, 'getCities'])
            ->name('get.cities');

        // Blog filter route
        Route::get('/blogs/filter', [BlogController::class, 'filterBlogs'])
            ->name('blogs.filter');

        Route::get('/best-products/filter', [LandingPageController::class, 'filter'])
            ->name('best.products.filter');

        Route::get('/latest-products/filter', [LandingPageController::class, 'latestProductsfilter'])
            ->name('latest.products.filter');
    });
});
