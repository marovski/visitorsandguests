<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{		
  /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/


	protected $primaryKey = 'idVisitor';
	
	protected $table='visitors';
	public $fillable=['idVisitor','visitorName' , 'visitorCompanyName' , 'visitorEmail'];

	  /*
  |--------------------------------------------------------------------------
  | FUNCTIONS
  |--------------------------------------------------------------------------
  */

	public function meeting()
	{
		return $this->belongsToMany('App\Models\Meeting');
	}
}
