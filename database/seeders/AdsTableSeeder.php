<?php

namespace Database\Seeders;

use App\Models\Ad;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $startDate = Carbon::create(2023, 1, 1); // 2023-01-01
        $endDate = Carbon::today(); // Bugünkü tarih

        while ($startDate <= $endDate) {
            Ad::factory()->count(1)->create([
                'date' => $startDate->toDateString(),
                'impressions' => rand(100, 1000),
                'clicks' => rand(50, 500),
                'spend' => rand(100, 1000),
                'revenue' => rand(200, 2000),
            ]);

            $startDate->addDay(); // Bir gün ekleyerek tarihi bir sonraki güne taşı
        }
    }}
