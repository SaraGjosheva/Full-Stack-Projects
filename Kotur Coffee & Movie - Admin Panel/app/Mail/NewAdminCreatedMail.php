<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;

class NewAdminCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public User $user, public string $password) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Вашиот администраторски профил е креиран',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.new-admin-password',
            with: [
                'name' => $this->user->name,
                'email' => $this->user->email,
                'password' => $this->password,
            ]
        );
    }
    public function attachments(): array
    {
        return [];
    }
}
