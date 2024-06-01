<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TestInfoMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $profile;
    protected $prodi;
    protected $registration;
    protected $no_test;

    public function __construct($profile, $prodi, $registration, $no_test)
    {
        $this->profile = $profile;
        $this->prodi = $prodi;
        $this->registration = $registration;
        $this->no_test = $no_test;
    }

    public function build()
    {
        return $this->view('emails.test_info')
            ->with([
                'profile' => $this->profile,
                'prodi' => $this->prodi,
                'registration' => $this->registration,
                'no_test' => $this->no_test,
            ])
            ->subject('Info Test Kemampuan Dasar - PMB Rosma');
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
