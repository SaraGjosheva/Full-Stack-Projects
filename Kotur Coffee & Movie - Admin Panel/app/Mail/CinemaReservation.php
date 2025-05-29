<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CinemaReservation extends Mailable
{
    use Queueable, SerializesModels;


    public function __construct(public $cinemaReservation) {}


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Резервација за сала',
        );
    }


    public function content(): Content
    {
        return new Content(
            view: 'emails.cinema-reservation-user',
            with: [
                'full_name' => $this->cinemaReservation->full_name,
                'email' => $this->cinemaReservation->email,
                'event_type' => $this->cinemaReservation->event_type,
                'message' => $this->cinemaReservation->message,
                'reservation_date' => $this->cinemaReservation->reservation_date,
                'reservation_hour' => $this->cinemaReservation->reservation_hour,
            ]
        );
    }


    public function attachments(): array
    {
        return [];
    }
}
