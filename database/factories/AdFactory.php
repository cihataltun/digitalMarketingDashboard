<?php

namespace Database\Factories;

use App\Models\Ad;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ad>
 */
class AdFactory extends Factory
{
    protected $model = Ad::class;

    public function definition()
    {
        $platforms = ['Google', 'Facebook', 'Instagram', 'TikTok', 'YouTube'];

        return [
            'platform' => $this->faker->randomElement($platforms),
            'date' => $this->faker->date(),
            'impressions' => $this->faker->numberBetween(100, 1000),
            'clicks' => $this->faker->numberBetween(50, 500),
            'spend' => $this->faker->randomFloat(2, 100, 1000),
            'revenue' => $this->faker->randomFloat(2, 200, 2000),
        ];
    }
}
