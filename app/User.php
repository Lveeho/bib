<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_firstname','user_lastname','email','rijksnr','address_id', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function roles(){
        return $this->belongsToMany('App\Role','role_user');
    }
    public function rentals(){
        return $this->hasMany('App\Rental','role_user');
    }
    public function address(){
        return $this->belongsTo('App\Address');
    }
    public function isAdmin(){

     /* if(Auth::user()->roles->where('name', 'admin')->First())
    $test = true;*/
      //dd( $this->roles()->First()->name) ;
        if(Auth::user()->roles->where('name', 'admin')->First() == true){
            return true;
        }else{
            return false;
        }
    }
}
