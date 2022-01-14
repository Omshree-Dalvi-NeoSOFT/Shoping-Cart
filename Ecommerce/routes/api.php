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
    Route::post('/contactus',[UserController::class,'ContactUs']);
    Route::post('/register',[UserController::class,'registerUser']);

});
Route::post('/login',[UserController::class,'login']);
Route::get('/products',[UserController::class,'ProductDetails']);
Route::get('/productimage',[UserController::class,'ProductImages']);
Route::get('/banerdetail',[UserController::class,'BannerDetails']);
Route::get('/category',[UserController::class,'Category']);
Route::get('/subcategory',[UserController::class,'SubCategory']);
Route::get('/subcatproducts/{id}',[UserController::class,'SubCategoryProducts']);
Route::get('/productsdetail/{id}',[UserController::class,'CurrentProductsDetails']);
Route::get('/profile/{user}',[UserController::class,'Profile']);
Route::post('/updateprofile',[UserController::class,'UpdateProfile']);
Route::post('/changepass',[UserController::class,'ChangePassword']);
Route::get('/services',[UserController::class,'CMSDetails']);
