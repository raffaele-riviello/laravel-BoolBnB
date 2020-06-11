<?php

use Illuminate\Database\Seeder;

use App\Feature;

use Faker\Generator as Faker;

class FeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 8; $i++) {
          $feature = new Feature;
          $feature->name = $faker->word();
          $feature->description = $faker->sentence(4, true);

          $feature->save();
        }
    }
}
