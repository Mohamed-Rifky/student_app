<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\lottieController;
use App\Http\Controllers\studentController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('main');
Route::get('/getLottieImage', [lottieController::class, 'getLoginImage'])->name('getLoginImage');
Route::get('/getLoadingImage', [lottieController::class, 'getLoadingImage'])->name('getLoadingImage');
Route::get('/logout', [LoginController::class,'logout']);
Auth::routes(
    ['register' => false]
);


Route::get('/settings', [SettingsController::class, 'viewSettings'])->name('settings.index');
Route::post('/settings', [SettingsController::class, 'StoreSettings'])->name('settings.store');

Route::get('/list_student', [studentController::class, 'listStudent'])->name('student.list');
Route::get('/mail', [studentController::class, 'mail'])->name('student.mail');
Route::match(['get','post'],'/get_students', [studentController::class, 'getStudents'])->name('student.get');
Route::post('/register_student', [studentController::class, 'registerStudent'])->name('student.register');
