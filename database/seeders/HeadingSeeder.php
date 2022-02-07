<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeadingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $headings = [
            'Бюро находок',
            'Киношкола',
            'Привет, что нового?',
            'Портрет героя',
            'Мнение',
            'Выбор редакции',
            'Культовое кино',
            'Эволюция кинообраза',
            'Блог компании'
        ];

        foreach ($headings as $heading){
            DB::table('headings')->insert(['name' => $heading]);
        }

    }
}
