<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barcode extends Model
{
    //
    protected $fillable = [
        'book_id','barcode'
    ];
    public function book(){
        return $this->belongsTo('App\Book');
    }
}
