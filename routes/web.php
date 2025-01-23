<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');


Route::get('/', [RegistrationController::class, 'showStep1'])->name('register.step1');

Route::get('/register/step1', [RegistrationController::class, 'showStep1'])->name('register.step1');
Route::post('/register/step1', [RegistrationController::class, 'postStep1']);
Route::get('/register/step2', [RegistrationController::class, 'showStep2'])->name('register.step2');
Route::post('/register/step2', [RegistrationController::class, 'postStep2']);
Route::get('/register/step3', [RegistrationController::class, 'showStep3'])->name('register.step3');
Route::post('/register/step3', [RegistrationController::class, 'postStep3']);
