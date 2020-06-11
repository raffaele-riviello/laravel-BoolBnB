<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = [
      'name',
      'description'
    ];

    public function apartaments()
    {
        return $this->belongsToMany('App\Apartament');
    }
}
