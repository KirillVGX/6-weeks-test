<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

final class ContactFormSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        private readonly array $formData,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '6weeks - Форма заповнена',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-form-submitted',
            with: [
                'name'        => $this->formData['name'] ?? null,
                'email'       => $this->formData['email'],
                'userMessage' => $this->formData['message'] ?? null,
                'submittedAt' => now()->format('d.m.Y H:i:s'),
            ],
        );
    }
}
