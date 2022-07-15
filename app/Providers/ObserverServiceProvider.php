<?php

namespace App\Providers;

use App\Models\Interest;
use App\Observers\InterestObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Interest::observe(InterestObserver::class);
    }
}
