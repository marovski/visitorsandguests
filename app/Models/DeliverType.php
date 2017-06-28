<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliverType extends Model
{

  /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

	protected $primaryKey = 'idDeliverType';
    
    protected $table='delivertype';
        /*
  |--------------------------------------------------------------------------
  | FUNCTIONS
  |--------------------------------------------------------------------------
  */

 public function deliver()
  {
    
    return $this->belongsTo('App\Models\Deliver');
  
  }

}
