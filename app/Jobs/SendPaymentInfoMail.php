<?php

namespace App\Jobs;

use App\Mail\PaymentInfoMail;
use App\Models\Prodie;
use App\Models\Profile;
use App\Models\Registration;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SendPaymentInfoMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

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

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $user = Auth::user();
        // Kirim email dengan data
        Mail::to($user->email)->send(new PaymentInfoMail($this->profile, $this->prodi, $this->registration, $this->no_reg));
    }
}
