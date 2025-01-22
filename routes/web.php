<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');




Route::get('/register/step1', [RegistrationController::class, 'showStep1'])->name('register.step1');
Route::post('/register/step1', [RegistrationController::class, 'postStep1']);
Route::get('/register/step2', [RegistrationController::class, 'showStep2'])->name('register.step2');
