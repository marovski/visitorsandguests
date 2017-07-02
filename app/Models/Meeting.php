<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Laravel\Scout\Searchable;


class Meeting extends Model
{
  /*
  |--------------------------------------------------------------------------
  | GLOBAL VARIABLES
  |--------------------------------------------------------------------------
  */


	protected $primaryKey='idMeeting';

	protected $table='meetings';


  public $fillable = ['meetingName','visitReason'];

    /*
  |--------------------------------------------------------------------------
  | FUNCTIONS
  |--------------------------------------------------------------------------
  */
  
     public function host()
  {
    return $this->belongsTo('App\Models\User');
  }

  
     public function user()
  {
    return $this->belongsToMany('App\Models\User');
  }

 

     public function visitor()
  {
    return $this->belongsToMany('App\Models\Visitor');
  }
}
