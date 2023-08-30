<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $newUser = new User();
        $newUser->name = 'Gabriele';
        $newUser->email= 'gabriele@gmail.com';
        $newUser->password= Hash::make('12345678');
        $newUser->save();

        for ($i=0; $i < 10; $i++) {
            $newUser = new User();
            $newUser->name = $faker->name();
            $newUser->email= $faker->email();
            $newUser->password= Hash::make($faker->password());
            $newUser->save();
        }

    }
}
