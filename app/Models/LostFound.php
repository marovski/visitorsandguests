<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LostFound extends Model
{
  public $timestamps = false;
  protected $primaryKey = 'idLostFound';
  protected $table='lostandfound';	
  
  
    public function user()
  {
    return $this->belongsTo('App\Models\User');
  }

    //
}
