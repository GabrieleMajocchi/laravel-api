<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $userIds = User::all()->pluck('id');

        foreach ($userIds as $userId) {
            $newUserDetail = new UserDetail();
            $newUserDetail->user_id = $userId;
            $newUserDetail->birth_date = $faker->date();
            $newUserDetail->office_number = $faker->numberBetween(1, 49) . ucfirst($faker->randomLetter());
            $newUserDetail->address = $faker->address();
            $newUserDetail->signature = $faker->paragraphs(2, true);
            $newUserDetail->save();
        }
    }

}
