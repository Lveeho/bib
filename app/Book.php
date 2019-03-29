<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $fillable = [
        'ISBN','booktitle','author_id','year','edition','description','photo_id'
    ];
    public function barcodes(){
        return $this->hasMany('App\Barcode');
    }
    public function author(){
        return $this->belongsTo('App\Author');
    }

}
