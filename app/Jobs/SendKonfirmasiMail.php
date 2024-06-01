<?php

namespace App\Jobs;

use App\Mail\KonfirmasiMail;
use App\Mail\TestInfoMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SendKonfirmasiMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $profile;
    protected $prodi;
    protected $registration;
    protected $user;

    public function __construct($profile, $prodi, $registration, $user)
    {
        $this->profile = $profile;
        $this->prodi = $prodi;
        $this->registration = $registration;
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if ($this->registration->kode_prodi == 'RSMTIS1') {
            $prodiName = 'Teknik Informatika';
        } elseif ($this->registration->kode_prodi == 'RSMSIS1') {
            $prodiName = 'Sistem Informasi';
        } elseif ($this->registration->kode_prodi == 'RSMMID3') {
            $prodiName = 'Manajemen Informatika';
        } elseif ($this->registration->kode_prodi == 'RSMKAD3') {
            $prodiName = 'Komputerisasi Akuntansi';
        } else {
            $prodiName = 'Tidak Diketahui';
        }

        Mail::to($this->user->email)->send(new KonfirmasiMail($this->profile, $this->prodi, $this->registration, $prodiName));
    }
}
