<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    //
    protected $fillable = [
        'user_id','barcode_id','rentaldate','returndate'
    ];
}
