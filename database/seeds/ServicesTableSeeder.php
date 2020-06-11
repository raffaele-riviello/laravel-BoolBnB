<?php

use Illuminate\Database\Seeder;

use App\Service;

use Faker\Generator as Faker;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 8; $i++) {
          $feature = new Service;
          $feature->name = $faker->word();

          $feature->save();
        }
    }
}
