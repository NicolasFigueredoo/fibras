<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $empresa;
    public $email;
    public $celular;
    public $mensaje;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre, $empresa, $email,$celular,$mensaje )
    {
        $this->nombre = $nombre;
        $this->empresa = $empresa;
        $this->email = $email;
        $this->celular = $celular;
        $this->mensaje = $mensaje;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
            return 
            $this->view('emails.contacto')
            ->subject('Nuevo mensaje de contacto');
    }
}
