<?php

declare(strict_types=1);

use App\Http\Controllers\Pages\HomePageController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePageController::class);
