<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $technologies = [
            'Php', 'VueJs 3', 'Laravel 10', 'JavasScript', 'HTML 5', 'CSS 3', 'MySQL', 'Sass', 'Vite'
        ];

        foreach ($technologies as $technology){
            $newTechnology = new Technology();
            $newTechnology->name = $technology;
            $newTechnology->color = $faker->unique()->safeHexColor();
            $newTechnology->save();
        }
    }
}
