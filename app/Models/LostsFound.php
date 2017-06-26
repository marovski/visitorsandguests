<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LostsFound extends Model
{
    /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

	protected $table = 'lostItems';
	protected $primaryKey = 'id';
	public $timestamps = true




  /*
	|--------------------------------------------------------------------------
	| FUNCTIONS
	|--------------------------------------------------------------------------
	*/

	public function user(){


    return $this->belongsTo('App\Models\User');


	}
}
