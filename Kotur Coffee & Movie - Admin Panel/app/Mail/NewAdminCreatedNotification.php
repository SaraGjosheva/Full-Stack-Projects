<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewAdminCreatedNotification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public User $newAdmin) {}

    public function envelope(): Envelope
    {
        return new Envelope(subject: 'Креиран е нов администратор');
    }

    public function content(): Content
    {  
        return new Content(
            markdown: 'emails.new-admin-created',
            with: [
                'name' => $this->newAdmin->name,
                'email' => $this->newAdmin->email,
                'password' => $this->newAdmin->password,
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
