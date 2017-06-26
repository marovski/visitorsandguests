<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Drop extends Model
{  
  

  protected $primaryKey = 'idDrop';
  
  protected $table='drops';	

  public function user()
  {

    return $this->belongsTo('App\Models\User');
  
  }




}
