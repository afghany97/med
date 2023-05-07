<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ads = [];
        for ($i = 0; $i < 5; $i++) {
            $ads [] = [
                'title' => $title = fake()->sentence(3),
                'image' => fake()->imageUrl(word: $title),
                'created_at' => $now = Carbon::now(),
                'updated_at' => $now
            ];
        }
        DB::table('ads')
            ->insert($ads);
    }
}
