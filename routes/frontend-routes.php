<?php

use App\Http\Controllers\BiomedServicesController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\RentalServiceController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

    Route::get('/', [LandingPageController::class, 'landingPage'])->name('home');
    Route::get('/services', [BiomedServicesController::class, 'mainPage'])->name('biomed-services');

    // Route::view('/services', 'frontend.pages.services')->name('services');
    Route::get('/rental', [RentalServiceController::class, 'landingPage'])->name('rental-services');
    Route::view('/about', 'frontend.pages.about')->name('about');

    Route::view('/repaire', 'frontend.pages.repaire')->name('repaire');
    Route::view('/repairesubservice', 'frontend.pages.repairesubservice')->name('repairesubservice');
    Route::view('/location', 'frontend.pages.location')->name('location');
    Route::view('/locationdetail', 'frontend.pages.locationdetail')->name('locationdetail');
    Route::view('/contact-us', 'frontend.pages.contact-us')->name('contact-us');

    Route::get('/get-cities/{state_id}', [LandingPageController::class, 'getCities'])->name('get.cities');
});
