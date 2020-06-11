<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
  protected $fillable = [
    'apartament_id'
  ];

  public function apartament() {
    return $this->belongsTo('App\Apartament');
  }
}
