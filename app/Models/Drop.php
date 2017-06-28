<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Drop extends Model
{  
  
  /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

  protected $primaryKey = 'idDrop';
  
  protected $table='drops';	


    /*
  |--------------------------------------------------------------------------
  | FUNCTIONS
  |--------------------------------------------------------------------------
  */
  public function user()
  {

    return $this->belongsTo('App\Models\User');
  
  }




}
