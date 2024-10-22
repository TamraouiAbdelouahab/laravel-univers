<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        try{
            Mail::send('emails.contact', $data, function($mailmessage) use ($data) {
                $mailmessage->to('abdel@gmail.com', 'Destinataire')->subject('Nouveau message de contact');
            });
           return 'Email envoyé!';
        }
        catch(Exception $e){
            return 'Erreur lors de l\'envoi de l\'email: ' . $e->getMessage();
        };

    }
}
