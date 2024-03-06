<?php

declare(strict_types=1);

namespace App\Services\Currencies;

use App\Models\Currency;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Throwable;

final class CBRCurrencyService implements CurrencyService
{

    /**
     * @throws Exception
     */
    public function sync(): void
    {
        try {
            $response = Http::get(config('services.currencies.url'));
            $data = simplexml_load_string($response->body());
        } catch (Throwable $exception) {
            throw new Exception(__('errors.service.unavailable'));
        }
        $currencies = $data->children();
        foreach ($currencies as $currency) {
            Currency::query()
                ->create([
                    'num_code' => $currency->NumCode,
                    'char_code' => $currency->CharCode,
                    'nominal' => $currency->Nominal,
                    'name' => $currency->Name,
                    'value' => $currency->Value,
                    'vunit_rate' => $currency->VunitRate,
                ]);
        }
    }

    public function fetch(): Collection|array
    {
        $date = Carbon::today();
        if (!Currency::query()
            ->select('id')
            ->whereDay('created_at', $date)
            ->count('id')) {
            try {
                $this->sync();
            } catch (Throwable $e) {
                return collect();
            }
        }
        return Currency::query()
            ->whereDay('created_at', $date)
            ->get();
    }
}
