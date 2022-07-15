<?php

namespace App\Mail;

use App\Models\Interest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscriptionCakeInterestMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Interest $interest)
    {
    }

    public function build(): self
    {
        return $this->from('no-reply@cakestore.com', 'Online Cake Store')
                    ->subject("Compra do bolo: {$this->interest->cake->name}")
                    ->to($this->interest->email, $this->interest->name)
                    ->markdown('emails.interests.subscription');
    }
}
