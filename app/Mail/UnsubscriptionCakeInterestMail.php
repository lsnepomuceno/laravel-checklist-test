<?php

namespace App\Mail;

use App\Models\Interest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UnsubscriptionCakeInterestMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(protected Interest $interest)
    {
        //
    }

    public function build(): self
    {
        return $this->view('view.name');
    }
}
