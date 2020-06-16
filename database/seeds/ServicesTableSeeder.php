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

        $servizi = [
          'WiFi',
          'Posto auto',
          'Piscina',
          'Portineria',
          'Sauna',
          'Condizionatore',
          'Riscaldamento',
          'Cucina',
          'TV',
          'Frigorifero',
          'Biancheria',
          'Lavanderia',
          'Asciugacapelli'
        ];

        foreach ($servizi as $servizio) {
          $service = new Service;
          $service->name = $servizio;

          $service->save();
        }
    }
}
