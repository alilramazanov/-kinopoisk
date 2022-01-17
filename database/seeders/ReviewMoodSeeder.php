<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewMoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $moods = [
          'положительный',
          'отрицательный',
          'нейтральный'
        ];

        foreach ($moods as $mood) {
            DB::table('review_moods')->insert(['name' => $mood]);

        }
    }
}
