<?php

namespace App\Jobs;


use App\Mail\TestInfoMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SendTestInfoMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

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

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $user = Auth::user();
        // Kirim email dengan data
        Mail::to($user->email)->send(new TestInfoMail($this->profile, $this->prodi, $this->registration, $this->no_test));
    }
}
