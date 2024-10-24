<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('accueil');
})->name('home');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
