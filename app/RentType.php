<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class RentType extends Model
{
    public function item()
    {
      return $this->hasMany('App\ItemList','rent_type');
    }
}
