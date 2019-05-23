<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    //
    protected $fillable = [
        'user_id','barcode_id','rentaldate'
        ];
    public function user(){
        return $this->belongsTo('App\User'); //has many?//
    }
    public function barcode(){
        return $this->belongsTo('App\Barcode');
    }
}
