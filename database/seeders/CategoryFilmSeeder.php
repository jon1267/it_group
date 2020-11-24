<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Film;

class CategoryFilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach (Film::all() as $film) {
            $categories = Category::inRandomOrder()->take(rand(2,3))->pluck('id');
            $film->categories()->attach($categories);
        }
    }
}
