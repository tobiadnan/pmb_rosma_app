<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class KonfirmasiMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $profile;
    protected $prodi;
    protected $registration;
    protected $prodiName;

    public function __construct($profile, $prodi, $registration, $prodiName)
    {
        $this->profile = $profile;
        $this->prodi = $prodi;
        $this->registration = $registration;
        $this->prodiName = $prodiName;
    }

    public function build()
    {
        return $this->view('emails.konfirmasi_mail')
            ->with([
                'profile' => $this->profile,
                'prodi' => $this->prodi,
                'registration' => $this->registration,
                'prodiName' => $this->prodiName,
            ])
            ->subject('Sudah Konfirmasi Prodi?? - PMB Rosma');
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
