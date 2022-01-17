<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CMSController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// user
Route::get('/adduser',[AdminController::class,'AddUser'])->name('AddUser');
Route::get('/showuser',[AdminController::class,'ShowUser'])->name('ShowUser');
Route::post('/postadduser',[AdminController::class,'PostAddUser'])->name('PostAddUser');
Route::get('/edituser/{id}',[AdminController::class,'EditUser'])->name('EditUser');
Route::post('/postedituser',[AdminController::class,'PostEditUser'])->name('PostEditUser');
Route::patch('/deleteuser',[AdminController::class,'DeleteUser'])->name('DeleteUser');

// Banner
Route::get('/addbanner',[BannerController::class,'AddBanner'])->name('AddBanner');
Route::post('/postaddbanner',[BannerController::class,'PostAddBanner'])->name('PostAddBanner');
Route::get('/showbanner',[BannerController::class,'ShowBanners'])->name('ShowBanner');
Route::get('/editbanner/{id}',[BannerController::class,'EditBanner'])->name('EditBanner');
Route::post('/updatebanner',[BannerController::class,'PostUpdateBanner'])->name('PostUpdateBanner');
Route::patch('/deletebanner',[BannerController::class,'DeleteBanner'])->name('DeleteBanner');

// Category
Route::get('/addcategory',[CategoryController::class,'AddCategory'])->name('AddCategory');
Route::post('/postaddcategory',[CategoryController::class,'PostAddCategory'])->name('PostAddCategory');
Route::get('/showcategory',[CategoryController::class,'ShowCategory'])->name('ShowCategory');
Route::get('/editcategory/{id}',[CategoryController::class,'EditCategory'])->name('EditCategory');
Route::post('/updatecategory',[CategoryController::class,'UpdateCategory'])->name('UpdateCategory');
Route::patch('/deletecategory',[CategoryController::class,'DeleteCategory'])->name('DeleteCategory');

// Sub Category
Route::get('/addsubcategory',[SubCategoryController::class,'AddSubCategory'])->name('AddSubCategory');
Route::post('/postaddsubcategory',[SubCategoryController::class,'PostAddSubCategory'])->name('PostAddSubCategory');
Route::get('/showsubcategory',[SubCategoryController::class,'ShowSubCategory'])->name('ShowSubCategory');
Route::get('/editsubcategory/{id}',[SubCategoryController::class,'EditSubCategory'])->name('EditSubCategory');
Route::post('/updatesubcategory',[SubCategoryController::class,'PostEditSubCategory'])->name('UpdateSubCategory');
Route::patch('/deletesubcategory',[SubCategoryController::class,'DeleteSubCategory'])->name('DeleteSubCategory');

// Product
Route::get('/addproduct',[ProductController::class,'AddProduct'])->name('AddProduct');
Route::post('/postaddproduct',[ProductController::class,'PostAddProduct'])->name('PostAddProduct');
Route::get('/showproduct',[ProductController::class,'ShowProduct'])->name('ShowProduct');
Route::get('/displayproduct/{id}',[ProductController::class,'DisplayProduct'])->name('DisplayProduct');
Route::get('/editproduct/{id}',[ProductController::class,'EditProduct'])->name('EditProduct');
Route::patch('/deleteprodimage',[ProductController::class,'DeleteProductImage'])->name('DeleteProductImage');
Route::post('/updateproduct',[ProductController::class,'UpdateProduct'])->name('UpdateProduct');
Route::patch('/deleteattr',[ProductController::class,'DeleteProductAttr'])->name('DeleteProductAttr');
Route::patch('/deleteproduct',[ProductController::class,'DeleteProduct'])->name('DeleteProduct');

// Contact Us
Route::get('/contactus',[ContactUsController::class,'ContactUs'])->name('ContactUs');

// CMS
Route::get('/cms',[CMSController::class,'AddCMS'])->name('AddCMS');
Route::post('/addcms',[CMSController::class,'PostAddCMS'])->name('PostAddCMS');
Route::get('/displaycms',[CMSController::class,'DisplayCMS'])->name('DisplayCMS');
Route::patch('/deletecms',[CMSController::class,'DeleteCMS'])->name('DeleteCMS');
Route::get('/editcms/{id}',[CMSController::class,'EditCMS'])->name('EditCMS');
Route::post('/updatecms',[CMSController::class,'PostEditCMS'])->name('UpdateCMS');

// Coupon Management

Route::get('/addcoupon',[CouponController::class,'AddCoupon'])->name('AddCoupon');
Route::post('/addpostcoupon',[CouponController::class,'AddPostCoupon'])->name('PostAddCoupon');
Route::get('/showcoupons',[CouponController::class,'ShowCoupons'])->name('ShowCoupons');
Route::patch('/deletecoupon',[CouponController::class,'DeleteCoupon'])->name('DeleteCoupon');
Route::get('/editcoupon/{id}',[CouponController::class,'EditCoupon'])->name('EditCoupon');
Route::post('/updatecoupon',[CouponController::class,'EditPostCoupon'])->name('UpdateCoupon');

// Order 
Route::get('/order',[OrderController::class,'Orders'])->name('Orders');
Route::get('/displayorder/{id}',[OrderController::class,'OrdersDetail'])->name('OrdersDetail');
Route::post('/updatestatus',[OrderController::class,'UpdateStatus'])->name('UpdateStatus');