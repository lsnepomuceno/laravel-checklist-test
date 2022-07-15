<?php

namespace App\Jobs;

use App\Mail\SubscriptionCakeInterestMail;
use App\Models\Interest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\{Log, Mail};

class SendEmailForCakesInterestsSubscriptionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(protected Interest $interest)
    {
    }

    public function handle(): void
    {
        try {
            Mail::to($this->interest->email)
                ->send(new SubscriptionCakeInterestMail($this->interest));
        } catch (\Exception $e) {
            Log::error('SUBSCRIPTION_MAIL_ERROR', ['message' => $e->getMessage()]);
        }
    }
}
