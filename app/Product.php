<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
          'data',
      ];

      public function getDataAttribute($value)
      {
          return json_decode($value);
      }
}
