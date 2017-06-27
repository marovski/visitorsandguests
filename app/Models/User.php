<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
use App\Models\Security;
use App\Models\Meeting;



class User extends Authenticatable
{
  use Notifiable;



    protected $primaryKey = 'idUser';
    protected $table='users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    
        'username', 'email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    // 'password', 'remember_token',
    // ];

    public function isSuperAdmin()
    {
        foreach ($this->securities()->get() as $role)
        {
            if ($role->superAdmin == '1')
            {
                return true;
            }
        }

        return false;
    }


     public function role()
    {
      $n=2;
      $sec = Security::whereHas('users', function ($query) {
      $query->where('meetingPermission', '=', '2'); 


     })->get();

     

        foreach ($sec as $role)
        {


            if ($role->idSecurity == Auth::user()->fk_idSecurity){


              return true;

            }

                
            
          
        }
        return false;
          
    }



    public function delivers()
    {
      return $this->hasMany('App\Models\Deliver');
    }
    public function meetings()
    {
      return $this->belongsToMany('App\Models\Meeting');
    }

      public function meetingHost()
    {
      return $this->hasMany('App\Models\Meeting');
    }
    public function drops()
    {
      return $this->hasMany('App\Models\Drop');
    }


    public function securities()
    {
      return $this->belongsTo('App\Models\Security');
    }


    public function losts(){


    return $this->hasMany('App\Models\LostsFound');


  }

  }