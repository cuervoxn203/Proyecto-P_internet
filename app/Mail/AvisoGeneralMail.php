<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AvisoGeneralMail extends Mailable
{
    use Queueable, SerializesModels;

    public $titulo;
    public $cuerpo;

    /**
     * Create a new message instance.
     */
    public function __construct($titulo, $cuerpo)
    {
        $this->titulo = $titulo;
        $this->cuerpo = $cuerpo;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject($this->titulo)
                    ->view('emails.aviso-general')
                    ->with(['titulo' => $this->titulo, 'cuerpo' => $this->cuerpo]);
    }
}
