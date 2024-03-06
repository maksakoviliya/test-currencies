<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Currency>
 */
final class CurrencyFactory extends Factory
{
    public function definition(): array
    {
        return [
            'num_code' => $this->faker->randomNumber(3),
            'char_code' => strtoupper(Str::random(2)),
            'nominal' => $this->faker->randomElement(['1','10']),
            'name' => $this->faker->word,
            'value' => $this->faker->randomFloat(),
            'vunit_rate' => $this->faker->randomFloat(),
        ];
    }
}
