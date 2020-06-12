<?php

use Illuminate\Database\Seeder;

use App\User;
use App\InfoUser;

use Faker\Generator as Faker;

class InfoUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users_number = User::count();

        for ($i=0; $i < $users_number ; $i++) {
            // ------prendiamo uno user casuale------
            $user = User::inRandomOrder()->first();
            // ------prendiamo uno user casuale------

            $info_user = new InfoUser;
            $info_user->user_id = $user->id;
            $info_user->firstname = $faker->firstName();
            $info_user->lastname = $faker->lastName();
            $info_user->date_of_birth = $faker->date();
            $info_user->phone_number = $faker->phoneNumber();

            $info_user->save();
        }
    }
}
