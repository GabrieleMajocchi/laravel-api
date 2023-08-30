<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectsSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        $typesIds = Type::all()->pluck('id');
        $userIds = User::all()->pluck('id');

        for ($i=0; $i < 5; $i++) {
            $newProject = new Project();
            $newProject->title = $faker->sentence(2);
            $newProject->description = $faker->paragraph(5);
            $newProject->lang = $faker->randomElement(['PHP', 'JavaScript', 'Vue', 'Laravel']);
            $newProject->link = $faker->url();
            $newProject->date = $faker->dateTimeBetween('2023-03-01', 'now');
            $newProject->image = $faker->imageUrl(480, 360, 'post', true, 'posts', true, 'png');
            $newProject->type_id = $faker->randomElement($typesIds);
            $newProject->user_id = $faker->randomElement($userIds);
            $newProject->save();
        }
    }
}
