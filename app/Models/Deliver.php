<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Deliver extends Model
{
  /*
  |--------------------------------------------------------------------------
  | GLOBAL VARIABLES
  |--------------------------------------------------------------------------
  */

    protected $dates = [
    
        'deExitTime',
        'deEntryTime'
    ];


	  protected $primaryKey = 'idDeliver';
  
  	protected $table='delivers';



    /*
  |--------------------------------------------------------------------------
  | FUNCTIONS
  |--------------------------------------------------------------------------
  */
   	public function user()
  {
    return $this->belongsTo('App\Models\User');
  }

 public function type()
  {
    return $this->hasMany('App\Models\DeliverType');
  }

 public function setExitWeightAttribute($value)
    {
        $this->attributes['exitWeight'] = ($value);
    }

}
