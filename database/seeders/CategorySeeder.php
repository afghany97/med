<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $whiteList = [
            'Anesthesiology',
            'Dermatology',
            'Emergency medicine',
            'Family medicine',
            'Internal medicine',
            'Medical genetics',
            'Neurology',
            'Nuclear medicine',
            'Ophthalmology',
            'Pathology',
            'Pediatrics',
            'Psychiatry',
            'Radiation oncology',
            'Surgery',
            'Urology'];
        $categories = [];
        foreach ($whiteList as $category) {
            $categories [] = [
                'name' => $category,
                'created_at' => $now = Carbon::now(),
                'updated_at' => $now
            ];
        }
        DB::table('categories')->insertOrIgnore($categories);
    }
}
