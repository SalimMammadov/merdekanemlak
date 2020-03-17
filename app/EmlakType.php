<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class EmlakType extends Model
{
  public function item()
  {
    return $this->hasMany('App\ItemList','emlak_type');
  }
}
