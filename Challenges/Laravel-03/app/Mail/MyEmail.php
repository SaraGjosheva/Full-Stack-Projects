<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class MyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(private $email, private $phone, private $company)
    {
        //
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('sara@gmail.com', 'Sara Gjosheva'),
            subject: 'My Email',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.test-email',
            with: [
                'email' => $this->email,
                'phone' => $this->phone,
                'company' => $this->company
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
