<?php

use Illuminate\Database\Seeder;

use App\Apartament;
use App\Message;

use Faker\Generator as Faker;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) {
          // ------prendiamo uno apartament casuale------
          $apartament = Apartament::inRandomOrder()->first();
          // ------prendiamo uno apartament casuale------

          $message = new Message;
          $message->message = $faker->sentence(20, true);
          $message->apartament_id = $apartament->id;
          $message->name = $faker->name();
          $message->email = $faker->email();          

          $message->save();
        }
    }
}
