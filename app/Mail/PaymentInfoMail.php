<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaymentInfoMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $profile;
    protected $prodi;
    protected $registration;
    protected $no_reg;

    public function __construct($profile, $prodi, $registration, $no_reg)
    {
        $this->profile = $profile;
        $this->prodi = $prodi;
        $this->registration = $registration;
        $this->no_reg = $no_reg;
    }

    public function build()
    {
        return $this->view('emails.payment_info')
            ->with([
                'profile' => $this->profile,
                'prodi' => $this->prodi,
                'registration' => $this->registration,
                'no_reg' => $this->no_reg,
            ])
            ->subject('Info Pembayaran Administrasi');
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
