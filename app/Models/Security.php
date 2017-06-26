<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Security extends Model
{

	protected $primaryKey='idSecurity';
	protected $table='securities';



    public function users()
    {
        return $this->hasMany('App\Models\User',  'fk_idSecurity');
    }




}
