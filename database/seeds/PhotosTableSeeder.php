<?php

use Illuminate\Database\Seeder;

use App\Photo;
use App\Apartament;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5; $i++) {

          // ------prendiamo uno apartament casuale------
          $apartament = Apartament::inRandomOrder()->first();
          // ------prendiamo uno apartament casuale------

          $photo = new Photo;
          $photo->img_path = 'https://picsum.photos/200/300';
          $photo->apartament_id = $apartament->id;

          $photo->save();
        }
    }
}
