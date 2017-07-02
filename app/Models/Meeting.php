<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Laravel\Scout\Searchable;


class Meeting extends Model
{

  use Searchable;
  /*
  |--------------------------------------------------------------------------
  | GLOBAL VARIABLES
  |--------------------------------------------------------------------------
  */


	protected $primaryKey='idMeeting';

	protected $table='meetings';


  public $fillable = ['idMeeting','meetingName','visitReason','meetStatus','room'];

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
