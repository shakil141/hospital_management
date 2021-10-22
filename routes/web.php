<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Models\Appointment;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class, 'index'])->name('index');

Route::get('/home',[HomeController::class, 'redirect'])->middleware('auth','verified');

Route::get('approved/{id}',[HomeController::class, 'approved']);

Route::get('canceled/{id}',[HomeController::class, 'canceled']);

Route::resource('/doctors',DoctorController::class);

Route::resource('/appointment', AppointmentController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');

})->name('dashboard');
