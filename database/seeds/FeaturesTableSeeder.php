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

      $caratteristiche = [
        'Pulito e ordinato',
        'Ottima comunicazione',
        'Cancellazione gratuita',
        'Casa indipendente',
        'Stanza singola',
        'Ristrutturazione recente',
        'Colazione inclusa',
        'Comodamente servita',
        'Facilmente raggiungibile',
        'Vista mare'
      ];

      foreach ($caratteristiche as $caratteristica) {
        $feature = new Feature;
        $feature->name = $caratteristica;
        $feature->description = $faker->sentence(4, true);

        $feature->save();
      }
    }
}
