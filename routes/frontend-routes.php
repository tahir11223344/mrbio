<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\BiomedServicesController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\RentalServiceController;
use App\Http\Controllers\RepairServiceController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

    Route::get('/', [LandingPageController::class, 'landingPage'])->name('home');
    Route::get('/services', [BiomedServicesController::class, 'mainPage'])->name('biomed-services');

    Route::view('/services', 'frontend.pages.services')->name('services');
    Route::get('/rental', [RentalServiceController::class, 'landingPage'])->name('rental-services');
    Route::get('/about-us', [AboutUsController::class, 'landingPage'])->name('about-us');

    Route::get('/repair', [RepairServiceController::class, 'landingPage'])->name('repair');
    Route::get('/{category}/{slug}', [RepairServiceController::class, 'repairServiceDetail'])->name('repair.service.detail');
    Route::view('/location', 'frontend.pages.location')->name('location');
    Route::view('/locationdetail', 'frontend.pages.locationdetail')->name('locationdetail');
    Route::view('/contact-us', 'frontend.pages.contact-us')->name('contact-us');
    Route::view('/privacy', 'frontend.pages.privacypolicy')->name('privacy');
    Route::view('/terms', 'frontend.pages.termspage')->name('terms');
    Route::view('/disclaimer', 'frontend.pages.disclaimer')->name('disclaimer');
    Route::view('/blog', 'frontend.pages.blog')->name('blog');
    Route::view('/blogdetail', 'frontend.pages.blogdetail')->name('blogdetail');
    Route::view('/feedback', 'frontend.pages.feedback')->name('feedback');

    Route::get('/get-cities/{state_id}', [LandingPageController::class, 'getCities'])->name('get.cities');

    // web.php
    Route::get('/rentals/filter', [AjaxController::class, 'filterRentalProducts'])->name('rentals.filter');
    Route::view('/faqs', 'frontend.pages.faqs')->name('faqs');

});
