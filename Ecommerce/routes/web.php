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
Route::get('/adduser',[AdminController::class,'addUser'])->name('AddUser');
Route::get('/showuser',[AdminController::class,'showUser'])->name('ShowUser');
Route::post('/postadduser',[AdminController::class,'postAddUser'])->name('PostAddUser');
Route::get('/edituser/{id}',[AdminController::class,'editUser'])->name('EditUser');
Route::post('/postedituser',[AdminController::class,'postEditUser'])->name('PostEditUser');
Route::patch('/deleteuser',[AdminController::class,'deleteUser'])->name('DeleteUser');

// Banner
Route::get('/addbanner',[BannerController::class,'addBanner'])->name('AddBanner');
Route::post('/postaddbanner',[BannerController::class,'postAddBanner'])->name('PostAddBanner');
Route::get('/showbanner',[BannerController::class,'showBanners'])->name('ShowBanner');
Route::get('/editbanner/{id}',[BannerController::class,'editBanner'])->name('EditBanner');
Route::post('/updatebanner',[BannerController::class,'postUpdateBanner'])->name('PostUpdateBanner');
Route::patch('/deletebanner',[BannerController::class,'deleteBanner'])->name('DeleteBanner');

// Category
Route::get('/addcategory',[CategoryController::class,'addCategory'])->name('AddCategory');
Route::post('/postaddcategory',[CategoryController::class,'postAddCategory'])->name('PostAddCategory');
Route::get('/showcategory',[CategoryController::class,'showCategory'])->name('ShowCategory');
Route::get('/editcategory/{id}',[CategoryController::class,'editCategory'])->name('EditCategory');
Route::post('/updatecategory',[CategoryController::class,'updateCategory'])->name('UpdateCategory');
Route::patch('/deletecategory',[CategoryController::class,'deleteCategory'])->name('DeleteCategory');

// Sub Category
Route::get('/addsubcategory',[SubCategoryController::class,'addSubCategory'])->name('AddSubCategory');
Route::post('/postaddsubcategory',[SubCategoryController::class,'postaddSubCategory'])->name('PostAddSubCategory');
Route::get('/showsubcategory',[SubCategoryController::class,'showSubCategory'])->name('ShowSubCategory');
Route::get('/editsubcategory/{id}',[SubCategoryController::class,'editSubCategory'])->name('EditSubCategory');
Route::post('/updatesubcategory',[SubCategoryController::class,'postEditSubCategory'])->name('UpdateSubCategory');
Route::patch('/deletesubcategory',[SubCategoryController::class,'deleteSubCategory'])->name('DeleteSubCategory');

// Product
Route::get('/addproduct',[ProductController::class,'addProduct'])->name('AddProduct');
Route::post('/postaddproduct',[ProductController::class,'postaddProduct'])->name('PostAddProduct');
Route::get('/showproduct',[ProductController::class,'showProduct'])->name('ShowProduct');
Route::get('/displayproduct/{id}',[ProductController::class,'displayProduct'])->name('DisplayProduct');
Route::get('/editproduct/{id}',[ProductController::class,'editProduct'])->name('EditProduct');
Route::patch('/deleteprodimage',[ProductController::class,'deleteProductImage'])->name('DeleteProductImage');
Route::post('/updateproduct',[ProductController::class,'updateProduct'])->name('UpdateProduct');
Route::patch('/deleteattr',[ProductController::class,'deleteProductAttr'])->name('DeleteProductAttr');
Route::patch('/deleteproduct',[ProductController::class,'deleteProduct'])->name('DeleteProduct');

// Contact Us
Route::get('/contactus',[ContactUsController::class,'contactUs'])->name('ContactUs');

// CMS
Route::get('/cms',[CMSController::class,'addCMS'])->name('AddCMS');
Route::post('/addcms',[CMSController::class,'postAddCMS'])->name('PostAddCMS');
Route::get('/displaycms',[CMSController::class,'displayCMS'])->name('DisplayCMS');
Route::patch('/deletecms',[CMSController::class,'deleteCMS'])->name('DeleteCMS');
Route::get('/editcms/{id}',[CMSController::class,'editCMS'])->name('EditCMS');
Route::post('/updatecms',[CMSController::class,'postEditCMS'])->name('UpdateCMS');

// Coupon Management

Route::get('/addcoupon',[CouponController::class,'addCoupon'])->name('AddCoupon');
Route::post('/addpostcoupon',[CouponController::class,'addPostCoupon'])->name('PostAddCoupon');
Route::get('/showcoupons',[CouponController::class,'showCoupons'])->name('ShowCoupons');
Route::patch('/deletecoupon',[CouponController::class,'deleteCoupon'])->name('DeleteCoupon');
Route::get('/editcoupon/{id}',[CouponController::class,'editCoupon'])->name('EditCoupon');
Route::post('/updatecoupon',[CouponController::class,'editPostCoupon'])->name('UpdateCoupon');

// Order 
Route::get('/order',[OrderController::class,'Orders'])->name('Orders');
Route::get('/displayorder/{id}',[OrderController::class,'ordersDetail'])->name('OrdersDetail');
Route::post('/updatestatus',[OrderController::class,'updateStatus'])->name('UpdateStatus');

// settings
Route::get('/usersettings',[AdminController::class,'userSettings'])->name('userSettings');
Route::post('/updatesettings',[AdminController::class,'updateSettings'])->name('updateSettings');