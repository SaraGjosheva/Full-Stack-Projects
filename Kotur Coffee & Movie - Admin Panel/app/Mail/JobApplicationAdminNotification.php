<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class JobApplicationAdminNotification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public $application) {}

    public function envelope(): Envelope
    {
        return new Envelope(subject: 'Нова пријава за работа');
    }

    public function content(): Content
    {
        return new Content(view: 'emails.app-confirmation-аdmin', with: [
            'full_name' => $this->application->full_name,
            'phone_number' => $this->application->phone_number,
            'email' => $this->application->email,
            'position' => $this->application->position,
            'cv_path' => $this->application->cv_path,
        ]);
    }

    public function attachments(): array
    {
        return [];
    }
}
