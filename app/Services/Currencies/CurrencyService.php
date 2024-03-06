<?php

declare(strict_types=1);

namespace App\Services\Currencies;

interface CurrencyService
{
    public function sync(): void;

    public function fetch();
}
