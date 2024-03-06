<?php

declare(strict_types=1);

use App\Http\Controllers\FetchCurrenciesController;
use Illuminate\Support\Facades\Route;

Route::get('currencies', FetchCurrenciesController::class)->name('currencies');
