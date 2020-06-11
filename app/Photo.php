<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
  protected $fillable = [
    'apartament_id',
    'img_path'
  ];

  public function apartament() {
    return $this->belongsTo('App\Apartament');
  }
}
