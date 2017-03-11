<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grant extends Model
{
    protected $fillable = [
      'description',
      'amount',
      'status',
    ];
}
