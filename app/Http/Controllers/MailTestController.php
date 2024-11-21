<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;

class MailTestController extends Controller
{
    public function sendTestEmail()
    {
        $to = 'diego.campos5701@alumnos.udg.mx'; // Cambia por tu correo de prueba
        Mail::raw('¡Este es un correo de prueba desde Mailgun!', function ($message) use ($to) {
            $message->to($to)
                ->subject('Correo de prueba desde Laravel con Mailgun');
        });

        return 'Correo enviado exitosamente.';
    }
}
