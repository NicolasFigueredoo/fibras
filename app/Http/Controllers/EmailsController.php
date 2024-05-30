<?php

namespace App\Http\Controllers;

use App\Mail\ContactoMail;
use App\Mail\SuscripcionMail;
use App\Models\Contacto;
use App\Models\Suscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use ReCaptcha\ReCaptcha;

class EmailsController extends Controller
{
    public function enviarCorreoContacto(Request $request){

    


        $nombre = $request->nombre;
        $empresa = $request->empresa;
        $email = $request->email;
        $celular = $request->celular;
        $mensaje = $request->mensaje;

        $contacto = Contacto::first();

        Mail::to($contacto->email)->send(new ContactoMail($nombre, $empresa, $email,$celular,$mensaje));
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
}
