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


    public function getAmountAttribute($amount)
    {
        return $this->attributes['amount'] = sprintf('$%s', number_format($amount, 2));
    }
}
