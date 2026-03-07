<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LearningSessionCreatedMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $studentName;
    public $sessionTitle;
    public $sessionDate;
    public $sessionUrl;

    /**
     * Create a new message instance.
     */
    public function __construct($studentName, $sessionTitle, $sessionDate, $sessionUrl)
    {
        $this->studentName = $studentName;
        $this->sessionTitle = $sessionTitle;
        $this->sessionDate = $sessionDate;
        $this->sessionUrl = $sessionUrl;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Sesi Pembelajaran Baru Telah Terjadwal',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.learning-session-created',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
