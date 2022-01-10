<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lists = [
            '250 лучших фильмов',
            'Ожидаемые фильмы',
            'Популярные фильмы',
            'Рекомендации',
            'Фильмы про вампиров',
            'Фильмы про любовь',
            'Фильмы про космос',
            'Фильмы про катастрофы',
            'Фильмы про школу',
            'Отечественные фильмы',
        ];

        foreach ($lists as $category){
            DB::table('list_categories')->insert(['name' => $category]);
        }
    }
}
