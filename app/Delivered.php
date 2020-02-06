<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivered extends Model
{
  protected $fillable = [
    'user_id', 'delivery_name', 'deliver_name', 'client_name', 'client_email', 'client_direction', 'client_phone', 'latitude', 'longitude'
  ];

  public function user(){
    return $this->belongsTo(User::class, 'id');
  }
}
