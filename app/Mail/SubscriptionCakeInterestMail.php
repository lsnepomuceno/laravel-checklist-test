<?php

namespace App\Mail;

use App\Models\Interest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscriptionCakeInterestMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(protected Interest $interest)
    {
        //
    }

    public function build(): self
    {
        return $this->from('no-reply@cakestore.com', 'Online Cake Store')
                    ->view('emails.interests.subscription');
    }
}
