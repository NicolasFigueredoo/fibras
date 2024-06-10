<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PresupuestoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $email;
    public $telefono;
    public $empresa;
    public $producto;
    public $archivo;
    public $archivoTwo;
    public $mensaje;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre, $email, $telefono, $empresa, $producto, $archivo, $archivoTwo, $mensaje)
    {
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->empresa = $empresa;
        $this->producto = $producto;
        $this->archivo = $archivo;
        $this->archivoTwo = $archivoTwo;
        $this->mensaje = $mensaje;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->view('emails.presupuesto')
                      ->subject('Nuevo mensaje de presupuesto');
    
        if ($this->archivo && $this->archivo->isValid()) {
            $email->attach($this->archivo->getRealPath(), [
                'as' => $this->archivo->getClientOriginalName(),
                'mime' => $this->archivo->getClientMimeType(),
            ]);
        }
    
        if ($this->archivoTwo && $this->archivoTwo->isValid()) {
            $email->attach($this->archivoTwo->getRealPath(), [
                'as' => $this->archivoTwo->getClientOriginalName(),
                'mime' => $this->archivoTwo->getClientMimeType(),
            ]);
        }
    
        return $email;
    }
    
}
