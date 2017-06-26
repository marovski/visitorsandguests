<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Meeting extends Model
{


	protected $primaryKey='idMeeting';

	protected $table='meetings';


  
     public function user()
  {
    return $this->belongsToMany('App\Models\User');
  }

     public function visitor()
  {
    return $this->belongsToMany('App\Models\Visitor');
  }
}
