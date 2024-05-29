<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SuscripcionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $asunto;
    public $texto;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($asunto, $texto )
    {
        $this->asunto = $asunto;
        $this->texto = $texto;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return 
        $this->view('emails.suscripcion')
        ->subject($this->asunto);
    }
}
