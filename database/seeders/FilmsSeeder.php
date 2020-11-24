<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Film;

class FilmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $films = [
            'Фильм 1', 'Фильм 2', 'Фильм 3', 'Фильм 4', 'Фильм 5',
            'Фильм 6', 'Фильм 7', 'Фильм 8', 'Фильм 9', 'Фильм 10',
        ];

        for ($i=0; $i < count($films); $i++) {
            Film::create([
                'title' => $films[$i],
            ]);
        }
    }
}
