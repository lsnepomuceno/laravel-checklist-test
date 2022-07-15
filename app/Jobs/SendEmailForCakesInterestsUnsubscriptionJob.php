<?php

namespace App\Jobs;

use App\Mail\UnsubscriptionCakeInterestMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Fluent;

class SendEmailForCakesInterestsUnsubscriptionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(protected Fluent $interest)
    {
    }

    public function handle(): void
    {
        try {
            Mail::send(new UnsubscriptionCakeInterestMail($this->interest));
        } catch (\Exception $e) {
            Log::error('UNSUBSCRIPTION_MAIL_ERROR', ['message' => $e->getMessage()]);
        }
    }
}
