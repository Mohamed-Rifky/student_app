<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\lottieController;
use App\Http\Controllers\studentController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::group(['middleware' => ['auth:api'], 'as' => 'api'], function () {
    Route::get('/settings', [SettingsController::class, 'viewSettings'])->name('api.settings.index');
    Route::post('/save_settings', [SettingsController::class, 'StoreSettingsApi'])->name('api.settings.store');

    Route::post('/register_student', [studentController::class, 'registerStudent'])->name('api.student.register');
    Route::post('/update_student', [studentController::class, 'updateProfile'])->name('api.student.update');
    Route::post('/update_profile_picture', [studentController::class, 'updateProfilePicture'])->name('api.student.update_profile_picture');
    Route::get('/get_student', [studentController::class, 'getProfile'])->name('api.student.get_student');

});
