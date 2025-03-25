<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class ConfirmarCorreoMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Variables privadas para almacenar datos del usuario.
     */
    private $correo;
    private $nombre;

    /**
     * Constructor de la clase.
     */
    public function __construct($nombre, $correo)
    {
        $this->correo = $correo;
        $this->nombre = $nombre;
    }

    /**
     * Define el sobre del mensaje.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(env("MAIL_FROM_ADDRESS"), 'Guillermo Espinosa'),
            subject: 'Confirma tu Correo',
        );
    }

    /**
     * Define el contenido del mensaje.
     */
    public function content(): Content
    {
        return new Content(
            view: 'AuthViews.mensajeconfirmarcorreo',
            with: [
                'nombreCompleto' => $this->nombre, // Se usa $this->nombre en lugar de $this->nombreCompleto
                'correo' => $this->correo,
            ]
        );
    }

    /**
     * Obtiene los archivos adjuntos del mensaje.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
