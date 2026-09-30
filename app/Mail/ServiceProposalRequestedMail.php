<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ServiceProposalRequestedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $name,
        public string $phone,
        public string $subjectText,
        public string $description,
        public string $serviceTitle
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Proposal Request: '.$this->subjectText.' ('.$this->serviceTitle.')',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.service-proposal-requested',
            with: [
                'name' => $this->name,
                'phone' => $this->phone,
                'subjectText' => $this->subjectText,
                'description' => $this->description,
                'serviceTitle' => $this->serviceTitle,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
