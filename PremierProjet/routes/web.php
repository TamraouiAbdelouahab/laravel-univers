<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/emails', function () {
    return view('emails.contact');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact',[ContactController::class,'create']);
Route::post('/contact',[ContactController::class,'store']);
