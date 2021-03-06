<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    protected $fillable = [
      'name',
      'price',
      'duration'
    ];

    public function cart() {
      return $this->belongsTo('App\Cart');
    }
}
