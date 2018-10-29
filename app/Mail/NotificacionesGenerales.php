<?php

namespace App\Mail;

use App\Model\Alumno;
use App\model\AnuncioGeneral;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificacionesGenerales extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $anuncioGeneral;
    public $student;
    public function __construct(AnuncioGeneral $anuncioGeneral,Alumno $student)
    {
        $this->anuncioGeneral = $anuncioGeneral;
        $this->student = $student;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.notificarGeneral');
    }
}
