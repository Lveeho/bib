<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $fillable = [
        'street','nr','busnr','postalcode','country'
    ];

    public function user(){
        return $this->hasMany('App\User','address_id','id');
    }
}
