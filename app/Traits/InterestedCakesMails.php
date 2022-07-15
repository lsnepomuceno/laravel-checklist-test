<?php

namespace App\Traits;

use Illuminate\Support\Fluent;
use App\Jobs\{SendEmailForCakesInterestsSubscriptionJob, SendEmailForCakesInterestsUnsubscriptionJob};
use App\Models\Interest;

trait InterestedCakesMails
{
    public function interestedSubscription(Interest $interest): void
    {
        SendEmailForCakesInterestsSubscriptionJob::dispatch($interest->load('cake'))
                                                 ->onQueue('emails');
    }

    public function interestedUnsubscription(Fluent $interest): void
    {
        SendEmailForCakesInterestsUnsubscriptionJob::dispatch($interest)
                                                   ->onQueue('emails');
    }
}
