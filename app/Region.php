<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Region extends Model
{
    public function item()
    {
      return $this->hasMany('App\ItemList','region_id');
    }
}
