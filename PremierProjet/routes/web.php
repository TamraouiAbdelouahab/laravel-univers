<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

// -----------------------------------

use Illuminate\Support\Facades\Mail;

Route::get('/send-email', function () {
    $details = [
        'title' => 'Mail de test depuis Laravel',
        'body' => 'Ceci est un test d\'envoi d\'email.'
    ];

    Mail::send([], [], function($message) use ($details) {
        $message->to('destinataire@example.com', 'Nom Destinataire')
                ->subject('Test d\'envoi d\'email')
                ->html($details['body']);
            });

    return 'E-mail envoyé avec succès !';
});

// --------------------------------
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
