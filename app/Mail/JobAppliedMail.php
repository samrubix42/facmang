<?php

namespace App\Mail;

use App\Models\JobApplied;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class JobAppliedMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public JobApplied $jobApplied) {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $jobTitle = $this->jobApplied->job?->title ?: 'General Position';

        return new Envelope(
            subject: "New Job Application [{$jobTitle}]: {$this->jobApplied->name}",
            replyTo: [new Address($this->jobApplied->email, $this->jobApplied->name)],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.job-applied',
            with: [
                'jobApplied' => $this->jobApplied,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        $attachments = [];

        if ($this->jobApplied->resume && Storage::disk('public')->exists($this->jobApplied->resume)) {
            $attachments[] = Attachment::fromPath(Storage::disk('public')->path($this->jobApplied->resume));
        }

        return $attachments;
    }
}
