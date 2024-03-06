<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Jobs\Currencies\SyncCurrencies;
use App\Models\Currency;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CurrenciesServiceTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_can_sync_service(): void
    {
        $this->assertDatabaseCount('currencies', 0);
        SyncCurrencies::dispatchSync();
        $this->assertTrue(Currency::query()->count() > 0);
    }

    public function test_can_fetch_loaded_data()
    {
        Currency::factory(30)->create();
        $response = $this->get(route('api.currencies'));
        $response->assertStatus(200);
    }

    public function test_can_fetch_remote_data()
    {
        $response = $this->get(route('api.currencies'));
        $response->assertStatus(200);
    }
}
