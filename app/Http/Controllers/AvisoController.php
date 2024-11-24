<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\AvisoGeneralMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class AvisoController extends Controller
{
    public function index()
    {
        return view('avisos.enviar');
    }

    public function enviarAvisoGeneral(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'cuerpo' => 'required|string|max:2000',
        ]);

        $usuarios = User::whereNotNull('email_verified_at')->get();

        foreach ($usuarios as $usuario) {
            Mail::to($usuario->email)->send(new AvisoGeneralMail($request->titulo, $request->cuerpo));
        }

        return back()->with('success', 'Correos enviados exitosamente.');
    }
}
