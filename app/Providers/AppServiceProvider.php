<?php

declare(strict_types=1);

namespace App\Providers;

use App\Services\Currencies\CBRCurrencyService;
use App\Services\Currencies\CurrencyService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(CurrencyService::class, CBRCurrencyService::class);
    }

    public function boot(): void
    {
        //
    }
}
