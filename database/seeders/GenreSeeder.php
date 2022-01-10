<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [
            'Комедии',
            'Ужасы',
            'Детективы',
            'Боевики',
            'Мелодрамы',
            'Приключения',
            'Фентези',
            'Военные',
            'Семейные',
            'Драмы',
            'Вестерны',
            'Криминал',
            'Документальные',
        ];

        foreach ($genres as $genre) {
            DB::table('genres')->insert(['name' => $genre]);

        }
    }
}
