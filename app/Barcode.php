<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barcode extends Model
{
    use SoftDeletes;
    //
    protected $fillable = [
        'book_id','barcode','status'
    ];
    public function book(){
        return $this->belongsTo('App\Book');
    }
}
