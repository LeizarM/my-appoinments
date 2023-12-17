<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\PatientController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth', 'admin'])->group(function () {

    //Specialty

    /*Route::get('/specialties', 'SpecialtyController@index');
    Route::get('/specialties/create', 'SpecialtyController@create'); //form register
    Route::get('/specialties/{specialty}/edit', 'SpecialtyController@edit');
    Route::post('/specialties', 'SpecialtyController@store'); // send form*/

    Route::get('/specialties', [App\Http\Controllers\Admin\SpecialtyController::class, 'index']);
    Route::get('/specialties/create', [App\Http\Controllers\Admin\SpecialtyController::class, 'create']); //form register
    Route::get('/specialties/{specialty}/edit', [App\Http\Controllers\Admin\SpecialtyController::class, 'edit']);

    Route::post('/specialties', [App\Http\Controllers\Admin\SpecialtyController::class, 'store']);
    Route::put('/specialties/{specialty}', [App\Http\Controllers\Admin\SpecialtyController::class, 'update']);
    Route::delete('/specialties/{specialty}', [App\Http\Controllers\Admin\SpecialtyController::class, 'destroy']);

    //Doctors
    Route::resource('doctors', DoctorController::class);

    //Patients
    Route::resource('patients', PatientController::class);
});
