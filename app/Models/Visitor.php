<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{		



	protected $primaryKey = 'idVisitor';
	
	protected $table='visitors';
	

	public function meeting()
	{
		return $this->belongsToMany('App\Models\Meeting');
	}
}