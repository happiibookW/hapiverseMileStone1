<?php

use App\Http\Controllers\API\AlbumController;
use App\Http\Controllers\FCMController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BusinessUserAdController;
use App\Http\Controllers\API\PassportAuthController;
use App\Http\Controllers\API\StripePaymentController;
use App\Http\Controllers\API\PlanController;
use App\Http\Controllers\API\BusinessController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\GroupController;
use App\Http\Controllers\API\InterestController;
use App\Http\Controllers\API\OccupationTypeController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\ReligionController;
use App\Http\Controllers\BusinessController as ControllersBusinessController;

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
Route::get('/save-token', 'App\Http\Controllers\FCMController@index');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/upload', [BusinessController::class, 'upload']);


Route::post('/social-login', [PassportAuthController::class, 'social_login']);


Route::post('/create-album', [AlbumController::class, 'store']);
Route::get('/get-albums', [AlbumController::class, 'index']);

Route::get('/get-album-photos', [AlbumController::class, 'get_photos']);

Route::delete('delete-interest/{id}',[InterestController::class,'deleteInterest']);

Route::group(['middleware' => ['cors', 'json.response']], function () {
    Route::group(['prefix' => 'v1'], function () {
        Route::get('/', function () {
                return view('welcome');
            // return 'test';
        });
        Route::get('/clear', function () {

                Artisan::call('cache:clear');
                Artisan::call('config:cache');
                Artisan::call('view:clear');
                return "Cleared!";
        });
        Route::post('/reset-password', [PassportAuthController::class, 'reset_password']);
        Route::delete('products/{id}', [ProductController::class, 'delete']);
        Route::delete('collection/{id}', [ProductController::class, 'deleteCollection']);
        Route::delete('location/sharing/delete/{id}', [OrderController::class, 'locationSharingDelete']);
        Route::delete('user/location/sharing/delete/{userId}', [OrderController::class, 'userLocationSharingDelete']);
        Route::post('user/update/education', [PassportAuthController::class, 'updateEducation']);
        Route::post('user/update/occuptaion', [PassportAuthController::class, 'updateOccupdation']);
        Route::post('make/group/admin', [GroupController::class, 'makeGroupAdmin']);
        Route::post('order/status/update', [OrderController::class, 'changeStatus']);
        Route::post('register', [PassportAuthController::class, 'register']);
        Route::post('login', [PassportAuthController::class, 'login']);
        Route::post('stripe', [StripePaymentController::class, 'stripePost']);
        Route::get('myPlans/{userId}', [PlanController::class, 'myPlans']);
        Route::post('add/card', [StripePaymentController::class, 'addCard']);
        Route::get('fetch/card/{userId}', [StripePaymentController::class, 'fetchMyCard']);
        Route::get('my-ads/{business_id}', [BusinessUserAdController::class, 'index']);
        Route::post('my-ads/{adId}', [BusinessUserAdController::class, 'update']);
        Route::post('business/{business_id}', [BusinessController::class, 'update']);
        Route::delete('my-ads/{adId}', [BusinessUserAdController::class, 'delete']);
        Route::get('userInfo', [PassportAuthController::class, 'userInfo']);
        Route::post('product/delete', [BusinessController::class, 'deleteProduct']);

        Route::get('get_products', [ProductController::class, 'get_products']);

        Route::get('religions', [ReligionController::class, 'index']);

        Route::get('occupations', [OccupationTypeController::class, 'index']);

        Route::get('get_occupations/{userId}', [OccupationTypeController::class, 'get_occupations']);

        Route::post('store_occupations/', [OccupationTypeController::class, 'store_occupations']);
        Route::post('update_occupations/{id}', [OccupationTypeController::class, 'update_occupations']);

        Route::delete('occupation/{id}', [OccupationTypeController::class, 'destroy']);

        Route::post('edit_education', [PassportAuthController::class, 'update_education']);

        Route::middleware('auth:api')->group(function () {
            Route::get('plans', [PlanController::class, 'index']);
            //  Route::post('make/group/admin', [GroupController::class, 'makeGroupAdmin']);
            //Route::delete('logout', [PassportAuthController::class, 'logout']);



        });

        Route::post('/update-business-profile', [BusinessController::class, 'saveProfileImages']);
        Route::post('/update-business-data', [BusinessController::class, 'saveBusinessProfileData']);
        Route::post('/update-business-hours', [BusinessController::class, 'saveBusinessHours']);

        Route::delete('delete-interest/{id}',[InterestController::class,'deleteInterest']);
    });
});
