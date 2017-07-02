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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
    
        'dropperCompanyName','idDrop', 'dropReceiver','dropperName', 'dropDescr','receiverPhone',
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




}
