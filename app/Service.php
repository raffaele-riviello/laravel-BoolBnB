<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
  protected $fillable = [
    'name',
  ];

  public function apartaments()
    {
        return $this->belongsToMany('App\Apartaments');
    }
}
