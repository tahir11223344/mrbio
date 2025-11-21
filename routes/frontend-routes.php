<?php

use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\Frontend\HomePageController;
use Illuminate\Support\Facades\Route;



Route::middleware('guest')->group(function () {

  Route::view('/', 'frontend.pages.home')->name('home');
    Route::view('/services', 'frontend.pages.services')->name('services');

  
});

