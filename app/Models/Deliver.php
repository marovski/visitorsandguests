<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Laravel\Scout\Searchable;
class Deliver extends Model
{
  
    use Searchable;
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

      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
    
        'deFirmSupplier','idDeliver', 'deDriverName','deDriverID',
    ];

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
