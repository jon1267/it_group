<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['комедия', 'детектив', 'боевик', 'сериал', 'мелодрама',];

        for ($i=0; $i < count($categories); $i++) {
            Category::create([
                'title' => $categories[$i],
            ]);
        }
    }
}
