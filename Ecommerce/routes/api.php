<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Resources\UserApiResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware'=>'api'],function($router){

    Route::get('/userlist',[UserController::class,'Index']);
    Route::post('/contactus',[UserController::class,'contactUs']);
    Route::post('/register',[UserController::class,'registerUser']);
    Route::post('/login',[UserController::class,'login']);
    Route::get('/products',[UserController::class,'productDetails']);
    Route::get('/productimage',[UserController::class,'productImages']);
    Route::get('/banerdetail',[UserController::class,'bannerDetails']);
    Route::get('/category',[UserController::class,'Category']);
    Route::get('/subcategory',[UserController::class,'subCategory']);
    Route::get('/subcatproducts/{id}',[UserController::class,'subCategoryProducts']);
    Route::get('/productsdetail/{id}',[UserController::class,'currentProductsDetails']);
    Route::get('/profile/{user}',[UserController::class,'Profile']);
    Route::post('/updateprofile',[UserController::class,'updateProfile']);
    Route::post('/changepass',[UserController::class,'changePassword']);
    Route::get('/services',[UserController::class,'CMSDetails']);
    Route::post('/checkout',[UserController::class,'Checkout']);
    Route::post('/addwish',[UserController::class,'addWish']);
    Route::get('/getwish/{id}',[UserController::class,'getWish']);
    Route::get('/delwish/{id}',[UserController::class,'delWish']);
    Route::get('/coupons',[UserController::class,'Coupons']);
    Route::get('/myorders/{id}',[UserController::class,'myOrder']);
    Route::post('/newsletter',[UserController::class,'newsLetter']);
});
