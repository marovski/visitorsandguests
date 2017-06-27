<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliverType extends Model
{


	protected $primaryKey = 'idDeliverType';
    
    protected $table='delivertype';
    

 public function deliver()
  {
    
    return $this->belongsTo('App\Models\Deliver');
  
  }

}
