<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Fluent;

class UnsubscriptionCakeInterestMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Fluent $interest)
    {
    }

    public function build(): self
    {
        return $this->from('no-reply@cakestore.com', 'Online Cake Store')
                    ->subject("Cancelamento de compra do bolo: {$this->interest->cake['name']}")
                    ->to($this->interest->email, $this->interest->name)
                    ->markdown('emails.interests.unsubscription');
    }
}
