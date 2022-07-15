<?php

namespace App\Traits;

use App\Jobs\{SendEmailForCakesInterestsSubscriptionJob, SendEmailForCakesInterestsUnsubscriptionJob};
use App\Models\Interest;

trait InterestedCakesMails
{
    public function interestedSubscription(Interest $interest): void
    {
        SendEmailForCakesInterestsSubscriptionJob::dispatch($interest->load('cake'))
                                                 ->onQueue('emails');
    }

    public function interestedUnsubscription(Interest $interest): void
    {
        SendEmailForCakesInterestsUnsubscriptionJob::dispatch($interest->load('cake'))
                                                   ->onQueue('emails');
    }
}
