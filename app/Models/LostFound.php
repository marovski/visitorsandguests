<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
class LostFound extends Model
{
    /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

	protected $table = 'lostItems';
	protected $primaryKey = 'idLostFound';
	

  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
    
        'itemDescription', 'finderName', 'finderPhone'
    ];


  /*
	|--------------------------------------------------------------------------
	| FUNCTIONS
	|--------------------------------------------------------------------------
	*/

	public function user(){


    return $this->belongsTo('App\Models\User');


	}
}
