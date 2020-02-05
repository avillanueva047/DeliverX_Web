<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = [
      'delivery_name', 'deliver_name', 'client_name', 'client_email', 'client_direction', 'client_phone'
    ];

    public function user(){
      return $this->belongsTo(User::class, 'name');
    }
}
