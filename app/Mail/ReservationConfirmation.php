<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $reservation;
    public $vehicule;

    public function __construct($reservation, $vehicule)
    {
        $this->reservation = $reservation;
        $this->vehicule = $vehicule;
    }

    public function build()
    {
        return $this->subject("Confirmation de votre réservation")
            ->view('reservation-confirmation');
    }
}

