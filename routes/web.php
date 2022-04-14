<?php

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

//Route::get('/', function () {
  //return view('frontend.master');
//});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user/logout', [App\Http\Controllers\Auth\LoginController::class, 'userLogout'])->name('user.logout');

//FrontendController route here 

Route::get('/home', [App\Http\Controllers\Frontend\FrontendController::class, 'index'])->name('home');

Route::get('category/product/show/{id}', [App\Http\Controllers\Frontend\FrontendController::class, 'CategoeyWiseProductShow'])->name('category_wise_show');

Route::get('product/detail/{id}', [App\Http\Controllers\Frontend\FrontendController::class, 'ProductDetails'])->name('product_detal');

Route::post('add/to/cart', [App\Http\Controllers\Frontend\CartController::class, 'AddToCart'])->name('add_to_cart');

Route::get('cart/show', [App\Http\Controllers\Frontend\CartController::class, 'ShowCart'])->name('cart_show');

Route::get('remove/cart/{rowId}', [App\Http\Controllers\Frontend\CartController::class, 'removeCart']);

Route::post('update/cart/item', [App\Http\Controllers\Frontend\CartController::class, 'UpdateCart'])->name('update.cartitem');

Route::get('checkout', [App\Http\Controllers\Frontend\CheckoutController::class, 'Checkout'])->name('checkout');

Route::post('checkout/store', [App\Http\Controllers\Frontend\CheckoutController::class, 'CheckoutStore'])->name('checkout.store');


Route::get('profile', [App\Http\Controllers\Frontend\FrontendController::class, 'profile'])->name('profile');

//Route::get('sign_up', [App\Http\Controllers\Frontend\SignUpController::class, 'SignUp'])->name('sign_up');

//Route::post('sign_up/customer', [App\Http\Controllers\Frontend\SignUpController::class, 'CustomerStore'])->name('customer.store');

//Route::get('log_in', [App\Http\Controllers\Frontend\LoginController::class, 'LogIn'])->name('log_in');

Route::group(['prefix' => 'admin'], function() {
    Route::group(['middleware' => 'admin.guest'], function(){
        Route::view('/login','admin.login')->name('admin.login');
        Route::post('/login',[App\Http\Controllers\AdminController::class, 'authenticate'])->name('admin.auth');

        
    });
    
    Route::group(['middleware' => 'admin.auth'], function(){
        Route::get('/dashboard',[App\Http\Controllers\DashboardController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');

        //category route here 

        Route::get('/category', [App\Http\Controllers\CategoryController::class, 'Category'])->name('category');

        Route::post('/category/store', [App\Http\Controllers\CategoryController::class, 'CategoryStore'])->name('category.store');

        Route::get('/category/manage', [App\Http\Controllers\CategoryController::class, 'CategoryManage'])->name('manage.category');

        Route::get('/category/active/{id}', [App\Http\Controllers\CategoryController::class, 'CategoryActive'])->name('active.category');

        Route::get('/category/inactive/{id}', [App\Http\Controllers\CategoryController::class, 'CategoryInactive'])->name('inactive.category');

        Route::get('/category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'CategoryDelete'])->name('delete.category');

        Route::post('/category/update', [App\Http\Controllers\CategoryController::class, 'CategoryUpdate'])->name('category.update');



        //delivery route here 

        Route::get('/delivery', [App\Http\Controllers\DeliveryBoyController::class, 'Delivery'])->name('delivery');

        Route::post('/delivery/store', [App\Http\Controllers\DeliveryBoyController::class, 'DeliveryStore'])->name('delivery.store');

        Route::get('/delivery/manage', [App\Http\Controllers\DeliveryBoyController::class, 'DeliveryManage'])->name('manage.delivery');

        Route::get('/delivery/active/{id}', [App\Http\Controllers\DeliveryBoyController::class, 'DeliveryActive'])->name('active.delivery');

        Route::get('/delivery/inactive/{id}', [App\Http\Controllers\DeliveryBoyController::class, 'DeliveryInactive'])->name('inactive.delivery');

        Route::get('/delivery/delete/{id}', [App\Http\Controllers\DeliveryBoyController::class, 'DeliveryDelete'])->name('delete.delivery');

        Route::post('/delivery/update', [App\Http\Controllers\DeliveryBoyController::class, 'DeliveryUpdate'])->name('delivery.update');


        //coupon route here 

        Route::get('/coupon', [App\Http\Controllers\CouponController::class, 'Coupon'])->name('coupon');

        Route::post('/coupon/store', [App\Http\Controllers\CouponController::class, 'CouponStore'])->name('coupon.store');

        Route::get('/coupon/manage', [App\Http\Controllers\CouponController::class, 'CouponManage'])->name('manage.coupon');

        Route::get('/coupon/active/{id}', [App\Http\Controllers\CouponController::class, 'CouponActive'])->name('active.coupon');

        Route::get('/coupon/inactive/{id}', [App\Http\Controllers\CouponController::class, 'CouponInactive'])->name('inactive.coupon');

        Route::get('/coupon/delete/{id}', [App\Http\Controllers\CouponController::class, 'CouponDelete'])->name('delete.coupon');

        Route::post('/coupon/update', [App\Http\Controllers\CouponController::class, 'CouponUpdate'])->name('coupon.update');


        //product route here 

        Route::get('/product', [App\Http\Controllers\ProductController::class, 'Product'])->name('product');

        Route::post('/product/store', [App\Http\Controllers\ProductController::class, 'ProductStore'])->name('product.store');

        Route::get('/product/manage', [App\Http\Controllers\ProductController::class, 'ProductManage'])->name('manage.product');

        Route::get('/product/active/{id}', [App\Http\Controllers\ProductController::class, 'ProductActive'])->name('active.product');

        Route::get('/product/inactive/{id}', [App\Http\Controllers\ProductController::class, 'ProductInactive'])->name('inactive.product');

        Route::get('/product/delete/{id}', [App\Http\Controllers\ProductController::class, 'ProductDelete'])->name('delete.product');

        Route::post('/product/update', [App\Http\Controllers\ProductController::class, 'ProductUpdate'])->name('product.update');


        //Banner route here 

        Route::get('/banner', [App\Http\Controllers\BannerController::class, 'Banner'])->name('banner');

        Route::post('/banner/store', [App\Http\Controllers\BannerController::class, 'BannerStore'])->name('banner.store');

        Route::get('/banner/manage', [App\Http\Controllers\BannerController::class, 'BannerManage'])->name('manage.banner');

        Route::get('/banner/active/{id}', [App\Http\Controllers\BannerController::class, 'BannerActive'])->name('active.banner');

        Route::get('/banner/inactive/{id}', [App\Http\Controllers\BannerController::class, 'BannerInactive'])->name('inactive.banner');

        Route::get('/banner/delete/{id}', [App\Http\Controllers\BannerController::class, 'BannerDelete'])->name('delete.banner');

        Route::post('/banner/update', [App\Http\Controllers\BannerController::class, 'BannerUpdate'])->name('banner.update');



        //Seeting route here 

        Route::get('/seting', [App\Http\Controllers\SeetingController::class, 'Seeting'])->name('seeting');


        Route::post('/setting/update', [App\Http\Controllers\SeetingController::class, 'SettingUpdate'])->name('setting.update');

        //manage.report

        Route::get('/manage/report', [App\Http\Controllers\OrderController::class, 'ManageReport'])->name('manage.report');

        Route::get('/delivery/{id}', [App\Http\Controllers\OrderController::class, 'deliveryDone'])->name('active.delivery');

        Route::get('/delete/{id}', [App\Http\Controllers\OrderController::class, 'ReportDelete'])->name('delete.report');

    });
});