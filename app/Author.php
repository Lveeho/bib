<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    protected $fillable = ['author_firstname','author_lastname'];

    public function books(){
        return $this->hasMany('App\Books');
    }
}
