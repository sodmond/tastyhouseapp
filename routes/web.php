<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User as FrontendController;
use App\Mail\ApprovalStatus;

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

Auth::routes(['verify' => 'true']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about-us', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/faq', [App\Http\Controllers\HomeController::class, 'faq'])->name('faq');
Route::get('/terms-conditions', [App\Http\Controllers\HomeController::class, 'tandc'])->name('tandc');
Route::get('/privacy-policy', [App\Http\Controllers\HomeController::class, 'privacyPolicy'])->name('privacypolicy');
Route::get('/get-state-city/{state_id}', [App\Http\Controllers\HomeController::class, 'getCitiesforState']);
Route::get('/get-sub-categories/{cat_id}', [App\Http\Controllers\HomeController::class, 'getSubCategories']);

Route::get('/shop', [App\Http\Controllers\ShopController::class, 'index'])->name('shop');
Route::get('/shop-item/{id}/{slug}', [App\Http\Controllers\ShopController::class, 'view'])->name('shop.details');

Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog');
Route::get('/blog-details/{id}/{slug}', [App\Http\Controllers\BlogController::class, 'view'])->name('blog.details');

Route::get('/all-vendors', [App\Http\Controllers\VendorController::class, 'index'])->name('sellers');
Route::get('/become-a-vendor', [App\Http\Controllers\VendorController::class, 'about'])->name('seller.about');
Route::get('/vendor-details', [App\Http\Controllers\VendorController::class, 'view'])->name('seller.details');

Route::group(['middleware' => ['auth:web', 'verified'], 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('home', [FrontendController\HomeController::class, 'index'])->name('home');

    Route::get('profile', [FrontendController\ProfileController::class, 'index'])->name('profile');
    Route::get('profile/edit', [FrontendController\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile/update', [FrontendController\ProfileController::class, 'update'])->name('profile.update');
    Route::post('profile/update/image', [FrontendController\ProfileController::class, 'updateImage'])->name('profile.update.image');
    Route::get('profile/password', [FrontendController\ProfileController::class, 'password'])->name('profile.password');
    Route::put('profile/password', [FrontendController\ProfileController::class, 'passwordUpdate'])->name('profile.password.update');
    Route::get('settings', [FrontendController\SettingsController::class, 'index'])->name('settings');
});

/*Route::domain('tastyhousestore')->group(function(){
    //
});

Route::domain('tastyhouseclub')->group(function(){
    Route::get('/', [FrontendController\HomeController::class, 'index'])->name('home');
});*/

Route::get('/mailable', function() {
    return new ApprovalStatus(1);
    #return new ServiceApplication('Mark');
    #return new ApprovalStatus(1);
    #return new SendOrderConfirmation(1, 'ORD373764474');
});