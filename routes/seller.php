<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Seller as SellerBackend;

/*
|--------------------------------------------------------------------------
| Author Routes
|--------------------------------------------------------------------------
|
| Here is where you can register author routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [SellerBackend\HomeController::class, 'home']);

Route::group([], function(){
    Route::get('register', [SellerBackend\Auth\RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [SellerBackend\Auth\RegisterController::class, 'register']);
    Route::get('email/verify', [SellerBackend\Auth\VerificationController::class, 'show'])->name('verification.notice');
    Route::post('email/verify', [SellerBackend\Auth\VerificationController::class, 'resend'])->name('verification.resend');
    Route::get('email/verify/{id}/{hash}', [SellerBackend\Auth\VerificationController::class, 'verify'])->name('verification.verify');
    Route::get('login', [SellerBackend\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [SellerBackend\Auth\LoginController::class, 'login']);
    Route::post('logout', [SellerBackend\Auth\LoginController::class, 'logout'])->name('logout');
    Route::get('password/confirm', [SellerBackend\Auth\ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
    Route::post('password/confirm', [SellerBackend\Auth\ConfirmPasswordController::class, 'confirm']);
    Route::get('password/reset', [SellerBackend\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [SellerBackend\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [SellerBackend\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [SellerBackend\Auth\ResetPasswordController::class, 'reset'])->name('password.update');
});

Route::group(['middleware' => ['auth:seller']], function () {
    Route::get('home', [SellerBackend\HomeController::class, 'index'])->name('home');
    Route::post('request_approval', [SellerBackend\HomeController::class, 'requestApproval'])->name('approval');
    Route::get('premium/payment', [SellerBackend\HomeController::class, 'premiumPayment'])->name('payment');
    Route::post('premium/payment', [SellerBackend\HomeController::class, 'premiumPayment']);

    Route::get('products', [SellerBackend\ProductController::class, 'index'])->name('products');
    #Route::get('product/{id}', [SellerBackend\ProductController::class, 'get'])->name('product');
    Route::get('product-new', [SellerBackend\ProductController::class, 'new'])->name('product.new');
    Route::post('product-new', [SellerBackend\ProductController::class, 'addNew']);
    Route::get('product/{id}/edit', [SellerBackend\ProductController::class, 'edit'])->name('product.edit');
    Route::post('product/{id}/update', [SellerBackend\ProductController::class, 'update'])->name('product.update');
    Route::post('book/{id}/update-image', [SellerBackend\ProductController::class, 'updateImage'])->name('product.update.image');
    Route::get('product/{id}/trash', [SellerBackend\ProductController::class, 'trash'])->name('product.trash');
/*
    Route::get('orders', [SellerBackend\OrdersController::class, 'index'])->name('orders');
    Route::get('order/{id}', [SellerBackend\OrdersController::class, 'get'])->name('order');

    Route::get('revenue/earnings', [SellerBackend\RevenueController::class, 'earnings'])->name('earnings');
    Route::get('revenue/earning/{id}', [SellerBackend\RevenueController::class, 'earnings'])->name('earning');
    Route::get('revenue/payouts', [SellerBackend\RevenueController::class, 'payouts'])->name('payouts');
    Route::post('revenue/payout_request', [SellerBackend\RevenueController::class, 'payoutNew'])->name('payout.new');
    Route::get('revenue/payout/{id}', [SellerBackend\RevenueController::class, 'payout'])->name('payout');
    Route::post('revenue/payout/{id}/trash', [SellerBackend\RevenueController::class, 'payoutTrash'])->name('payout.trash');

    Route::get('blog', [SellerBackend\BlogController::class, 'index'])->name('blog');
    Route::get('blog/{id}', [SellerBackend\BlogController::class, 'get'])->name('blog.get');
    Route::get('blog_new', [SellerBackend\BlogController::class, 'new'])->name('blog.new');
    Route::post('blog_new', [SellerBackend\BlogController::class, 'addNew']);
    Route::get('blog/{id}/edit', [SellerBackend\BlogController::class, 'edit'])->name('blog.edit');
    Route::post('blog/{id}/update', [SellerBackend\BlogController::class, 'update'])->name('blog.update');
    Route::get('blog/{id}/trash', [SellerBackend\BlogController::class, 'trash'])->name('blog.trash');
    */
    Route::get('profile', [SellerBackend\ProfileController::class, 'index'])->name('profile');
    Route::get('profile/edit', [SellerBackend\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile/update', [SellerBackend\ProfileController::class, 'update'])->name('profile.update');
    Route::post('profile/update/image', [SellerBackend\ProfileController::class, 'updateImage'])->name('profile.update.image');
    Route::get('profile/password', [SellerBackend\ProfileController::class, 'password'])->name('profile.password');
    Route::put('profile/password', [SellerBackend\ProfileController::class, 'passwordUpdate'])->name('profile.password.update');
    Route::get('settings', [SellerBackend\SettingsController::class, 'index'])->name('settings');
});