<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Services\Currencies\CurrencyService;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class FetchCurrenciesController extends Controller
{
    public function __invoke(Request $request, CurrencyService $service): JsonResponse
    {
        return response()->json($service->fetch());
    }
}
