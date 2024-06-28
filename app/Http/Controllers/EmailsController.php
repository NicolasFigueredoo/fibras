<?php

namespace App\Http\Controllers;

use App\Mail\ContactoMail;
use App\Mail\PresupuestoMail;
use App\Mail\SuscripcionMail;
use App\Models\Contacto;
use App\Models\Suscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use ReCaptcha\ReCaptcha;

class EmailsController extends Controller
{
    public function enviarCorreoContacto(Request $request){
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'celular' => 'nullable|string|max:20',
            'apellido' => 'required|string|max:255',
            'mensaje' => 'nullable|string|max:1000',
        ]);
    
        $nombre = $validatedData['nombre'];
        $email = $validatedData['email'];
        $celular = $validatedData['celular'];
        $apellido = $validatedData['apellido'];
        $mensaje = $validatedData['mensaje'];

        $contacto = Contacto::first();

        Mail::to($contacto->email)->send(new ContactoMail($nombre, $apellido, $email,$celular,$mensaje));
        return response()->json(['message' => 'mensajes enviados'], 200);


    }
    public function enviarMensajeSub(Request $request){
        $suscripciones = Suscripcion::all();

        $asunto = $request->asunto;
        $texto = $request->texto;

        foreach ($suscripciones as $suscripcion) {
            Mail::to($suscripcion->email)->send(new SuscripcionMail($asunto, $texto));
        }

        return response()->json(['message' => 'mensajes enviados'], 200);

    }

    public function enviarPresupuesto(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'required|string|max:20',
            'empresa' => 'nullable|string|max:255',
            'producto' => 'nullable',
            'archivo' => 'nullable|mimes:pdf,jpeg,png,doc,docx|max:2048',
            'archivoTwo' => 'nullable|mimes:pdf,jpeg,png,doc,docx|max:2048',
            'mensaje' => 'nullable|string|max:1000',
        ]);
    
        $contacto = Contacto::first();
    
        Mail::to($contacto->email)->send(new PresupuestoMail(
            $validatedData['nombre'],
            $validatedData['email'],
            $validatedData['telefono'],
            $validatedData['empresa'] ?? null,
            $validatedData['producto'] ?? null,
            $request->file('archivo'),
            $request->file('archivoTwo'),
            $validatedData['mensaje'] ?? null
        ));
    
        return response()->json(['message' => 'mensajes enviados'], 200);
    }
    
}
