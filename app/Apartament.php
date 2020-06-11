<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartament extends Model
{
    protected $fillable = [
      'user_id',
      'title',
      'description',
      'cover_img',
      'rooms_number',
      'beds_number',
      'bathrooms_number',
      'visible',
      'size',
      'address',
      'latitude',
      'longitude',
      'price'
    ];

    public function carts() {
      return $this->hasMany('App\Cart');
    }

    public function visits() {
      return $this->hasMany('App\Visit');
    }

    public function messages() {
      return $this->hasMany('App\Message');
    }

    public function photos() {
      return $this->hasMany('App\Photo');
    }

    public function services()
    {
        return $this->belongsToMany('App\Service');
    }

    public function features()
    {
        return $this->belongsToMany('App\Feature');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
