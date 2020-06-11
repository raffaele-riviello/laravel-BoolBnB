<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  protected $fillable = [
    'apartament_id',
    'message'
  ];

  public function apartament() {
    return $this->belongsTo('App\Apartament');
  }
}
