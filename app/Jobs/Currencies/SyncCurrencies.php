<?php

declare(strict_types=1);

namespace App\Jobs\Currencies;

use App\Services\Currencies\CurrencyService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

final class SyncCurrencies implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * @var int
     */
    public int $tries = 3;

    public function handle(CurrencyService $service): void
    {
       $service->sync();
    }
}
