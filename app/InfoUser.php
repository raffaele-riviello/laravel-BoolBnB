<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoUser extends Model
{
  protected $fillable = [
    'user_id',
    'firstname',
    'lastname',
    'date_of_birth',
    'phone_number'
  ];

  public function user()
    {
        return $this->belongsTo('App\User');
    }
}
