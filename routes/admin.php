<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin as AdminBackend;

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

Route::get('/', [AdminBackend\HomeController::class, 'home']);

Route::group([], function(){
    Route::get('login', [AdminBackend\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminBackend\Auth\LoginController::class, 'login']);
    Route::post('logout', [AdminBackend\Auth\LoginController::class, 'logout'])->name('logout');
    Route::get('password/confirm', [AdminBackend\Auth\ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
    Route::post('password/confirm', [AdminBackend\Auth\ConfirmPasswordController::class, 'confirm']);
    Route::get('password/reset', [AdminBackend\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [AdminBackend\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [AdminBackend\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [AdminBackend\Auth\ResetPasswordController::class, 'reset'])->name('password.update');
});

Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('home', [AdminBackend\HomeController::class, 'index'])->name('home');
    Route::post('search', [AdminBackend\HomeController::class, 'search'])->name('search');

    Route::get('users', [AdminBackend\UsersController::class, 'index'])->name('users');
    Route::get('users/export', [AdminBackend\UsersController::class, 'export'])->name('users.export');
    Route::get('user/{id}', [AdminBackend\UsersController::class, 'get'])->name('user');
    Route::get('user/{id}/orders', [AdminBackend\UsersController::class, 'orders'])->name('user.orders');
    Route::get('user/{id}/posts', [AdminBackend\UsersController::class, 'posts'])->name('user.posts');
    Route::get('user/{id}/comments', [AdminBackend\UsersController::class, 'comments'])->name('user.comments');
    Route::get('user/{id}/ban', [AdminBackend\UsersController::class, 'ban'])->name('user.ban');

    Route::get('vendors', [AdminBackend\SellerController::class, 'index'])->name('vendors');
    Route::get('vendors/pending_approval', [AdminBackend\SellerController::class, 'pending'])->name('vendors.pending');
    Route::get('vendors/export', [AdminBackend\SellerController::class, 'export'])->name('vendors.export');
    Route::get('vendor/{id}', [AdminBackend\SellerController::class, 'get'])->name('vendor');
    Route::post('vendor/{id}/approval', [AdminBackend\SellerController::class, 'approval'])->name('vendor.approval');
    Route::get('vendor/{id}/books', [AdminBackend\SellerController::class, 'books'])->name('vendor.products');
    Route::get('vendor/{id}/ban', [AdminBackend\SellerController::class, 'ban'])->name('vendor.ban');

    Route::get('categories', [AdminBackend\CategoryController::class, 'index'])->name('categories');
    Route::get('categories/export', [AdminBackend\CategoryController::class, 'export'])->name('categories.export');
    Route::get('categories/new', [AdminBackend\CategoryController::class, 'new'])->name('category.new');
    Route::post('categories/new', [AdminBackend\CategoryController::class, 'newAdd'])->name('category.new.add');
    Route::get('category/{id}/edit', [AdminBackend\CategoryController::class, 'edit'])->name('category.edit');
    Route::post('category/{id}/update', [AdminBackend\CategoryController::class, 'update'])->name('category.update');
    Route::get('category/{id}/trash', [AdminBackend\CategoryController::class, 'trash'])->name('category.trash');
 
    Route::get('products', [AdminBackend\ProductController::class, 'index'])->name('products');
    Route::get('product/{id}', [AdminBackend\ProductController::class, 'get'])->name('product');
    /*Route::get('product_new', [AdminBackend\ProductController::class, 'new'])->name('product.new');
    Route::post('product_new', [AdminBackend\ProductController::class, 'addNew']);
    Route::get('product/{id}/edit', [AdminBackend\ProductController::class, 'edit'])->name('product.edit');
    Route::post('product/{id}/update', [AdminBackend\ProductController::class, 'update'])->name('product.update');
    Route::get('product/{id}/trash', [AdminBackend\ProductController::class, 'trash'])->name('product.trash');*/

    Route::get('blog', [AdminBackend\BlogController::class, 'index'])->name('blog');
    Route::get('blog-new', [AdminBackend\BlogController::class, 'new'])->name('blog.new');
    Route::post('blog-new', [AdminBackend\BlogController::class, 'addNew']);
    Route::get('blog/{id}/edit', [AdminBackend\BlogController::class, 'edit'])->name('blog.edit');
    Route::post('blog/{id}/update', [AdminBackend\BlogController::class, 'update'])->name('blog.update');
    Route::get('blog/{id}/trash', [AdminBackend\BlogController::class, 'trash'])->name('blog.trash');
/*
    Route::get('orders', [AdminBackend\OrdersController::class, 'index'])->name('orders');
    Route::get('order/{id}', [AdminBackend\OrdersController::class, 'get'])->name('order');

    Route::get('articles', [AdminBackend\ArticlesController::class, 'index'])->name('articles');
    Route::get('article/{id}', [AdminBackend\ArticlesController::class, 'get'])->name('article');
    Route::get('article_new', [AdminBackend\ArticlesController::class, 'new'])->name('article.new');
    Route::post('article_new', [AdminBackend\ArticlesController::class, 'addNew']);
    Route::get('article/{id}/edit', [AdminBackend\ArticlesController::class, 'edit'])->name('article.edit');
    Route::post('article/{id}/update', [AdminBackend\ArticlesController::class, 'update'])->name('article.update');
    Route::get('article/{id}/delete', [AdminBackend\ArticlesController::class, 'delete'])->name('article.delete');

    Route::get('revenue/earnings', [AdminBackend\RevenueController::class, 'earnings'])->name('earnings');
    Route::get('revenue/earning/{id}', [AdminBackend\RevenueController::class, 'earnings'])->name('earning');
    Route::get('revenue/payouts', [AdminBackend\RevenueController::class, 'payouts'])->name('payouts');
    Route::get('revenue/payout/{id}', [AdminBackend\RevenueController::class, 'payout'])->name('payout');
    Route::post('revenue/payout/{id}/approve', [AdminBackend\RevenueController::class, 'payoutApprove'])->name('payout.approve');
*/
    Route::get('account/profile', [AdminBackend\ProfileController::class, 'index'])->name('profile');
    Route::put('account/profile/update', [AdminBackend\ProfileController::class, 'update'])->name('profile.update');
    Route::get('account/password', [AdminBackend\ProfileController::class, 'password'])->name('profile.password');
    Route::put('account/password', [AdminBackend\ProfileController::class, 'passwordUpdate'])->name('profile.password.update');
    
    Route::group(['prefix' => 'settings', 'as' => 'settings.'], function() {
        Route::get('/', [AdminBackend\SettingsController::class, 'index'])->name('home');
        Route::post('new-admin', [AdminBackend\SettingsController::class, 'newAdmin'])->name('profile.new');
        Route::get('edit-admin/{id}', [AdminBackend\SettingsController::class, 'editAdmin'])->name('profile.edit');
        Route::post('update-admin/{id}', [AdminBackend\SettingsController::class, 'updateAdmin'])->name('profile.update');
        Route::post('update-admin/{id}/password', [AdminBackend\SettingsController::class, 'updateAdminPassword'])->name('profile.password');
        Route::get('delete-admin/{id}', [AdminBackend\SettingsController::class, 'deleteAdmin'])->name('profile.trash');
        Route::get('book-categories', [AdminBackend\SettingsController::class, 'bookCat'])->name('bookcat');
        Route::post('book-categories/new', [AdminBackend\SettingsController::class, 'newBookCat'])->name('bookcat.new');
        Route::get('book-categories/{id}/edit', [AdminBackend\SettingsController::class, 'editBookCat'])->name('bookcat.edit');
        Route::post('book-categories/{id}/update', [AdminBackend\SettingsController::class, 'updateBookCat'])->name('bookcat.update');
        Route::get('book-categories/{id}/trash', [AdminBackend\SettingsController::class, 'trashBookCat'])->name('bookcat.trash');
        Route::post('commission-rate', [AdminBackend\SettingsController::class, 'commRate'])->name('comm_rate');
        /*Route::get('shipping-locations', [AdminBackend\ShippingController::class, 'index'])->name('shipping');
        Route::get('shipping-location/{id}', [AdminBackend\ShippingController::class, 'edit'])->name('shipping.edit');
        Route::post('shipping-location/{id}', [AdminBackend\ShippingController::class, 'update'])->name('shipping.update');*/
    });

    Route::get('newsletter', [AdminBackend\HomeController::class, 'newsletter'])->name('newsletter');
    Route::get('newsletter/export', [AdminBackend\HomeController::class, 'newsletterExport'])->name('newsletter.export');
});