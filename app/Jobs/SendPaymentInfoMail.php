<?php

namespace App\Jobs;

use App\Mail\PaymentInfoMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendPaymentInfoMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $paymentInfo;

    public function __construct($user, $paymentInfo)
    {
        $this->user = $user;
        $this->paymentInfo = $paymentInfo;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->user->email)->send(new PaymentInfoMail($this->paymentInfo));
    }
}
