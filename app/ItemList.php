<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ItemList extends Model
{


  public function renttype()
    {
   return $this->belongsTo('App\RentType','rent_type','id');
    }

 public function region()
  {
  return $this->belongsTo('App\Region');
  }

  public function emlaktype()
   {
   return $this->belongsTo('App\EmlakType','emlak_type','id');
   }

}
