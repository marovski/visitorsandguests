<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
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
