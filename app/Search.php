<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Search extends Model
{
    protected $table='searches';
    protected $fillable=['id','city','room','type','maxprice','minprice','ground_size','area_size','floor'];
}
