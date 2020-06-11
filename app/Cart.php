<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';

    protected $fillable = [
      'advetising_id',
      'apartament_id',
      'transaction',
      'start',
      'end'
    ];

    public function advertisings() {
      return $this->hasMany('App\Advertising');
    }

    public function apartament() {
      return $this->belongsTo('App\Apartament');
    }
}
