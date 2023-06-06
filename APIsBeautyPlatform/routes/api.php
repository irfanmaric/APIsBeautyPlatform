<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserController;
use App\Models\User;


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

Route::post('/user', function (Request $request) {
    return $request->user();
});

Route::post('auth/register',[\App\Http\Controllers\Api\AuthController::class,'createUser']);
Route::post('login',[\App\Http\Controllers\Api\AuthController::class,'login']);
Route::post('auth/logout',[\App\Http\Controllers\Api\AuthController::class,'logoutUser']);
Route::post('forgot/password',[\App\Http\Controllers\ForgotPasswordController::class,'forgotPassword'])->name('password.forgot');
Route::post('reset/password',[\App\Http\Controllers\ForgotPasswordController::class,'resetPassword'])->name('password.reset');
Route::get("public/companies",[\App\Http\Controllers\BookingController::class,'publicCompanies']);
Route::get("public/service",[\App\Http\Controllers\BookingController::class,'getAllServices']);


Route::group(['middleware' => 'auth:api' ], function() {
    Route::delete("deleteReservation/{id}",[\App\Http\Controllers\BookingController::class,'deleteReservation']);
    Route::delete("deleteUser/{id}",[\App\Http\Controllers\Api\UserController::class,'deleteUser']);
    Route::get("allTherapist",[\App\Http\Controllers\BookingController::class,'allTherapist']);
    Route::get("allReservation",[\App\Http\Controllers\BookingController::class,'allReservation']);
    Route::get("reservation/{id}",[\App\Http\Controllers\BookingController::class,'reservationID']);
    Route::get("therapistByTreatment/{idTherapist}",[\App\Http\Controllers\BookingController::class,'therapistByTreatment']);
    Route::get("allTreatments",[\App\Http\Controllers\BookingController::class,'allTreatments']);
    Route::get("allUser",[\App\Http\Controllers\Api\UserController::class,'allUser']);
    Route::get("allUser/{id}",[\App\Http\Controllers\Api\UserController::class,'userID']);
    Route::get("search/{name}",[\App\Http\Controllers\Api\UserController::class,'search']);
    Route::post('submitReservation',[\App\Http\Controllers\BookingController::class,'submitReservation']);
    Route::put('updateTreatment',[\App\Http\Controllers\BookingController::class,'updateTreatment']);
    Route::put('updateTherapist',[\App\Http\Controllers\BookingController::class,'updateTherapist']);
    Route::post('stripe',[\App\Http\Controllers\StripePaymentController::class,'stripePost']);
    Route::post('auth/logout',[\App\Http\Controllers\Api\AuthController::class,'logoutUser']);
    Route::get("employeesByCompany/{idCompany}",[\App\Http\Controllers\BookingController::class,'employeesByCompany']);

    Route::post('private/submitAppointment',[\App\Http\Controllers\BookingController::class,'submitAppointment']);


});

