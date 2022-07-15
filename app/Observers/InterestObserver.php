<?php

namespace App\Observers;

use App\Models\Interest;
use App\Traits\InterestedCakesMails;

class InterestObserver
{
    use InterestedCakesMails;

    public function created(Interest $interest): void
    {
        $this->interestedSubscription($interest);
    }

    public function updated(Interest $interest): void
    {
        $this->interestedSubscription($interest);
    }

    public function deleted(Interest $interest): void
    {
        $this->interestedUnsubscription($interest);
    }
}
