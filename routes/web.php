<?php

use App\Http\Controllers\AboutCardController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\Apps\PermissionManagementController;
use App\Http\Controllers\Apps\RoleManagementController;
use App\Http\Controllers\Apps\UserManagementController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\BiomedServicesController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BrandWeCarryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\CompanyCertificationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\OemContentController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\RentalServiceController;
use App\Http\Controllers\RepairServiceController;
use App\Http\Controllers\WhatWeDoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/', [DashboardController::class, 'index']);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CKEditor
    Route::post('/ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.upload');


    Route::name('user-management.')->group(function () {
        Route::resource('/user-management/users', UserManagementController::class);
        Route::resource('/user-management/roles', RoleManagementController::class);
        Route::resource('/user-management/permissions', PermissionManagementController::class);
    });


    // ===========================
    // Landing Page
    // ===========================
    Route::controller(LandingPageController::class)->prefix('admin/landing-page')->as('admin-landing-page.')->group(function () {
        Route::get('/', 'index')->name('list');
        Route::post('/store', 'storeOrUpdate')->name('storeOrUpdate');
        Route::post('/remove-slider-image', 'removeSliderImage')->name('remove-slider-image');
    });

    // ===========================
    // Category
    // ===========================
    Route::controller(CategoryController::class)->prefix('admin/category')->as('admin-category.')->group(function () {
        Route::get('/', 'index')->name('list');
        Route::post('/store', 'store')->name('store');
        Route::put('/{category}', 'update')->name('update');
        Route::delete('/{category}', 'destroy')->name('destroy');
    });

    // ===========================
    // Products
    // ===========================
    Route::controller(ProductController::class)->prefix('admin/products')->as('admin-products.')->group(function () {
        Route::get('/', 'index')->name('list');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{product}/edit', 'edit')->name('edit');
        Route::put('/{product}/update', 'update')->name('update');
        Route::delete('/{product}/delete', 'destroy')->name('destroy');
        Route::post('/remove-gallery-image', 'removeGalleryImage')->name('remove-gallery-image');
    });

    // ===========================
    // Offers
    // ===========================
    Route::controller(OfferController::class)->prefix('admin/offers')->as('admin-offers.')->group(function () {
        Route::get('/', 'index')->name('list');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{offer}/edit', 'edit')->name('edit');
        Route::put('/{offer}/update', 'update')->name('update');
        Route::delete('/{offer}/delete', 'destroy')->name('destroy');
        Route::post('/remove-gallery-image', 'removeGalleryImage')->name('remove-gallery-image');
    });

    // ===========================
    // OEMS
    // ===========================
    Route::controller(OemContentController::class)->prefix('admin/oems')->as('admin-oems.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{oem}/edit', 'edit')->name('edit');
        Route::put('/{oem}/update', 'update')->name('update');
        Route::delete('/{oem}/delete', 'destroy')->name('destroy');
    });

    // ===========================
    // Biomed Servies 
    // ===========================
    Route::controller(BiomedServicesController::class)->prefix('admin/biomed/service')->as('admin-biomed-service-page.')->group(function () {
        Route::get('/', 'index')->name('main-page');
        Route::post('/store', 'store')->name('store');
    });

    // ===========================
    // Rental Servies 
    // ===========================
    Route::controller(RentalServiceController::class)->prefix('admin/rental/service')->as('admin-rental-service-page.')->group(function () {
        Route::get('/', 'index')->name('main-page');
        Route::post('/store', 'store')->name('store');
    });

    // ===========================
    // Repair Servies 
    // ===========================
    Route::controller(RepairServiceController::class)->prefix('admin/repair/service')->as('admin-repair-service-page.')->group(function () {
        Route::get('/', 'index')->name('main-page');
        Route::post('/store', 'store')->name('store');
    });

    // ===========================
    // Repair Servies Sub Pages
    // ===========================
    Route::controller(RepairServiceController::class)->prefix('admin/repair/service/sub-pages')->as('admin-repair-service.sub-pages.')->group(function () {
        Route::get('/', 'subPagesList')->name('list');
        Route::get('/create', 'subPagesCreate')->name('create');
        Route::post('/store', 'subPagesStore')->name('store');
        Route::get('/{id}/edit', 'subPagesEdit')->name('edit');
        Route::put('/{id}/update', 'subPagesUpdate')->name('update');
        Route::delete('/{id}/destroy', 'subPagesDestroy')->name('destroy');
        Route::post('/remove-gallery-image', 'removeGalleryImage')->name('remove-gallery-image');
    });

    // ===========================
    // FAQs
    // ===========================
    Route::controller(FaqController::class)->prefix('admin/faqs')->as('admin-faqs.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}/update', 'update')->name('update');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy');
    });

    // ===========================
    // Blog main Page
    // ===========================
    Route::controller(BlogController::class)->prefix('admin/blog/main-page')->as('admin.blog.main.')->group(function () {
        Route::get('/', 'mainPage')->name('page');
        Route::post('/store', 'storeOrUpdate')->name('storeOrUpdate');
    });

    // ===========================
    // Blog 
    // ===========================
    Route::controller(BlogController::class)->prefix('admin/blogs')->as('admin-blogs.')->group(function () {
        Route::get('/list', 'list')->name('list');
        Route::get('/create', 'create')->name('create');
        Route::post('/upload', 'upload')->name('upload');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}/update', 'update')->name('update');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy');
    });

    // ===========================
    // ABout Us Landing Page
    // ===========================
    Route::controller(AboutUsController::class)->prefix('admin/about-us')->as('admin.about-us.main.')->group(function () {
        Route::get('/', 'mainPage')->name('page');
        Route::post('/store', 'storeOrUpdate')->name('storeOrUpdate');
    });

    // ===========================
    // ABout Us Cards
    // ===========================
    Route::controller(AboutCardController::class)->prefix('admin/about-us/card')->as('admin.about-us.cards.')->group(function () {
        Route::get('/', 'list')->name('list');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}/update', 'update')->name('update');
        Route::delete('/{id}/delete', 'delete')->name('delete');
    });

    // ===========================
    // Branch We Carry Cards
    // ===========================
    Route::controller(BrandWeCarryController::class)->prefix('admin/brand-we-carry')->as('admin.brand-we-carry.')->group(function () {
        Route::get('/', 'list')->name('list');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}/update', 'update')->name('update');
        Route::delete('/{id}/delete', 'destroy')->name('delete');
    });

    // ===========================
    // What we do
    // ===========================
    Route::controller(WhatWeDoController::class)->prefix('admin/what-we-do')->as('admin.what-we-do.')->group(function () {
        Route::get('/', 'list')->name('list');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}/update', 'update')->name('update');
        Route::delete('/{id}/delete', 'destroy')->name('delete');
    });

    // ===========================
    // CompanyCertification
    // ===========================
    Route::controller(CompanyCertificationController::class)->prefix('admin/company-certification')->as('admin.company-certification.')->group(function () {
        Route::get('/', 'list')->name('list');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}/update', 'update')->name('update');
        Route::delete('/{id}/delete', 'destroy')->name('delete');
    });


    // ===========================
    // General Setting 
    // ===========================
    Route::controller(GeneralSettingController::class)->prefix('admin/general-setting')->as('admin-general.')->group(function () {
        Route::get('/', 'index')->name('settings');
        Route::post('/settings', 'update')->name('settings.update');
    });
});

Route::get('/error', function () {
    abort(500);
});

Route::get('/auth/redirect/{provider}', [SocialiteController::class, 'redirect']);

require __DIR__ . '/auth.php';
require __DIR__ . '/frontend-routes.php';
